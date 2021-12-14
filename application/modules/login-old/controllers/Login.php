<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Login extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('Login_model');
    }


    public function index() {
       
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $email= $this->input->post('email');
            $password= md5($this->input->post('password'));
            $usertype_id= $this->input->post('usertype_id');

            // echo '<pre>';
            // print_r($_POST); die;

            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

                 if ($this->form_validation->run() == true) {  
                     $query = $this->Login_model->validate($email,$password,$usertype_id);
                     // echo '<pre>';
                     // print_r($query); die;
                        
                        if($query){
                             if($usertype_id == '1'){
                                $this->session->set_flashdata('success_msg', 'You are Loggedin !!');
                                redirect('home'); 
                            }elseif($usertype_id == '2'){
                                $this->session->set_flashdata('success_msg', 'You are Loggedin !!');
                                redirect('home'); 
                            }
                            else{
                                $this->session->set_flashdata('success_msg', 'You are Loggedin !!');
                                redirect('home'); 
                            }

                        }else{
                            $this->session->set_flashdata('err_msg', 'Email or Password is not match, Please try again.');
                                redirect('login');
                            }
                        } else {
                     
                            $this->session->set_flashdata('err_msg', 'Please fill all field and try again.');
                            redirect('login');
                        }
        }


        $data['usertype_data'] = $this->Login_model->get_usertype();

        $this->template->set_layout('layout_main', 'front');
        $this->template->build('login',$data);
            
    }

   

    public function logout() {
       $this->session->sess_destroy();
       $this->session->unset_userdata('student_id');
       redirect('home');  
    
    }

    public function parent_logout() {
       $this->session->sess_destroy();
       $this->session->unset_userdata('parent_id');
       redirect('home');  
    
    }
    public function teacher_logout(){
        $this->session->sess_destroy();
        $this->session->unset_userdata('teacher_id');
        redirect('home');
    }
   
    
    
    
}
?>