<?php if ($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

class contact extends Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view->pageTitle = "Contact | SAGARDIGHI BRIGHT ACADEMY";
		$this->view->render("contact", "contact");
	}

	public function submitContact(){
		header('Content-Type:application/json');

		if($_SERVER['REQUEST_METHOD']!=='POST'){
			echo json_encode([
				"success"=>false,
				"message"=>"Invalid request method"
			]);
			exit;
		}
		$data = [
			'guardian_name'=>trim($_POST['guardian_name']??''),
			'phone_number'=>trim($_POST['phone_number']?? ''),
			'enquiry_details'=>trim($_POST['enquiry_details']?? ''),
			'enquiry_type'=>'contact'
		];

		 if ($data['guardian_name'] === '') {
      echo json_encode([
        "success" => false,
        "message" => "Guardian name is required"
      ]);
      exit;
    }

    if (!preg_match('/^\d{10}$/', $data['phone_number'])) {
      echo json_encode([
        "success" => false,
        "message" => "Invalid phone number"
      ]);
      exit;
    }
     $result = $this->model->submitContact($data);

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
