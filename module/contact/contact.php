<?php if($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class contact extends Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->view->pageTitle = "Contact | Don Bosco Malda";
		$this->view->js = array("views/contact/contact.js");
		$this->view->render("contact", "contact");
	}
}