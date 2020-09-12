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

                    $this->home();
                }     
                else{
                    $this->session->set_flashdata('errormsg', 'No User found!');

                    $url = $_SERVER['HTTP_REFERER'];
                    redirect($url);
                } 
            }       
            
        }

        public function logout(){
            unset($_SESSION['name']);
            unset($_SESSION['id']);
            $this->load->view('login');
        }
        
        public function home(){
            if(isset($_SESSION['name'])){

                $data['minister'] =  $this->ministermodel->login();
                
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

        public function ordination_create(){
                // $this->budget_allocation_model->add_main_pap();
                $this->session->set_flashdata('successmsg', 'Application successfully submitted!');
                redirect('home');
        }
    }
?>