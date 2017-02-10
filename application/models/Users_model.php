<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('UTC');

class Users_model extends CI_Model {    

	private $tblusers = TABLE_USERS;
	
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
	
   
	public function getUserByEmailAndPassword($User_email,$password,$active=1)
	{		
		$query = $this->main_db->get_where($this->tblusers,array("email" => $User_email, "password" => $password, "active" => $active));
		
		return $query->result_array();
		
	}
	
	public function getUserByEMail($User_email)
	{		
		$query = $this->main_db->get_where($this->tblusers,array("email" => $User_email));
		
		return $query->result_array();
		
	}
	
	public function getUserByUserID($User_id)
	{		
		$query = $this->main_db->get_where($this->tblusers,array("id" => $User_id));
		
		return $query->result_array();
		
	}
	
	public function UserExists($User_email)
	{
		$User_exists = false;
		
		$User_info = $this->getUserByEmail($User_email);
		
		if( count($User_info) > 0 )
			$User_exists = true;
		
		return $User_exists;	
	}
	
	public function addNewUserAccount($User_data = array() )
	{		
		$this->main_db->insert($this->tblusers,$User_data);
		
		$record_id = $this->main_db->insert_id();
		
		return $record_id;
	}
	
	public function getUserId($record_id)
	{		
		$query = $this->main_db->get_where($this->tblusers,array("id" => $record_id));
		
		return $query->row()->id;
		
	}
	
	public function deactivateUser($User_id)
	{
		$data = array();
		
		$data["active"] = false;
		
		$this->main_db->where("User_id",$User_id);
		$this->main_db->update($this->tblusers,$data);
	}
	
	public function activateAccount($User_id)
	{
		$data = array();
		
		$data["active"] = true;
		
		$this->main_db->where("id",$User_id);
		$this->main_db->update($this->tblusers,$data);
	}
	
	public function verifyAccount($User_id)
	{
		$data = array();
		
		$data["isverified"] = true;
		
		$this->main_db->where("id",$User_id);
		$this->main_db->update($this->tblusers,$data);
	}
	
	
	public function resetPassword($User_id,$new_password)
	{
		$data = array();
		
		$data["password"] = $new_password;
		
		$this->main_db->where("id",$User_id);
		$this->main_db->update($this->tblusers,$data);
	}
	
	public function deleteUserAccount($User_id)
	{
		$this->main_db->where("id",$User_id);
		$this->main_db->delete($this->tblusers);
	}
	
	public function Softdelete_account($id)
	{
		$data = array();
		
		$data["active"] = false;
		$data['isDeleted'] = 1;
		
		$this->main_db->where("id",$id);
		$this->main_db->update($this->tblusers,$data);
	}
   
	public function update_account($data,$id)
	{
		
		$this->main_db->where("id",$id);
		$this->main_db->update($this->tblusers,$data);
	}
   
	
   	public function __destruct()
	{
		
	}
	
}