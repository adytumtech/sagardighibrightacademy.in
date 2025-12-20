<?php if($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class academic extends Controller {

	public function __construct() {
		parent::__construct();
	}
	
	  public function curriculum()
    {
        $this->view->pageTitle = "Academic Curriculum | SAGARDIGHI BRIGHT ACADEMY
";
        $this->view->css = array("views/curriculum/academic.css");
        $this->view->js = array("views/curriculum/academic.js");
        $this->view->render('academic', 'curriculum');
    }
    public function visiting_hours()
    {
        $this->view->pageTitle = "Academic Visiting Hours | SAGARDIGHI BRIGHT ACADEMY
";
        $this->view->css = array("views/academic/academic.css");
        $this->view->js = array("views/academic/academic.js");
        $this->view->render('academic', 'visiting_hours');
    }
	 public function activities()
    {
        $this->view->pageTitle = "Activities | SAGARDIGHI BRIGHT ACADEMY
";
        $this->view->css = array("views/academic/academic.css");
        $this->view->js = array("views/academic/academic.js");
        $this->view->render('academic', 'activities');
    }
	 public function early_years()
    {
        $this->view->pageTitle = "Early Years | SAGARDIGHI BRIGHT ACADEMY
";
        $this->view->css = array("views/academic/academic.css");
        $this->view->js = array("views/academic/academic.js");
        $this->view->render('academic', 'early_years');
    }
	 public function primary_school()
    {
        $this->view->pageTitle = "Primary School | SAGARDIGHI BRIGHT ACADEMY
";
        $this->view->css = array("views/academic/academic.css");
        $this->view->js = array("views/academic/academic.js");
        $this->view->render('academic', 'primary_school');
    }
	 public function middle_school()
    {
        $this->view->pageTitle = "Middle School | SAGARDIGHI BRIGHT ACADEMY
";
        $this->view->css = array("views/academic/academic.css");
        $this->view->js = array("views/academic/academic.js");
        $this->view->render('academic', 'middle_school');
    }
	 public function high_school()
    {
        $this->view->pageTitle = " High School | SAGARDIGHI BRIGHT ACADEMY
";
        $this->view->css = array("views/academic/academic.css");
        $this->view->js = array("views/academic/academic.js");
        $this->view->render('academic', 'high_school');
    }
	 public function remedial_class()
    {
        $this->view->pageTitle = " Remedial School | SAGARDIGHI BRIGHT ACADEMY
";
        $this->view->css = array("views/academic/academic.css");
        $this->view->js = array("views/academic/academic.js");
        $this->view->render('academic', 'remedial_class');
    }
}