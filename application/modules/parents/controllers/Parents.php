<?php
    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

    class Parents extends MX_Controller{
        public function __construct(){
            parent::__construct();
             //parent_is_logged_in();
            $this->load->library('form_validation');
            $this->load->model('Parents_model');

        }
        public function index(){
             // echo '<pre>';
             // print_r($this->session); die;
                $parent_id = $this->session->userdata('parent_id');

                $data['parentprofile_data'] = $this->Parents_model->get_profile($parent_id);

              
               
                $this->template->set('title','Parentprofile');
                $this->template->set_layout('layout_main','front');
                $this->template->build('parentprofile',$data);
            
        }
        public function signup(){
          if($this->input->server('REQUEST_METHOD') == 'POST'){
                $data['name']= strip_tags($this->input->post('name'));
                $data['email']= strip_tags($this->input->post('email'));
                $data['phone']= strip_tags($this->input->post('phone'));
                $data['password'] = strip_tags(md5($this->input->post('password')));
                $slug =  $data['name'];
                $data['slug_name'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-',$slug));
                $data['usertype_id'] = 2;
              
                date_default_timezone_set('Europe/London');
                $data['added_on']=date('Y-m-d H:i:s');
               
                 $this->form_validation->set_rules('name', 'Name', 'trim|required');
                 $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                 // $this->form_validation->set_rules('confirm_email', 'Confirm Mail', 'trim|required|matches[email]');
                $this->form_validation->set_rules('phone','phone','trim|required');
                $this->form_validation->set_rules('password','password','trim|required');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
                  
                 //$this->form_validation->set_rules('usertype_id','usertype_id','trim|required');
                 
                

                 $mailcheck = $this->Parents_model->mail_check($data['email']);

                 if(count($mailcheck) > 0) {
                    $this->session->set_flashdata('err_msg', 'Already Email Id exists'); 
                }else{

                 if($this->form_validation->run() == TRUE){  

                    
                    $data_inserted = $this->Parents_model->add_data($data);
                    
                    $this->session->set_flashdata('success_msg', 'Successfully !');
                    
                 }else{
                     $this->session->set_flashdata('err_msg', 'Something Wrong! Please try again');
                 } 

            } 
        }

            //$data['usertype_data'] = $this->Parents_model->get_usertype();
            $this->template->set('title','Signup');
            $this->template->set_layout('layout_main','front');
            $this->template->build('parentsignup',$data);
 }

 public function google(){

        require_once APPPATH.'third_party/src/Google_Client.php';
        require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
        // old
        $clientId = '248055939114-l9ngcl1olbvcn1f26fddc3pdua9nqvhi.apps.googleusercontent.com'; 
        $clientSecret = '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'; 
        $redirectURL = 'https://seller007.co.uk/dev/A2ZTutorials/parents/google';
        //$redirectURL = 'https://seller007.co.uk/dev/A2ZTutorials/googleprofile';

      
        //Call Google API
        $gClient = new Google_Client();
        //var_dump($gClient); die;
        $gClient->setApplicationName('A2ztutorials');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectURL);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        
        if(isset($_GET['code']))
        {
            $gClient->authenticate($_GET['code']);
            $_SESSION['token'] = $gClient->getAccessToken();
            header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
        }

        if (isset($_SESSION['token']))  {
            $gClient->setAccessToken($_SESSION['token']);
        }
        
        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
              $user_information  = array(
                    'usertype_id' => '2',
                    'f_name'     => $userProfile["given_name"],
                    'l_name'      => $userProfile["family_name"],
                    'email'          => $userProfile["email"],
                    // 'gender'         => $userProfile["gender"],
                    'oauth_uid'      => $userProfile["id"],
                    'oauth_provider' => 'Google',
                    'image_src' => $userProfile["picture"],
                    );
       //if($user_information){
               $google_insert = $this->Parents_model->insert_user($user_information);
               if($google_insert){
                $google_datafetch = $this->Parents_model->get_googleprofile();
                
                echo '<div class="card-header"> Google Account Details</div><div class="card-body">';
                echo '<img src="' . $google_datafetch[0]->image_src. '" class="rounded-circle container"/>';
                echo '<h3><b>Name :</b> ' . $google_datafetch[0]->f_name . ' ' . $google_datafetch[0]->l_name . '</h3>';
                echo '<h3><b>Email :</b> ' . $google_datafetch[0]->email . '</h3>';
                echo '<h3><a href="https://seller007.co.uk/dev/A2ZTutorials/parents/googlelogout">Logout</a></h3>';
                echo '</div>';

               }
                //redirect('students');
            //}
            
            
          

            // echo "<pre>";
            // print_r($userProfile);
             die;
        } 
        else 
        {
            $url = $gClient->createAuthUrl();
            header("Location: $url");
            exit;
        }


    } 

    public function googlelogout(){
        session_destroy();
        redirect('parents/login');
    }
        public function login(){
          if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $email= $this->input->post('email');
            $password= md5($this->input->post('password'));
            

            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

             if ($this->form_validation->run() == true) {  
                 $query = $this->Parents_model->validate($email,$password);
                
                        if($query){
                        $this->session->set_flashdata('success_msg', 'You are Loggedin !!');
                        redirect('parents'); 
                    }else{
                        $this->session->set_flashdata('err_msg', 'Email or Password is not match, Please try again.');
                        redirect('parents/login');
                    }
                } else {
             
                    $this->session->set_flashdata('err_msg', 'Please fill all field and try again.');
                    redirect('parents/login');
                }
        }

        //$data['usertype_data'] = $this->Parents_model->get_usertype();
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('parentslogin',$data);
    }
    

