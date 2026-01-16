<?php if($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class about_model extends Model {

	public function __construct() {
		parent::__construct();
	}


	public function getAllTeacher()
    {
        // Initialize CURL
        $ch = curl_init();

        // Teacher API endpoint
        $api_url = 'https://app.progatiapp.com/api/getEmployeeDetails';

        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Enable SSL verification (production safe)
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

        // Set headers
        $headers = array(
            'X-Api-Key: ' . PROGATI_API_KEY,
            'Content-Type: application/x-www-form-urlencoded'
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // POST request (as required by the external API)
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'limit=50');

        // Timeout
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        // Execute request
        $response = curl_exec($ch);

        // CURL error handling
        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            error_log('CURL Error in getAllTeacher: ' . $error);
            return json_encode([
                'success' => false,
                'error' => 'Failed to retrieve teacher list'
            ]);
        }

        // HTTP status validation
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            error_log('API Error in getAllTeacher: HTTP ' . $httpCode);
            return json_encode([
                'success' => false,
                'error' => 'Failed to retrieve teacher list'
            ]);
        }

        // print_r($response);
        // exit;
        // Decode JSON safely
        $data = json_decode($response, true);

        return $data;
        
    }
}