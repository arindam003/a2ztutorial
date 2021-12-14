<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Subjectmap extends MX_Controller{
    public function __construct(){
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        $this->load->library('form_validation');
		$this->load->model('Subjectmap_model');
		
        
    }
    //===================================================================
    public function index(){

        
		
        $data['alldata'] = $this->Subjectmap_model->get_data();
        
        $this->template->set('title',' Subjectmap');
        //$this->template->set('title', 'Qualifications | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('subjectmap',$data);
    }
	
    public function add(){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){

            $data['teacher_id']= strip_tags($this->input->post('teacher_id'));
            $data['subject_id']= strip_tags($this->input->post('subject_id'));
            

            
            date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d');

           

            $subjectmap = $this->Subjectmap_model->check_subjectmap($data['teacher_id'],$data['subject_id']);

             // echo count($qualifications);
             //    die;

            $this->form_validation->set_rules('teacher_id', 'teacher_id', 'trim|required');
            $this->form_validation->set_rules('subject_id', 'subject_id', 'trim|required');
            
            if(count($subjectmap) > 0){
                $this->session->set_flashdata('err_msg', 'Already exists'); 
            }else{

                    if($this->form_validation->run()== TRUE){
                                
                   
                        $data_inserted = $this->Subjectmap_model->add_data($data);
                        
                        $this->session->set_flashdata('success_msg', ' Added Successfully'); 
                        redirect('subjectmap');
                    }else {
                        $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                        redirect('subjectmap/add');
                     }
                }
            
        }

        $data['teacher_data'] = $this->Subjectmap_model->get_teacher();
        $data['subjects_data'] = $this->Subjectmap_model->get_subjects();
       

       
        $this->template->set('title','Add Subjectmap');
        //$this->template->set('title', 'Subjectmap | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addsubjectmap',$data); 
    }

public function delete_data($map_id){
    $this->Subjectmap_model->delete_row_data($map_id);
    redirect('subjectmap');
    
}
  
   
	
	
	
}
?>