<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class University extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		$this->load->model('University_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index()
    {
		
       $data['alldata'] = $this->University_model->get_data();
        
         $this->template->set('title','University');
        //$this->template->set('title', 'Levels | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('university',$data);
    }
	
	public function add(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['uni_name']= strip_tags($this->input->post('uni_name'));
			

			date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
            
            $this->form_validation->set_rules('uni_name', 'name', 'trim|required');
           

            if($this->form_validation->run()== TRUE){
            			
           
            	$data_inserted = $this->University_model->add_data($data);
	            $this->session->set_flashdata('success_msg', ' Added Successfully'); 
	            redirect('university');
            }else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('university/add');
             }
            
		}
	     	$this->template->set('title', 'Add University');
	        $this->template->set_layout('layout_main', 'front');
	        $this->template->build('adduniversity',$data);
		
	}

	public function edit($id){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['uni_name']= strip_tags($this->input->post('uni_name'));

			date_default_timezone_set('Europe/London');
            $data['updated_on']=date('Y-m-d H:i:s');
            

            $this->form_validation->set_rules('uni_name', 'name', 'trim|required');

            if($this->form_validation->run() == TRUE){

            	
            	$data_inserted = $this->University_model->edit_data($data,$id);
    			$this->session->set_flashdata('success_msg', ' Edited Successfully'); 
	            redirect('university');
            }else {
                
                
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');
                redirect('university/edit');
            }
            
		}

      

	    $this->template->set('title', 'Edit University');
		$data2['single_data'] = $this->University_model->get_data_by_id($id);
		$this->template->set_layout('layout_main', 'front');
        $this->template->build('edituniversity',$data2);
	}

//  status
	public function status_inactive($id) {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';
               $data_inserted = $this->University_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }
    public function status_active($id){
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '1';
               $data_inserted = $this->University_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }
	
	public function delete_data($id){
        $this->University_model->delete_row_data($id);
        redirect('university');
        
    }
	
	
	
	
	
	
	
}
?>
