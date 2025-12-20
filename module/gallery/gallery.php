<?php if ($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class gallery extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index() {
        $this->view->pageTitle = "Gallery | SAGARDIGHI BRIGHT ACADEMY";
		$this->view->css = array("views/gallery/gallery.css");
		$this->view->js = array("views/gallery/gallery.js");
		$this->view->render("gallery", "gallery");
	}
}