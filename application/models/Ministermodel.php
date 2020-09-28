<?php
class Ministermodel extends CI_Model{
    public function __construct(){
        
        $this->master = $this->load->database('master', TRUE);
        $this->minister = $this->load->database('minister', TRUE);
    }

    public function logs($action){
        //login START
        date_default_timezone_set('Asia/Manila');
        $date_log = date('F j, Y g:i:a  ');
        $logs = array(
            'ls_action' => $action,
            'ls_date' => $date_log,
            'ls_user' => $_SESSION['name']
        );

        $this->minister->insert('logs', $logs);
        //loginEND
    }

    public function logs_in($action){
        //login START
        date_default_timezone_set('Asia/Manila');
        $date_log = date('F j, Y g:i:a  ');
        $logs = array(
            'ls_action' => $action,
            'ls_date' => $date_log,
            'ls_user' => $this->input->post('uname')
        );

        $this->minister->insert('logs', $logs);
        //loginEND
    }

    public function login(){
        $uname = $this->input->post('uname');
        $psw = $this->input->post('psw');
        

        $this->minister->where('lg_min_fullname', $uname);
        $this->minister->where('lg_password', $psw);
        $query1 = $this->minister->get('login');
        $loginCnt1 = $query1->num_rows();
        
        if($loginCnt1 == 0){


            $this->minister->where('lg_min_fullname', $uname);
            $query2 = $this->minister->get('login');
            $loginCnt2 = $query2->num_rows();
            if($loginCnt2 == 0){
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
        }else{
            $this->master->where('min_fullname', $uname);
            $query = $this->master->get('tbl_minister');
            return $query->result_array();
        }
        return false;


        
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

    public function update_password(){
        $this->logs('changed password to '.$this->input->post('new_password'));

        $uname = $this->input->post('username');

        $this->minister->where('lg_min_fullname', $uname);
        $query1 = $this->minister->get('login');
        $loginCnt1 = $query1->num_rows();
        
        if($loginCnt1 == 0){

            $this->minister->where('lg_min_fullname', $uname);
            $query2 = $this->minister->get('login');
            $loginCnt2 = $query2->num_rows();
            if($loginCnt2 == 0){
                $this->master->where('min_fullname', $uname);
                $query = $this->master->get('tbl_minister');
                $loginCnt = $query->num_rows();

                if($loginCnt == 0){
                    return false; 
                }else{
                    $data = array(
                        'lg_min_fullname' => $this->input->post('username'),
                        'lg_password' => $this->input->post('new_password'),
                    );
            
                    return $this->minister->insert('login', $data);
                }
            }
        }else{
            $data = array(
                'lg_password' => $this->input->post('new_password'),
            );
    
            $this->minister->where('lg_min_fullname',  $this->input->post('username'));
            return $this->minister->update('login', $data);
        }
        return false;

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
            'ord_remarks' => $this->input->post('remarks'),
            'ord_national_interview' => $this->input->post(''),
        );

        $this->minister->insert('ordination', $data);

        $insert_id = $this->minister->insert_id();
        $this->logs('submitted new ordination application. Application #: '.$insert_id);

        return true;
    }

    public function update_ordination(){
        $data = array(
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
            'ord_remarks' => $this->input->post('remarks'),
            'ord_national_interview' => $this->input->post(''),
        );

        $this->minister->where('ord_id',  $this->input->post('ord_id'));

        $this->logs('updated ordination application. Application #: '.$this->input->post('ord_id'));

        return $this->minister->update('ordination', $data);
    }

    public function get_ordination_min($id){
        $this->minister->where('ord_min_id', $id);
        $query = $this->minister->get('ordination');
        return $query->result_array();
    }

    public function get_recommendation_ordination(){
        $query = $this->minister->get('recommendation_ordination');
        return $query->result_array();
    }

    public function get_ordination($id){
        $this->minister->where('ord_id', $id);
        $query = $this->minister->get('ordination');
        return $query->result_array();
    }

    public function add_recommendation(){
        $data = array(
            'ro_known' => $this->input->post('long_knonwn'),
            'ro_capacity' => $this->input->post('capacity'),
            'ro_remain' => $this->input->post('permanent'),
            'ro_doctrinally' => $this->input->post('doctrinally'),
            'ro_loyalty' => $this->input->post('loyalty'),
            'ro_spirituality' => $this->input->post('spirituality'),
            'ro_dependability' => $this->input->post('dependability'),
            'ro_intelligence' => $this->input->post('intelligence'),
            'ro_initiative' => $this->input->post('initiative'),
            'ro_personality' => $this->input->post('personality'),
            'ro_domestic' => $this->input->post('adjustment'),
            'ro_relationship' => $this->input->post('relationship'),
            'ro_appearance' => $this->input->post('personal'),
            'ro_health' => $this->input->post('health'),
            'ro_financial' => $this->input->post('financial'),
            'ro_dedication' => $this->input->post('dedication'),
            'ro_abilities' => $this->input->post('abilities'),
            'ro_preaching' => $this->input->post('preaching'),
            'ro_teaching' => $this->input->post('teaching'),
            'ro_youth' => $this->input->post('youth'),
            'ro_music' => $this->input->post('music'),
            'ro_comments' => $this->input->post('comments'),
            'ro_recommendation' => $this->input->post('recommend'),
            'ro_recommendation_remarks' => $this->input->post('recommend_remarks'),
            'ro_recommender' => $this->input->post('recommender'),
            'ro_date_submitted' => $this->input->post('date_submited'),
            'ro_ord_id' => $this->input->post('ord_id'),
        );

        return $this->minister->insert('recommendation_ordination', $data);
    }
}
?>