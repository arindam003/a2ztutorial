<?php 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Days extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		$this->load->model('Days_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index()
    {
		
       $data['alldata'] = $this->Days_model->get_availability(); // multiple table joining

       // echo '<pre>';
       // print_r($data); die;
        $data['timing_data'] = $this->Days_model->get_timing();
       

        // echo '<pre>';
        // print_r($data); die;

        $this->template->set('title','Days');
        //$this->template->set('title', 'Days | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('days',$data);
    }
	
	public function add(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){

           
            // echo '<pre>';
            // print_r($_POST);
            // die;
            $data['teacher_id']= strip_tags($this->input->post('teacher_id'));
			$data['timing_id']= strip_tags($this->input->post('timing_id'));
            $data['dayname_id']= strip_tags($this->input->post('dayname_id'));
            
            date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');

            //extract($_POST);

            $availability = $this->Days_model->check_availability($data['teacher_id'],$data['timing_id'],$data['dayname_id']);

		  // echo count($availability);
            //die;


            $this->form_validation->set_rules('teacher_id', 'Teacher', 'required');
            $this->form_validation->set_rules('timing_id', 'Timing', 'required');
            $this->form_validation->set_rules('dayname_id', 'Dayname', 'required');


          
            if(count($availability) > 0){
                $this->session->set_flashdata('err_msg', 'Already exists'); 
            }else{

            if($this->form_validation->run() == TRUE){

                $data_inserted = $this->Days_model->add_data($data);
	            $this->session->set_flashdata('success_msg', ' Added Successfully'); 
	            redirect('days');
            
        }
            else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                //redirect('days/add');
             }

           }
		}

        $data['teacher_data'] = $this->Days_model->get_teacher();
        $data['timing_data'] = $this->Days_model->get_timing();
        $data['days_data'] = $this->Days_model->get_days();

     	$this->template->set('title', 'Add Days');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addDays',$data);
		
	}


 //    public function teacher_check(){
 //            if ($this->input->post('teacher_id') == '------------------Select Teacher------------------')  {
 //            $this->form_validation->set_message('teacher_check', 'Please choose your teacher.');
 //            return FALSE;
 //        }
 //        else {
 //            return TRUE;
 //        }
	// }
 //    public function timing_check(){
 //            if ($this->input->post('timing_id') == '------------------Select Timings------------------')  {
 //            $this->form_validation->set_message('timing_check', 'Please choose your Timings.');
 //            return FALSE;
 //        }
 //        else {
 //            return TRUE;
 //        }
 //    }
 //    public function dayname_check(){
 //            if ($this->input->post('dayname_id') == '------------------Select Days------------------')  {
 //            $this->form_validation->set_message('dayname_check', 'Please choose your Days.');
 //            return FALSE;
 //        }
 //        else {
 //            return TRUE;
 //        }
 //    }
	
	// public function delete_data($id){
 //        $this->Days_model->delete_row_data($id);
 //        redirect('days');
        
 //    }

    public function delete_data($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';
               $data_inserted = $this->Days_model->update_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data Updated Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }
	
	
	
	
	
	
	
}
