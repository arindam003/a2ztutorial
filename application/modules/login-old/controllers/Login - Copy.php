<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Login extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // $this->load->library('email');
        // $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Login_model');
    }
   
public function index() {
   
    if ($this->input->server('REQUEST_METHOD') == 'POST'){
        $email= $this->input->post('email');
        $password= md5($this->input->post('password'));

        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

             if ($this->form_validation->run() == true) {  
                 $query = $this->Login_model->validate($email,$password);
                 // echo '<pre>';
                 // print_r($query); die;
                    //if(!$query->Teacher){
                        if($query){
                        $this->session->set_flashdata('success_msg', 'You are Loggedin !!');
                        redirect('userprofile'); 
                    }else{
                        $this->session->set_flashdata('err_msg', 'Email or Password is not match, Please try again.');
                        redirect('login');
                    }
                } else {
             
                    $this->session->set_flashdata('err_msg', 'Please fill all field and try again.');
                    redirect('login');
                }
    }
    $this->template->set_layout('layout_main', 'front');
    $this->template->build('login', $data);
        
}
    
  


    public function logout2() {
       
        $this->session->sess_destroy();
        //redirect('login');
        redirect(base_url(),'login');
    }
   
    
    
    
    
    
}
