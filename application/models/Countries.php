<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('UTC');

class Countries extends CI_Model {    

	private $objDB = null;
	private $country = null;
	private $countries = TABLE_COUNTRY;
	
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
	
   	public function getAllCountries($all_countries = false)
	{
		if($all_countries)
			$query = $this->main_db->get($this->countries);
		else
			$query = $this->main_db->get_where($this->countries,array("active" => 1));
		
		return $query->result_array();
	}
	
	public function getAllInactiveCountries()
	{
		
		$query = $this->main_db->get_where($this->countries,array("active" => 0));
		
		return $query->result_array();
	}
	public function all($limit = 5){
	    $offset =   $this->uri->segment(3);
        return $this->main_db->limit($limit, $offset)->get($this->countries);
    }

    public function count(){
        return $this->main_db->count_all_results($this->countries);
    }
   	public function __destruct()
	{
		
	}
	
}