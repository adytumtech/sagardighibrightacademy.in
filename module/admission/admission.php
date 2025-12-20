<?php if($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class admission extends Controller {

	public function __construct() {
		parent::__construct();
	}
	
	  public function procedure()
    {
        $this->view->pageTitle = "Admission Procedure | SAGARDIGHI BRIGHT ACADEMY
";
        $this->view->css = array("views/admission/procedure.css");
        $this->view->js = array("views/admission/procedure.js");
        $this->view->render('admission', 'procedure');
    }
    public function online_apply()
    {
        $this->view->pageTitle = "Admission Online Apply | SAGARDIGHI BRIGHT ACADEMY
";
        $this->view->css = array("views/admission/online_apply.css");
        $this->view->js = array("views/admission/online_apply.js");
        $this->view->render('admission', 'online_apply');
    } 
	 public function school_timing()
    {
        $this->view->pageTitle = "School Timing | SAGARDIGHI BRIGHT ACADEMY
";
        $this->view->css = array("views/admission/school_timing.css");
        $this->view->js = array("views/admission/school_timing.js");
        $this->view->render('admission', 'school_timing');
    }
	 public function school_uniform()
    {
        $this->view->pageTitle = "School Uniform | SAGARDIGHI BRIGHT ACADEMY
";
        $this->view->css = array("views/admission/school_uniform.css");
        $this->view->js = array("views/admission/school_uniform.js");
        $this->view->render('admission', 'school_uniform');
    }
	 public function rules()
    {
        $this->view->pageTitle = "School Rules  | SAGARDIGHI BRIGHT ACADEMY
";
        $this->view->css = array("views/admission/rules.css");
        $this->view->js = array("views/admission/rules.js");
        $this->view->render('admission', 'rules');
    }
}