<?php if($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class contact_model extends Model {

	public function __construct() {
		parent::__construct();
	}


	public function submitContact($data = [])
	{
		// Check if PROGATI_API_KEY is defined
		if (!defined('PROGATI_API_KEY') || empty(PROGATI_API_KEY)) {
			error_log('PROGATI_API_KEY is not defined or empty');
			return false;
		}

		$ch = curl_init();
		$api_url = 'https://app.progatiapp.com/api/submitWebsiteEnquiry';

		// Use the same data structure as the home model to ensure compatibility
		$postData = http_build_query([
			'guardian_name'   => $data['guardian_name'],
			'child_name'      => $data['child_name'] ?? 'General Enquiry', // Provide a default value
			'phone_number'    => $data['phone_number'],
			'enquiry_details' => $data['enquiry_details'],
			'enquiry_type'    => $data['enquiry_type'] ?? 'contact',
		
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
			$error_msg = curl_error($ch);
			error_log('CURL Error submitContact: ' . $error_msg);
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
			error_log('JSON decode error submitWebsiteEnquiry: ' . json_last_error_msg());
			return false;
		}

		return isset($result['success']) && $result['success'] === true;
	}
}
