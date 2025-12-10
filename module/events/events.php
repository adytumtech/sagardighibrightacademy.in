<?php if($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class events extends Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->view->pageTitle = "Events | Don Bosco Malda";
		$this->view->render("events", "events");
	}
}