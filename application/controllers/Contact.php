<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	
	function __construct() { 
	
  parent::__construct(); 
		 
		 $this->load->model('Contact_Model');
		 
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
				
		$this->load->view('header');
		
		$this->load->view('contact/contact_add_form');
		
		$this->load->view('footer');
	}
	
	public function contact_add_form(){
		
		$this->load->view('header');
		
		$this->load->view('contact/contact_add_form');
		
		$this->load->view('footer');
	}
	
	public function save_contact(){

	  $config['upload_path']   = './upload/'; //Folder สำหรับ เก็บ ไฟล์ที่  Upload
    $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|xls|xlsx|jpeg|JPG'; //รูปแบบไฟล์ที่ อนุญาตให้ Upload ได้
    $config['max_size']      = 0; //ขนาดไฟล์สูงสุดที่ Upload ได้ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
    $config['max_width']     = 0; //ขนาดความกว้างสูงสุด (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
    $config['max_height']    = 0;  //ขนาดความสูงสูงสดุ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
    $config['encrypt_name']  = true; //กำหนดเป็น true ให้ระบบ เปลียนชื่อ ไฟล์  อัตโนมัติ  ป้องกันกรณีชื่อไฟล์ซ้ำกัน
	    
    $this->upload->initialize($config);    // เรียกใช้การตั้งค่า
    
    $this->upload->do_upload('fileupload1'); // ทำการอัพโหลดไฟล์จาก input file ชื่อ service_image
    $file_upload1="";  // กำหนดชื่อไฟล์เป็นค่าว่าง 
		if(!$this->upload->display_errors()){ // ถ้าไม่มี error อัพไฟล์ได้ ให้เอาใช้ไฟล์ใส่ตัวแปร ไว้บันทึกลงฐานข้อมูล
		  $file_upload1=$this->upload->data('file_name');
        //Image Resizing 
        $config1['image_library'] =  'gd2';
        $config1['source_image'] = './upload/'.$file_upload1;
        $config1['new_image'] =  'upload/';
        $config1['maintain_ratio'] = TRUE;
        $config1['width'] = 600;
        $config1['height'] = 900; 
        $config1['quality'] = 70;
        $this->load->library('image_lib', $config1);
        $this->image_lib->initialize($config1);
        $this->image_lib->resize();

		}
    else{
      $errors = $this->upload->display_errors();
      $this->session->set_flashdata('error_msg2', 'มีข้อผิดพลาดเกิดขึ้น');
      redirect('contact/index');
    }

		
		  $data = array( 
        'prefix' => $this->input->post('prefix'),
        'fname' => $this->input->post('fname'),
        'lname' => $this->input->post('lname'),
			  'tel' => $this->input->post('tel'),
        'idcard' => $this->input->post('idcard'),
        'address' => $this->input->post('address'),
			  'type' => $this->input->post('type'),
        'detail' => $this->input->post('detail'),
        'fileupload1' => $file_upload1,
        'status' => $this->input->post('status')
        ); 
			
			$this->Contact_Model->insert($data);
			$this->load->view('contact/test');
			$this->session->set_flashdata('msg', 'ส่งข้อมูลเรียบร้อยแล้ว');
					
	}

	public function test()
	{
				
		$this->load->view('header');
		
		$this->load->view('contact/test');
		
		$this->load->view('footer');
	}
	

}