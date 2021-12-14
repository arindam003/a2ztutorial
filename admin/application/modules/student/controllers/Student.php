<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Student extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        $this->load->library('form_validation');
		$this->load->model('Student_model');
		
        
    }
    //===================================================================
    public function index(){
		
        $data['alldata'] = $this->Student_model->get_data();

        
        $this->template->set('title','Student');
        //$this->template->set('title', 'student | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('student',$data);
    }
    public function add(){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            
            $data['name']= strip_tags($this->input->post('name'));

            $data['slug_name'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-',$data['name']));
            
            $data['email']= strip_tags($this->input->post('email')); 
            $data['phone']= strip_tags($this->input->post('phone'));
            $data['password']= strip_tags(md5($this->input->post('password')));
            $data['usertype_id']= strip_tags($this->input->post('usertype_id'));
            

            date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
        
            $this->form_validation->set_rules('name', 'name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('confirm_email', 'Confirm Mail', 'trim|required|matches[email]');
            $this->form_validation->set_rules('phone','phone','trim|required');
            $this->form_validation->set_rules('password','password','trim|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
            
           $mailcheck = $this->Student_model->mail_check($data['email'],$data['usertype_id']);

           if(count($mailcheck) > 0) {
                    $this->session->set_flashdata('err_msg', 'Already Email Id exists'); 
                }else{

            if($this->form_validation->run()== TRUE){
                        
           
                $data_inserted = $this->Student_model->add_data($data);
                $this->session->set_flashdata('success_msg', ' Added Successfully'); 
                redirect('student');
            }else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                //redirect('student/add');
             }
         }
            
        }
            $this->template->set('title', 'Add Student');
            $this->template->set_layout('layout_main', 'front');
            $this->template->build('addstudent',$data);
        
    }
	
    public function edit($id){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            
            $data['name']= strip_tags($this->input->post('name'));
            $data['gender']= strip_tags($this->input->post('gender'));
            $data['address1']= strip_tags($this->input->post('address1'));
            $data['address2']= strip_tags($this->input->post('address2'));
            $data['town']= strip_tags($this->input->post('town'));
            $data['country']= strip_tags($this->input->post('country'));
            $data['postalcode']= strip_tags($this->input->post('postalcode'));
            $data['dateofbirth']= strip_tags($this->input->post('dateofbirth'));
            $data['email']= strip_tags($this->input->post('email')); 
            $data['phone']= strip_tags($this->input->post('phone'));
            $data['university']= strip_tags($this->input->post('university'));
            $data['degree']= strip_tags($this->input->post('degree'));
            
        

            date_default_timezone_set('Europe/London');
            $data['updated_on']=date('Y-m-d H:i:s');
            
            
            $this->form_validation->set_rules('name', 'name', 'trim|required');
            


            
                    if($this->form_validation->run() == TRUE){ 
                        $this->load->library('upload');
                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                            $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                            $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                            $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                            $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                            $config['upload_path']          = './uploads/student_image';

                            $config['allowed_types']        = 'png|jpg|jpeg';
                            $config['max_size']             = 100000;
                           
                            $this->upload->initialize($config);


                            if (! $this->upload->do_upload()) {
                             $error = array('error' => $this->upload->display_errors()); 
                            
                            } else {
                                
                                $final_files_data[] = $this->upload->data();
                                
                                 $data['image_src']= $final_files_data[0]['file_name'];
                            }
                        $data_inserted = $this->Student_model->edit_data($data,$id);
                       
                        $this->session->set_flashdata('success_msg', ' Edited Successfully'); 
                        redirect('student');
                    }else{
                         $this->session->set_flashdata('err_msg', 'Something Wrong! Please try again');
                         //redirect('student/edit');
                     }  
             }
        $this->template->set('title', 'Edit Student');
        $data_class['single_data'] = $this->Student_model->get_data_by_id($id);
        $data_class['usertype_data'] = $this->Student_model->get_usertype();
       
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editstudent',$data_class);

    }

    
	
	public function delete_data($id){
        $this->Student_model->delete_row_data($id);
        redirect('student');
        
    }
	
	
	
	
	
	
}
?>