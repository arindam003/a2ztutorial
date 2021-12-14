<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Blog extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		$this->load->model('Blog_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index()
    {
		
       $data['alldata'] = $this->Blog_model->get_data();
       $data['usertype_data'] = $this->Blog_model->get_usertype(); 
       $data['category_data'] = $this->Blog_model->get_blog_category();
        $this->template->set('title','blog');
        //$this->template->set('title', 'BecometutorMid | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('blog',$data);
    }
	
	public function add(){
        $data_view['usertype_data'] = $this->Blog_model->get_usertype();
		if($this->input->server('REQUEST_METHOD') == 'POST'){
			
			
            			$this->load->library('upload');
            			$_FILES['userfile']['name']     = $_FILES['blog_image_src_1']['name'];
                        $_FILES['userfile']['type']     = $_FILES['blog_image_src_1']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['blog_image_src_1']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['blog_image_src_1']['error'];
                        $_FILES['userfile']['size']     = $_FILES['blog_image_src_1']['size'];
                        $config['upload_path']          = './uploads/blog_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                       
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_data[] = $this->upload->data();
                            
                             $data['blog_image_src_1']= $final_files_data[0]['file_name'];
                        }

                        $this->load->library('upload');
            			      $_FILES['userfile']['name']     = $_FILES['blog_image_src_2']['name'];
                        $_FILES['userfile']['type']     = $_FILES['blog_image_src_2']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['blog_image_src_2']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['blog_image_src_2']['error'];
                        $_FILES['userfile']['size']     = $_FILES['blog_image_src_2']['size'];
                        $config['upload_path']          = './uploads/blog_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                       
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_data2[] = $this->upload->data();
                            
                             $data['blog_image_src_2']= $final_files_data2[0]['file_name'];
                        }
                $data['user_type_id']= strip_tags($this->input->post('user_type_id'));
                $data['blog_cat_id']= strip_tags($this->input->post('blog_cat_id'));
                $data['blog_title']= strip_tags($this->input->post('blog_title'));
                $slug = strip_tags($this->input->post('blog_slug'));
                $data['blog_slug']= strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-',$slug));
                $data['heading_1']= strip_tags($this->input->post('heading_1'));
                $data['heading_2']= strip_tags($this->input->post('heading_2'));
                $data['heading_3']= strip_tags($this->input->post('heading_3'));
                $data['heading_4']= strip_tags($this->input->post('heading_4'));
                $data['description_1']= strip_tags($this->input->post('description_1'));
                $data['description_2']= strip_tags($this->input->post('description_2'));
                $data['description_3']= strip_tags($this->input->post('description_3'));
                $data['description_4']= strip_tags($this->input->post('description_4'));
			    $data['description_4']= strip_tags($this->input->post('description_4'));
                $data['related_blog']= json_encode($this->input->post('related_blog'));
                $data['meta_title']= strip_tags($this->input->post('meta_title'));
                $data['meta_keyword']= strip_tags($this->input->post('meta_keyword'));
                $data['meta_descrip']= strip_tags($this->input->post('meta_descrip'));
                $data['canonical_tag']= strip_tags($this->input->post('canonical_tag'));
                $data['robot_index']= strip_tags($this->input->post('robot_index'));
                $data['follow']= strip_tags($this->input->post('follow'));
			    date_default_timezone_set('Europe/London');
                $data['added_on']=date('Y-m-d H:i:s');
           //echo '<pre>';print_r($data);die;
             $this->form_validation->set_rules('user_type_id', 'User Type', 'trim|required');
            $this->form_validation->set_rules('blog_title', 'Title', 'trim|required');
            $this->form_validation->set_rules('blog_slug', 'Slug', 'trim|required');
            if($this->form_validation->run()== TRUE){
            	$data_inserted = $this->Blog_model->add_data($data);
	            $this->session->set_flashdata('success_msg', 'Blog added Successfully'); 
	            redirect('blog');
            }else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('blog/add');
             }
            
		}
	     	$this->template->set('title', 'Add Blog');
	        $this->template->set_layout('layout_main', 'front');
	        $this->template->build('addblog',$data_view);
		
	}

	public function edit($id){
		
		 $data_view['single_data'] = $this->Blog_model->get_data_by_id($id);
		 $blog_id = $data_view['single_data'][0]->id;
		 $user_type = $data_view['single_data'][0]->user_type_id;
		 $category_id = $data_view['single_data'][0]->blog_cat_id;
		$data_view['usertype_data'] = $this->Blog_model->get_usertype();
		$data_view['category_data'] = $this->Blog_model->get_userTypeblog_category($user_type);
		$data_view['blog_data'] = $this->Blog_model->get_related_blog($category_id,$id);
		//echo '<pre>';print_r($data_view['blog_data']);die;
		if ($this->input->server('REQUEST_METHOD') == 'POST'){

            $this->load->library('upload');


                  // slide image
                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['blog_image_src_1']['name'];
                        $_FILES['userfile']['type']     = $_FILES['blog_image_src_1']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['blog_image_src_1']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['blog_image_src_1']['error'];
                        $_FILES['userfile']['size']     = $_FILES['blog_image_src_1']['size'];
                        $config['upload_path']          = './uploads/blog_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_data2[] = $this->upload->data();
                            
                             $data['blog_image_src_1']= $final_files_data2[0]['file_name'];
                             
                         }
                   
                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['blog_image_src_2']['name'];
                        $_FILES['userfile']['type']     = $_FILES['blog_image_src_2']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['blog_image_src_2']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['blog_image_src_2']['error'];
                        $_FILES['userfile']['size']     = $_FILES['blog_image_src_2']['size'];
                        $config['upload_path']          = './uploads/blog_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_data2[] = $this->upload->data();
                            
                             $data['blog_image_src_2']= $final_files_data2[0]['file_name'];
                             
                         }

			          $data['user_type_id']= strip_tags($this->input->post('user_type_id'));
                $data['blog_cat_id']= strip_tags($this->input->post('blog_cat_id'));
                $data['blog_title']= strip_tags($this->input->post('blog_title'));
                $slug = strip_tags($this->input->post('blog_slug'));
                $data['blog_slug']= strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-',$slug));
                $data['heading_1']= strip_tags($this->input->post('heading_1'));
                $data['heading_2']= strip_tags($this->input->post('heading_2'));
                $data['heading_3']= strip_tags($this->input->post('heading_3'));
                $data['heading_4']= strip_tags($this->input->post('heading_4'));
                $data['description_1']= strip_tags($this->input->post('description_1'));
                $data['description_2']= strip_tags($this->input->post('description_2'));
                $data['description_3']= strip_tags($this->input->post('description_3'));
                $data['description_4']= strip_tags($this->input->post('description_4'));
			          $data['description_4']= strip_tags($this->input->post('description_4'));
                $data['related_blog']= json_encode($this->input->post('related_blog'));
                $data['meta_title']= strip_tags($this->input->post('meta_title'));
                $data['meta_keyword']= strip_tags($this->input->post('meta_keyword'));
                $data['meta_descrip']= strip_tags($this->input->post('meta_descrip'));
                $data['canonical_tag']= strip_tags($this->input->post('canonical_tag'));
                $data['robot_index']= strip_tags($this->input->post('robot_index'));
                $data['follow']= strip_tags($this->input->post('follow'));

			date_default_timezone_set('Europe/London');
            $data['updated_on']=date('Y-m-d H:i:s');
            

            $this->form_validation->set_rules('user_type_id', 'User Type', 'trim|required');
            $this->form_validation->set_rules('blog_title', 'Title', 'trim|required');
            $this->form_validation->set_rules('blog_slug', 'Slug', 'trim|required');

            if($this->form_validation->run() == TRUE){

            	 
            	$data_inserted = $this->Blog_model->edit_data($data,$id);
    			//echo '<pre>';
				// print_r($data_inserted); die;
	            $this->session->set_flashdata('success_msg', 'Becometutor Edited Successfully'); 
	            redirect('blog');
            }else {
                
                
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');
                redirect('blog/edit');
            }
            
		}
	    $this->template->set('title', 'Edit Blog');
		$this->template->set_layout('layout_main', 'front');
        $this->template->build('editblog',$data_view);

		
	}

     // blog status
    public function status_inactive($id) {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';
               $data_inserted = $this->Blog_model->edit_data($data,$id);
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
               $data_inserted = $this->Blog_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }

public function featured_inactive($id) {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['featured'] = '0';
               $data_inserted = $this->Blog_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }

    public function featured_active($id) {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['featured'] = '1';
               $data_inserted = $this->Blog_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }
  
	
	public function delete_data($id){
        $this->Blog_model->delete_row_data($id);
        redirect('blog');
        
    }
	
	public function ajax_blog_cat_data(){

        $usertype_id = $this->input->post('usertype_id');
 //echo $usertype_id; die;
         $cat_name = $this->Blog_model->get_cat_usertype_wise($usertype_id);
echo '<option>----Select Category----</option>';
         foreach ($cat_name as $cat) {

            //print_r($cat); die;
               echo  '<option value="'.$cat->id.'">'.$cat->title.'</option>';


         }


         exit();
    }
	
  public function ajax_blog_data(){

        $catid = $this->input->post('catid');

         $blog_name = $this->Blog_model->get_blog_cat_wise($catid);
         
         foreach ($blog_name as $blog) {

            //echo "<pre>";print_r($blog); die;
              echo '<input class="form-check-input" type="checkbox" value="'.$blog->id.'" name="related_blog[]">
                    <label class="form-check-label" for="flexCheckDefault">'.$blog->blog_title.
                   '</label>'.'&nbsp;&nbsp;|&nbsp;&nbsp;';


         }


         exit();
    }  
	
	public function edit_ajax_blog_data(){

        $catid = $this->input->post('catid');
        $id = $this->input->post('id');
         $blog_name = $this->Blog_model->edit_get_blog_cat_wise($catid,$id);

         foreach ($blog_name as $blog) {

            //print_r($cat); die;
              echo '<input class="form-check-input" type="checkbox" value="'.$blog->id.'" name="related_blog[]">
                    <label class="form-check-label" for="flexCheckDefault">'.$blog->blog_title.
                   '</label>'.'&nbsp;&nbsp;|&nbsp;&nbsp;';


         }


         exit();
    }
	
	
}
