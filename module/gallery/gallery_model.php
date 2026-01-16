<?php if($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class gallery_model extends Model {

	public function __construct() {
		parent::__construct();
	}

			public function fetchGalleryEvents()
	{
		$ch = curl_init();

		// 1. URL Check: Docs onusare path '/api/getGalleryEvents'
		$api_url = 'https://app.progatiapp.com/api/getGalleryEvents';

		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

		// 2. API Key Check
		// Make sure PROGATI_API_KEY constant ta config file e define kora ache.
		// Debugging er jonno chaile direct string bosiye check korte paro: 'X-API-Key: YOUR_REAL_KEY'
		$headers = array(
			'X-API-Key: ' . PROGATI_API_KEY,
			'Content-Type: application/x-www-form-urlencoded'
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


		$postData = http_build_query([
			'limit' => 20,
			'offset' => 0,
		]);

		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);

		$response = curl_exec($ch);

		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		if (curl_errno($ch)) {
			$error = curl_error($ch);
			curl_close($ch);
			return [
				'success' => false,
				'error' => 'Connection Error: ' . $error
			];
		};

		curl_close($ch);

		// --- DEBUGGING BLOCK ---
		if ($httpCode !== 200) {
			return [
				'success' => false,
				'error' => 'API returned error code',
				'debug_http_code' => $httpCode,
				'debug_response' => $response
			];
		}

		return json_decode($response, true);
	}
}
