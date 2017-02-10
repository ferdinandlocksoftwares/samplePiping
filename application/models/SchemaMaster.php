<?php
date_default_timezone_set('UTC');
defined('BASEPATH') OR exit('No direct script access allowed');

class SchemaMaster extends CI_Model {
    
    private $schema_master_table = TABLE_SCHEMA_MASTER;
    private $country_tbl = TABLE_COUNTRY;
    private $seller_db = null;
    private $main_db = null;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("SchemaMaster");
		$this->setSchemaToUse();
    }
    
    public function setSchemaToUse($seller_id = "")
    {        
        $use_config = array();
		
        $use_config = $this->getDatabaseConfig($seller_id); 
		
		if(($seller_id==null)||($seller_id=='')){
			$this->main_db = $this->load->database($use_config,TRUE);
		}else{
			$this->seller_db = $this->load->database($use_config,TRUE);
		} 
    }
    
    public function getDatabaseConfig($seller_id = "")
    {
        $db_config = array(
                                'dsn'   => '',
                                'hostname' => ($seller_id != "") ? SELLER_DB_HOST : DEFAULT_DB_HOST,
                                'username' => ($seller_id != "") ? SELLER_DB_USER : DEFAULT_DB_USER,
                                'password' => ($seller_id != "") ? SELLER_DB_PASSWORD : DEFAULT_DB_PASSWORD,
                                'database' => '',
                                'dbdriver' => 'mysqli',
                                'dbprefix' => '',
                                'pconnect' => FALSE,
                                'db_debug' => (ENVIRONMENT !== 'production'),
                                'cache_on' => FALSE,
                                'cachedir' => '',
                                'char_set' => 'utf8',
                                'dbcollat' => 'utf8_general_ci',
                                'swap_pre' => '',
                                'encrypt' => FALSE,
                                'compress' => FALSE,
                                'stricton' => FALSE,
                                'failover' => array(),
                                'save_queries' => TRUE
                               );
        
        $use_schema = ($seller_id != "") ? $this->getSellerSchema($seller_id) : DEFAULT_DB_NAME;
        
        $db_config["database"] = $use_schema;
        
        return $db_config;
    }

    public function getSellerSchema($seller_id)
    {
		
		$this->setSchemaToUse();
		// echo $this->seller_db->database;
        $seller_schema = "";
        
        $db_config_temp = array();
            
        $this->main_db->select("*");
            
        $query = $this->main_db->get_where($this->schema_master_table, array('IDSeller' => $seller_id));            
      
        if ($query->num_rows() > 0)
        {
            $db_config_temp = $query->result_array();
            $seller_schema = $db_config_temp[0]["description"];
        }
            
        return $seller_schema;
    }
    
    
}
    