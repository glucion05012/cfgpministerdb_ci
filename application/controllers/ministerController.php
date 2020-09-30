<?php
    class Ministercontroller extends CI_Controller{
        public function login(){
            $this->form_validation->set_rules('uname', 'Username',
                    'required');
            $this->form_validation->set_rules('psw', 'Password',
                    'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('login');
            }else{
            
                if($this->ministermodel->login()) {
                    $data['minister'] =  $this->ministermodel->login();
                   
                    $fullname = json_encode($data['minister'][0]['min_fullname']);
                    $id = json_encode($data['minister'][0]['min_id']);

                   
                    $name = $_SESSION['name'] =  trim($fullname, '"');
                    $id = $_SESSION['id'] =  trim($id, '"');

                    $this->ministermodel->logs_in('logged in');
                    $this->home();
                }     
                else{
                    $this->session->set_flashdata('errormsg', 'No User found!');

                    $this->load->view('login');
                } 
            }       
            
        }

        public function logout(){
            $this->ministermodel->logs('logged out');

            unset($_SESSION['name']);
            unset($_SESSION['id']);
            $url = base_url('login');
            redirect($url);
        }
        
        public function home(){
            if(isset($_SESSION['name'])){

                $this->ministermodel->login();
                $data['ordination_min'] =  $this->ministermodel->get_ordination_min($_SESSION['id']);

                $data['recommendation_ordination'] =  $this->ministermodel->get_recommendation_ordination();

                $data['minister'] =  $this->ministermodel->get_minister($_SESSION['id']);
                $data['minister_children'] =  $this->ministermodel->get_minister_children($_SESSION['id']);
                $data['minister_education'] =  $this->ministermodel->get_minister_education($_SESSION['id']);
                
                // echo json_encode( $data['ordination'] );
                $this->load->view('templates/header');
                $this->load->view('home', $data);
                $this->load->view('templates/footer');   
            }else{
                $this->logout();
            }
        }

        public function ordination(){
            if(isset($_SESSION['name'])){

                $data['minister'] =  $this->ministermodel->get_minister($_SESSION['id']);
                $data['minister_children'] =  $this->ministermodel->get_minister_children($_SESSION['id']);
                $data['minister_education'] =  $this->ministermodel->get_minister_education($_SESSION['id']);

                //echo json_encode( $data['minister_education']);
                $this->load->view('templates/header');
                $this->load->view('forms/ordination', $data);
                $this->load->view('templates/footer');   
            }else{
                $this->logout();
            }
        }

        public function settings(){
            $this->form_validation->set_rules('new_password', 'Field',
                    'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('settings');
                $this->load->view('templates/footer'); 
            }else{

            $this->ministermodel->update_password();
            
            echo"<script>alert('Password Successfully changed! Please login again.');</script>";
            $this->logout();
            }

        }

        public function ordination_create(){
                $this->ministermodel->add_ordination();
                
                $this->session->set_flashdata('successmsg', 'Application successfully submitted!');
                redirect('home');
        }

        public function ordination_update(){
            $this->ministermodel->update_ordination();
            
            $this->session->set_flashdata('successmsg', 'Application successfully updated!');
            redirect('home');
    }

        public function recommendation($id){

            $this->form_validation->set_rules('recommend', 'Recommendation',
                    'required');
            $this->form_validation->set_rules('recommender', 'Name and Position',
                    'required');

            if($this->form_validation->run() === FALSE){
                $data['ordination'] =  $this->ministermodel->get_ordination($id);
                $min_id = json_encode($data['ordination'][0]['ord_min_id']);
                $min_id = trim($min_id, '"');
                $data['minister'] =  $this->ministermodel->get_minister($min_id);
    
                // echo json_encode( $data['ordination'] );
                $this->load->view('forms/recommendation', $data);
            }else{
                $this->ministermodel->add_recommendation();

                echo"<script>alert('Recommendation Successfully submitted!');</script>";
                echo "<script>window.location.replace('https://www.foursquare.org.ph/');</script>";
            }

        }
    }
?>