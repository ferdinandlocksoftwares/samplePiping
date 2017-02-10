<?php
date_default_timezone_set('UTC');
defined('BASEPATH') OR exit('No direct script access allowed');

class SchemaMaster_model extends CI_Model {
    
    private $schemamastertbl = TABLE_SCHEMA_MASTER;
    private $seller_db = null;
    private $main_db = null;
    
    public function __construct()
    {
        parent::__construct();
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
    }
    
	public function saveToSchemaMasterTbl($v){
		
		$data = array(
		   'description' => $v['desc'] ,
		   'isAvailable' => false ,
		   'isAvailed' => false ,
		   'IDSeller' => $v['sellerid']
		);

		$result = $this->main_db->insert( $this->schemamastertbl , $data); 
		return $result;
	}
  	
	public function getLastSchema()
	{
		$this->main_db->select('*');
		$this->main_db->from($this->schemamastertbl);
		$this->main_db->order_by('ID','desc');
		$this->main_db->limit(1);
		$query = $this->main_db->get();
		
		return $query;
	}
	
	
	public function getAvailableSchema()
	{
		$this->main_db->select('*');
		$this->main_db->from($this->schemamastertbl);
		$this->main_db->where('isAvailable',true);
		$this->main_db->order_by('ID','asc');
		$this->main_db->limit(1);
		$query = $this->main_db->get();
		
		return $query;
	}
	
	public function getnotAvailedUnvailableSchema()
	{
		$this->main_db->select('*');
		$this->main_db->from($this->schemamastertbl);
		$this->main_db->where('isAvailable',false);
		$this->main_db->where('isAvailed',false);
		$this->main_db->order_by('ID','asc');
		$this->main_db->limit(1);
		$query = $this->main_db->get();
		
		return $query;
	}
	
	
	public function getAvailedSchema()
	{
		$this->main_db->select('*');
		$this->main_db->from($this->schemamastertbl);
		$this->main_db->where('isAvailed',true);
		$this->main_db->where('isDeleted',false);
		$this->main_db->order_by('ID','asc');
		$query = $this->main_db->get();
		
		return $query;
	}
	
	

	public function getnotAvailedSchema()
	{
		$this->main_db->select('*');
		$this->main_db->from($this->schemamastertbl);
		$this->main_db->where('isAvailed',false);
		$this->main_db->order_by('ID','asc');
		$query = $this->main_db->get();
		
		return $query;
	}
	
	
	public function getSchemaByID($id)
	{
		$this->main_db->select('*');
		$this->main_db->from($this->schemamastertbl);
		$this->main_db->where('ID',$id);
		$query = $this->main_db->get();
		
		return $query;
	}
	
	public function updateNextSchemaByID($id)
	{
		// $this->main_db->select('*');
		// $this->main_db->from($this->schemamastertbl);
		// $this->main_db->where('isAvailable',true);
		// $this->main_db->order_by('ID','asc');
		// $this->main_db->limit(1);
		// $query = $this->main_db->get();
		
		// return $query;
		
		$this->main_db->update($this->schemamastertbl, array('isAvailable'=> true),array('ID'=>$id));
		return true;
	}
	
	public function getSchemaBySellerID($sid)
	{
		$this->main_db->select('*');
		$this->main_db->from($this->schemamastertbl);
		$this->main_db->where('IDSeller',$sid);
		$this->main_db->order_by('IDSeller','desc');
		$this->main_db->limit(1);
		$query = $this->main_db->get();
		
		return $query;
	}
	
	public function assignSchemaToSeller($sellerid,$sch_id)
	{
		
		$this->main_db->update($this->schemamastertbl, array('isAvailable'=> false,'isAvailed'=> true,'IDSeller'=>$sellerid),array('ID'=>$sch_id)); 
       
        return true;
	}
	
	//Jun Rhy - 2016-06-09 - update schema master isDeleted
    public function updateIsDeleted($seller_id) {
        $data = array(
            'isDeleted' => 1,
		);
        
        $this->main_db->where('IDSeller', $seller_id);
        $this->main_db->update($this->schemamastertbl, $data);
    }
		
	public function __destruct(){
		
	}
    
    
}