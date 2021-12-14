<?php

    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

 

    class Students extends MX_Controller{
        public function __construct(){
            parent::__construct();
             // student_is_logged_in();
            $this->load->library('form_validation');
            $this->load->model('Students_model');

        }
    public function index(){
           // echo '<pre>';
           //   print_r($this->session); die;
        if($this->session->userdata('student_id')){
            $student_id = $this->session->userdata('student_id');
            $data['signupprofile'] = $this->Students_model->get_profile($student_id);
        }
           

      $this->template->set('title','Students Profile');
      $this->template->set_layout('layout_main','front');
                // $this->template->build('studentsprofile',$data);
      $this->template->build('studentsprofile',$data);
        }
    public function signup(){
          if($this->input->server('REQUEST_METHOD') == 'POST'){
                $data['name']= strip_tags($this->input->post('name'));
                $data['email']= strip_tags($this->input->post('email'));
                //$data['phone']= strip_tags($this->input->post('phone'));
                $data['dateofbirth'] = strip_tags(($this->input->post('dateofbirth')));
                $data['password'] = strip_tags(md5($this->input->post('password')));

                $slug =  $data['name'];
                $data['slug_name'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-',$slug));
                $data['usertype_id'] = 1;
              
                date_default_timezone_set('Europe/London');
                $data['added_on']=date('Y-m-d H:i:s');
               

                
                 $this->form_validation->set_rules('name', 'Name', 'trim|required');
                 $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                 //$this->form_validation->set_rules('confirm_email', 'Confirm Mail', 'trim|required|matches[email]');
                 $this->form_validation->set_rules('dateofbirth', 'Date of Birth', 'trim|required');
                 //$this->form_validation->set_rules('phone','phone','trim|required');
                 $this->form_validation->set_rules('password','Password','trim|required');
                 $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
                  
                 //$this->form_validation->set_rules('usertype_id','usertype_id','trim|required');
                 
                //  echo '<pre>';
                // print_r($data); die;

                 $mailcheck = $this->Students_model->mail_check($data['email']);

                 if(count($mailcheck) > 0) {
                    $this->session->set_flashdata('err_msg', 'Already Email Id exists'); 
                }else{

                 if($this->form_validation->run() == TRUE){  

                    
                    $data_inserted = $this->Students_model->add_data($data);
                    if($data_inserted){
                        
                         $idinsert = $this->Students_model->add_googlesignupid($data);
                     }

                  
                    $this->session->set_flashdata('success_msg', 'Successfully !'); 
                   
                    
               }else{
                   $this->session->set_flashdata('err_msg', 'Something Wrong! Please try again'); 
                 
                   // $message = "Something Wrong! Please try again ";



                    
                    ?>
                
                  <?php
                 } 

            } 
        }

            //$data['usertype_data'] = $this->Parents_model->get_usertype();

            $this->template->set('title','Student Signup');
            $this->template->set_layout('layout_main','front');
            $this->template->build('studentsignup',$data);

          
        }

    


    public function google(){

        require_once APPPATH.'third_party/src/Google_Client.php';
        require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
        // old
        $clientId = '255912031023-gjbj2m86shck3476oo6oldbuvhuprees.apps.googleusercontent.com'; 
        $clientSecret = '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'; 
       
         $redirectURL = 'https://a2ztutorials.co.uk/students/google';
          
        //Call Google API
        $gClient = new Google_Client();
        //var_dump($gClient); die;
        $gClient->setApplicationName('a2ztutorials');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectURL);
        //echo '<pre>'; var_dump($gClient->setApplicationName());die;
        $google_oauthV2 = new Google_Oauth2Service($gClient);
         
         //echo '<pre>';print_r($google_oauthV2);die;
        
        if(isset($_GET['code']))
        {
            $gClient->authenticate($_GET['code']);
            $_SESSION['token'] = $gClient->getAccessToken();
            header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
        }
        
        //echo '<pre>';print_r($_SESSION);die;
        if (isset($_SESSION['token']))  {

            $gClient->setAccessToken($_SESSION['token']);
        }
        
        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            $slug =   $userProfile['name'];
            $slug_name = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-',$slug));
  
             //echo '<pre>';
            //print_r($userProfile); die;
           
             
              $user_information  = array(
                    'usertype_id' => '1',
                    // 'signup_id' => $signupid,
                    'name'     => $userProfile["name"],
                    'slug_name'     => $slug_name,
                    'f_name'     => $userProfile["given_name"],
                    'l_name'      => $userProfile["family_name"],
                    'email'          => $userProfile["email"],
                     // 'gender'         => $userProfile["gender"],
                    'oauth_uid'      => $userProfile["id"],
                    'oauth_provider' => 'Google',
                    'image_src' => $userProfile["picture"],
                    );

          
        
                    
       if($user_information){

        $mailcheck = $this->Students_model->googlemail_check($userProfile["email"]);
        //echo '<pre>';print_r($mailcheck);die;
        if(count($mailcheck) > 0) {
            redirect('students/login');
           }else{
        $google_insert = $this->Students_model->insert_googleuser($user_information);
           if($google_insert){
            $google_datafetch = $this->Students_model->get_googleprofile();

           
            $googleid = $google_datafetch[0]->id;
            $googleoauthuid = $google_datafetch[0]->oauth_uid;
            $googlename = $google_datafetch[0]->name;
            $googleslugname = $google_datafetch[0]->slug_name;
            $googlemail = $google_datafetch[0]->email;
            $googlefname = $google_datafetch[0]->f_name;
            $googlelname = $google_datafetch[0]->l_name;
            $googleimagesrc = $google_datafetch[0]->image_src;
           }
          }
      }


           if($google_datafetch){
                    $user_signup = array(
                        'usertype_id' => '1',
                        'googlelogin_id' => $googleid,
                        'name' => $googlename,
                        'slug_name' => $googleslugname,
                        'email' => $googlemail,
                        'firstname' => $googlefname,
                        'lastname' => $googlelname,
                        'image_src' => $googleimagesrc,
                     );
                    if($user_signup){
                        
                        $signup = $this->Students_model->insert_signupuser($user_signup);
                       
                    }

                }

            
                $data['signupprofile'] = $this->Students_model->get_signup_profile($googleid,$googlemail);
                
                $this->template->set('title','Students Profile');
                $this->template->set_layout('layout_main','front');
                $this->template->build('studentsprofile',$data);
           

             //die;
        } 
        else 
        {
            $url = $gClient->createAuthUrl();
            header("Location: $url");
            exit;
        }


    } 

   
    public function googlelogout(){
        //echo 'hi';die;

        //print_r($_SESSION['token']);die;
        unset($_SESSION['token']);
        $this->session->sess_destroy(); 
        session_destroy();
        //$this->session->unset_userdata();
        //session_destroy();
        redirect('students/login');
    }
     public function login(){
          if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $email= $this->input->post('email');
            $password= md5($this->input->post('password'));
            

            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

             if ($this->form_validation->run() == true) {  
                 $query = $this->Students_model->validate($email,$password);
                
                        if($query){
                        $this->session->set_flashdata('success_msg', 'You are Loggedin !!');
                        redirect('students'); 
                    }else{
                        $this->session->set_flashdata('err_msg', 'Email or Password is not match, Please try again.');
                        redirect('students/login');
                    }
                } else {
             
                    $this->session->set_flashdata('err_msg', 'Please fill all field and try again.');
                    redirect('students/login');
                }
        }

        //$data['usertype_data'] = $this->Parents_model->get_usertype();
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('studentslogin',$data);
    }
    public function edit($id){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['name']= strip_tags($this->input->post('name'));
            $data['email']= strip_tags($this->input->post('email')); 
            $data['phone']= strip_tags($this->input->post('phone'));
            $data['gender']= strip_tags($this->input->post('gender'));
            $data['address1']= strip_tags($this->input->post('address1'));
            $data['address2']= strip_tags($this->input->post('address2'));
            $data['town']= strip_tags($this->input->post('town'));
            $data['country']= strip_tags($this->input->post('country'));
            $data['postalcode']= strip_tags($this->input->post('postalcode'));
            $data['dateofbirth']= strip_tags($this->input->post('dateofbirth'));
            
            $data['university']= strip_tags($this->input->post('university'));
            $data['degree']= strip_tags($this->input->post('degree'));

            date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
            

            $this->form_validation->set_rules('name', 'name', 'trim|required');
            // $this->form_validation->set_rules('email', 'email', 'trim|required');
            // $this->form_validation->set_rules('phone', 'phone', 'trim|required');
            //  echo '<pre>';
            // print_r($data); die;
            
            if($this->form_validation->run() == TRUE){ 
                        $this->load->library('upload');
                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                            $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                            $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                            $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                            $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                            $config['upload_path']          = './admin/uploads/student_image';

                            $config['allowed_types']        = 'png|jpg|jpeg';
                            $config['max_size']             = 100000;
                           
                            $this->upload->initialize($config);


                            if (! $this->upload->do_upload()) {
                             $error = array('error' => $this->upload->display_errors()); 
                            
                            } else {
                                
                                $final_files_data[] = $this->upload->data();
                                
                                 $data['image_src']= $final_files_data[0]['file_name'];
                            }
                        $data_inserted = $this->Students_model->edit_profile($data,$id);
                       
                        $this->session->set_flashdata('success_msg', ' Edited Successfully'); 
                        redirect('students');
                    }
            else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('students/edit');
             }
            
        }
        $this->template->set('title', 'Edit Student Profile');
        
        $data['single_data'] = $this->Students_model->get_profiledata_by_id($id);
        
         // echo '<pre>';
         //    print_r($data); die;
       
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editprofile',$data);


        
    }

public function changepassword(){
       
    $student_id = $this->session->userdata('student_id');
    if($this->input->server('REQUEST_METHOD') == 'POST'){

    $data['old_pass']= strip_tags($this->input->post('old_pass'));
    $data['new_pass']= strip_tags($this->input->post('new_pass'));
    $data['con_pass']= strip_tags($this->input->post('con_pass'));
          
    $this->form_validation->set_rules('old_pass','Old password','trim|required');
    $this->form_validation->set_rules('new_pass','New password', 'trim|required');
    $this->form_validation->set_rules('con_pass', 'Confirm password', 'trim|required');

   

    $single_data = $this->Students_model->get_studentdata_by_id($student_id);

  if($this->form_validation->run() == TRUE) {
            
               if($single_data[0]->password == md5($data['old_pass'])){

                if($data['new_pass'] == $data['con_pass']){
                      $new_pass = md5($data['new_pass']);
                      $result= $this->Students_model->update_password($student_id,$new_pass);

                       if($result){
                         $this->session->set_flashdata('success_msg', 'password Edited Successfully'); 
                         redirect('students');
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


    public function logout() {
       $this->session->sess_destroy();
       $this->session->unset_userdata('student_id');
       redirect('home');  
    
    }    




}
?>