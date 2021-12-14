<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Faq extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		$this->load->model('Faq_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index()
    {
		
       $data['alldata'] = $this->Faq_model->get_data();
       $data['faqtopics_data'] = $this->Faq_model->get_faqtopics();
        
        $this->template->set('title','Faq');
        //$this->template->set('title', 'Faq | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('faq',$data);
    }
	
	public function addfaq(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			//$data['faq_topic_id']= strip_tags($this->input->post('faq_topic_id'));
			$data['question']= strip_tags($this->input->post('question'));
			$data['answer']= strip_tags($this->input->post('answer'));

			date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
            

            //$this->form_validation->set_rules('faq_topic_id', 'faq_topic_id', 'trim|required');
            $this->form_validation->set_rules('question', 'question', 'trim|required');
            $this->form_validation->set_rules('answer', 'answer', 'trim|required');

            if($this->form_validation->run()== TRUE){
            	$data_inserted = $this->Faq_model->add_faq($data);

	            $this->session->set_flashdata('success_msg', 'faq added Successfully'); 
	            redirect('faq');
            }else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('faq/addfaq');
             }
            
		}

		//$data['faqtopics_data'] = $this->Faq_model->get_faqtopics();

     	$this->template->set('title', 'Add Faq');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addfaq',$data);
		
	}

	public function editfaq($id){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			//$data['faq_topic_id']= strip_tags($this->input->post('faq_topic_id'));
			$data['question']= strip_tags($this->input->post('question'));
			$data['answer']= strip_tags($this->input->post('answer'));

			date_default_timezone_set('Europe/London');
            $data['updated_on']=date('Y-m-d H:i:s');
            

            //$this->form_validation->set_rules('faq_topic_id', 'faq_topic_id', 'trim|required');
            $this->form_validation->set_rules('question', 'question', 'trim|required');
            $this->form_validation->set_rules('answer', 'answer', 'trim|required');

            if($this->form_validation->run() == TRUE){
            	$data_inserted = $this->Faq_model->edit_faq($data,$id);
   				 //echo '<pre>';
				// print_r($data_inserted); die;
	            $this->session->set_flashdata('success_msg', 'Faq Edited Successfully'); 
	            redirect('faq');
            }else{
                     $this->session->set_flashdata('err_msg', 'Something Wrong! Please try again');
                 }  
            
		}

		//$data['faqtopics_data'] = $this->Faq_model->get_faqtopics();
		// echo '<pre>';
		// print_r($data['faqtopics_data']); die;

	    $this->template->set('title', 'Edit Faq');
		$data['single_data'] = $this->Faq_model->get_data_by_id($id);
		
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editfaq',$data);
	}
	

    public function status_inactive($id) {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';
               $data_inserted = $this->Faq_model->edit_faq($data,$id);
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
               $data_inserted = $this->Faq_model->edit_faq($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }
    
	//view faq techer 

  public function view($id){
    //echo $id;die;
    
    $data['faq_view'] = $this->Faq_model->view_faq($id);
    // echo '<pre>';
    // print_r($data);die;

    $this->template->set('title','Faq');
    $this->template->set('title', 'Faq | '.$this->config->item('site_name'));
    $this->template->set_layout('layout_main', 'front');
    $this->template->build('viewfaq',$data);

 }

	public function delete_data($id){
        $this->Faq_model->delete_row_data($id);
        redirect('faq');
        
    }
	
	
	
	
	
	
	
}
