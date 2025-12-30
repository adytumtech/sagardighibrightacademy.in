<?php if($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class career_model extends Model {

	public function __construct() {
		parent::__construct();
	}
	public function getAllNotice()
{
    $url = 'https://app.progatiapp.com/api/getNotice';

    $ch = curl_init($url);

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => http_build_query([
            'limit' => 10
        ]),
        CURLOPT_HTTPHEADER     => [
            'X-Api-Key: ' . PROGATI_API_KEY,
            'Content-Type: application/x-www-form-urlencoded'
        ],
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_TIMEOUT        => 30
    ]);

    $response = curl_exec($ch);

    if ($response === false) {
        error_log('CURL Error (getAllNotice): ' . curl_error($ch));
        curl_close($ch);
        return false;
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200) {
        error_log('API Error (getAllNotice): HTTP ' . $httpCode);
        return false;
    }

    $data = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log('JSON Decode Error (getAllNotice): ' . json_last_error_msg());
        return false;
    }

    return $data;
}

}
