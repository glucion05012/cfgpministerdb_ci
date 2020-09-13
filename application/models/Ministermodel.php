<?php
class Ministermodel extends CI_Model{
    public function __construct(){
        
        $this->master = $this->load->database('master', TRUE);
        $this->minister = $this->load->database('minister', TRUE);
    }

    public function login(){
        $uname = $this->input->post('uname');
        $psw = $this->input->post('psw');
        

        $this->master->where('min_fullname', $uname);
        $this->master->where('min_credential_no', $psw);
        $query = $this->master->get('tbl_minister');
        $loginCnt = $query->num_rows();

        if($loginCnt == 0){
            return false; 
        }else{
            return $query->result_array();
        }
    }

    public function get_minister($id){
        $this->master->select('*');
        $this->master->from('tbl_minister');
        $this->master->where('min_id', $id);
        $this->master->join('tbl_min_spouse', 'tbl_min_spouse.sp_min_id = tbl_minister.min_id', 'left');
        $query = $this->master->get();
   
        return $query->result_array();
    }

    public function get_minister_children($id){
        $this->master->select('*');
        $this->master->from('tbl_min_children');
        $this->master->where('cdn_min_id', $id);
        $query = $this->master->get();
   
        return $query->result_array();
    }

    public function get_minister_education($id){
        $this->master->select('*');
        $this->master->from('tbl_min_education');
        $this->master->where('educ_min_id', $id);
        $query = $this->master->get();
   
        return $query->result_array();
    }

    public function add_ordination(){
        $data = array(
            'ord_min_id' => $this->input->post('min_id'),
            'ord_father_name' => $this->input->post('father_name'),
            'ord_mother_name' => $this->input->post('mother_name'),
            'ord_solemnizing_official' => $this->input->post('s_official'),
            'ord_solemnizing_place' => $this->input->post('s_place'),
            'ord_if_separated' => $this->input->post('if_separated'),
            'ord_if_engaged_to' => $this->input->post('eng_name'),
            'ord_if_engaged_christian' => $this->input->post('eng_christian'),
            'ord_if_engaged_member' => $this->input->post('eng_good_stand'),
            'ord_if_engaged_symphaty' => $this->input->post('eng_symp_ministry'),
            'ord_if_engaged_not_symphaty' => $this->input->post('eng_symp_ministry_no'),
            'ord_if_engaged_minister' => $this->input->post('eng_minister'),
            'ord_if_engaged_graduate_fbc' => $this->input->post('eng_graduate_fbc'),
            'ord_if_engaged_when_married' => $this->input->post('eng_plan_married'),
            'ord_course_bible_college' => $this->input->post('course_fbc'),
            'ord_year_conversion_when' => $this->input->post('conversion_date'),
            'ord_year_conversion_where' => $this->input->post('conversion_place'),
            'ord_year_baptized_when' => $this->input->post('hs_date'),
            'ord_year_baptized_where' => $this->input->post('hs_place'),
            'ord_testimony' => $this->input->post('testimony'),
            'ord_ministerial_activities' => $this->input->post('min_act'),
            'ord_churches_pioneered' => $this->input->post('ch_pion'),
            'ord_churches_evangelized' => $this->input->post('ch_evan'),
            'ord_resigned_pastorate' => $this->input->post('min_resigned'),
            'ord_fulltime_ministry' => $this->input->post('fulltime_ministry'),
            'ord_secular_employment' => $this->input->post('sec_emp'),
            'ord_foursquare_credentials' => $this->input->post('four_cre'),
            'ord_other_licensed' => $this->input->post('another_ord'),
            'ord_pending_application' => $this->input->post('pend_ord'),
            'ord_harmony_authority' => $this->input->post('authority'),
            'ord_pledged_foursquare' => $this->input->post('pledge'),
            'ord_teaching_principles' => $this->input->post('principles'),
            'ord_teach_tithing' => $this->input->post('tithing'),
            'ord_consistent_tither' => $this->input->post('cons_tithing'),
            'ord_ministry_support' => $this->input->post('min_supp'),
            'ord_declaration_faith' => $this->input->post('founder'),
            'ord_way_salvation' => $this->input->post('way_salv'),
            'ord_holy_trinity' => $this->input->post('trin'),
            'ord_eternal_security' => $this->input->post('eter_sec'),
            'ord_date_submitted' => $this->input->post('date_submited'),
            'ord_district_status' => $this->input->post('status'),
            'ord_district_interview' => $this->input->post(''),
            'ord_national_status' => $this->input->post(''),
            'ord_national_exam' => $this->input->post(''),
            'ord_national_interview' => $this->input->post(''),
        );

        return $this->minister->insert('ordination', $data);
    }

    public function get_ordination_min($id){
        $this->minister->where('ord_min_id', $id);
        $query = $this->minister->get('ordination');
        return $query->result_array();
    }

    public function get_ordination($id){
        $this->minister->where('ord_id', $id);
        $query = $this->minister->get('ordination');
        return $query->result_array();
    }
}
?>