<?php
class Ministermodel extends CI_Model{
    public function __construct(){
        
        $this->load->database();
    }

    public function login(){
        $uname = $this->input->post('uname');
        $psw = $this->input->post('psw');
        

        $this->db->where('min_fullname', $uname);
        $this->db->where('min_credential_no', $psw);
        $query = $this->db->get('tbl_minister');
        $loginCnt = $query->num_rows();

        if($loginCnt == 0){
            return false; 
        }else{
            return $query->result_array();
        }
    }

    public function get_minister($id){
        $this->db->select('*');
        $this->db->from('tbl_minister');
        $this->db->where('min_id', $id);
        $this->db->join('tbl_min_spouse', 'tbl_min_spouse.sp_min_id = tbl_minister.min_id', 'left');
        $query = $this->db->get();
   
        return $query->result_array();
    }

    public function get_minister_children($id){
        $this->db->select('*');
        $this->db->from('tbl_min_children');
        $this->db->where('cdn_min_id', $id);
        $query = $this->db->get();
   
        return $query->result_array();
    }

    public function get_minister_education($id){
        $this->db->select('*');
        $this->db->from('tbl_min_education');
        $this->db->where('educ_min_id', $id);
        $query = $this->db->get();
   
        return $query->result_array();
    }
}
?>