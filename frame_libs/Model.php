<?php if($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

require '../connections/Database.php';

class Model {
	protected $db = null;
	
	public function __construct() {
		// Database connection will be initialized only when needed
	}
	
	/**
	 * Get database connection - lazy loading pattern
	 * @return Database
	 */
	protected function getDb() {
		if ($this->db === null) {
			$this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
		}
		return $this->db;
	}
}