<?php if ($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class gallery extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index() {
        $this->view->pageTitle = "Gallery | Sagardighi Bright Academy";
		$this->view->css = array("views/gallery/gallery.css");
		$this->view->js = array("views/gallery/gallery.js");
		$this->view->render("gallery", "gallery");
	}


     
// New Method for Gallery Events
    public function getGalleryEvents()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo json_encode([
                'success' => false,
                'message' => 'Invalid request method'
            ]);
            return;
        }

        // Call the new model function
        $data = $this->model->fetchGalleryEvents();
        echo json_encode($data);
    }
}