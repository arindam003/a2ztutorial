<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Studentgoogle extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        $this->load->library('form_validation');
		$this->load->model('Studentgoogle_model');
		
        
    }
    
    public function index(){
		
        $data['alldata'] = $this->Studentgoogle_model->get_data();
        $data['usertype_data'] = $this->Studentgoogle_model->get_usertype();

        
        $this->template->set('title','Student');
        //$this->template->set('title', 'student | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('studentgoogle',$data);
    }
   public function view($id){
    //echo $test_id;die;
    $data['studentgoogle_view'] = $this->Studentgoogle_model->view_studentgoogle($id);
    
    // echo '<pre>';
    // print_r($data);die;

    $this->template->set('title','Student');
    $this->template->set('title', 'Student | '.$this->config->item('site_name'));
    $this->template->set_layout('layout_main', 'front');
    $this->template->build('viewstudentgoogle',$data);

 }
    
	
	public function delete_data($id){
        $this->Studentgoogle_model->delete_row_data($id);
        redirect('studentgoogle');
        
    }
	
	
	
	
	
	
}
?>