public function edit($id){
 // echo $parent_id;die;
 // parent_is_logged_in();
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

            date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
            

            $this->form_validation->set_rules('name', 'name', 'trim|required');
            $this->form_validation->set_rules('email', 'email', 'trim|required');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required');

           
            if($this->form_validation->run() == TRUE){ 
                        $this->load->library('upload');
                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                            $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                            $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                            $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                            $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                            $config['upload_path']          = './admin/uploads/parent_image';

                            $config['allowed_types']        = 'png|jpg|jpeg';
                            $config['max_size']             = 100000;
                           
                            $this->upload->initialize($config);


                            if (! $this->upload->do_upload()) {
                             $error = array('error' => $this->upload->display_errors()); 
                            
                            } else {
                                
                                $final_files_data[] = $this->upload->data();
                                
                                 $data['image_src']= $final_files_data[0]['file_name'];
                            }
                        $data_inserted = $this->Parents_model->edit_profile($data,$id);
                       
                        $this->session->set_flashdata('success_msg', ' Edited Successfully'); 
                        redirect('parents');
                    }
            else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('parents/edit');
             }
            
        }
        $this->template->set('title', 'Edit Profile');
        
        $data['single_data'] = $this->Parents_model->get_data_by_id($id);
        
        // echo '<pre>';
        // print_r($data); die;
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editparentprofile',$data);


        
    }



    public function changepassword(){
       
    $parent_id = $this->session->userdata('parent_id');
    if($this->input->server('REQUEST_METHOD') == 'POST'){

    $data['old_pass']= strip_tags($this->input->post('old_pass'));
    $data['new_pass']= strip_tags($this->input->post('new_pass'));
    $data['con_pass']= strip_tags($this->input->post('con_pass'));
          
    $this->form_validation->set_rules('old_pass','Old password','trim|required');
    $this->form_validation->set_rules('new_pass','New password', 'trim|required');
    $this->form_validation->set_rules('con_pass', 'Confirm password', 'trim|required');

   

    $single_data = $this->Parents_model->get_parentdata_by_id($parent_id);

  if($this->form_validation->run() == TRUE) {
            
               if($single_data[0]->password == md5($data['old_pass'])){

                if($data['new_pass'] == $data['con_pass']){
                      $new_pass = md5($data['new_pass']);
                      $result= $this->Parents_model->update_password($parent_id,$new_pass);

                       if($result){
                         $this->session->set_flashdata('success_msg', 'password Edited Successfully'); 
                         redirect('parents');
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
        
        
public function parent_logout() {
       $this->session->sess_destroy();
       $this->session->unset_userdata('parent_id');
       redirect('home');  
    
    }


    } 

?>