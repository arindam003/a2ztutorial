<?php 
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Ourteam extends MX_Controller{

     public function __construct(){
        parent::__construct();
        // is_logged_in();
        $this->load->model('Ourteam_model');
        $this->load->library('pagination');
     }

      public function index(){
          //$data['ourteam']= $this->Ourteam_model->num_rows();

          $config['base_url'] = base_url('ourteam');
          $config['per_page'] = 2;
          $config["num_links"] = 2;
          $config["use_page_numbers"] = TRUE;
          $config["page_query_string"] = TRUE;
          $config['total_rows'] = $this->Ourteam_model->num_rows();

          if(($this->input->get('per_page')==TRUE)){
                $page_number = $this->input->get('per_page');
              
              }else{
                $page_number = 1;
             }
            
             $offset = ($page_number - 1)*$config["per_page"];

             $this->pagination->initialize($config);


            // parameter config,offset
          $data['ourteam_data'] = $this->Ourteam_model->get_ourteam($config['per_page'],$offset);;
         //  echo '<pre>';
        // print_r($data); die;

        $this->template->set('title','Ourteam');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('ourteam',$data);
       
       
      }



}


?>