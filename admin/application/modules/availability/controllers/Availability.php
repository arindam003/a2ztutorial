<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Availability extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		$this->load->model('Availability_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index()
    {
		
       $data['alldata'] = $this->Availability_model->get_availability(); // multiple table joining
       //$data['teacher_data'] = $this->Availability_model->get_teacher();
        $data['timing_data'] = $this->Availability_model->get_timing();
        
        $this->template->set('title','Availability');
        //$this->template->set('title', 'Availability | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('availability',$data);
    }
	
	public function add(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['teacher_id']= strip_tags($this->input->post('teacher_id'));
			$data['timing_id']= strip_tags($this->input->post('timing_id'));
            // $data['days1_id']= strip_tags($this->input->post('days1_id'));
            $data['mon']= strip_tags($this->input->post('Mon'));
            $data['tue']= strip_tags($this->input->post('Tue'));
            $data['wed']= strip_tags($this->input->post('Wed'));
            $data['thu']= strip_tags($this->input->post('Thu'));
            $data['fri']= strip_tags($this->input->post('Fri'));
            $data['sat']= strip_tags($this->input->post('Sat'));
            $data['sun']= strip_tags($this->input->post('Sun'));
			

            

			date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
            $this->form_validation->set_rules('teacher_id', 'teacher_id', 'trim|required');
            $this->form_validation->set_rules('timing_id', 'timing_id', 'trim|required');

            
            $availability = $this->Availability_model->check_availability($data['teacher_id'],$data['timing_id']);

            
            
            if(count($availability) > 0){
                 $this->session->set_flashdata('err_msg', 'Teacher Already exists'); 
            }else{


                if($this->form_validation->run()== TRUE){
                			
               
                	$data_inserted = $this->Availability_model->add_data($data);
    	            $this->session->set_flashdata('success_msg', ' Added Successfully'); 
    	            redirect('availability');
                }else {
                    $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                    //redirect('availability/add');
                 }
            }
            
		}

        $data['teacher_data'] = $this->Availability_model->get_teacher();
        $data['timing_data'] = $this->Availability_model->get_timing();
        $data['days_data'] = $this->Availability_model->get_days();

	     	$this->template->set('title', 'Add Availability');
	        $this->template->set_layout('layout_main', 'front');
	        $this->template->build('addAvailability',$data);
		
	}

    public function edit($id){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            
            $data['timing_id']= strip_tags($this->input->post('timing_id'));
            
            $data['mon']= strip_tags($this->input->post('Mon'));
            $data['tue']= strip_tags($this->input->post('Tue'));
            $data['wed']= strip_tags($this->input->post('Wed'));
            $data['thu']= strip_tags($this->input->post('Thu'));
            $data['fri']= strip_tags($this->input->post('Fri'));
            $data['sat']= strip_tags($this->input->post('Sat'));
            $data['sun']= strip_tags($this->input->post('Sun'));

            date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
            
            //print_r($data['teacher_id']);die;
            
            $this->form_validation->set_rules('timing_id', 'timing_id', 'trim|required');
            //echo '<pre>';print_r($data);die;
            if($this->form_validation->run() == TRUE){
                $data_inserted = $this->Availability_model->edit_data($data,$id);
                
                $this->session->set_flashdata('success_msg', ' Edited Successfully'); 
                redirect('availability');
            }else{
                     $this->session->set_flashdata('err_msg', 'Something Wrong! Please try again');
                 }  
            
        }

        $data['teacher_data'] = $this->Availability_model->get_teacher();
        $data['timing_data'] = $this->Availability_model->get_timing();
        $data['days_data'] = $this->Availability_model->get_days();
        

        $this->template->set('title', 'Edit Availability');
        $data['single_data'] = $this->Availability_model->get_data_by_id($id);

        // echo '<pre>';
        // print_r($data['single_data']); die;
        
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editavailability',$data);
    }
    

	
	
	public function delete_data($id){
        $this->Availability_model->delete_row_data($id);
        redirect('availability');
        
    }
	
	
	
	
	
	
	
}
