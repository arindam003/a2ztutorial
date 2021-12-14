<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Lessons extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		$this->load->model('Lessons_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index()
    {
		
       $data['alldata'] = $this->Lessons_model->get_data();
        
         $this->template->set('title','Lessons');
        //$this->template->set('title', 'Levels | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('lessons',$data);
    }
	
	public function add(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['less_timing']= strip_tags($this->input->post('less_timing'));
			

			date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
            
            $this->form_validation->set_rules('less_timing', 'less_timing', 'trim|required');
           

            if($this->form_validation->run()== TRUE){
            			
           
            	$data_inserted = $this->Lessons_model->add_data($data);
	            $this->session->set_flashdata('success_msg', ' Added Successfully'); 
	            redirect('lessons');
            }else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('lessons/add');
             }
            
		}
	     	$this->template->set('title', 'Add Lessons');
	        $this->template->set_layout('layout_main', 'front');
	        $this->template->build('addlessons',$data);
		
	}

	public function edit($id){
        //echo 'hi'; die;
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['less_timing']= strip_tags($this->input->post('less_timing'));

			date_default_timezone_set('Europe/London');
            $data['updated_on']=date('Y-m-d H:i:s');
            

            $this->form_validation->set_rules('less_timing', 'less_timing', 'trim|required');

            if($this->form_validation->run() == TRUE){

            	
            	$data_inserted = $this->Lessons_model->edit_data($data,$id);
    			//echo '<pre>';
				// print_r($data_inserted); die;
	            $this->session->set_flashdata('success_msg', ' Edited Successfully'); 
	            redirect('lessons');
            }else {
                
                
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');
                redirect('lessons/edit');
            }
            
		}
	    $this->template->set('title', 'Edit Lessons');
		
		$data2['single_data'] = $this->Lessons_model->get_data_by_id($id);
		
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editlessons',$data2);
	}

// goal status
	public function status_inactive($id) {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';
               $data_inserted = $this->Lessons_model->edit_data($data,$id);
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
               $data_inserted = $this->Lessons_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }
	
	public function delete_data($id){
        $this->Lessons_model->delete_row_data($id);
        redirect('lessons');
        
    }
	
	
	
	
	
	
	
}
?>
