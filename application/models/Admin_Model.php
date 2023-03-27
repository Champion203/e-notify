<?php
class Admin_Model extends CI_model{

public function login_user($user,$pass){

  $this->db->select('*');
  $this->db->from('admin');
  $this->db->where('user_A',$user);
  $this->db->where('pass_A',$pass);

  if($query=$this->db->get())
  {
      return $query->row_array();
  }
  else{
    return false;
  }


}



public function select_data(){

  $this->db->select('*');
  $this->db->from('e-notify');
  $query = $this->db->get();
  
  $data = $query->result(); 
 
  return $data;
}
public function select_data_I(){

  $this->db->select('*');
  $this->db->from('e-notify');
  $this->db->where("status", "I");
  $query = $this->db->get();
  
  $data = $query->result(); 
 
  return $data;
}
public function select_data_O(){

  $this->db->select('*');
  $this->db->from('e-notify');
  $this->db->where("status", "O");
  $query = $this->db->get();
  
  $data = $query->result(); 
 
  return $data;
}
public function select_data_E(){

  $this->db->select('*');
  $this->db->from('e-notify');
  $this->db->where("status", "E");
  $query = $this->db->get();
  
  $data = $query->result(); 
 
  return $data;
}

public function get_status_I() {
    $this->db->select('*');
    $this->db->from('e-notify');
    $this->db->where("status", "I");
    $query = $this->db->get();
    $rowCount = $query->num_rows();
    return $rowCount; 

}

public function get_status_O() {
    $this->db->select('*');
    $this->db->from('e-notify');
    $this->db->where("status", "O");
    $query = $this->db->get();
    $rowCount = $query->num_rows();
    return $rowCount; 

}

public function get_status_E() {
    $this->db->select('*');
    $this->db->from('e-notify');
    $this->db->where("status", "E");
    $query = $this->db->get();
    $rowCount = $query->num_rows();
    return $rowCount; 

}

public function get_status_All() {
    $this->db->select('*');
    $this->db->from('e-notify');
    $query = $this->db->get();
    $rowCount = $query->num_rows();
    return $rowCount; 

}

public function selectdata($id){
      
  $query = $this->db->get_where("e-notify",array("id"=>$id)); 
  $data = $query->result();  
  return $data;

}

public function dataupdate($data,$id) { 

  $this->db->set($data); 
  $this->db->where("id", $id); 
  $this->db->update("e-notify", $data); 
}

public function delete($id) { 
  if ($this->db->delete("e-notify", "id = ".$id)) { 
    return true; 
  } 
}
















public function selectOne($id){
      
      $query = $this->db->get_where("footsall",array("id"=>$id));
     
      $data = $query->result(); 
     
      return $data;
  }

public function selectTwo($id){
      
      $query = $this->db->get_where("footsall_member",array("id"=>$id));
     
      $data = $query->result(); 
     
      return $data;
  }



  // Fetch records
  public function getData() {

    $this->db->select('*');
    $this->db->from('footsall');
    $this->db->order_by("challenge", "asc");
    $query = $this->db->get();
      
    $data = $query->result(); 
     
    return $data;
  }

  // Select total records
  public function getrecordCount($search = '') {

    $this->db->select('count(*) as allcount');
    $this->db->from('footsall');
 
    if($search != ''){
      $this->db->like('challenge', $search);
    }

    $query = $this->db->get();
    $result = $query->result_array();
 
    return $result[0]['allcount'];
  }

  // Fetch records
  public function getData1($team_id) {

    $query = $this->db->get_where("footsall_member",array("team_id"=>$team_id));
    $data = $query->result(); 
     
    return $data; 
  }

  // Fetch records
  public function getData2($team_id) {

    $query = $this->db->get_where("footsall",array("team_id"=>$team_id));
    $data = $query->result(); 
     
    return $data; 
  }

  public function getdplist1() {
  $query = $this->db->query('SELECT * FROM footsall');
  $rowCount = $query->num_rows();
  return $rowCount; 

  }

 

  public function delete_member($id) { 
    if ($this->db->delete("footsall_member", "id = ".$id)) { 
      return true; 
    } 
  }

  

  public function memberupdate($data,$id) { 

         $this->db->set($data); 
         $this->db->where("id", $id); 
         $this->db->update("footsall_member", $data); 
      }

  public function getdplist2() {
  $query = $this->db->query('SELECT * FROM footsall WHERE challenge = "1" ');
  $rowCount = $query->num_rows();
  return $rowCount; 

}

  public function getdplist3() {
  $query = $this->db->query('SELECT * FROM footsall WHERE challenge = "2" ');
  $rowCount = $query->num_rows();
  return $rowCount; 

}

