<?php if($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth extends Model {
	
	private static $key = "lakldjakdfjhdsufhiuwe7y438y82u89u2398u48932u49u290uri2j398j39";
	
	public function __construct()
	{
		parent::__construct();
	}

	public static function isAuthenticated() 
	{
		$token = null;
		$headers = apache_request_headers();
		// print_r($headers);
		if(isset($headers['Authorization'])) {
			$auth_header = $headers['Authorization'];
		} else if (isset($headers['authorization'])) {
			$auth_header = $headers['authorization'];
		} else {
			http_response_code(401);
			echo JsonEncode(array("res" => "No Authorization header found!"));
			exit();
		}

		$token = substr($auth_header, 7);
		if (self::verifyToken($token) == 0) {
			http_response_code(401);
			echo JsonEncode(array("res" => "Invalid token"));
			exit();
		}
	}

	public static function verifyToken($jwt = "") {
		try {
			$decoded = JWT::decode($jwt, new Key(self::$key, 'HS256'));
			$decoded_array = (array) $decoded;
			// print_r($decoded_array);
			if (!isset($decoded_array['exp'])) return 0;
			if (!isset($decoded_array['name'])) return 0;
			if (!isset($decoded_array['uid']) || 
				$decoded_array['uid'] != $_SERVER['HTTP_USER_AGENT']) return 0;
			return (new self)->loadUserByUserName($decoded_array['name']);
		} catch (\Exception $e) {
			return 0;
		}
	}

	public static function generateToken($username = '') {
		$iat = new DateTimeImmutable(date('Y-m-d H:i:s'));
		$interval = 'P0Y0M0DT0H30M0S';
		$exp = $iat->add(new DateInterval($interval));
		
		$payload = array(
			"aud" => "http://app.impiloonline.com",
			"name" => $username,
			"uid" => $_SERVER['HTTP_USER_AGENT'],
			"exp" => $exp->getTimestamp(),
			"iat" => $iat->getTimestamp(),
			"nbf" => $iat->getTimestamp()
		);

		$jwt = JWT::encode($payload, self::$key, 'HS256');

		return array("token" => $jwt);
	}

	public static function generateRefreshToken($username = '') {
		$iat = new DateTimeImmutable(date('Y-m-d H:i:s'));
		$interval = 'P1Y0M0DT24H0M0S';
		$exp = $iat->add(new DateInterval($interval));
		
		$payload = array(
			"aud" => "http://app.impiloonline.com",
			"name" => $username,
			"uid" => $_SERVER['HTTP_USER_AGENT'],
			"exp" => $exp->getTimestamp(),
			"iat" => $iat->getTimestamp(),
			"nbf" => $iat->getTimestamp()
		);

		$jwt = JWT::encode($payload, self::$key, 'HS256');

		return array("refresh_token" => $jwt);
	}

	public static function refreshToken($token) {
		if (self::verifyToken($token) == 1) {
			$decoded = JWT::decode($token, new Key(self::$key, 'HS256'));
			$decoded_array = (array) $decoded;
			// return self::generateToken($decoded_array['name']);
			$username = $decoded_array['name'];
			$iat = new DateTimeImmutable(date('Y-m-d H:i:s'));
			$interval = 'P0Y0M0DT0H30M0S';
			$exp = $iat->add(new DateInterval($interval));
			
			$payload = array(
				"aud" => "http://app.feedvoty.com",
				"name" => $username,
				"uid" => $_SERVER['HTTP_USER_AGENT'],
				"exp" => $exp->getTimestamp(),
				"iat" => $iat->getTimestamp(),
				"nbf" => $iat->getTimestamp()
			);

			$jwt = JWT::encode($payload, self::$key, 'HS256');

			return array("token" => $jwt);

		} else {
			return array("res" => "Invalid Token!");
		}
	}
	
	public function loadUserByUserName($username) {
		if (strlen($username) == 10) {
			// echo 1;
			$sth = $this->db->prepare(
				"SELECT
					COUNT(1) exist
				FROM
					customers
				WHERE
					mobile_no = :username"
			);
			$sth->execute(array("username" => $username));
			return $sth->fetchColumn();
		} else {
			// echo 2;
			$sth = $this->db->prepare(
				"SELECT
					COUNT(1) exist
				FROM
					user
				WHERE
					username = :username
				AND is_active = 1"
			);
			$sth->execute(array("username" => $username));
			return $sth->fetchColumn();
		}
	}
}