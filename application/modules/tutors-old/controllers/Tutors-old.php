<?php
    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

    class Tutors extends MX_Controller{
    public function __construct(){
            parent::__construct();
             //teacher_is_logged_in();
            $this->load->library('form_validation');
            $this->load->model('Tutors_model');

        }
    public function index(){
            // echo '<pre>';
            //  print_r($this->session); die;
                $teacher_id = $this->session->userdata('teacher_id');


                $data['teacherprofile_data'] = $this->Tutors_model->get_profile($teacher_id);
                $data['university_data'] = $this->Tutors_model->get_university();
               
                $this->template->set('title','Teacher Profile');
                $this->template->set_layout('layout_main','front');
                $this->template->build('teacherprofile',$data);
            
        }
    public function signup(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
                if($this->input->post('studying')==TRUE){ 
                $data['name']= strip_tags($this->input->post('name'));
                $data['university'] = strip_tags($this->input->post('university'));
                $email_prefix= strip_tags($this->input->post('email_prefix'));
                $email_domain= strip_tags($this->input->post('email_domain'));

                $data['uni_emaildomain'] = $email_prefix.$email_domain;
                $data['password'] = strip_tags(md5($this->input->post('password')));
                 
                
                $data['usertype_id'] = 3;
                $slug =   $data['name'];
                $data['slug_name'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-',$slug));
                
                date_default_timezone_set('Europe/London');
                $data['added_on']=date('Y-m-d H:i:s');

            
               
                // $this->form_validation->set_rules('name', 'name', 'trim|required');
                // $this->form_validation->set_rules('university','university','required|callback_check_default');
                //  $this->form_validation->set_message('check_default', 'The University field is required.');
                //$this->form_validation->set_rules('university', 'university', 'required|callback_university_check');

                
                $this->form_validation->set_rules('email_prefix','Email Prefix','trim|required');
                $this->form_validation->set_rules('password','password','trim|required');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
                if($this->form_validation->run() == TRUE){  
                    

                         $data_inserted = $this->Tutors_model->add_data($data);
                        
                        $this->session->set_flashdata('success_msg', 'Registration  !');
                        redirect('tutors');
                        
                      }
                     else{
                         $this->session->set_flashdata('err_msg', 'Something Wrong! Please try again');
                     } 
                }
                if($this->input->post('graduated')==TRUE){
                $data['name']= strip_tags($this->input->post('name'));
                $data['email']= strip_tags($this->input->post('email'));
                $data['university'] = strip_tags($this->input->post('university'));
                $email_prefix= strip_tags($this->input->post('email_prefix'));
                $email_domain= strip_tags($this->input->post('email_domain'));
                $data['uni_emaildomain'] = $email_prefix.$email_domain;
                $data['password'] = strip_tags(md5($this->input->post('password')));
               // $checkbox= strip_tags($this->input->post('agree'));
                
                $data['usertype_id'] = 3;
                $slug =   $data['name'];
                $data['slug_name'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-',$slug));
                

                date_default_timezone_set('Europe/London');
                $data['added_on']=date('Y-m-d H:i:s');

                
               
                $this->form_validation->set_rules('name', 'name', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                // $this->form_validation->set_rules('university','university','required|callback_check_default');
                // $this->form_validation->set_message('check_default', 'The University field is required.');


                //$this->form_validation->set_rules('university', 'university', 'required|callback_university_check');
                $this->form_validation->set_rules('agree','Checked','trim|required');
                $this->form_validation->set_rules('email_prefix','Email Prefix','trim|required');
                $this->form_validation->set_rules('password','password','trim|required');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
                
                if($this->form_validation->run() == TRUE){  

                         $data_inserted = $this->Tutors_model->add_data($data);
                        
                        $this->session->set_flashdata('success_msg', 'Registration  !');
                        redirect('tutors');
                        
                      }
                     else{
                         $this->session->set_flashdata('err_msg', 'Something Wrong! Please try again');
                     } 
                }

                 
           }
        $data['university_data'] = $this->Tutors_model->get_university();
        $data['emaildomain_data'] = $this->Tutors_model->get_emaildomain();

        $this->template->set('title','Tutor Signup');
        $this->template->set_layout('layout_main','front');
        $this->template->build('tutorsignup',$data);
    }
    // ajax_university
    public function ajax_university(){

        $university_id = $this->input->post('university_id');
       
         $university_data = $this->Tutors_model->searching_uni_domainmail($university_id);
         

         foreach ($university_data as $university) {

             echo 
              '<option value= "'.$university->email_domain.'"> '.$university->email_domain.'</option>'.'<br>';
          
         }


         exit();
    }
     public function ajax_university2(){

        $university_id2 = $this->input->post('university_id2');
       
         $university_data2 = $this->Tutors_model->searching_uni_domainmail($university_id2);
         

         foreach ($university_data2 as $university2) {

             echo 
              '<option value= "'.$university2->email_domain.'"> '.$university2->email_domain.'</option>'.'<br>';
          
         }


         exit();
    }
    public function login(){
          if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $uni_emaildomain= $this->input->post('uni_emaildomain');
            $password= md5($this->input->post('password'));
            

            $this->form_validation->set_rules('uni_emaildomain', 'Uni Email Domain', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

             if ($this->form_validation->run() == true) {  
                 $query = $this->Tutors_model->validate($uni_emaildomain,$password);
                
                        if($query){
                        $this->session->set_flashdata('success_msg', 'You are Loggedin !!');
                        redirect('tutors'); 
                    }else{
                        $this->session->set_flashdata('err_msg', 'Email or Password is not match, Please try again.');
                        redirect('tutors/login');
                    }
                } else {
             
                    $this->session->set_flashdata('err_msg', 'Please fill all field and try again.');
                    redirect('tutors/login');
                }
        }

        
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('tutorslogin',$data);
    }
    public function edit($slug_name){
           //echo $id;die;
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            // print_r($_POST);die;
            $data['name']= strip_tags($this->input->post('name'));
            $slug =  $data['name'];
            $data['slug_name'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-',$slug));

            
            $data['email']= strip_tags($this->input->post('email'));
           
            $data['phone']= strip_tags($this->input->post('phone'));
            $data['title']= strip_tags($this->input->post('title'));
           
            $data['gender']= strip_tags($this->input->post('gender'));
            $data['address1']= strip_tags($this->input->post('address1'));
            $data['address2']= strip_tags($this->input->post('address2'));
            $data['town']= strip_tags($this->input->post('town'));
            $data['county']= strip_tags($this->input->post('county'));
            $data['country']= strip_tags($this->input->post('country'));
            $data['postalcode']= strip_tags($this->input->post('postalcode'));
            $data['travel']= strip_tags($this->input->post('travel'));
            $data['degree']= strip_tags($this->input->post('degree'));
            
            $data['language']= strip_tags($this->input->post('language'));
            $data['yourbio']= strip_tags($this->input->post('yourbio'));
            $data['experience']= strip_tags($this->input->post('experience'));
            $data['preferred_location']= strip_tags($this->input->post('preferred_location'));
            $data['price']= strip_tags($this->input->post('price'));
            $data['in_person']= strip_tags($this->input->post('in_person'));
            $data['online_lesson']= strip_tags($this->input->post('online_lesson'));
            $data['subject_offered']= json_encode($this->input->post('subject_offered'));
            $data['session']= strip_tags($this->input->post('session'));
            $data['about']= strip_tags($this->input->post('about'));
            $data['dateofbirth']= strip_tags($this->input->post('dateofbirth'));
            $data['total_session']= strip_tags($this->input->post('total_session'));

            
            date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
            

            $this->form_validation->set_rules('name', 'name', 'trim|required');
           
            

            if($this->form_validation->run() == TRUE){


                $this->load->library('upload');
              
                
                    //  image
                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                        $config['upload_path']          = './admin/uploads/teacher_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_data[] = $this->upload->data();
                            
                             $data['image_src']= $final_files_data[0]['file_name'];
                             
                         }

                $data_inserted = $this->Tutors_model->edit_profile($data,$slug_name);
                
                $this->session->set_flashdata('success_msg', 'Teacher Profile Edited Successfully'); 
                redirect('tutors');
            }
            else{
                 $this->session->set_flashdata('err_msg', 'Something Wrong! Please try again');
                 redirect('tutors/edit');
                }  
            
        }

        

        $this->template->set('title', 'Edit Teacher Profile');
        $data_class['single_data'] = $this->Tutors_model->get_data_by_id($slug_name);
        $data_class['subject_offered'] = $this->Tutors_model->get_subject_offered();
        $data_class['university_data'] = $this->Tutors_model->get_university();
        // echo '<pre>';
        // print_r($data_class['single_data']); die;
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editteacherprofile',$data_class);

        }
        
    public function changepassword(){
       
    $teacher_id = $this->session->userdata('teacher_id');
    if($this->input->server('REQUEST_METHOD') == 'POST'){

    $data['old_pass']= strip_tags($this->input->post('old_pass'));
    $data['new_pass']= strip_tags($this->input->post('new_pass'));
    $data['con_pass']= strip_tags($this->input->post('con_pass'));
          
    $this->form_validation->set_rules('old_pass','Old password','trim|required');
    $this->form_validation->set_rules('new_pass','New password', 'trim|required');
    $this->form_validation->set_rules('con_pass', 'Confirm password', 'trim|required');

   

    $single_data = $this->Tutors_model->get_teacherdata_by_id($teacher_id);

  if($this->form_validation->run() == TRUE) {
            
               if($single_data[0]->password == md5($data['old_pass'])){

                if($data['new_pass'] == $data['con_pass']){
                      $new_pass = md5($data['new_pass']);
                      $result= $this->Tutors_model->update_password($teacher_id,$new_pass);

                       if($result){
                         $this->session->set_flashdata('success_msg', 'password Edited Successfully'); 
                         redirect('tutors');
                        }else{
                          $this->session->set_flashdata('err_msg', 'Password not change');
                        }

                  }else{
                    $this->session->set_flashdata('err_msg', 'Please Confirm and New Password Correctly');
                  }

               }else{
                  $this->session->set_flashdata('err_msg', 'Please Enter Previous Password Correctly.');
               }

                    
        
        }   
    }
      $this->template->set('title', 'Edit Password');
      $this->template->set_layout('layout_main', 'front');
      $this->template->build('changepassword',$data);   
    }
      
     public function teacher_logout(){
        $this->session->sess_destroy();
        $this->session->unset_userdata('teacher_id');
        redirect('home');
    }   



    } 

?>