  public function getdplist4() {
  $query = $this->db->query('SELECT * FROM footsall WHERE challenge = "3" ');
  $rowCount = $query->num_rows();
  return $rowCount; 

}

  public function getdplist5() {
  $query = $this->db->query('SELECT * FROM footsall WHERE challenge = "4" ');
  $rowCount = $query->num_rows();
  return $rowCount; 

}

  public function getdplist6() {
  $query = $this->db->query('SELECT * FROM footsall WHERE challenge = "5" ');
  $rowCount = $query->num_rows();
  return $rowCount; 

}

public function get_timestamp_member($idcard) {
    
    $this->db->select('*, footsall_member.fileupload1 as picidcardmember');
    $this->db->from('footsall_member');
    $this->db->join('footsall', 'footsall_member.team_id = footsall.team_id', 'inner');

    if($this->input->post('idcard'))
    {
      $this->db->like('idcard', $idcard);
    }
    //if($this->input->post('data14'))
    //{
    //  $this->db->like('data14', $data14);
    //}
    //if($this->input->post('datein'))
    //{
    //  $this->db->like('datein', $datein);
    //}


    $query = $this->db->get();
    return $query->result_array();
  }

public function timestamp_member($data) { 
        if ($this->db->insert("timestamp_member", $data)) { 
            return true; 
        } 
      }

  public function get_program_search($rundate) {
    
    $this->db->select('*');
    $this->db->from('program');

    if($this->input->post('rundate'))
    {
      $this->db->like('rundate', $rundate);
    }
    //if($this->input->post('data14'))
    //{
    //  $this->db->like('data14', $data14);
    //}
    //if($this->input->post('datein'))
    //{
    //  $this->db->like('datein', $datein);
    //}


    $query = $this->db->get();
    return $query->result_array();
  }


  // Fetch records
  public function getData_program() {

    $this->db->select('*');
    $this->db->from('program');
    $this->db->order_by("rundate", "asc");
    $query = $this->db->get();
      
    $data = $query->result(); 
     
    return $data;

  }

  // Select total records
  public function getrecordCount_program($search = '') {

    $this->db->select('count(*) as allcount');
    $this->db->from('program');
 
    if($search != ''){
      $this->db->like('rundate', $search);
    }

    $query = $this->db->get();
    $result = $query->result_array();
 
    return $result[0]['allcount'];
  }

  public function get_score($id){
      
    $query = $this->db->get_where("program",array("id"=>$id));
     
    $data = $query->result(); 
     
    return $data;

  }

  public function scoreupdate($data,$id) { 
    $this->db->set($data); 
    $this->db->where("id", $id); 
    $this->db->update("program", $data); 
  }

  // Fetch records
  public function getData_rank() {
 
    $this->db->select('*, SUM(`PTS`) AS Total_Point, SUM(`W`) AS Total_W, SUM(`D`) AS Total_D, SUM(`L`) AS Total_L, SUM(`score`) AS Total_Score');
    $this->db->from('program');    
    $this->db->group_by("team_id");
    $this->db->order_by("Total_Point", "DESC");
    $query = $this->db->get();      
    $data = $query->result();
    return $data;

  }

  // Select total records
  public function getrecordCount_rank($search = '') {

    $this->db->select('count(*) as allcount');
    $this->db->from('program');
 
    if($search != ''){
      $this->db->like('challenge', $search);
    }

    $query = $this->db->get();
    $result = $query->result_array();
 
    return $result[0]['allcount'];
  }

  public function get_man_stamp($team_id){
      
    $this->db->select('*, footsall_member.name AS member_name');
    $this->db->from('timestamp_member');
    $this->db->join('footsall_member', 'footsall_member.idcard = timestamp_member.idcard', 'inner');
    //$this->db->where('timestamp_member.team_id', $team_id);
    //if($search != ''){
    $this->db->like('timestamp_member.team_id', $team_id);
    //}

    //$this->db->limit($rowperpage, $rowno); 
    $query = $this->db->get();
 
    return $query->result_array();

  }


  public function fetch_team(){
    $this->db->order_by("id", "ASC");
    $query = $this->db->get("footsall_member");
    return $query->result();
  }

  public function get_fetch_team($team_id) {
    
    $this->db->select('*');
    $this->db->from('footsall');

    if($this->input->post('test'))
    {
      $this->db->like('team_id', $team_id);
    }
    //if($this->input->post('data14'))
    //{
    //  $this->db->like('data14', $data14);
    //}
    //if($this->input->post('datein'))
    //{
    //  $this->db->like('datein', $datein);
    //}


    $query = $this->db->get();
    return $query->result_array();
  }


  public function insert_program($data) { 
    if ($this->db->insert("program", $data)) { 
      return true; 
    } 
  }

  




}


?>