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
       
       

        $this->template->set_layout('layout_main', 'front');
        $this->template->build('login',$data);
            
    }

   

    
    
    
}
?>