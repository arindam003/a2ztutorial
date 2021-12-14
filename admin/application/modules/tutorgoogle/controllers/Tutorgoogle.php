<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Tutorgoogle extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        $this->load->library('form_validation');
		$this->load->model('Tutorgoogle_model');
		
        
    }
   
    public function index(){
		
        $data['alldata'] = $this->Tutorgoogle_model->get_data();
        $data['usertype_data'] = $this->Tutorgoogle_model->get_usertype();

        
        $this->template->set('title','Tutor');
        //$this->template->set('title', 'student | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('tutorgoogle',$data);
    }
   public function view($id){
    
    $data['tutorgoogle_view'] = $this->Tutorgoogle_model->view_tutorgoogle($id);
    
    // echo '<pre>';
    // print_r($data);die;

    $this->template->set('title','Student');
    $this->template->set('title', 'Student | '.$this->config->item('site_name'));
    $this->template->set_layout('layout_main', 'front');
    $this->template->build('viewtutorgoogle',$data);

 }
    
	
	public function delete_data($id){
        $this->Tutorgoogle_model->delete_row_data($id);
        redirect('tutorgoogle');
        
    }
	
	
	
	
	
	
}
?>