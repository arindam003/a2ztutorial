<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class How_it_works extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		$this->load->model('How_it_works_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index()
    {
		
       $data['alldata'] = $this->How_it_works_model->get_data();
        
         $this->template->set('title','How_it_works');
        //$this->template->set('title', 'Faq | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('how_it_works',$data);
    }
	
	public function add(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['heading']= strip_tags($this->input->post('heading'));
			$data['descrip']= strip_tags($this->input->post('descrip'));

			date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
            

            $this->form_validation->set_rules('heading', 'heading', 'trim|required');
            $this->form_validation->set_rules('descrip', 'descrip', 'trim|required');

            if($this->form_validation->run()== TRUE){
            	$data_inserted = $this->How_it_works_model->add_how_it_works($data);
            	// echo '<pre>';
            	// print_r($data_inserted); die;
	            $this->session->set_flashdata('success_msg', 'How it Works added Successfully'); 
	            redirect('how_it_works');
            }else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('how_it_works/add');
             }
            
		}
	     	$this->template->set('title', 'Add How it works');
	        $this->template->set_layout('layout_main', 'front');
	        $this->template->build('addhow_it_works',$data);
		
	}

	public function edit($id){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['heading']= strip_tags($this->input->post('heading'));
			$data['descrip']= strip_tags($this->input->post('descrip'));

			date_default_timezone_set('Europe/London');
            $data['updated_on']=date('Y-m-d H:i:s');
            

            $this->form_validation->set_rules('heading', 'heading', 'trim|required');
            $this->form_validation->set_rules('descrip', 'descrip', 'trim|required');

            if($this->form_validation->run() == TRUE){
            	$data_inserted = $this->How_it_works_model->edit_how_it_works($data,$id);
    //          	echo '<pre>';
				// print_r($data_inserted); die;
	            $this->session->set_flashdata('success_msg', 'How it works Edited Successfully'); 
	            redirect('how_it_works');
            }
            
		}
	    $this->template->set('title', 'Edit How it works');
		
		$data['single_data'] = $this->How_it_works_model->get_data_by_id($id);
		
		// echo '<pre>';
		// print_r($data); die;
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('edithow_it_works',$data);


	
	}

	// how_it_works status
    public function status_inactive($id) {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';
               $data_inserted = $this->How_it_works_model->edit_how_it_works($data,$id);
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
               $data_inserted = $this->How_it_works_model->edit_how_it_works($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }
	
	public function delete_data($id){
        $this->How_it_works_model->delete_row_data($id);
        redirect('how_it_works');
        
    }
	
	
	
	
	
	
	
}
