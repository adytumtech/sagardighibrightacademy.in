<?php if ($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class about extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function about_school()
    {
        $this->view->pageTitle = "About School | Sagardighi Bright Academy";
        $this->view->css = array("views/about/about_school.css");
        $this->view->js = array("views/about/about_school.js");
        $this->view->render('about', 'about_school');
    }
   
    public function principal()
    {
        $this->view->pageTitle = "About Principal | Sagardighi Bright Academy";
        $this->view->css = array("views/about/principal.css");
        $this->view->js = array("views/about/principal.js");
        $this->view->render('about', 'principal');
    }
}
