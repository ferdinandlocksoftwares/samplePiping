<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('UTC');

class Register extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct(); 
		$this->load->library('session');
		$this->load->library('PHPMailer_CI_library');
		$this->load->helper('url');
		$this->load->model('Countries');
		$this->load->model('Sellers_model');
		$this->load->model('Users_model');
		$this->load->model('Registration_model');
		$this->load->model('SchemaMaster_model');
		$this->setSellerDB();
    }
	
	public function setSellerDB()
    {       
        $seller_id = $this->session->userdata('sellerid'); 
        $this->Users_model->setSchemaToUse($seller_id);
        $this->Sellers_model->setSchemaToUse($seller_id);
    }

	public function index()
	{
		$header_data['title'] = 'Register';
		//custom css
		$add_stylesheets = array(
			base_url().'assets/css/bootstrap-tagsinput.css',
            'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css',
            base_url().'assets/css/bootstrap-tagsinput.css'
		);
		//custom js
		$add_scripts = array(
			array(
                'src' => 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'
            ),
            array(
                'src' => 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'
            ),
            array(
                'src' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
                'integrity' => 'sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa',
                'crossorigin' => 'anonymous'
            ),
            array(
                'src' =>  base_url().'assets/js/bootstrap-tagsinput.js',
            ),
            array(
                'src' => 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js'
            )
		);
		//includes js or php files
		$add_includes = array(
		);
		$header_data['add_stylesheets'] = $add_stylesheets;
		$header_data['add_scripts'] = $add_scripts;
		$header_data['add_includes'] = $add_includes;
		
		if($this->session->userdata('seller_id') == null){
			$add_includes[] = 'assets/external_php/register.php';
			$header_data['add_includes'] = $add_includes;
			$data['countries'] = $this->Countries->getAllCountries();
			$this->load->view('template/header',$header_data);
			$this->load->view('template/main_navigation');
			$this->load->view('register',$data);
			$this->load->view('template/footer');
		}else{
			$this->load->view('template/header',$header_data);
			$this->load->view('template/seller_navigation');
			$this->load->view('home');
			$this->load->view('template/footer');
		}
	}
	
	public function signup()
	{		
		$response = array();
		$response["success"] = "no";
		$response["message"] = "";
		
		$seller_data = array();
		
		$seller_data["country"] = $this->input->post('country');	
		$seller_data["email"] = strtolower( trim( $this->input->post('email') ) );
		$user_data["email"] = $seller_data['email'];
		$seller_data["first_name"] = trim( $this->input->post('first_name') );
		$user_data['first_name']=$seller_data['first_name'];
		$seller_data["last_name"] = trim( $this->input->post('last_name') );
		$user_data['last_name']=$seller_data['last_name'];
		$user_data["password"] = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');
		$seller_data["isActive"] = true;
		$seller_data["isVerified"] = false;
		$user_data["isActive"] = true;
		$user_data["isVerified"] = false;
		
		
		if( $this->Sellers_model->sellerExists($seller_data["email"]) ||  $this->Users_model->userExists($user_data["email"]))
		{
			$response["success"] = "no";
			$response["message"] = "E-mail account already exists";
		}
		else
		{
			if($seller_data["country"] == "")
			{
				$response["message"] = "Please choose your Country.";
			}
			elseif($seller_data["email"] == "" || $seller_data["email"] == null)
			{
				$response["message"] = "Please enter your E-mail.";
			}
			elseif($seller_data["first_name"] == "" || $seller_data["first_name"] == null)
			{
				$response["message"] = "Please enter your First Name.";
			}
			elseif($seller_data["last_name"] == "" || $seller_data["last_name"] == null)
			{
				$response["message"] = "Please enter your Last Name.";
			}
			elseif($user_data["password"] == "" || $user_data["password"] == null)
			{
				$response["message"] = "Please enter Password.";
			}
			elseif($confirm_password == "" || $confirm_password == null)
			{
				$response["message"] = "Please confirm your Password.";
			}
			elseif($user_data["password"] != $confirm_password)
			{
				$response["message"] = "Passwords do not match.";
			}
			else
			{
				$user_data["password"] = md5($user_data["password"]);
							
				$seller_id = $this->Sellers_model->addNewSellerAccount($seller_data);
				$user_data['seller_id'] = $seller_id;
				$user_id = $this->Users_model->addNewUserAccount($user_data);
				
				$this->create_new_registration_seller($seller_id,$seller_data);
				$this->createSchemaForSeller($seller_id);
				
				$response["success"] = "yes";
				$response["message"] = "Your account was created. Please check your email inbox or spam folder for an email from us. Click on the verification link to activate your account";
			
			}
		}
		
		echo json_encode($response);
	}
	
	private function create_new_registration_seller($seller_id,$seller_data)
	{
		$hashed_key = md5($seller_id . time());
		
		$verification_link = base_url() ."signup/verify?key=" . $hashed_key . "&type=seller";
		
		$registration_data = array();
		$registration_data["verification_link"] = $verification_link ;
		$registration_data["sign_up_date"] = date("Y-m-d H:i:s"); 		
		$registration_data["email"] = $seller_data['email'];		
		$registration_data["isSeller"] = true;
		$registration_data["hashed_key"] = $hashed_key;
		
		$this->Registration_model->createnewRegistration($registration_data);
		
		$this->send_registration_mail($registration_data, $seller_data);
		
	}
	
	
	private function send_registration_mail($registration_data,$seller_data)
	{		
		$data["registration_data"] = $registration_data;
		$data["seller_data"] = $seller_data;
		$data["type"] = "seller";
		
		$email_template = $this->load->view("email_templates/registration_email.php",$data,true);
		$to = $seller_data["email"];
		$subject = 'Merchant Refunds';
		$mail = array(
			'to'=>$to,
			'subject'=>$subject,
			'message'=>$email_template
		);
		
		
		//$this->phpmailer_ci_library->phpmailer_sendmail($mail);
	}
	
	private function createSchemaForSeller($seller_id){
		$newdb = NEW_SELLER_SCHEMA . $seller_id ;
		$query = $this->db->query("CREATE SCHEMA IF NOT EXISTS ".$newdb.";");
		$schema_arr['desc']=$newdb;
		$schema_arr['sellerid']=$seller_id;
		$this->SchemaMaster_model->saveToSchemaMasterTbl($schema_arr);
		$assigneddb = $newdb;
		$currdb = $this->db->database;
		
		$infosche_tbls_q = $this->db->query("SELECT distinct(TABLE_NAME) 
		FROM INFORMATION_SCHEMA.TABLES 
		WHERE TABLE_SCHEMA = '" . $currdb . "'");
		
		$this->db->db_select($assigneddb);
		foreach($infosche_tbls_q->result_array() as $tbls){
			$this->db->query("	CREATE TABLE ".$tbls['TABLE_NAME']." LIKE ".$currdb.".".$tbls['TABLE_NAME'].";");
			if(in_array($tbls['TABLE_NAME'],unserialize(SYS_TBLS))){
				$this->db->query("INSERT INTO ".$tbls['TABLE_NAME']."  
				SELECT * FROM ".$currdb.".".$tbls['TABLE_NAME'].";");
			}
		}
		
		$infosche_keycolumnusage_q = $this->db->query("SELECT * 
		FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE 
		WHERE TABLE_SCHEMA = '". $currdb ."'
		AND REFERENCED_TABLE_NAME IS NOT NULL;");
		
		$infosche_keycolumnusage_d = $infosche_keycolumnusage_q->result('array');
		
		foreach($infosche_keycolumnusage_d as $fks){
			$this->db->query("ALTER TABLE ".$fks['TABLE_NAME']."
			ADD FOREIGN KEY (".$fks['COLUMN_NAME'].")
			REFERENCES ".$fks['REFERENCED_TABLE_NAME']."(".$fks['REFERENCED_COLUMN_NAME'].");");
		}
		//$this->db->db_select($currdb);
		
	}
	
	
	public function destruct()
	{
		
	}
}
