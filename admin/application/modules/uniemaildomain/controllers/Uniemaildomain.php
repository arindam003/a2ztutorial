<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Uniemaildomain extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		$this->load->model('Uniemaildomain_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index()
    {
		
       $data['alldata'] = $this->Uniemaildomain_model->get_data();

        $data['university_data'] = $this->Uniemaildomain_model->get_university(); 
        $this->template->set('title','Uni Email Domain');
        //$this->template->set('title', 'Uniemaildomain | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('uniemaildomain',$data);
    }
	
	public function add(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
            
            $data['university_id']= strip_tags($this->input->post('university_id'));
            $data['email_domain']= strip_tags($this->input->post('email_domain'));
           
            date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');

            
            

            $this->form_validation->set_rules('university_id', 'university_id', 'trim|required');
            $this->form_validation->set_rules('email_domain', 'email_domain', 'trim|required');
           

            if($this->form_validation->run()== TRUE){
                 
              $data_inserted = $this->Uniemaildomain_model->add_data($data);

              

              $this->session->set_flashdata('success_msg', ' Added Successfully'); 
              redirect('uniemaildomain');
            }else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('uniemaildomain/add');
             }
            
    }


           $data['university_data'] = $this->Uniemaildomain_model->get_university();
          
          $this->template->set('title', 'Add Uniemaildomain');
          $this->template->set_layout('layout_main', 'front');
          $this->template->build('adduniemaildomain',$data);
      }

	public function edit($id){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
           // $data['university_id']= strip_tags($this->input->post('university_id'));
            $data['email_domain']= strip_tags($this->input->post('email_domain'));
           
            date_default_timezone_set('Europe/London');
            $data['updated_on']=date('Y-m-d H:i:s');

           
          //$this->form_validation->set_rules('university_id', 'university_id', 'trim|required');
          $this->form_validation->set_rules('email_domain', 'email_domain', 'trim|required');

            
            if($this->form_validation->run() == TRUE){
             $data_inserted = $this->Uniemaildomain_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', ' Edited Successfully'); 
              redirect('uniemaildomain');
            }else {
                
                
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');
                redirect('uniemaildomain/edit');
            }
            
   }


        $data2['university_data'] = $this->Uniemaildomain_model->get_university();
        
        $this->template->set('title', 'Edit Uniemaildomain');
        $data2['single_data'] = $this->Uniemaildomain_model->get_data_by_id($id);
        // echo '<pre>';
        // print_r($data['university_data']);die;

        $this->template->set_layout('layout_main', 'front');
        $this->template->build('edituniemaildomain',$data2);

    
  }

//  status
	public function status_inactive($id) {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';
               $data_inserted = $this->Uniemaildomain_model->edit_data($data,$id);
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
               $data_inserted = $this->Uniemaildomain_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }
	
	public function delete_data($id){
        $this->Uniemaildomain_model->delete_row_data($id);
        redirect('uniemaildomain');
        
    }
	
	
	
	
	
	
	
}
?>
