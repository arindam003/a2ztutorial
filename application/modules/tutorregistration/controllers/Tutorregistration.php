<?php
    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

    class Tutorregistration extends MX_Controller{
        public function __construct(){
            parent::__construct();
            //$this->load->library('form_validation');
            $this->load->model('Tutorregistration_model');

        }
         public function index(){
            if($this->input->server('REQUEST_METHOD') == 'POST'){

                $data['name']= strip_tags($this->input->post('name'));
                $data['email']= strip_tags($this->input->post('email'));
                $data['phone'] = strip_tags($this->input->post('phone'));

                $data['title'] = strip_tags($this->input->post('title'));
                $data['firstname']= strip_tags($this->input->post('firstname'));
                $data['lastname']= strip_tags($this->input->post('lastname'));

                $slug =  $data['firstname'].' '.$data['lastname'];

                $data['slug_name'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-',$slug));
                
                $data['gender'] = strip_tags($this->input->post('gender'));
               
                $data['address1']= strip_tags($this->input->post('address1'));
                $data['address2']= strip_tags($this->input->post('address2'));
                $data['town']= strip_tags($this->input->post('town'));
                $data['county']= strip_tags($this->input->post('county'));
                $data['country']= strip_tags($this->input->post('country'));
                $data['postalcode']= strip_tags($this->input->post('postalcode'));
                $data['dateofbirth']= strip_tags($this->input->post('dateofbirth'));
                $data['travel']= strip_tags($this->input->post('travel')); 
                $data['language']= strip_tags($this->input->post('language'));
                $data['yourbio']= strip_tags($this->input->post('yourbio')); 
                $data['experience']= strip_tags($this->input->post('experience'));
                $data['preferred_location']= strip_tags($this->input->post('preferred_location'));
                $data['online_lesson']= strip_tags($this->input->post('online_lesson'));
                $data['in_person']= strip_tags($this->input->post('in_person')); 
               
                $data['password'] = strip_tags(md5($this->input->post('password')));
                //$data['confirm_password'] = strip_tags(md5($this->input->post('confirm_password')));
                $data['usertype_id'] = strip_tags($this->input->post('usertype_id'));
                
              
                date_default_timezone_set('Europe/London');
                $data['added_on']=date('Y-m-d H:i:s');
               
                  
                 //$this->form_validation->set_rules('name', 'name', 'trim|required');
                 
                 $tutor = $this->Tutorregistration_model->get_checking($data['name'],$data['email'],$data['phone']);
               
              
                 
            if(count($tutor) > 0){
                $this->session->set_flashdata('err_msg', 'Already Name/Email ID/Phone Number exists!'); 
            }else{
               
                     //if($this->form_validation->run() == TRUE){  

                        
                        $data_inserted = $this->Tutorregistration_model->add_data($data);
                        
                        $this->session->set_flashdata('success_msg', 'Registration  !');
                        redirect('tutorregistration');
                        
                     //  }
                     // else{
                     //     $this->session->set_flashdata('err_msg', 'Something Wrong! Please try again');
                     // }  
                }
        }

            $this->template->set('title','Tutorregistration');
            $this->template->set_layout('layout_main','front');
            $this->template->build('tutorregistration',$data);
         }

       


    } 

?>