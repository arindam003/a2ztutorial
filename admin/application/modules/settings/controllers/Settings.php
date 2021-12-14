<?php if (! defined('BASEPATH')) {

exit('No direct script access allowed');

}

class settings extends MX_Controller{

  public function __construct(){
    parent::__construct();
      is_logged_in(); //common function for session checking.
      $this->load->library('form_validation');
      $this->load->model('Settings_model');
    }
  public function index(){
    $data['all_data']=$this->Settings_model->get_data();

    $this->template->set('title','Settings  | '.$this->config->item('site_name'));
    $this->template->set_layout('layout_main', 'front');
    $this->template->build('settings',$data);
  }

  public function edit($id){
    if($this->uri->segment(3) ==""){
      $this->session->set_flashdata('err_msg','Dont Change the URL physically');
      redirect('settings');
    }
    if($this->input->server('REQUEST_METHOD') == 'POST'){
      $data['email'] = strip_tags($this->input->post('email'));
      $data['phone_no_1']= strip_tags($this->input->post('phone_no_1'));
      $data['phone_no_2']= strip_tags($this->input->post('phone_no_2'));
      $data['phone_no_3']= strip_tags($this->input->post('phone_no_3'));
      $data['address']= strip_tags($this->input->post('address'));
      $data['facebook']= strip_tags($this->input->post('facebook'));
      $data['instagram']= strip_tags($this->input->post('instagram'));
      $data['twitter']= strip_tags($this->input->post('twitter'));
      $data['linkedin']= strip_tags($this->input->post('linkedin'));
      $data['youtube']= strip_tags($this->input->post('youtube'));
      $data['g_plus']= strip_tags($this->input->post('g_plus'));
      $data['q_head_1']= strip_tags($this->input->post('q_head_1'));
      $data['q_head_2']= strip_tags($this->input->post('q_head_2'));

      $this->form_validation->set_rules('email','EmailID', 'trim|required');
      $this->form_validation->set_rules('phone_no_1', 'Phone', 'trim|required');
      // $this->form_validation->set_rules('phone_no_2', 'Phone', 'trim|required');
      // $this->form_validation->set_rules('phone_no_3', 'Phone', 'trim|required');
      $this->form_validation->set_rules('address', 'Address', 'trim|required');
      // $this->form_validation->set_rules('facebook', 'Facebook', 'trim|required');
      // $this->form_validation->set_rules('twitter', 'Twitter', 'trim|required');
      // $this->form_validation->set_rules('linkedin', 'Linkedin', 'trim|required');
      // $this->form_validation->set_rules('youtube', 'Youtube', 'trim|required');
      // $this->form_validation->set_rules('g_plus', 'G_plus', 'trim|required');
      // $this->form_validation->set_rules('q_head_1', 'Heading', 'trim|required');
      // $this->form_validation->set_rules('q_head_2', 'Heading', 'trim|required');
      // $this->form_validation->set_rules('logo', 'logo', 'trim|required');
      // $this->form_validation->set_rules('fav_icon','Fav_icon', 'trim|required');

      $this->load->library('upload');

      //  upload Logo Image calls to $_FILE

      $_FILES['userfile']['name']     = $_FILES['logo']['name'];

                    $_FILES['userfile']['type']     = $_FILES['logo']['type'];

                    $_FILES['userfile']['tmp_name'] = $_FILES['logo']['tmp_name'];

                    $_FILES['userfile']['error']    = $_FILES['logo']['error'];

                    $_FILES['userfile']['size']     = $_FILES['logo']['size'];

                    $config['upload_path']          = './uploads/settings_image';
                    $config['allowed_types']        = 'png|jpg|jpeg';

                   

                    $this->upload->initialize($config);

                   if (! $this->upload->do_upload()) {

                     $error = array('error' => $this->upload->display_errors()); 
                    } 
                    else {
                        $final_files_data[] = $this->upload->data();
                        $data['logo']= $final_files_data[0]['file_name'];
                        @unlink("./uploads/settings_image/".$this->input->post('prev_link_image_1')."");
                     }

                //  upload 2nd Image calls to $_FILE

                    $_FILES['userfile']['name']     = $_FILES['fav_icon']['name'];

                    $_FILES['userfile']['type']     = $_FILES['fav_icon']['type'];

                    $_FILES['userfile']['tmp_name'] = $_FILES['fav_icon']['tmp_name'];

                    $_FILES['userfile']['error']    = $_FILES['fav_icon']['error'];

                    $_FILES['userfile']['size']     = $_FILES['fav_icon']['size'];

                    $config['upload_path']          = './uploads/settings_image';
                    $config['allowed_types']        = 'png|jpg|jpeg';

                   

                    $this->upload->initialize($config);

                    if (! $this->upload->do_upload()) {

                     $error = array('error' => $this->upload->display_errors()); 
                     } 
                    else {
                        $final_files_data2[] = $this->upload->data();
                        $data['fav_icon']= $final_files_data2[0]['file_name'];
                         @unlink("./uploads/settings_image/".$this->input->post('prev_link_image_2')."");
                     }
              // echo "<pre>";print_r($data);die;

       if($this->form_validation->run() == TRUE){
        $data_inserted = $this->Settings_model->edit_data($data,$id); 
        $this->session->set_flashdata('success_msg','Settings edited Successfully');
        redirect('settings');

      }
    } 

    $site_name = $this->config->item('site_name');  
    $this->template->set('title', $site_name.' | Edit Settings');
    $data_set['all_data'] = $this->Settings_model->get_data_by_id($id);
  //echo "<pre>"; print_r($data_set); die;

    $this->template->set_layout('layout_main','front');
    $this->template->build('edit',$data_set);

  }


}