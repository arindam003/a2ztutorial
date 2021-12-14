<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Message extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		$this->load->model('Message_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index(){

		
       $data['alldata'] = $this->Message_model->get_message_data();
       //$data['alldata'] = $this->Message_model->get_user_data();

       $data['teacherdata'] =  $this->Message_model->get_teacher();
       $data['userdata'] =  $this->Message_model->get_user();

        

         $this->template->set('title','Message');
        //$this->template->set('title', 'Message | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('message',$data);
    }
	
     public function add(){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['message']= strip_tags($this->input->post('message'));
            $data['teacher_id']= strip_tags($this->input->post('teacher_id'));
            $data['user_id']= strip_tags($this->input->post('user_id'));
            

            date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
           
            $this->form_validation->set_rules('message', 'message', 'trim|required');
            $this->form_validation->set_rules('teacher_id', 'teacher_id', 'trim|required');
            $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
            
            if($this->form_validation->run()== TRUE){
                $data_inserted = $this->Message_model->add_message($data);
                $this->session->set_flashdata('success_msg', ' added Successfully'); 
                redirect('message');
            }else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('message/add');
             }
            
        }

         $data['user_data'] = $this->Message_model->get_user();
         $data['teacher_data'] = $this->Message_model->get_teacher();


            $this->template->set('title', 'Add Message');
            $this->template->set_layout('layout_main', 'front');
            $this->template->build('addmessage',$data);
        
     }
	
	public function delete_data($id){
        $this->Message_model->delete_row_data($id);
        redirect('message');
        
    }
	
	
	
	
	
	
	
}
