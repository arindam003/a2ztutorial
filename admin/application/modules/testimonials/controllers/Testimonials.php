<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Testimonials extends MX_Controller
{
    public function __construct()
    {
      parent::__construct();
      is_logged_in(); 	//common function for session checking.
		$this->load->model('Testimonials_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index(){
     
       $data['alldata'] = $this->Testimonials_model->get_data();
       // echo '<pre>'; 
       // print_r($data['alldata']); die;
        
        $this->template->set('title','Testimonials');
        //$this->template->set('title', 'Testimonials | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('testimonials',$data);
    }

    public function add(){
    if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['sender_id']= strip_tags($this->input->post('sender_id'));
           // $data['usertype']= strip_tags($this->input->post('usertype'));
            $data['teacher_id']= strip_tags($this->input->post('teacher_id'));
            $data['subjects_id']= strip_tags($this->input->post('subjects_id'));
            $data['levels_id']= strip_tags($this->input->post('levels_id'));
            $data['descrip']= strip_tags($this->input->post('descrip'));
            $data['review_date'] = strip_tags($this->input->post('review_date'));
            $data['rating']= strip_tags($this->input->post('rating'));

      

            date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');

             $data['added_by']='admin';
            

             $this->form_validation->set_rules('sender_id', 'sender_id', 'trim|required');
            // $this->form_validation->set_rules('descrip', 'descrip', 'trim|required');
            // $this->form_validation->set_rules('usertype', 'Usertype', 'trim|required');
            // $this->form_validation->set_rules('rating', 'rating', 'trim|required');
           

            if($this->form_validation->run()== TRUE){
                  // $this->load->library('upload');
                  // $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                  //       $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                  //       $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                  //       $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                  //       $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                  //       $config['upload_path']          = './uploads/testimonials_image';

                  //       $config['allowed_types']        = 'png|jpg|jpeg';
                  //       $config['max_size']             = 100000;
                       
                  //       $this->upload->initialize($config);


                  //       if (! $this->upload->do_upload()) {
                  //        $error = array('error' => $this->upload->display_errors()); 
                        
                  //       } else {
                           
                  //           $final_files_data[] = $this->upload->data();
                            
                  //            $data['image_src']= $final_files_data[0]['file_name'];

                  //       }
              //print_r($data); die;
              $data_inserted = $this->Testimonials_model->add_data($data);

              // echo '<pre>';
              // print_r($data_inserted);die;

              $this->session->set_flashdata('success_msg', 'Testimonials added Successfully'); 
              redirect('testimonials');
            }else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('testimonials/add');
             }
            
    }


            $data['usertype_data'] = $this->Testimonials_model->get_usertype();
            $data['teacher_data'] = $this->Testimonials_model->get_teacher();
            $data['subject_data'] = $this->Testimonials_model->get_subject();
            $data['level_data'] = $this->Testimonials_model->get_level();

          $this->template->set('title', 'Add Testimonials');
          $this->template->set_layout('layout_main', 'front');
          $this->template->build('addtestimonials',$data);
    
  }

  public function edit($id){
   if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $data['sender_id']= strip_tags($this->input->post('sender_id'));
            //$data['usertype']= strip_tags($this->input->post('usertype'));
            $data['teacher_id']= strip_tags($this->input->post('teacher_id'));
            $data['subjects_id']= strip_tags($this->input->post('subjects_id'));
            $data['levels_id']= strip_tags($this->input->post('levels_id'));
            $data['descrip']= strip_tags($this->input->post('descrip'));
            $data['review_date'] = strip_tags($this->input->post('review_date'));
            $data['rating']= strip_tags($this->input->post('rating'));

            date_default_timezone_set('Europe/London');
            $data['updated_on']=date('Y-m-d H:i:s');

            $data['updated_by']='admin';
               //  echo '<pre>';
               // print_r($data); die;
           $this->form_validation->set_rules('sender_id', 'sender_id', 'trim|required');
           

            

              // $this->load->library('upload');
              //       // slide image
              //       // Faking upload calls to $_FILE
              //           $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
              //           $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
              //           $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
              //           $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
              //           $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
              //           $config['upload_path']          = './uploads/testimonials_image';

              //           $config['allowed_types']        = 'png|jpg|jpeg';
              //           $config['max_size']             = 100000;
                        
              //           $this->upload->initialize($config);


              //           if (! $this->upload->do_upload()) {
              //            $error = array('error' => $this->upload->display_errors()); 
                        
              //           } else {
                            
              //               $final_files_data[] = $this->upload->data();
                            
              //                $data['image_src']= $final_files_data[0]['file_name'];
                             
              //            }
            if($this->form_validation->run() == TRUE){
             $data_inserted = $this->Testimonials_model->edit_data($data,$id);
               
              $this->session->set_flashdata('success_msg', 'Testimonials Edited Successfully'); 
              redirect('testimonials');
            }else {
                
                
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');
                redirect('testimonials/edit');
            }
            
   }


        $data['usertype_data'] = $this->Testimonials_model->get_usertype(); //type
        $data['teacher_data'] = $this->Testimonials_model->get_teacher();  /// all signup
        $data['subject_data'] = $this->Testimonials_model->get_subject(); // subject
        $data['level_data'] = $this->Testimonials_model->get_level();

        $this->template->set('title', 'Edit Testimonials');
        $data['single_data'] = $this->Testimonials_model->view_testimonials($id);
         //echo '<pre>';print_r($data['single_data']);die;
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('edittestimonials',$data);

    
  }


  // Testimonials status **

    public function status_inactive($id) {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';
               $data_inserted = $this->Testimonials_model->edit_data($data,$id);
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
               $data_inserted = $this->Testimonials_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }

    
