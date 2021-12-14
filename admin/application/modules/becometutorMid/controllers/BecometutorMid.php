<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class BecometutorMid extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		$this->load->model('BecometutorMid_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index()
    {
		
       $data['alldata'] = $this->BecometutorMid_model->get_data();
        
         $this->template->set('title','becometutorMid');
        //$this->template->set('title', 'BecometutorMid | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('becometutorMid',$data);
    }
	
	public function add(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['heading']= strip_tags($this->input->post('heading'));
            $data['descrip']= strip_tags($this->input->post('descrip'));
			

			date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
           

            $this->form_validation->set_rules('heading', 'heading', 'trim|required');
            $this->form_validation->set_rules('descrip', 'descrip', 'trim|required');


            if($this->form_validation->run()== TRUE){
            			$this->load->library('upload');
            			$_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                        $config['upload_path']          = './uploads/pages_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                       
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_data[] = $this->upload->data();
                            
                             $data['image_src']= $final_files_data[0]['file_name'];
                        }
           
            	$data_inserted = $this->BecometutorMid_model->add_image($data);
	            $this->session->set_flashdata('success_msg', 'Becometutor added Successfully'); 
	            redirect('becometutorMid');
            }else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('becometutorMid/add');
             }
            
		}
	     	$this->template->set('title', 'Add BecometutorMid');
	        $this->template->set_layout('layout_main', 'front');
	        $this->template->build('addbecometutorMid',$data);
		
	}

	public function edit($id){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['heading']= strip_tags($this->input->post('heading'));
            $data['descrip']= strip_tags($this->input->post('descrip'));

			date_default_timezone_set('Europe/London');
            $data['updated_on']=date('Y-m-d H:i:s');
            

           $this->form_validation->set_rules('heading', 'heading', 'trim|required');
           $this->form_validation->set_rules('descrip', 'descrip', 'trim|required');

            if($this->form_validation->run() == TRUE){

            	 $this->load->library('upload');
                    // slide image
                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                        $config['upload_path']          = './uploads/pages_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_data[] = $this->upload->data();
                            
                             $data['image_src']= $final_files_data[0]['file_name'];
                             
                         }
            	$data_inserted = $this->BecometutorMid_model->edit_data($data,$id);
    			//echo '<pre>';
				// print_r($data_inserted); die;
	            $this->session->set_flashdata('success_msg', 'Becometutor Edited Successfully'); 
	            redirect('becometutorMid');
            }else {
                
                
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');
                redirect('becometutorMid/edit');
            }
            
		}
	    $this->template->set('title', 'Edit Becometutor');
		
		$data['single_data'] = $this->BecometutorMid_model->get_data_by_id($id);
		
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editbecometutorMid',$data);

		
	}

     // Becometutor status
    public function status_inactive($id) {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';
               $data_inserted = $this->BecometutorMid_model->edit_data($data,$id);
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
               $data_inserted = $this->BecometutorMid_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }

	
	public function delete_data($id){
        $this->BecometutorMid_model->delete_row_data($id);
        redirect('becometutorMid');
        
    }
	
	
	
	
	
	
	
}
