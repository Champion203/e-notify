<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct() { 
	
         parent::__construct(); 
		 
		 $this->load->model('Admin_Model');
		 
         $this->load->helper('url'); 
		 
		 $this->load->library('session');

		 $this->load->helper('form');

		 $this->load->helper('html');
		 
         $this->load->database();

         $this->load->library("pagination");

         $this->load->library('upload');

         //$this->load->library('pdf');
         
    } 

	public function index()
	{	
    $this->load->view('admin/admin_header.php');
		$this->load->view('admin/admin_login.php');
    $this->load->view('admin/admin_footer.php');
	}

	public function login_form()
	{
		$this->load->view('admin/admin_login.php');
	}

	function home(){
  	$user_login=array(

  	'user_A'=>$this->input->post('user_A'),
  	'pass_A'=>$this->input->post('pass_A'),

    );

    $data=$this->Admin_Model->login_user($user_login['user_A'],$user_login['pass_A']);
      	if($data)
      	{
        	$this->session->set_userdata('id_A',$data['id_A']);
        	$this->session->set_userdata('user_A',$data['user_A']);
        	$this->session->set_userdata('pass_A',$data['pass_A']);
        	$this->session->set_userdata('name',$data['name']);

        	redirect('admin/homepage', 'refresh');

      	}
      	else{
        	$this->session->set_flashdata('error_msg', 'Login Failed , Try again.');
        	redirect('admin', 'refresh');

      	}


	}

	function homepage(){

    $data['result'] = $this->Admin_Model->select_data();
		$this->load->view('admin/admin_header.php');
		$this->load->view('admin/admin_dashboard.php', $data);
    $this->load->view('admin/admin_footer.php');

	}
  function homepage_I(){

    $data['result'] = $this->Admin_Model->select_data_I();
		$this->load->view('admin/admin_header.php');
		$this->load->view('admin/admin_dashboard_I.php', $data);
    $this->load->view('admin/admin_footer.php');

	}
  function homepage_O(){

    $data['result'] = $this->Admin_Model->select_data_O();
		$this->load->view('admin/admin_header.php');
		$this->load->view('admin/admin_dashboard_O.php', $data);
    $this->load->view('admin/admin_footer.php');

	}
  function homepage_E(){

    $data['result'] = $this->Admin_Model->select_data_E();
		$this->load->view('admin/admin_header.php');
		$this->load->view('admin/admin_dashboard_E.php', $data);
    $this->load->view('admin/admin_footer.php');

	}
  

  public function edit_data(){
        
    $id = $this->uri->segment('3');     
    $data['result'] = $this->Admin_Model->selectdata($id);    
    $this->load->view('admin/admin_header.php');    
    $this->load->view('admin/admin_edit',$data);    
    $this->load->view('admin/admin_footer.php');
   
}

  public function admin_save_edit(){

    $config['upload_path']   = './upload/'; //Folder สำหรับ เก็บ ไฟล์ที่  Upload
    $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|xls|xlsx|jpeg|JPG'; //รูปแบบไฟล์ที่ อนุญาตให้ Upload ได้
    $config['max_size']      = 0; //ขนาดไฟล์สูงสุดที่ Upload ได้ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
    $config['max_width']     = 0; //ขนาดความกว้างสูงสุด (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
    $config['max_height']    = 0;  //ขนาดความสูงสูงสดุ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
    $config['encrypt_name']  = true; //กำหนดเป็น true ให้ระบบ เปลียนชื่อ ไฟล์  อัตโนมัติ  ป้องกันกรณีชื่อไฟล์ซ้ำกัน
	    
    $this->upload->initialize($config);    // เรียกใช้การตั้งค่า
    
    $this->upload->do_upload('staffpic'); // ทำการอัพโหลดไฟล์จาก input file ชื่อ service_image
    $staffpic="";  // กำหนดชื่อไฟล์เป็นค่าว่าง 
		if(!$this->upload->display_errors()){ // ถ้าไม่มี error อัพไฟล์ได้ ให้เอาใช้ไฟล์ใส่ตัวแปร ไว้บันทึกลงฐานข้อมูล
		  $staffpic=$this->upload->data('file_name');
        //Image Resizing 
        $config1['image_library'] =  'gd2';
        $config1['source_image'] = './upload/'.$staffpic;
        $config1['new_image'] =  'upload/';
        $config1['maintain_ratio'] = TRUE;
        $config1['width'] = 600;
        $config1['height'] = 900; 
        $config1['quality'] = 70;
        $this->load->library('image_lib', $config1);
        $this->image_lib->initialize($config1);
        $this->image_lib->resize();

		}else{
      $errors = $this->upload->display_errors();
      $this->session->set_flashdata('error_msg2', 'มีข้อผิดพลาดเกิดขึ้น');
      redirect('admin/homepage');
    }

    $data = array( 
       'staffdetail' => $this->input->post('staffdetail'), 
       'staffpic' => $staffpic,
       'status' => $this->input->post('status'),
       'recipient' => $this->input->post('recipient')
    ); 
    
    $id = $this->input->post('id');     
    $result = $this->db->get_where('e-notify', array('id' => $id));

    $rows = $result->result();
        foreach ($rows as $row) {
          unlink("upload/".$row->staffpic);
        }

    $this->Admin_Model->dataupdate($data,$id); 
    $this->session->set_flashdata('success_msg', 'แก้ไขข้อมูลสำเร็จ');
    redirect('admin/homepage');

}


