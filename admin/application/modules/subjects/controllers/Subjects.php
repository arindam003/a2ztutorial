<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Subjects extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		$this->load->model('Subjects_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index()
    {
		
       $data['alldata'] = $this->Subjects_model->get_data();
        
         $this->template->set('title','Subjects');
        //$this->template->set('title', 'Subjects | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('subjects',$data);
    }
	
	public function add(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['name']= strip_tags($this->input->post('name'));

            $slug= strip_tags($this->input->post('subject_slugname'));
            
        $data['subject_slugname']= strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug));

			date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
            
            $this->form_validation->set_rules('name', 'name', 'trim|required');
            $this->form_validation->set_rules('subject_slugname', 'subject_slugname', 'trim|required');
           

            if($this->form_validation->run()== TRUE){
            			
           
            	$data_inserted = $this->Subjects_model->add_data($data);
                

	            $this->session->set_flashdata('success_msg', ' Added Successfully'); 
	            redirect('subjects');
            }else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('subjects/add');
             }
            
		}
	     	$this->template->set('title', 'Add Subjects');
	        $this->template->set_layout('layout_main', 'front');
	        $this->template->build('addsubjects',$data);
		
	}

	public function edit($id){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['name']= strip_tags($this->input->post('name'));
            $slug= strip_tags($this->input->post('subject_slugname'));

            $data['subject_slugname']= strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug));

            

			date_default_timezone_set('Europe/London');
            $data['updated_on']=date('Y-m-d H:i:s');
            

            $this->form_validation->set_rules('name', 'name', 'trim|required');
            $this->form_validation->set_rules('subject_slugname', 'subject_slugname', 'trim|required');

            if($this->form_validation->run() == TRUE){

            	
            	$data_inserted = $this->Subjects_model->edit_data($data,$id);
    			//echo '<pre>';
				// print_r($data_inserted); die;
	            $this->session->set_flashdata('success_msg', ' Edited Successfully'); 
	            redirect('subjects');
            }else {
                
                
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');
                redirect('subjects/edit');
            }
            
		}
	    $this->template->set('title', 'Edit subjects');
		
		$data['single_data'] = $this->Subjects_model->get_data_by_id($id);
		
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editsubjects',$data);

		
	}
// popular subject status
    public function subject_all($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['popular_subjects'] = '0';  // all subjects
               $data_inserted = $this->Subjects_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }
    public function subject_popular($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['popular_subjects'] = '1'; // popular subjects
               $data_inserted = $this->Subjects_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }

// status **

    public function status_inactive($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';  // inactive
               $data_inserted = $this->Subjects_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }
    public function status_active($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '1';
               $data_inserted = $this->Subjects_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }

	
	public function delete_data($id){
        $this->Subjects_model->delete_row_data($id);
        redirect('subjects');
        
    }
	
	
	
	
	
	
	
}
