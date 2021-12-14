<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Qualifications extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        $this->load->library('form_validation');
		$this->load->model('Qualifications_model');
		
        
    }
    //===================================================================
    public function index(){

        
		
        $data['alldata'] = $this->Qualifications_model->get_data();
        
        $this->template->set('title',' Qualifications');
        //$this->template->set('title', 'Qualifications | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('qualifications',$data);
    }
	
    public function add(){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){

            $data['teacher_id']= strip_tags($this->input->post('teacher_id'));
            $data['subject_id']= strip_tags($this->input->post('subject_id'));
            $data['levels_id']= strip_tags($this->input->post('levels_id'));
            //$data['grade_id']= strip_tags($this->input->post('grade_id'));
            $data['price']= strip_tags($this->input->post('price'));

            
            date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');

            
            //$qualifications = $this->Qualifications_model->check_qualifications($data['teacher_id'],$data['subject_id'],$data['levels_id'],$data['grade_id']);

            $qualifications = $this->Qualifications_model->check_qualifications($data['teacher_id'],$data['subject_id'],$data['levels_id']);

             // echo count($qualifications);
             //    die;

            $this->form_validation->set_rules('teacher_id', 'teacher_id', 'trim|required');
            $this->form_validation->set_rules('subject_id', 'subject_id', 'trim|required');
            $this->form_validation->set_rules('levels_id', 'levels_id', 'trim|required');
            //$this->form_validation->set_rules('grade_id', 'grade_id', 'trim|required');
           
            if(count($qualifications) > 0){
                $this->session->set_flashdata('err_msg', 'Already exists'); 
            }else{

                    if($this->form_validation->run()== TRUE){
                                
                   
                        $data_inserted = $this->Qualifications_model->add_data($data);
                        
                        $this->session->set_flashdata('success_msg', ' Added Successfully'); 
                        redirect('qualifications');
                    }else {
                        $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                        redirect('qualifications/add');
                     }
                }
            
        }

        $data['teacher_data'] = $this->Qualifications_model->get_teacher();
        $data['subjects_data'] = $this->Qualifications_model->get_subjects();
        $data['levels_data'] = $this->Qualifications_model->get_levels();
        $data['grade_data'] = $this->Qualifications_model->get_grade();

       
        $this->template->set('title','Add Qualifications');
        $this->template->set('title', 'Qualifications | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addqualifications',$data); 
    }
    public function edit($id){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['price']= strip_tags($this->input->post('price'));

            date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');

           
            $this->form_validation->set_rules('price', 'price', 'trim|required');
            if($this->form_validation->run() == TRUE){
                $data_inserted = $this->Qualifications_model->edit_data($data,$id);
                
                $this->session->set_flashdata('success_msg', ' Edited Successfully'); 
                redirect('qualifications');
            }else{
                     $this->session->set_flashdata('err_msg', 'Something Wrong! Please try again');
                 }  

        }



        $data['teacher_data'] = $this->Qualifications_model->get_teacher();
        $data['subjects_data'] = $this->Qualifications_model->get_subjects();
        $data['levels_data'] = $this->Qualifications_model->get_levels();
        
        $this->template->set('title', 'Edit Qualifications');
        $data['single_data'] = $this->Qualifications_model->get_data_by_id($id);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editqualifications',$data);
     }

public function delete_data($id){
        $this->Qualifications_model->delete_row_data($id);
        redirect('qualifications');
        
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
               $data_inserted = $this->Qualifications_model->edit_data($data,$id);
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
               $data_inserted = $this->Qualifications_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }
	
	// update data 
  // public function delete_data($id)
 //    {
 //        if($this->uri->segment(3)=="")
 //        {
 //            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
 //            redirect($_SERVER['HTTP_REFERER']);
 //        }
 //        else
 //        {
 //               $data['status'] = '0';
 //               $data_inserted = $this->Qualifications_model->update_data($data,$id);
 //               $this->session->set_flashdata('success_msg', 'Data Updated Successfully'); 
 //              redirect($_SERVER['HTTP_REFERER']);             
 //        }
 //    }
	
	
}
?>