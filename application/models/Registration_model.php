<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('UTC');

class Registration_model extends CI_Model {    

	private $objDB = null;
	private $country = null;
	private $registration = TABLE_REGISTRATION;
	
	private $seller_db = null;
	private $main_db = null;
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
        $this->load->model("SchemaMaster");
		$this->setSchemaToUse();
	}
	
	public function setSchemaToUse($seller_id = "")
    {        
		
        $use_config = array();
        
        $use_config = $this->SchemaMaster->getDatabaseConfig($seller_id); 
		
		if(($seller_id==null)||($seller_id=='')){
			$this->main_db = $this->load->database($use_config,TRUE);
		}else{
			$this->seller_db = $this->load->database($use_config,TRUE);
		} 
		$this->sid=$seller_id;
    }
	
	public function createNewRegistration($registration_data = array() )
	{
		$this->main_db->insert($this->registration,$registration_data);
	}
	
	
	public function getRegistrationInfo($hashed_key)
	{
		$registration_info = array();
		
		$query = $this->main_db->get_where($this->registration,array("hashed_key" => $hashed_key));
		
		$registration_info = $query->result_array();
		
		return $registration_info ;
		
	}
	
	public function removeRegistrationByUserID($user_id)
	{
		
		$this->main_db->where("user_id",$user_id);
		$this->main_db->delete($this->registration);
	}
	
	public function removeRegistration($hashed_key)
	{
		$this->main_db->where("hashed_key",$hashed_key);
		$this->main_db->delete($this->registration);
	}
	
   	public function __destruct()
	{
		
	}
	
}