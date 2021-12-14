<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Contact extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		$this->load->model('Contact_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index()
    {
		
       $data['alldata'] = $this->Contact_model->get_data();
        
         $this->template->set('title','Contact');
        //$this->template->set('title', 'Faq | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('contact',$data);
    }
	
	
	public function delete_data($id){
        $this->Contact_model->delete_row_data($id);
        redirect('contact');
        
    }
	
	
	
	
	
	
	
}
