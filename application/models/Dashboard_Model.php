<?php 
   class Dashboard_Model extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 


      public function select_data(){

         $this->db->select('*');
         $this->db->from('e-notify');
         $query = $this->db->get();
      
         $data = $query->result(); 
        
         return $data;
      }

      public function get_status_I() {
         $this->db->select('*');
         $this->db->from('e-notify');
         $this->db->where("status", "I");
         $query = $this->db->get();
         $data = $query->num_rows();
         return $data; 
    
      }

      public function get_status_O() {
         $this->db->select('*');
         $this->db->from('e-notify');
         $this->db->where("status", "O");
         $query = $this->db->get();
         $data = $query->num_rows();
         return $data; 
    
      }

      public function get_status_E() {
         $this->db->select('*');
         $this->db->from('e-notify');
         $this->db->where("status", "E");
         $query = $this->db->get();
         $data = $query->num_rows();
         return $data; 
    
      }

      public function get_status_All() {
         $this->db->select('*');
         $this->db->from('e-notify');
         $query = $this->db->get();
         $data = $query->num_rows();
         return $data; 
    
      }

   } 
?> 