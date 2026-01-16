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

    public function our_teachers()
    {
        $this->view->pageTitle = "About Our Teachers | Sagardighi Bright Academy";
        $this->view->css = array("views/about/our_teachers.css");
        $this->view->js = array("views/about/our_teachers.js");
        $this->view->render('about', 'our_teachers');
    }
   
    public function principal()
    {
        $this->view->pageTitle = "About Principal | Sagardighi Bright Academy";
        $this->view->css = array("views/about/principal.css");
        $this->view->js = array("views/about/principal.js");
        $this->view->render('about', 'principal');
    }

    public function infrastructure_and_facilities(){
     $this->view->pageTitle = " Infrastructure & facilities | Sagardighi Bright Academy";
      $this->view->css = array("views/about/about_school.css");
        $this->view->js = array("views/about/about_school.js");
    $this->view->render("about", "Infrastructure_and_facilities");
}



	 public function getTeachers()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo json_encode([
                'success' => false,
                'message' => 'Invalid request'
            ]);
            return;
        }

        echo json_encode($this->model->getAllTeacher());
    }
}
