<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Settings extends MX_Controller

{

    public function __construct()

    {
		parent::__construct();
		is_logged_in(); 	//common function for session checking.
		$this->load->library('form_validation');
		$this->load->model('Settings_model');
		

    }

//===================================================================

    public function index()

    {
    	//$data_get= $this->Unit_model->get_data();
    	$data['all_data']=$this->Settings_model->get_data();

        $this->template->set('title','Settings  | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('settings',$data);
	}
	

/*================================ Edit Unit===========================*/	



	public function edit($id)
	{
		//echo $id;exit;
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/settings/');	
		}
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
       
	        $data['email']= strip_tags($this->input->post('email'));
			$data['phone_no_1']= strip_tags($this->input->post('phone_no_1'));
			$data['phone_no_2']= strip_tags($this->input->post('phone_no_2'));
			$data['phone_no_3']= strip_tags($this->input->post('phone_no_3'));
			$data['address']= strip_tags($this->input->post('address'));
			$data['facebook']= strip_tags($this->input->post('facebook'));
			$data['twitter']= strip_tags($this->input->post('twitter'));
			$data['linkedin']= strip_tags($this->input->post('linkedin'));
			$data['youtube']= strip_tags($this->input->post('youtube'));
			$data['g_plus']= strip_tags($this->input->post('g_plus'));
			$data['q_head_1']= strip_tags($this->input->post('q_head_1'));
			$data['q_head_2']= strip_tags($this->input->post('q_head_2'));
            
			 $this->form_validation->set_rules('email', 'Email', 'trim|required');
			 $this->form_validation->set_rules('phone_no_1', 'Phone', 'trim|required');
			 $this->form_validation->set_rules('address', 'Address', 'trim|required');
			 // $this->form_validation->set_rules('facebook', 'facebook link', 'trim|required');
			 // $this->form_validation->set_rules('twitter', 'twitter link', 'trim|required');
			 // $this->form_validation->set_rules('linkedin', 'linkedin link', 'trim|required');
			 // $this->form_validation->set_rules('youtube', 'youtube link', 'trim|required');
          
            if ($this->form_validation->run() == TRUE) {
                  $data_inserted = $this->Settings_model->edit_data($data,$id);
                  $this->session->set_flashdata('success_msg', 'Settings edited Successfully'); 
                  redirect('admin/settings');	
            }
		}
		
		
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Edit Settings | '.$site_name);
		$data_single['all_data'] = $this->Settings_model->get_data_by_id($id);
		
		//print_r($data_single);die();
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('edit',$data_single);
    }
   

}

