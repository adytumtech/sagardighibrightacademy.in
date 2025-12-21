<?php if ($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class home extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->pageTitle = "Sagardighi Bright Academy | Home";
        $this->view->css = array("views/home/home.css");
        $this->view->js = array("views/home/home.js");
        $this->view->render("home", "home");
    }

    public function getNotices()
    {
        // Optional: Add authentication check if needed
        // Uncomment the following lines if authentication is required
        /*
        if (!$this->isAuthenticated()) {
            header('HTTP/1.1 401 Unauthorized');
            echo json_encode(['error' => 'Authentication required']);
            exit;
        }
        */

        header('Content-Type: application/json');
        echo $this->model->getNotices();
    }

    /**
     * Check if user is authenticated (implement your authentication logic here)
     */
    private function isAuthenticated()
    {
        // Implement your authentication logic here
        // This is a placeholder - implement according to your auth system
        return true; // or implement proper auth check
    }

    public function notice_details()
    {
        $this->view->pageTitle = "Notice Details | Don Bosco Malda";
        $this->view->css = array("views/home/home.css");
        $this->view->js = array("views/home/home.js");
        $this->view->render('home', 'notice_details');
    }

    public function download_attachment()
    {
        // Get the file path from the URL parameter
        $file_path = isset($_GET['file']) ? $_GET['file'] : '';

        if (empty($file_path)) {
            header("HTTP/1.0 404 Not Found");
            exit();
        }

        // Sanitize the file path to prevent directory traversal
        $file_path = $this->sanitize_file_path($file_path);

        if (!$file_path) {
            header("HTTP/1.0 403 Forbidden");
            exit();
        }

        // Construct the full URL to the external service
        $external_url = 'https://app.progatiapp.com/' . $file_path;

        // Validate the external URL to ensure it's from the allowed domain
        if (!preg_match('/^https:\/\/app\.progatiapp\.com\//', $external_url)) {
            header("HTTP/1.0 403 Forbidden");
            exit();
        }

        // Set headers to force download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        header('X-Content-Type-Options: nosniff');

        // Use cURL to fetch and stream the file content
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $external_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        // Enable SSL verification for production security
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; DonBoscoBot/1.0)');
        // Set a reasonable timeout
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

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

    /**
     * Sanitize file path to prevent directory traversal attacks
     */
    private function sanitize_file_path($file_path)
    {
        // Convert to string and trim whitespace
        $file_path = trim((string)$file_path);

        // Remove any directory traversal sequences
        $file_path = preg_replace('/(\.\.\/|\.\.\\|%2e%2e%2f|%2e%2e%5c)/i', '', $file_path);

        // Ensure the path starts with the allowed directory
        if (strpos($file_path, 'institute_asset/') !== 0) {
            return false;
        }

        // Additional validation: check for null bytes and other potential issues
        if (strpos($file_path, "\0") !== false) {
            return false;
        }

        return $file_path;
    }

    public function submitEnquiry()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode([
                "success" => false,
                "message" => "Invalid request"
            ]);
            return;
        }

        $data = [
            'guardian_name'   => trim($_POST['guardian_name'] ?? ''),
            'child_name'      => trim($_POST['child_name'] ?? ''),
            'phone_number'    => trim($_POST['phone_number'] ?? ''),
            'enquiry_details' => trim($_POST['enquiry_details'] ?? ''), // OPTIONAL
            // 'enquiry_type'    => $_POST['enquiry_type'] ?? 'admission',
            // 'referred_by'     => trim($_POST['referred_by'] ?? '')
        ];

        if ($data['guardian_name'] === '') {
            echo json_encode(["success" => false, "message" => "Guardian name is required"]);
            return;
        }

        if ($data['child_name'] === '') {
            echo json_encode(["success" => false, "message" => "Child name is required"]);
            return;
        }

        if ($data['phone_number'] === '') {
            echo json_encode(["success" => false, "message" => "Phone number is required"]);
            return;
        }



        $result = $this->model->submitEnquiry($data);

        if ($result === true) {
            echo json_encode([
                "success" => true,
                "message" => "Your enquiry has been submitted successfully"
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Failed to submit enquiry. Please try again later."
            ]);
        }
    }
}
