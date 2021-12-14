<?php 
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Pages extends MX_Controller{
	public function __construct(){

		parent::__construct();
        is_logged_in(); 
        $this->load->library('form_validation');
		$this->load->model('Pages_model');
	}

	public function index(){

	 	$data['alldata'] = $this->Pages_model->get_data();

	 	$this->template->set('title', 'Pages | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('pages',$data);
	}

	public function addpages(){
	 	if ($this->input->server('REQUEST_METHOD') == 'POST'){

	 		$data['title']= strip_tags($this->input->post('title'));
			$data['descrip']= strip_tags($this->input->post('descrip'));
			$data['heading_title']= strip_tags($this->input->post('heading_title'));
            $data['page_slug']= strip_tags($this->input->post('page_slug'));

			$data['heading2'] = strip_tags($this->input->post('heading2'));
			$data['descrip2'] = strip_tags($this->input->post('descrip2'));

			$data['heading3'] = strip_tags($this->input->post('heading3'));
			$data['descrip3'] = strip_tags($this->input->post('descrip3'));

			$data['heading4'] = strip_tags($this->input->post('heading4'));
			$data['descrip4'] = strip_tags($this->input->post('descrip4'));

            $data['heading5'] = strip_tags($this->input->post('heading5'));
            $data['descrip5'] = strip_tags($this->input->post('descrip5'));

			
			$data['extra_title']= strip_tags($this->input->post('extra_title'));
			$data['extra_descrip']= strip_tags($this->input->post('extra_descrip'));
			
			$data['meta_title']= strip_tags($this->input->post('meta_title'));
			$data['meta_keyword']= strip_tags($this->input->post('meta_keyword'));
			$data['meta_descrip']= strip_tags($this->input->post('meta_descrip'));
			
			$data['canonical_tag']= strip_tags($this->input->post('canonical_tag'));
			$data['robot_index']= strip_tags($this->input->post('robot_index'));
			$data['robotindex']= strip_tags($this->input->post('robotindex'));

			date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
            

	
            $this->form_validation->set_rules('title', 'title', 'trim|required');
            $this->form_validation->set_rules('page_slug', 'Page Slug', 'trim|required');

             if ($this->form_validation->run() == true) {
           
                    	$this->load->library('upload');
                   		// image 1 //

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

                   // image 2 //
                    	// Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src2']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src2']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src2']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src2']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src2']['size'];
                        $config['upload_path']          = './uploads/pages_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
						
                        } else {
							
                            $final_files_data2[] = $this->upload->data();
							
							 $data['image_src2']= $final_files_data2[0]['file_name'];
							 //  echo '<pre>';
							 // print_r($data); 
							 //  echo '<pre>'; die;
                          }

                          // image 3 //

                    	// Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src3']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src3']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src3']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src3']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src3']['size'];
                        $config['upload_path']          = './uploads/pages_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
						
                        } else {
							
                            $final_files_data3[] = $this->upload->data();
							
							 $data['image_src3']= $final_files_data3[0]['file_name'];
							
                          }

                          // image 4 //

                    	// Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src4']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src4']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src4']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src4']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src4']['size'];
                        $config['upload_path']          = './uploads/pages_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
						
                        } else {
							
                            $final_files_data4[] = $this->upload->data();
							
							 $data['image_src4']= $final_files_data4[0]['file_name'];

							 // echo '<pre>';
							 // print_r($data); 
							 // echo '<pre>'; die;
							
                          }

                          // image 5 //

                        // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src5']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src5']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src5']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src5']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src5']['size'];
                        $config['upload_path']          = './uploads/pages_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_data5[] = $this->upload->data();
                            
                             $data['image_src5']= $final_files_data5[0]['file_name'];

                             // echo '<pre>';
                             // print_r($data); 
                             // echo '<pre>'; die;
                            
                          }



                    
                $data_inserted = $this->Pages_model->add_pages_image($data);
                //print_r($data_inserted); die;
                $this->session->set_flashdata('success_msg', 'Pages added Successfully'); 
                redirect('pages');				
               
            } else {
				
				
				$this->session->set_flashdata('err_msg', 'Fill All The Fields');  
				redirect('pages/addpages');
              
            }




	 	}// method 
	 
	     	$this->template->set('title', 'Add Pages');
	        $this->template->set_layout('layout_main', 'front');
	        $this->template->build('addpages');
	

	 } // index func


	 


	 public function editpages($id) {
	 	
		
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
       
	        $data['title']= strip_tags($this->input->post('title'));
			$data['descrip']= strip_tags($this->input->post('descrip'));
			$data['heading_title']= strip_tags($this->input->post('heading_title'));
            $data['page_slug']= strip_tags($this->input->post('page_slug'));

			$data['heading2'] = strip_tags($this->input->post('heading2'));
			$data['descrip2'] = strip_tags($this->input->post('descrip2'));

			$data['heading3'] = strip_tags($this->input->post('heading3'));
			$data['descrip3'] = strip_tags($this->input->post('descrip3'));

			$data['heading4'] = strip_tags($this->input->post('heading4'));
			$data['descrip4'] = strip_tags($this->input->post('descrip4'));

            $data['heading5'] = strip_tags($this->input->post('heading5'));
            $data['descrip5'] = strip_tags($this->input->post('descrip5'));

			
			$data['extra_title']= strip_tags($this->input->post('extra_title'));
			$data['extra_descrip']= strip_tags($this->input->post('extra_descrip'));
			
			$data['meta_title']= strip_tags($this->input->post('meta_title'));
			$data['meta_keyword']= strip_tags($this->input->post('meta_keyword'));
			$data['meta_descrip']= strip_tags($this->input->post('meta_descrip'));
			
			$data['canonical_tag']= strip_tags($this->input->post('canonical_tag'));
			$data['robot_index']= strip_tags($this->input->post('robot_index'));
			$data['robotindex']= strip_tags($this->input->post('robotindex'));

			$this->form_validation->set_rules('title','title','trim|required');
            $this->form_validation->set_rules('page_slug', 'Page Slug', 'trim|required');
		    

			date_default_timezone_set('Europe/London');
            $data['updated_on']=date('Y-m-d H:i:s');
           
            
           
           
          
            if ($this->form_validation->run() == true) {
           
                
                    $this->load->library('upload');
                   

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
						
						  $data_inserted = $this->Pages_model->edit_data_image($data,$id); 			
				
                        } else {
							
                            $final_files_data[] = $this->upload->data();
							
							$data['image_src']= $final_files_data[0]['file_name'];
                            
                        }

                       
                        // image 2 //
                        
                    	// Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src2']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src2']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src2']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src2']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src2']['size'];
                        $config['upload_path']          = './uploads/pages_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
						
                        } else {
							
                            $final_files_data2[] = $this->upload->data();
							
							 $data['image_src2']= $final_files_data2[0]['file_name'];
                            

							
                          }

                          // image 3 //
                       
                    	// Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src3']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src3']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src3']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src3']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src3']['size'];
                        $config['upload_path']          = './uploads/pages_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
						
                        } else {
							
                            $final_files_data3[] = $this->upload->data();
							
							 $data['image_src3']= $final_files_data3[0]['file_name'];
                            
                          }

                          // image 4 //
                          
                    	// Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src4']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src4']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src4']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src4']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src4']['size'];
                        $config['upload_path']          = './uploads/pages_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
						
                        } else {
							
                            $final_files_data4[] = $this->upload->data();
							
							 $data['image_src4']= $final_files_data4[0]['file_name'];
                             
                           }

                           // image 5 //

                        // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src5']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src5']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src5']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src5']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src5']['size'];
                        $config['upload_path']          = './uploads/pages_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_data5[] = $this->upload->data();
                            
                             $data['image_src5']= $final_files_data5[0]['file_name'];

                             // echo '<pre>';
                             // print_r($data); 
                             // echo '<pre>'; die;
                            
                          }








                    
                $data_inserted = $this->Pages_model->edit_data_image($data,$id);

                  // echo '<pre>';
                  // print_r($data_inserted); 
                  // echo '<pre>'; die;
                $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
                redirect('pages');				
               
            } else {
				
				$this->session->set_flashdata('err_msg', 'Fill All The Fields');  
				$this->template->set('title', 'Edit Pages | '.$this->config->item('site_name'));
				
				$data['single_data'] = $this->Pages_model->get_data_by_id($id);
				
				$this->template->set_layout('layout_main', 'front');
				$this->template->build('editpages',$data);
              
            }
		}
		
		
	    $this->template->set('title', 'Edit Pages | '.$this->config->item('site_name'));
		
		$data_single = $this->Pages_model->get_data_by_id($id);
		$data['single_data']=$data_single ;
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editpages',$data);
		
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
               $data_inserted = $this->Pages_model->edit_data_image($data,$id);
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
               $data_inserted = $this->Pages_model->edit_data_image($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }


    public function delete_data($id){
        $this->Pages_model->delete_row_data($id);
        redirect('pages');
        
    }


}

?>