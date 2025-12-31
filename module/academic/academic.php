<?php if ($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class academic extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->pageTitle = "Academic  | Sagardighi Bright Academy ";
   
        $this->view->render('academic', 'academic');
    }
}
