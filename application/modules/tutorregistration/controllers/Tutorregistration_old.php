<?php
    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

    class Tutorregistration extends MX_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Tutorregistration_model');

        }
         public function index(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){

                $data['name']= strip_tags($this->input->post('name'));
                $data['email']= strip_tags($this->input->post('email'));
                $data['phone'] = strip_tags($this->input->post('phone'));

                // $data['title'] = strip_tags($this->input->post('title'));
                // $data['firstname']= strip_tags($this->input->post('firstname'));
                // $data['lastname']= strip_tags($this->input->post('lastname'));
                // $data['gender'] = strip_tags($this->input->post('gender'));
               
                // $data['address1']= strip_tags($this->input->post('address1'));
                // $data['address2']= strip_tags($this->input->post('address2'));
                // $data['town']= strip_tags($this->input->post('town'));
                // $data['county']= strip_tags($this->input->post('county'));
                // $data['country']= strip_tags($this->input->post('country'));
                // $data['postalcode']= strip_tags($this->input->post('postalcode'));
                // $data['dateofbirth']= strip_tags($this->input->post('dateofbirth'));
                // $data['travel']= strip_tags($this->input->post('travel')); 
                // $data['language']= strip_tags($this->input->post('language'));
                // $data['yourbio']= strip_tags($this->input->post('yourbio')); 
                // $data['experience']= strip_tags($this->input->post('experience')); 
                // // $data['university'] = strip_tags(($this->input->post('university')));
                // $data['password'] = strip_tags(md5($this->input->post('password')));
                $data['category'] = strip_tags($this->input->post('category'));
                
              
                date_default_timezone_set('Europe/London');
                $data['added_on']=date('Y-m-d H:i:s');
                $data['status']='1';

                  // echo '<pre>';
                  // print_r($data);
                  // die;
                
                // $this->form_validation->set_rules('name', 'name', 'trim|required');
                // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                 // $this->form_validation->set_rules('confirm_email', 'Confirm Mail', 'trim|required|matches[email]');
                // $this->form_validation->set_rules('university','University','trim|required');

                // $this->form_validation->set_rules('phone','phone','trim|required');
                // $this->form_validation->set_rules('password','password','trim|required');
                // $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
               
                // $this->form_validation->set_rules('title', 'title', 'required|is_natural');
                // $this->form_validation->set_rules('firstname','firstname','trim|required');
                // $this->form_validation->set_rules('lastname','lastname','trim|required');
                // $this->form_validation->set_rules('gender', 'gender', 'required|is_natural');
                // $this->form_validation->set_rules('address1','address1','trim|required');

                // $this->form_validation->set_rules('town','town','trim|required');
                // $this->form_validation->set_rules('county','county','trim|required');
                // $this->form_validation->set_rules('country', 'Country', 'required|is_natural');
                // $this->form_validation->set_rules('postalcode','postalcode','trim|required');
                // $this->form_validation->set_rules('dateofbirth','dateofbirth','trim|required');
                // $this->form_validation->set_rules('travel', 'travel', 'required|is_natural');
                // $this->form_validation->set_rules('language', 'language', 'required|is_natural');
                // $this->form_validation->set_rules('yourbio','yourbio','trim|required');
                // $this->form_validation->set_rules('experience','experience','trim|required');
                // $this->form_validation->set_rules('agreement','agreement','trim|required');
                  
                 // $this->form_validation->set_rules('category','category','trim|required');
                 
                //  echo '<pre>';
                // print_r($data); die;

                 if($this->form_validation->run() == TRUE){  

                    
                    $data_inserted = $this->Tutorregistration_model->add_data($data);
                    // echo '<pre>';
                    // print_r($data_inserted); die;
                    $this->session->set_flashdata('success_msg', 'Registration  !');
                    
                 }
                 else{
                     $this->session->set_flashdata('err_msg', 'Something Wrong! Please try again');
                 }  
            }


            $this->template->set('title','Tutorregistration');
            $this->template->set_layout('layout_main','front');
            $this->template->build('tutorregistration',$data);
         }




    } 

?>