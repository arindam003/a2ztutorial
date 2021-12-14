<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Reviews extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		$this->load->model('Reviews_model');
		$this->load->library('form_validation');
        
    }
    //===================================================================
    public function index()
    {
		
       //$data['alldata'] = $this->Reviews_model->get_data();
        
         $this->template->set('title','Reviews');
        //$this->template->set('title', 'Reviews | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('reviews',$data);
    }
	
	public function add(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['name']= strip_tags($this->input->post('name'));
			

			date_default_timezone_set('Europe/London');
            $data['added_on']=date('Y-m-d H:i:s');
            

            $this->form_validation->set_rules('name', 'name', 'trim|required');
           

            if($this->form_validation->run()== TRUE){
            			
           
            	$data_inserted = $this->Reviews_model->add_data($data);
	            $this->session->set_flashdata('success_msg', ' Added Successfully'); 
	            redirect('reviews');
            }else {
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');  
                redirect('reviews/add');
             }
            
		}
	     	$this->template->set('title', 'Add Reviews');
	        $this->template->set_layout('layout_main', 'front');
	        $this->template->build('addreviews',$data);
		
	}

	public function edit($id){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['name']= strip_tags($this->input->post('name'));

			date_default_timezone_set('Europe/London');
            $data['updated_on']=date('Y-m-d H:i:s');
            

            $this->form_validation->set_rules('name', 'name', 'trim|required');

            if($this->form_validation->run() == TRUE){

            	
            	$data_inserted = $this->Reviews_model->edit_data($data,$id);
    			//echo '<pre>';
				// print_r($data_inserted); die;
	            $this->session->set_flashdata('success_msg', ' Edited Successfully'); 
	            redirect('reviews');
            }else {
                
                
                $this->session->set_flashdata('err_msg', 'Fill All The Fields');
                redirect('reviews/edit');
            }
            
		}
	    $this->template->set('title', 'Edit Reviews');
		
		$data2['single_data'] = $this->Reviews_model->get_data_by_id($id);
		
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editreviews',$data2);

		
	}
	
	public function delete_data($id){
        $this->Reviews_model->delete_row_data($id);
        redirect('reviews');
        
    }
	
	
	
	
	
	
	
}
?>
