<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Parentgoogle extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        $this->load->library('form_validation');
		$this->load->model('Parentgoogle_model');
		
        
    }
   
    public function index(){
		
        $data['alldata'] = $this->Parentgoogle_model->get_data();
        $data['usertype_data'] = $this->Parentgoogle_model->get_usertype();

        
        $this->template->set('title','Parent');
        //$this->template->set('title', 'student | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('parentgoogle',$data);
    }
   public function view($id){
    
    $data['parentgoogle_view'] = $this->Parentgoogle_model->view_parentgoogle($id);
    
    // echo '<pre>';
    // print_r($data);die;

    $this->template->set('title','Student');
    $this->template->set('title', 'Student | '.$this->config->item('site_name'));
    $this->template->set_layout('layout_main', 'front');
    $this->template->build('viewparentgoogle',$data);

 }
    
	
	public function delete_data($id){
        $this->Parentgoogle_model->delete_row_data($id);
        redirect('parentgoogle');
        
    }
	
	
	
	
	
	
}
?>