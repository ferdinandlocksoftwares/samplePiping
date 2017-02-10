<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//my comment sample
date_default_timezone_set('UTC');

class Main extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct(); 
		$this->load->library('session');
		$this->load->helper('url');

    }

	public function index()
	{
		$header_data['title'] = 'Register';
		//custom css
		$add_stylesheets = array(
		);
		//custom js
		$add_scripts = array(
			
		);
		//includes js or php files
		$add_includes = array(
		);
		$header_data['add_stylesheets'] = $add_stylesheets;
		$header_data['add_scripts'] = $add_scripts;
		$header_data['add_includes'] = $add_includes;
		
		if($this->session->userdata('seller_id') == null){
			$this->load->view('template/header',$header_data);
			$this->load->view('template/main_navigation');
			$this->load->view('main');
			$this->load->view('template/footer');
		}else{
			$this->load->view('template/header',$header_data);
			$this->load->view('template/seller_navigation');
			$this->load->view('home');
			$this->load->view('template/footer');
		}
	}
	
	public function destruct()
	{
		
	}
}
