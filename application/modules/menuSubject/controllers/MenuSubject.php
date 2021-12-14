<?php
    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

    class MenuSubject extends MX_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('MenuSubject_model');
            $this->load->library('pagination');
            
        }
        public function index(){
            
           
           if($this->uri->segment(2)==TRUE){
             $slugname = $this->uri->segment(2);
            
             $data['menuSubject_data2'] = $this->MenuSubject_model->menu_num_rows($slugname);

            $config["base_url"] = base_url('menuSubject').'/'.$slugname;
            $config["total_rows"] = $this->MenuSubject_model->menu_num_rows($slugname);
            $config["per_page"] = 4;
            //$config["uri_segment"] = 3;
            $config["num_links"] = 2;
            $config["use_page_numbers"] = TRUE;
            $config["page_query_string"] = TRUE;


            
             if(($this->input->get('per_page')==TRUE)){
                $page_number = $this->input->get('per_page');
              
              }else{
                $page_number = 1;
             }
            
             $offset = ($page_number - 1)*$config["per_page"];
           

           

              $data['menuSubject_data'] = $this->MenuSubject_model->get_menuSubject($slugname,$config['per_page'],$offset);

             //echo '<pre>';
              //print_r($data);die;

            $this->pagination->initialize($config);
            
           

            $this->template->set('title','MenuSubject');
            $this->template->set_layout('layout_main','front');
            $this->template->build('menuSubject',$data);
          }else{
            echo 'error';
          }  
        }

        

    } 

?>