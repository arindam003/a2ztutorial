<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Findmetutor extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        $this->load->library('form_validation');
		$this->load->model('Findmetutor_model');
		
        
    }
    //===================================================================
    public function index(){

        
		//echo 'hi'; die;
        $data['alldata'] = $this->Findmetutor_model->get_data();
        
        $this->template->set('title',' Findmetutor');
        //$this->template->set('title', 'Findmetutor | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('findmetutor',$data);
    }
	
  

  public function view_details($id){
    
    $data['findmerequest_view'] = $this->Findmetutor_model->view_findmerequest($id);
  

    $this->template->set('title',' Findmetutor');
    //$this->template->set('title', 'Findmetutor | '.$this->config->item('site_name'));
    $this->template->set_layout('layout_main', 'front');
    $this->template->build('viewfindmetutor',$data);



  }
  public function delete_data($id){
        $this->Findmetutor_model->delete_row_data($id);
        redirect('findmetutor');
        
    }
	
	// public function delete_data($id){
 //        if($this->uri->segment(3)=="")
 //        {
 //            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
 //            redirect($_SERVER['HTTP_REFERER']);
 //        }
 //        else
 //        {
 //               $data['status'] = '0';
 //               $data_inserted = $this->Findmetutor_model->update_data($data,$id);
 //               $this->session->set_flashdata('success_msg', 'Data Updated Successfully'); 
 //              redirect($_SERVER['HTTP_REFERER']);             
 //        }
 //    }

  
	
	
}
?>