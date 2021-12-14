<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Grade extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		$this->load->model('Grade_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index()
    {
		
       $data['alldata'] = $this->Grade_model->get_data();
        
         $this->template->set('title','Grade');
        //$this->template->set('title', 'Levels | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('grade',$data);
    }
	
	public function add(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['name']= strip_tags($this->input->post('name'));
			

			date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
            

            $this->form_validation->set_rules('name', 'name', 'trim|required');
           

            if($this->form_validation->run()== TRUE){
            			
           
            	$data_inserted = $this->Grade_model->add_data($data);
	            $this->session->set_flashdata('success_msg', ' Added Successfully'); 
	            redirect('grade');
            }else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('grade/add');
             }
            
		}
	     	$this->template->set('title', 'Add Grade');
	        $this->template->set_layout('layout_main', 'front');
	        $this->template->build('addgrade',$data);
		
	}

	public function edit($id){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['name']= strip_tags($this->input->post('name'));

			date_default_timezone_set('Europe/London');
            $data['updated_on']=date('Y-m-d H:i:s');
           

            $this->form_validation->set_rules('name', 'name', 'trim|required');

            if($this->form_validation->run() == TRUE){

            	
            	$data_inserted = $this->Grade_model->edit_data($data,$id);
    			//echo '<pre>';
				// print_r($data_inserted); die;
	            $this->session->set_flashdata('success_msg', ' Edited Successfully'); 
	            redirect('grade');
            }else {
                
                
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');
                redirect('grade/edit');
            }
            
		}
	    $this->template->set('title', 'Edit Grade');
		
		$data2['single_data'] = $this->Grade_model->get_data_by_id($id);
		
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editgrade',$data2);

		
	}

// Grade status 
	public function status_inactive($id) {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';
               $data_inserted = $this->Grade_model->edit_data($data,$id);
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
               $data_inserted = $this->Grade_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }
	
	public function delete_data($id){
        $this->Grade_model->delete_row_data($id);
        redirect('grade');
        
    }
	
	
	
	
	
	
	
}
