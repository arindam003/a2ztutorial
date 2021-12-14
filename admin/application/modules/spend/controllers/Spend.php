<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Spend extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		$this->load->model('Spend_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index()
    {
		
       $data['alldata'] = $this->Spend_model->get_data();
        
         $this->template->set('title','Spend');
        //$this->template->set('title', 'Spend | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('spend',$data);
    }
	
	public function add(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['sp_titile']= strip_tags($this->input->post('sp_titile'));
            $data['starting_price']= strip_tags($this->input->post('starting_price'));
            $data['ending_price']= strip_tags($this->input->post('ending_price'));
            $data['description']= strip_tags($this->input->post('description'));
			

			date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
            
            $this->form_validation->set_rules('description', 'description', 'trim|required');
           

            if($this->form_validation->run()== TRUE){
            			
           
            	$data_inserted = $this->Spend_model->add_data($data);
	            $this->session->set_flashdata('success_msg', ' Added Successfully'); 
	            redirect('spend');
            }else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('spend/add');
             }
            
		}
	     	$this->template->set('title', 'Add Spend');
	        $this->template->set_layout('layout_main', 'front');
	        $this->template->build('addspend',$data);
		
	}

	public function edit($id){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['sp_titile']= strip_tags($this->input->post('sp_titile'));
            $data['starting_price']= strip_tags($this->input->post('starting_price'));
            $data['ending_price']= strip_tags($this->input->post('ending_price'));
            $data['description']= strip_tags($this->input->post('description'));

			date_default_timezone_set('Europe/London');
            $data['updated_on']=date('Y-m-d H:i:s');
            

            $this->form_validation->set_rules('description', 'description', 'trim|required');

            if($this->form_validation->run() == TRUE){

            	
            	$data_inserted = $this->Spend_model->edit_data($data,$id);
    			//echo '<pre>';
				// print_r($data_inserted); die;
	            $this->session->set_flashdata('success_msg', ' Edited Successfully'); 
	            redirect('spend');
            }else {
                
                
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');
                redirect('spend/edit');
            }
            
		}
	    $this->template->set('title', 'Edit Spend');
		
		$data2['single_data'] = $this->Spend_model->get_data_by_id($id);
		
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editspend',$data2);
	}

// goal status
	public function status_inactive($id) {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';
               $data_inserted = $this->Spend_model->edit_data($data,$id);
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
               $data_inserted = $this->Spend_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Status edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }
	
	public function delete_data($id){
        $this->Spend_model->delete_row_data($id);
        redirect('spend');
        
    }
	
	
	
	
	
	
	
}
?>
