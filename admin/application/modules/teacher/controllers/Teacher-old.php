<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Teacher extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        $this->load->library('form_validation');
		$this->load->model('Teacher_model');
		
        
    }
    //===================================================================
    public function index(){
		
        $data['alldata'] = $this->Teacher_model->get_data();

        
        $this->template->set('title','Teacher');
        //$this->template->set('title', 'Teacher | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('teacher',$data);
    }
    public function add(){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            
            $data['name']= strip_tags($this->input->post('name'));
            $data['university'] = strip_tags($this->input->post('university'));
            $data['email']= strip_tags($this->input->post('email'));

            $slug =  $data['name'];

            $data['slug_name'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-',$slug));
            // $email_prefix= strip_tags($this->input->post('email_prefix'));
            // $email_domain= strip_tags($this->input->post('email_domain'));
            // $data['uni_emaildomain'] = $email_prefix.$email_domain;
             
            
            $data['password']= strip_tags(md5($this->input->post('password')));
            $data['usertype_id']= 3;
            

            date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');

        
            $this->form_validation->set_rules('name', 'name', 'trim|required');
            //$this->form_validation->set_rules('email_prefix', 'Email Prefix', 'trim|required');
           
            $this->form_validation->set_rules('password','password','trim|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
            
           // $mailcheck = $this->Teacher_model->mail_check($data['uni_emaildomain'],$data['usertype_id']);

           // if(count($mailcheck) > 0) {
           //          $this->session->set_flashdata('err_msg', 'Already Email Id exists'); 
           //      }else{

                        if($this->form_validation->run()== TRUE){
                                    
                       
                            $data_inserted = $this->Teacher_model->add_data($data);
                            $this->session->set_flashdata('success_msg', ' Added Successfully'); 
                            redirect('teacher');
                        }else {
                            $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                            //redirect('teacher/add');
                         }
                //}
            
        }
            $data['university_data'] = $this->Teacher_model->get_university();
            $this->template->set('title', 'Add Teacher');
            $this->template->set_layout('layout_main', 'front');
            $this->template->build('addteacher',$data);
        
    }
	
    public function edit($id){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            //print_r($_FILES);die;
           
            $data['name']= strip_tags($this->input->post('name'));
            $data['phone']= strip_tags($this->input->post('phone'));
            // $data['university']= strip_tags($this->input->post('university'));

            $data['email']= strip_tags($this->input->post('email')); 
            //$data['uni_emaildomain']= strip_tags($this->input->post('uni_emaildomain'));
            //print_r($data['uni_emaildomain']);die;
            
            $slug =  $data['name'];

            $data['slug_name'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-',$slug));
            $data['title']= strip_tags($this->input->post('title'));
            $data['gender']= strip_tags($this->input->post('gender'));
            $data['address1']= strip_tags($this->input->post('address1'));
            $data['address2']= strip_tags($this->input->post('address2'));
            $data['town']= strip_tags($this->input->post('town'));
            $data['county']= strip_tags($this->input->post('county'));
            $data['country']= strip_tags($this->input->post('country'));
            $data['postalcode']= strip_tags($this->input->post('postalcode'));
            $data['dateofbirth']= strip_tags($this->input->post('dateofbirth'));
            $data['travel']= strip_tags($this->input->post('travel'));
            $data['yourbio']= strip_tags($this->input->post('yourbio'));
            $data['experience']= strip_tags($this->input->post('experience'));
 
            $data['degree']= strip_tags($this->input->post('degree'));
            $data['language']= strip_tags($this->input->post('language'));
            

            $data['price']= strip_tags($this->input->post('price')); 
            $data['rating']= strip_tags($this->input->post('rating'));
            $data['total_reviews']= strip_tags($this->input->post('total_reviews'));
           
            $data['total_session']= strip_tags($this->input->post('total_session'));
            $data['class_timing']= strip_tags($this->input->post('class_timing'));
            $data['about']= strip_tags($this->input->post('about'));
            $data['session']= strip_tags($this->input->post('session'));

            $data['levels']= json_encode($this->input->post('levels'));
            $data['subjects']= json_encode($this->input->post('subjects'));
            $data['subject_offered']= json_encode($this->input->post('subject_offered'));

            $data['grade']= strip_tags($this->input->post('grade'));
            $data['in_person']= strip_tags($this->input->post('in_person'));
            $data['preferred_location']= strip_tags($this->input->post('preferred_location'));
             

            date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
            
            //  echo '<pre>';
            // print_r($data);die;
            
            $this->form_validation->set_rules('price', 'Price', 'trim|required');
            $this->form_validation->set_rules('rating', 'Rating', 'trim|required');
            $this->form_validation->set_rules('total_reviews', 'total_reviews', 'trim|required');
            $this->form_validation->set_rules('about', 'About', 'trim|required');
            $this->form_validation->set_rules('session', 'Session', 'trim|required');
            $this->form_validation->set_rules('subject_offered[]', 'Atleast one Subjects', 'trim|required');


            
                    if($this->form_validation->run() == TRUE){ 

                        $this->load->library('upload');
                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                            $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                            $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                            $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                            $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                            $config['upload_path']          = './uploads/teacher_image';

                            $config['allowed_types']        = 'png|jpg|jpeg';
                            $config['max_size']             = 100000;
                           
                            $this->upload->initialize($config);


                            if (! $this->upload->do_upload()) {
                             $error = array('error' => $this->upload->display_errors()); 
                            
                            } else {
                                
                                $final_files_data[] = $this->upload->data();
                                
                                 $data['image_src']= $final_files_data[0]['file_name'];
                                 
                            }
                        $data_inserted = $this->Teacher_model->edit_teacher($data,$id);
                       
                        $this->session->set_flashdata('success_msg', 'Teacher Edited Successfully'); 
                        redirect('teacher');
                    }else{
                         $this->session->set_flashdata('err_msg', 'Something Wrong! Please try again');
                         //redirect('teacher/edit');
                     }  
             }
        $this->template->set('title', 'Edit Teacher');
        $data_class['single_data'] = $this->Teacher_model->get_data_by_id($id);
        $data_class['subject_offered'] = $this->Teacher_model->get_subject_offered();

        $data_class['university_data'] = $this->Teacher_model->get_university();
        
        
        // echo '<pre>';
        //  print_r($data_class); die;
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editteacher',$data_class);

    }

    public function onlinelesson_inactive($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['online_lesson'] = '0';  // inactive
               $data_inserted = $this->Teacher_model->edit_teacher($data,$id);
               $this->session->set_flashdata('success_msg', 'Online Lesson edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }
    public function onlinelesson_active($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['online_lesson'] = '1';
               $data_inserted = $this->Teacher_model->edit_teacher($data,$id);
               $this->session->set_flashdata('success_msg', 'Online Lesson edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }
    public function qualified_inactive($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['qualified'] = '0';  // inactive
               $data_inserted = $this->Teacher_model->edit_teacher($data,$id);
               $this->session->set_flashdata('success_msg', 'Qualified edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }
    public function qualified_active($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['qualified'] = '1';
               $data_inserted = $this->Teacher_model->edit_teacher($data,$id);
               $this->session->set_flashdata('success_msg', 'Qualified edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }
	

    public function ajax_university(){
        $university_id = $this->input->post('university_id');
        //echo $university;die;
        $university_data = $this->Teacher_model->searching_uni_domainmail($university_id);
        foreach($university_data as $univer){
            echo '<option value ="'.$univer->email_domain.'">'.$univer->email_domain.'</option>';

        }
        exit();

    }
	
	public function delete_data($id){
        $this->Teacher_model->delete_row_data($id);
        redirect('teacher');
        
    }
	
	
	
	
	
	
}
?>