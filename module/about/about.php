<?php if ($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class about extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function about_school()
    {
        $this->view->pageTitle = "About School | Don Bosco Malda";
        $this->view->css = array("views/about/about_school.css");
        $this->view->js = array("views/about/about_school.js");
        $this->view->render('about', 'about_school');
    }
    public function st_donbosc_visionary()
    {
$this->view->pageTitle = "St. Don Bosco: Visionary Educator | Don Bosco School Malda";        $this->view->css = array("views/about/st_donbosca_visionary.css");
        $this->view->js = array("views/about/st_donbosc_visionary.js");
        $this->view->render('about', 'st_donbosc_visionary');
    }
    public function founder()
    {
        $this->view->pageTitle = "About Founder | Don Bosco Malda";
        $this->view->css = array("views/about/founder.css");
        $this->view->js = array("views/about/founder.js");
        $this->view->render('about', 'founder');
    } 
    
    public function chairman()
    {
        $this->view->pageTitle = "About Chairman | Don Bosco Malda";
        $this->view->css = array("views/about/chairman.css");
        $this->view->js = array("views/about/chairman.js");
        $this->view->render('about', 'chairman');
    } public function director()
    {
        $this->view->pageTitle = "About Director | Don Bosco Malda";
        $this->view->css = array("views/about/director.css");
        $this->view->js = array("views/about/director.js");
        $this->view->render('about', 'director');
    }
    public function principal()
    {
        $this->view->pageTitle = "About Principal | Don Bosco Malda";
        $this->view->css = array("views/about/principal.css");
        $this->view->js = array("views/about/principal.js");
        $this->view->render('about', 'principal');
    }
}