//view testimonials techer 

  public function view($test_id){
    //echo $test_id;die;
    $data['testimonials_teacher'] = $this->Testimonials_model->teacher_testimonials();
    $data['testimonials_view'] = $this->Testimonials_model->view_testimonials($test_id);
    // echo '<pre>';
    // print_r($data);die;

    $this->template->set('title','Testimonials');
    $this->template->set('title', 'Testimonials | '.$this->config->item('site_name'));
    $this->template->set_layout('layout_main', 'front');
    $this->template->build('viewtestimonials',$data);

 }
  // usertype
    public function ajax_usertypedata(){

        $usertype_id = $this->input->post('usertype_id');

         $testimonials = $this->Testimonials_model->searching_testimonialsname($usertype_id);
        echo "<option>---Select Name---</option>";
         foreach ($testimonials as $testimon) {

            //print_r($testimon); die;
              echo 
              '<option value= "'.$testimon->id.'"> '.$testimon->name.'</option>'.'<br>';
             


         }


         exit();
    }

 ###### user image show with ajax ################   
public function ajax_userimage(){

        $userid = $this->input->post('userid');
         //echo $userid;die;
         $userdata = $this->Testimonials_model->getUserImage($userid);
        //echo '<pre>';print_r($userdata);die;
         foreach ($userdata as $user) {

            if($user->usertype_id=='1'){
            	 if($user->googlelogin_id==TRUE){
                       echo '<img src="'.$user->image_src.'">';
            	 }else{
            	 if($user->image_src==''){
            	 	echo '<img height=100 width=150 src="'.base_url().'uploads/student_image/Noimage.jpg">';
            	 }else{
                  echo '<img height=100 width=150 src="'.base_url().'uploads/student_image/'.$user->image_src.'">';
                 }
              }
            }
            if($user->usertype_id=='2'){
            	if($user->googlelogin_id==TRUE){
                       echo '<img src="'.$user->image_src.'">';
            	 }else{
            	if($user->image_src==''){
                   echo '<img height=100 width=150 src="'.base_url().'uploads/parent_image/Noimage.jpg">';
            	}else{
                  echo '<img src="'.base_url().'uploads/parent_image/'.$user->image_src.'">';
                }
            	}
                }
            	
            }
             // echo '<option value= "'.$testimon->id.'"> '.$testimon->name.'</option>'.'<br>';
             
           exit();  

         }


         
    
// subject wise teacher

    public function ajax_subjectdata(){

        $subjects_id = $this->input->post('subjects_id');

         $subjectwiseteacher = $this->Testimonials_model->searching_subjectwiseteacher($subjects_id);

        foreach ($subjectwiseteacher as $teacher) {

            // print_r($teacher); die;
              echo 
              '<option value= "'.$teacher->id.'"> '.$teacher->name.'</option>'.'<br>';


         }


         exit();
    }





  

    
  
  public function delete_data($id){
        $this->Testimonials_model->delete_row_data($id);
        redirect('testimonials');
        
    }
  
	
	
	
	
	
	
	
	
}
?>
