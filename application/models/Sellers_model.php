<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('UTC');

class Sellers_model extends CI_Model {    

	private $objDB = null;
	private $country = null;
	private $tblsellers = TABLE_SELLERS;
	
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
	
	public function getSellerByEMail($seller_email)
	{		
		$query = $this->main_db->get_where($this->tblsellers,array("email" => $seller_email));
		
		return $query->result_array();
		
	}
	
	public function sellerExists($seller_email)
	{
		$seller_exists = false;
		
		$seller_info = $this->getSellerByEmail($seller_email);
		
		if( count($seller_info) > 0 )
			$seller_exists = true;
		
		return $seller_exists;	
	}
	
	public function addNewSellerAccount($seller_data = array() )
	{		
		$this->main_db->insert($this->tblsellers,$seller_data);
		
		$record_id = $this->main_db->insert_id();
		
		return $record_id;
	}
	
	public function getSellerBySellerID($seller_id)
	{
		
		$query = $this->main_db->get_where($this->tblsellers,array("id" => $seller_id));
		
		return $query->result_array();
		
	}
	
	public function deactivateSeller($seller_id)
	{
		$data = array();
		
		$data["active"] = false;
		
		$this->main_db->where("id",$seller_id);
		$this->main_db->update($this->tblsellers,$data);
	}
	
	public function activateAccount($seller_id)
	{
		$data = array();
		
		$data["active"] = true;
		
		$this->main_db->where("id",$seller_id);
		$this->main_db->update($this->tblsellers,$data);
	}
	
	public function verifyAccount($seller_id)
	{
		$data = array();
		
		$data["isverified"] = true;
		
		$this->main_db->where("id",$seller_id);
		$this->main_db->update($this->tblsellers,$data);
	}
	
	public function resetPassword($seller_id,$new_password)
	{
		$data = array();
		
		$data["password"] = $new_password;
		
		$this->main_db->where("id",$seller_id);
		$this->main_db->update($this->tblsellers,$data);
	}
	
	public function deleteSellerAccount($seller_id)
	{
		$this->main_db->where("id",$seller_id);
		$this->main_db->delete($this->tblsellers);
	}
   
	public function Softdelete_account($id)
	{
		$data = array();
		
		$data["active"] = false;
		$data['isDeleted'] = 1;
		
		$this->main_db->where("id",$id);
		$this->main_db->update($this->tblsellers,$data);
	}
   
	public function update_account($data,$id)
	{
		
		$this->main_db->where("id",$id);
		$this->main_db->update($this->tblsellers,$data);
	}
   
   
   	public function __destruct()
	{
		
	}
	
}