public function delete_data($id){

  $result = $this->db->get_where('e-notify', array('id' => $id));

  $rows = $result->result();
  foreach ($rows as $row) {
    unlink("upload/".$row->fileupload1);
    unlink("upload/".$row->staffpic);
  }
  
   //$id = $this->uri->segment('3'); 
   
  $this->Admin_Model->delete($id); 
  $this->session->set_flashdata('success_msg2', 'ลบข้อมูลสำเร็จ');
  redirect('admin/homepage');
}

public function user_logout(){

  $this->session->sess_destroy();
  redirect('admin', 'refresh');
}











  














	



	public function footsall_team_view()
	
	{
        $data['result'] = $this->user_model->getData();

        $this->load->view('admin/header');
        $this->load->view("admin/footsall_team_view", $data);
        $this->load->view('admin/footer');
	}

	public function view_team_member()
	
	{

	$team_id = $this->uri->segment('3');     
    $data['result'] = $this->user_model->getData1($team_id);
    $data['result1'] = $this->user_model->getData2($team_id);

    $this->load->view('admin/header');
    $this->load->view("admin/view_team_member", $data);
    $this->load->view('admin/footer');

	}

    public function view_file_member(){
        
        $id = $this->uri->segment('3'); 
         
        $data['result'] = $this->user_model->selectTwo($id);
         
        $this->load->view('admin/header');
        $this->load->view("admin/view_file_member", $data);
        $this->load->view('admin/footer');
        
    }

    public function pdf_detail_report(){


        $team_id = $this->uri->segment('3');     
        $data['result'] = $this->user_model->getData1($team_id);
        $data['result1'] = $this->user_model->getData2($team_id);       

        //$this->load->view('admin/pdfdetail');

        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 16,
        ]);


        $data1 = array( 
            'team_name' => $this->input->post('team_name'),
            'challenge' => $this->input->post('challenge') 
        );
        
    
        $html = $this->load->view('admin/pdfdetail',$data,true);
        
        
        $mpdf->SetDocTemplate('file/list.pdf',true);
        
        
        $mpdf->WriteHTML($html);
        return $mpdf->Output();
        

    }

    public function pdf_detail_report1(){


        $team_id = $this->uri->segment('3');
        $data['result1'] = $this->user_model->getData2($team_id);       

        //$this->load->view('admin/pdfdetail');

        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 16,
        ]);


        $data1 = array( 
            'team_name' => $this->input->post('team_name'),
            'challenge' => $this->input->post('challenge') 
        );
        
        //$stylesheet = file_get_contents('file/pdf.css',true);

        $html = $this->load->view('admin/pdfdetail1',$data,true);
        
        
        $mpdf->SetDocTemplate('file/list2.pdf',true);
        
        //$mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html);
        return $mpdf->Output();
        

    }


    public function pdf_detail_report2(){


        $team_id = $this->uri->segment('3');     
        $data['result'] = $this->user_model->getData1($team_id);
        $data['result1'] = $this->user_model->getData2($team_id);       

        //$this->load->view('admin/pdfdetail');

        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 16,
        ]);


        $data1 = array( 
            'team_name' => $this->input->post('team_name'),
            'challenge' => $this->input->post('challenge') 
        );
        
    
        $html = $this->load->view('admin/pdfdetail2',$data,true);
        
        
        //$mpdf->SetDocTemplate('file/list.pdf',true);
        
        
        $mpdf->WriteHTML($html);
        return $mpdf->Output();
        

    }

   

    public function delete_data_member($id){

        $result = $this->db->get_where('footsall_member', array('id' => $id));

        $rows = $result->result();
        foreach ($rows as $row) {
          unlink("upload/".$row->fileupload1);
          unlink("upload/".$row->fileupload4);
          unlink("upload/".$row->fileupload3);
        }
        
         //$id = $this->uri->segment('3'); 
         
        $this->user_model->delete_member($id); 
        $this->session->set_flashdata('success_msg2', 'ลบข้อมูลสำเร็จ');
        //$this->load->view('admin/header');
        //$this->load->view("admin/view_team_member", $team_id);
        //$this->load->view('admin/footer');
        redirect('admin/footsall_team_view');
    }

    

    public function timestamp_member(){
        
         
         $this->load->view('admin/header');
         
         $this->load->view('admin/timestamp_member');
         
         $this->load->view('admin/footer');
        
    }

    public function save_timestamp_member(){

         $data = array( 
            'idcard' => $this->input->post('idcard'), 
            'team_id' => $this->input->post('team_id'),
            //'challenge' => $this->input->post('challenge')
         ); 
         
         $team_id = $this->input->post('team_id');         
         $this->user_model->timestamp_member($data,$team_id); 
         $this->session->set_flashdata('success_msg', 'สำเร็จ');
         redirect('admin/timestamp_member');

    }

    public function search1(){

      $data = array( 
            'idcard' => $this->input->post('idcard')
        );
      
      $idcard = $this->input->post('idcard');
      //$data14 = $this->input->post('data14');
      //$datein = $this->input->post('datein');
      $data['result'] = $this->user_model->get_timestamp_member($idcard);

      $this->load->view('admin/header');
      $this->load->view('admin/testview', $data);
      $this->load->view('admin/footer');


    }

    public function view_programBAK(){
        
         
         $this->load->view('admin/header');
         
         $this->load->view('admin/view_program');
         
         $this->load->view('admin/footer');
        
    }

    public function view_program_searchBAK(){

      $data = array( 
            'rundate' => $this->input->post('rundate')
        );
      
      $rundate = $this->input->post('rundate');
      //$data14 = $this->input->post('data14');
      //$datein = $this->input->post('datein');
      $data['result'] = $this->user_model->get_program_search($rundate);

      $this->load->view('admin/header');
      $this->load->view('admin/program_pic', $data);
      $this->load->view('admin/footer');


    }

    public function programBAK(){
        
        $data['result'] = $this->user_model->getData_program();

        $this->load->view('admin/header');
         
        $this->load->view('admin/program', $data);
         
        $this->load->view('admin/footer');
        
    }

    public function view_program()
  
    {
        $data['result'] = $this->user_model->getData_program();

        $this->load->view('admin/header');
        $this->load->view("admin/view_program", $data);
        $this->load->view('admin/footer');

    }

  public function edit_score(){
        
    $id = $this->uri->segment('3'); 
         
    $data['result'] = $this->user_model->get_score($id);
         
    $this->load->view('admin/header');
         
    $this->load->view('admin/edit_score_form',$data);
         
    $this->load->view('admin/footer');
        
  }

  public function confirm_score(){

    $data = array( 
      'score' => $this->input->post('score'),
      'Competition' => $this->input->post('Competition')
    ); 
         
    $id = $this->input->post('id');    
    $this->user_model->scoreupdate($data,$id);
    //redirect('admin/confirm_score');

    $data1 = array( 
      'team_name' => $this->input->post('team_name'),
      'score' => $this->input->post('score'),
      'Competition' => $this->input->post('Competition'),
      'PTS' => $this->input->post('PTS'),
      'W' => $this->input->post('W'),
      'L' => $this->input->post('L'),
      'D' => $this->input->post('D'),
      'id' => $this->input->post('id')
    ); 
    $this->load->view('admin/header');         
    $this->load->view('admin/confirm_score_form',$data1);         
    $this->load->view('admin/footer');

  }

  public function save_confirm_score(){

    $data = array( 
      'score' => $this->input->post('score'),
      'PTS' => $this->input->post('PTS'),
      'R' => $this->input->post('R'),
      'W' => $this->input->post('W'),
      'L' => $this->input->post('L'),
      'D' => $this->input->post('D')
    ); 
         
    $id = $this->input->post('id');         
    $this->user_model->scoreupdate($data,$id); 
    $this->session->set_flashdata('success_msg', 'บันทึกผลการแข่งขันเรียบร้อยแล้ว');
    redirect('admin/view_program');

  }

  public function view_rank()
  
  {

    $data['result'] = $this->user_model->getData_rank();
    $this->load->view('admin/header');
    $this->load->view("admin/view_rank", $data);
    $this->load->view('admin/footer');

  }

  public function check_man_stamp(){
        
    $team_id = $this->uri->segment('3'); 
         
    $data['result'] = $this->user_model->get_man_stamp($team_id);
         
    $this->load->view('admin/header');
         
    $this->load->view('admin/check_man_stamp',$data);
         
    $this->load->view('admin/footer');
        
  }

  public function edit_data_member(){
        
    $id = $this->uri->segment('3'); 
         
    $data['result'] = $this->user_model->selectTwo($id);
         
    $this->load->view('admin/header');
         
    $this->load->view('admin/edit_data_member',$data);
         
    $this->load->view('admin/footer');
        
  }

  public function save_edit_data_member(){

         $data = array( 
            'name' => $this->input->post('name'), 
            'datebirth' => $this->input->post('datebirth'),
            'monthbirth' => $this->input->post('monthbirth'),
            'yearbirth' => $this->input->post('yearbirth'),
            'addno1' => $this->input->post('addno1'),
            'moo1' => $this->input->post('moo1'),
            'road1' => $this->input->post('road1'),
            'district1' => $this->input->post('district1'),
            'canton1' => $this->input->post('canton1'),
            'province1' => $this->input->post('province1'),
            'idcard' => $this->input->post('idcard'),
            'memberlineid' => $this->input->post('memberlineid'),
            'memberemail' => $this->input->post('memberemail'),
            'membertel' => $this->input->post('membertel'),
            'membernumber' => $this->input->post('membernumber')
         ); 
         
         $id = $this->input->post('id');         
         $this->user_model->memberupdate($data,$id); 
        $this->session->set_flashdata('success_msg', 'แก้ไขข้อมูลสำเร็จ');
         redirect('admin/footsall_team_view');

    }

    public function team_program()
    
    {

    $team_id = $this->uri->segment('3');     
    //$data['result'] = $this->user_model->getData1($team_id);
    $data['result1'] = $this->user_model->getData2($team_id);

    $this->load->view('admin/header');
    $this->load->view("admin/view_team_program", $data);
    $this->load->view('admin/footer');

    }

    public function save_team_program(){

         $data = array( 
            'rundate' => $this->input->post('rundate'),
            'challenge' => $this->input->post('challenge'),            
            'lineup' => $this->input->post('lineup'),
            'team_logo' => $this->input->post('team_logo'),
            'team_id' => $this->input->post('team_id'),
            'team_name' => $this->input->post('team_name')
            
         );         
         $this->user_model->insert_program($data); 
        $this->session->set_flashdata('success_program', 'บันทึกตารางการแข่งขันเรียบร้อยแล้ว');
         redirect('admin/footsall_team_view');

    }

  

















    public function pdf_detail_report99(){


        $team_id = $this->uri->segment('3');     
        $data['result'] = $this->user_model->getData1($team_id);
        $data['result1'] = $this->user_model->getData2($team_id);       

        //$this->load->view('admin/pdfdetail');

        $data1 = array( 
            'team_name' => $this->input->post('team_name'),
            'challenge' => $this->input->post('challenge') 
        );

        // เริ่มสร้างไฟล์ pdf
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของไฟล์ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('ninenik');
        $pdf->SetTitle('รายชื่อนักกีฬาเข้าร่วมการแข่งขันกีฬาฟุตซอล รังสิตคัพ ครั้งที่ 15 ประจำปีงบประมาณ 2562');
        $pdf->SetSubject('รายชื่อนักกีฬาเข้าร่วมการแข่งขันกีฬาฟุตซอล รังสิตคัพ ครั้งที่ 15 ประจำปีงบประมาณ 2562');
        $pdf->SetKeywords('TCPDF, PDF, ทดสอบ,ninenik, guide');
         
        // กำหนดข้อความส่วนแสดง header
        //$pdf->SetHeaderData(
        //    PDF_HEADER_LOGO, // โลโก้ กำหนดค่าในไฟล์  tcpdf_config.php 
        //    PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' เทศบาลนครรังสิต',
        //    PDF_HEADER_STRING, // กำหนดเพิ่มเติมในไฟล์  tcpdf_config.php 
        //    array(0,0,0),  // กำหนดสีของข้อความใน header rgb 
        //    array(0,0,0)   // กำหนดสีของเส้นคั่นใน header rgb 
        //);
         
        //$pdf->setFooterData(
        //    array(0,64,0),  // กำหนดสีของข้อความใน footer rgb 
        //    array(220,44,44)   // กำหนดสีของเส้นคั่นใน footer rgb 
        //);
         
        $pdf->SetPrintHeader(false);

        // กำหนดฟอนท์ของ header และ footer  กำหนดเพิ่มเติมในไฟล์  tcpdf_config.php 
        //$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        //$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // ำหนดฟอนท์ของ monospaced  กำหนดเพิ่มเติมในไฟล์  tcpdf_config.php 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนดขอบเขตความห่างจากขอบ  กำหนดเพิ่มเติมในไฟล์  tcpdf_config.php 
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        //$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        //$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดแบ่่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดสัดส่วนของรูปภาพ  กำหนดเพิ่มเติมในไฟล์  tcpdf_config.php 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // อนุญาตให้สามารถกำหนดรุปแบบ ฟอนท์ย่อยเพิมเติมในหน้าใช้งานได้
        $pdf->setFontSubsetting(true);
         
        // กำหนด ฟอนท์
        $pdf->SetFont('thsarabunity', '', 16, '', true);
         
        // เพิ่มหน้า 
        $pdf->AddPage();
         
        //ob_clean();
        // create some HTML content

        $html = $this->load->view('admin/pdfdetail',$data,true);

        // สร้าง pdf ด้วยคำสั่ง writeHTMLCell()
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->lastPage();
         
        // แสดงไฟล์ pdf
        $pdf->Output('report.pdf', 'I');

    }

	



}
	

