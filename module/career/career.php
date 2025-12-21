<?php if ($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class career extends Controller
{

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->view->pageTitle = "Career | Sagardighi Bright Academy ";
		$this->view->css = array("views/career/career.css");
		$this->view->js = array("views/career/career.js");
		$this->view->render("career", "career");
	}
}
