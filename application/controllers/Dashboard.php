<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct() { 
	
    parent::__construct(); 
		 
		$this->load->model('Dashboard_Model');
		 
    $this->load->helper('url'); 
		 
		$this->load->helper('form');

		$this->load->library('session');

		$this->load->helper('html');
		 
    $this->load->database();

    $this->load->library('upload');

    $this->load->library("pagination");
         
    } 

	public function index()
	{

		$data['result'] = $this->Dashboard_Model->select_data();
		$this->load->view('header');		
		$this->load->view('dashboard/index', $data);
		$this->load->view('footer');

	}
	
	
	

}