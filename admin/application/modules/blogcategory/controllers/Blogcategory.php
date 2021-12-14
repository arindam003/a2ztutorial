<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Blogcategory extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		$this->load->model('Blogcategory_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index()
    {
		
       $data['alldata'] = $this->Blogcategory_model->get_data();
       $data['user_type'] = $this->Blogcategory_model->get_user_type();
       //echo '<pre>';print_r($data);die;
         $this->template->set('title','Blog Category');
        //$this->template->set('title', 'Subjects | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('blog_category',$data);
    }
################## add ##########################	
	public function add(){
        $data_view['user_type'] = $this->Blogcategory_model->get_user_type();
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['user_type_id']= strip_tags($this->input->post('user_type_id'));
			$data['title']= strip_tags($this->input->post('title'));
            $slug= strip_tags($this->input->post('slug'));
            $data['slug']= strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug));
            
			date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
            
            $this->form_validation->set_rules('user_type_id', 'User Type', 'trim|required');
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('slug', 'Slug', 'trim|required');
           
          //echo '<pre>';print_r($data);die;
            if($this->form_validation->run()== TRUE){
            			
           
            	$data_inserted = $this->Blogcategory_model->add_data($data);
                

	            $this->session->set_flashdata('success_msg', ' Added Successfully'); 
	            redirect('blogcategory');
            }else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('blogcategory/add');
             }
            
		}
	     	$this->template->set('title', 'Add Blog Category ');
	        $this->template->set_layout('layout_main', 'front');
	        $this->template->build('addcategory',$data_view);
		
	}
########### edit ##########################
	public function edit($id){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['user_type_id']= strip_tags($this->input->post('user_type_id'));
			$data['title']= strip_tags($this->input->post('title'));
            $slug= strip_tags($this->input->post('slug'));

            $data['slug']= strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug));

            

			date_default_timezone_set('Europe/London');
            $data['updated_on']=date('Y-m-d H:i:s');
            
            $this->form_validation->set_rules('user_type_id', 'User Type', 'trim|required');
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('slug', 'Slug', 'trim|required');

            if($this->form_validation->run() == TRUE){

            	
            	$data_inserted = $this->Blogcategory_model->edit_data($data,$id);
    			//echo '<pre>';
				// print_r($data_inserted); die;
	            $this->session->set_flashdata('success_msg', ' Edited Successfully'); 
	            redirect('blogcategory');
            }else {
                
                
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');
                redirect('blogcategory/edit');
            }
            
		}
	    $this->template->set('title', 'Edit Blog Category');
		
		$data_view['single_data'] = $this->Blogcategory_model->get_data_by_id($id);
		$data_view['user_type'] = $this->Blogcategory_model->get_user_type();
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editcategory',$data_view);

		
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
