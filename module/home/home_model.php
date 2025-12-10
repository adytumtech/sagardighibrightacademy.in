<?php if($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class home_model extends Model {

	public function __construct() {
		parent::__construct();
	}
	
	// Example of how to access the database with lazy loading
	// public function getExampleData() {
	//     return $this->getDb()->insert('database_name', 'table_name', $data);
	// }

	public function getApiKeys() {
		$sql = "SELECT api_key, api_secret FROM api_key WHERE is_active = 1 ORDER BY id DESC LIMIT 1";
		$sth = $this->getDb()->prepare($sql);
		$sth->execute();
		return $sth->fetch(PDO::FETCH_ASSOC);
	}

	public function getNotices() {
		$keys = $this->getApiKeys();

		// Initialize CURL
		$ch = curl_init();
		
		// Set the API endpoint (you'll need to replace with the actual API endpoint)
		$api_url = 'https://app.progatiapp.com/api/getNotice'; // Replace with actual API endpoint
		
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		// Set headers
		$headers = array(
			'X-Api-Key: ' . $keys['api_key']
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		
		// Set POST data with limit parameter (equivalent to -d 'limit=10')
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, 'limit=10');
		
		// Execute the request
		$response = curl_exec($ch);
		
		// Check for errors
		if (curl_errno($ch)) {
			$error = curl_error($ch);
			curl_close($ch);
			throw new Exception('CURL Error: ' . $error);
		}
		
		// Close CURL
		curl_close($ch);
		
		// Decode and return the JSON response
		// return json_decode($response, true);
		return $response;
	}
}
