<?php if ($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class admission extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->pageTitle = "Admission Procedure | Sagardighi Bright Academy ";
        $this->view->css = array("views/admission/procedure.css");
        $this->view->js = array("views/admission/procedure.js");
        $this->view->render('admission', 'procedure');
    }
}
