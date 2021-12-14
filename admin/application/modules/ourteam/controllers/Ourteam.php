<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Ourteam extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		$this->load->model('Ourteam_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index()
    {
		
       $data['alldata'] = $this->Ourteam_model->get_data();
        
         $this->template->set('title','Ourteam');
        //$this->template->set('title', 'Faq | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('ourteam',$data);
    }
	
	public function add(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['name']= strip_tags($this->input->post('name'));
            $data['designation']= strip_tags($this->input->post('designation'));
            $data['address']= strip_tags($this->input->post('address'));
			$data['descrip']= strip_tags($this->input->post('descrip'));

			date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
        
            $this->form_validation->set_rules('name', 'name', 'trim|required');
            $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('descrip', 'descrip', 'trim|required');
           

            if($this->form_validation->run()== TRUE){
            			$this->load->library('upload');
            			$_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                        $config['upload_path']          = './uploads/ourteam_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                       
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_data[] = $this->upload->data();
                            
                             $data['image_src']= $final_files_data[0]['file_name'];
                        }
           
            	$data_inserted = $this->Ourteam_model->add_ourteam($data);
	            $this->session->set_flashdata('success_msg', 'Ourteam added Successfully'); 
	            redirect('ourteam');
            }else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('ourteam/add');
             }
            
		}
	     	$this->template->set('title', 'Add Ourteam');
	        $this->template->set_layout('layout_main', 'front');
	        $this->template->build('addourteam',$data);
		
	}

	public function edit($id){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['name']= strip_tags($this->input->post('name'));
            $data['designation']= strip_tags($this->input->post('designation'));
            $data['address']= strip_tags($this->input->post('address'));
            $data['descrip']= strip_tags($this->input->post('descrip'));

			date_default_timezone_set('Europe/London');
            $data['updated_on']=date('Y-m-d H:i:s');
           

           $this->form_validation->set_rules('name', 'name', 'trim|required');
           $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
           $this->form_validation->set_rules('address', 'Address', 'trim|required');
           $this->form_validation->set_rules('descrip', 'descrip', 'trim|required');

                // echo '<pre>';
                // print_r($data); die;
            if($this->form_validation->run() == TRUE){

            	 $this->load->library('upload');
                    // slide image
                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                        $config['upload_path']          = './uploads/ourteam_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_data[] = $this->upload->data();
                            
                             $data['image_src']= $final_files_data[0]['file_name'];
                             
                         }
            	$data_inserted = $this->Ourteam_model->edit_data($data,$id);
                // echo '<pre>';
				// print_r($data_inserted); die;
	            $this->session->set_flashdata('success_msg', 'Ourteam Edited Successfully'); 
	            redirect('ourteam');
            }else {
                
                
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');
                redirect('ourteam/edit');
            }
            
		}
	    $this->template->set('title', 'Edit Ourteam');
		
		$data['single_data'] = $this->Ourteam_model->get_data_by_id($id);
		// echo '<pre>';
  //       print_r($data); die;
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editourteam',$data);

		
	}

     // ourteam status
    public function status_inactive($id) {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';
               $data_inserted = $this->Ourteam_model->edit_data($data,$id);
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
               $data_inserted = $this->Ourteam_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }

	
	public function delete_data($id){
        $this->Ourteam_model->delete_row_data($id);
        redirect('ourteam');
        
    }
	
	
	
	
	
	
	
}
