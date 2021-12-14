<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Homepageslider extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();     //common function for session checking.
        
        $this->load->library('form_validation');
        $this->load->model('Homepageslider_model');
    }
    //===================================================================
    public function index()
    {
        
      
        $data_get= $this->Homepageslider_model->get_slider_image();
        $data['slider']=$data_get;
        
        // echo '<pre>';
        // print_r($data_get);die;

        $site_name=$this->config->item('site_name');
       // echo'<pre>'; print_r($site_name);die;
        $this->template->set('title', 'Home Slider | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('homepageslider',$data);

    }
    
    
/*================================ Add===========================*/ 
    
public function addslider()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
       
            $data['image_caption'] = strip_tags($this->input->post('image_caption'));
            $data['image_caption2']= strip_tags($this->input->post('image_caption2'));
            $data['image_caption3']= strip_tags($this->input->post('image_caption3'));
            $data['link_bttn_name']= strip_tags($this->input->post('link_bttn_name'));
            $data['link_bttn_link']= strip_tags($this->input->post('link_bttn_link'));
            date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
            
            $this->form_validation->set_rules('image_caption', 'image_caption', 'trim|required');
            $this->form_validation->set_rules('image_caption2', 'image_caption2', 'trim|required');
            // $this->form_validation->set_rules('image_caption3', 'image_caption3', 'trim|required');
          
            if ($this->form_validation->run() == true) {
           
                    $this->load->library('upload');
                    // slide image
                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                        $config['upload_path']          = './uploads/slider_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                       
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_data[] = $this->upload->data();
                            
                             $data['image_src']= $final_files_data[0]['file_name'];
                        }
                        // extra image
                        // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src2']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src2']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src2']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src2']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src2']['size'];
                        $config['upload_path']          = './uploads/slider_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                       
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_data1[] = $this->upload->data();
                            
                             $data['image_src2']= $final_files_data1[0]['file_name'];
                        }
                    
                $data_inserted = $this->Homepageslider_model->add_slider_image($data);
                $this->session->set_flashdata('success_msg', 'Slider added Successfully'); 
                redirect('homepageslider');             
               
            } else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('homepageslider/addslider');
             }
        }
        
        
         $this->template->set('title', 'Add Home Slider');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addslider');
        
    }
    
/*================================ Edit ===========================*/   

public function editslider($id) {
       
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
       
            $data['image_caption']= strip_tags($this->input->post('image_caption'));
            $data['image_caption2']= strip_tags($this->input->post('image_caption2'));
            $data['image_caption3']= strip_tags($this->input->post('image_caption3'));
            $data['link_bttn_name']= strip_tags($this->input->post('link_bttn_name'));
            $data['link_bttn_link']= strip_tags($this->input->post('link_bttn_link'));
            date_default_timezone_set('Europe/London');
            $data['updated_on']=date('Y-m-d H:i:s');
           
             $this->form_validation->set_rules('image_caption', 'image_caption', 'trim|required');
             // $this->form_validation->set_rules('image_caption2', 'image_caption2', 'trim|required');
             // $this->form_validation->set_rules('image_caption3', 'image_caption3', 'trim|required');
          
            if ($this->form_validation->run() == true) {
            
                
                    $this->load->library('upload');
                    // slide image
                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                        $config['upload_path']          = 'uploads/slider_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_data[] = $this->upload->data();
                            
                             $data['image_src']= $final_files_data[0]['file_name'];
                             
                         }

                         //extra image
                       // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src2']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src2']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src2']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src2']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src2']['size'];
                        $config['upload_path']          = './uploads/slider_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                       
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_data1[] = $this->upload->data();
                            
                             $data['image_src2']= $final_files_data1[0]['file_name'];
                        }
                        
                    
                $data_inserted = $this->Homepageslider_model->edit_slider_image($data,$id);

                
                $this->session->set_flashdata('success_msg', 'Slider edited Successfully'); 
                redirect('homepageslider');             
               
            } else {
                
                
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');
                  
                redirect('homepageslider/editslider');
              
            }
        }
        
        
        $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Edit Home Slider | '.$site_name);
        $data['slider'] = $this->Homepageslider_model->get_slider_by_id($id); // fetch
        //$data['slider']=$data_single ;
        // echo '<pre>';
        // print_r($data); die;
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editslider',$data);
        
    }
    ############################## Status #####################################

     public function status_inactive($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';
               $data_inserted = $this->Homepageslider_model->edit_slider_image($data,$id);
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
               $data_inserted = $this->Homepageslider_model->edit_slider_image($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }

    
/*================================ Delete ===========================*/ 

    public function delete_data($id){
        $this->Homepageslider_model->delete_row_data($id);
        redirect('homepageslider');
        
    }
 
            
    
    
    
    
    
    
    
    
}
