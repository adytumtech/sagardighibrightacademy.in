<?php if($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class home_model extends Model {

	public function __construct() {
		parent::__construct();
	}
	
	// Example of how to access the database with lazy loading
	// public function getExampleData() {
	//     return $this->getDb()->insert('database_name', 'table_name', $data);
	// }

	// public function getApiKeys() {
	// 	$sql = "SELECT api_key, api_secret FROM api_key WHERE is_active = 1 ORDER BY id DESC LIMIT 1";
	// 	$sth = $this->getDb()->prepare($sql);
	// 	$sth->execute();
	// 	return $sth->fetch(PDO::FETCH_ASSOC);
	// }

	public function getNotices() {
		// $keys = $this->getApiKeys();
		
		// Initialize CURL
		$ch = curl_init();

		$api_url = 'https://app.progatiapp.com/api/getNotice'; 

		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Enable SSL verification for production security
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

		// Set headers
		$headers = array(
			'X-Api-Key: ' . PROGATI_API_KEY,
			'Content-Type: application/x-www-form-urlencoded'
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		// Set POST data with limit parameter (equivalent to -d 'limit=10')
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, 'limit=10');

		// Set a reasonable timeout
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);

		// Execute the request
		$response = curl_exec($ch);

		// Check for errors
		if (curl_errno($ch)) {
			$error = curl_error($ch);
			curl_close($ch);
			// Log the error securely instead of exposing it
			error_log('CURL Error in getNotices: ' . $error);
			return json_encode(array('error' => 'Failed to retrieve notices'));
		}

		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		// Validate HTTP response code
		if ($httpCode !== 200) {
			error_log('API Error in getNotices: HTTP ' . $httpCode);
			return json_encode(array('error' => 'Failed to retrieve notices'));
		}

		// Validate and decode the JSON response
		$data = json_decode($response, true);
		if (json_last_error() !== JSON_ERROR_NONE) {
			error_log('JSON Error in getNotices: ' . json_last_error_msg());
			return json_encode(array('error' => 'Invalid response format'));
		}

		// Return the validated data
		return json_encode($data);
	}

	public function submitEnquiry($data = [])
{
    $ch = curl_init();

    $api_url = 'https://app.progatiapp.com/api/submitWebsiteEnquiry';

    $postData = http_build_query([
        'guardian_name'   => $data['guardian_name'],
        'child_name'      => $data['child_name'],
        'phone_number'    => $data['phone_number'],
        'enquiry_details' => $data['enquiry_details'],
        // 'enquiry_type'    => $data['enquiry_type'],
        // 'referred_by'     => $data['referred_by'] ?? ''
    ]);

    curl_setopt_array($ch, [
        CURLOPT_URL => $api_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_HTTPHEADER => [
            'X-Api-Key: ' . PROGATI_API_KEY,
            'Content-Type: application/x-www-form-urlencoded'
        ]
    ]);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        error_log('CURL Error submitEnquiry: ' . curl_error($ch));
        curl_close($ch);
        return false;
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200) {
        error_log('submitWebsiteEnquiry HTTP ' . $httpCode);
        return false;
    }

    $result = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log('JSON decode error submitWebsiteEnquiry');
        return false;
    }

    return isset($result['success']) && $result['success'] === true;
}
}
