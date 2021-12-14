<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Featured extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		$this->load->model('Featured_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index()
    {
		
       $data['alldata'] = $this->Featured_model->get_data();
        
        $this->template->set('title','Featured');
        //$this->template->set('title', 'Faq | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('featured',$data);
    }
	
	public function addfeatured(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['heading']= strip_tags($this->input->post('heading'));
			

			date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
            

            $this->form_validation->set_rules('heading', 'heading', 'trim|required');
           

            if($this->form_validation->run()== TRUE){
            			$this->load->library('upload');
            			$_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                        $config['upload_path']          = './uploads/featured_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                       
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_data[] = $this->upload->data();
                            
                             $data['image_src']= $final_files_data[0]['file_name'];
                        }
           
            	$data_inserted = $this->Featured_model->add_featured_image($data);
	            $this->session->set_flashdata('success_msg', 'Featured added Successfully'); 
	            redirect('featured');
            }else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('featured/addfeatured');
             }
            
		}
	     	$this->template->set('title', 'Add Featured');
	        $this->template->set_layout('layout_main', 'front');
	        $this->template->build('addfeatured',$data);
		
	}

	public function editfeatured($id){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['heading']= strip_tags($this->input->post('heading'));

			date_default_timezone_set('Europe/London');
            $data['updated_on']=date('Y-m-d H:i:s');
            

           $this->form_validation->set_rules('heading', 'heading', 'trim|required');

            if($this->form_validation->run() == TRUE){

            	 $this->load->library('upload');
                    //  image
                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                        $config['upload_path']          = './uploads/featured_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_data[] = $this->upload->data();
                            
                             $data['image_src']= $final_files_data[0]['file_name'];
                             
                         }
            	$data_inserted = $this->Featured_model->edit_featured($data,$id);
    			//echo '<pre>';
				// print_r($data_inserted); die;
	            $this->session->set_flashdata('success_msg', 'Featured Edited Successfully'); 
	            redirect('featured');
            }else {
                
                
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');
                redirect('featured/editfeatured');
            }
            
		}
	    $this->template->set('title', 'Edit Featured');
		
		$data['single_data'] = $this->Featured_model->get_data_by_id($id);
		
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editfeatured',$data);

		
	}

    // featured status
    public function status_inactive($id) {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';
               $data_inserted = $this->Featured_model->edit_featured($data,$id);
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
               $data_inserted = $this->Featured_model->edit_featured($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }

	
	public function delete_data($id){
        $this->Featured_model->delete_row_data($id);
        redirect('featured');
        
    }
	
	
	
	
	
	
	
}
