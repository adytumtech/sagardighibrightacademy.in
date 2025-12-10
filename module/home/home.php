<?php if($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class home extends Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->view->pageTitle = "Don Bosco Malda | Home";
		$this->view->css = array("views/home/home.css");
		$this->view->js = array("views/home/home.js");
		$this->view->render("home", "home");
	}

	public function getNotices() {
		header('Content-Type: application/json');
		echo $this->model->getNotices();
	}
	
	public function notice_details() {
        $this->view->pageTitle = "Notice Details | Don Bosco Malda";
        $this->view->css = array("views/home/home.css");
        $this->view->js = array("views/home/home.js");
        $this->view->render('home', 'notice_details');
    }
    
    public function download_attachment() {
        // Get the file path from the URL parameter
        $file_path = isset($_GET['file']) ? $_GET['file'] : '';
        
        if (empty($file_path)) {
            header("HTTP/1.0 404 Not Found");
            exit();
        }
        
        // Ensure the file path is a valid attachment path
        if (strpos($file_path, 'institute_asset/') !== 0) {
            header("HTTP/1.0 403 Forbidden");
            exit();
        }
        
        // Construct the full URL to the external service
        $external_url = 'https://app.progatiapp.com/' . $file_path;
        
        // Set headers to force download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        
        // Use cURL to fetch and stream the file content
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $external_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; DonBoscoBot/1.0)');
        
        // Get file content
        $file_content = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($http_code !== 200 || $file_content === false) {
            header("HTTP/1.0 404 Not Found");
            exit();
        }
        
        // Output the file content
        echo $file_content;
        exit();
    }
}