<?php
    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

    class MenuSubject extends MX_Controller{
        public function __construct(){
            parent::__construct();
            //$this->load->library('form_validation');
            $this->load->model('MenuSubject_model');
            $this->load->library('pagination');
            
        }
        public function index(){
            
           

            $slugname = $this->uri->segment(2);
            $data['menuSubject_data'] = $this->MenuSubject_model->get_menuSubject($slugname);

           
            //echo count($data['menuSubject_data']);die;

            $data['menuSubject']= $this->MenuSubject_model->menu_num_rows();

            $config['base_url'] = base_url('menuSubject/index');
            $config['per_page'] = 3;
            $config['total_rows'] = $this->MenuSubject_model->menu_num_rows();

            $this->pagination->initialize($config);


            // // parameter config,offset
            // $data['testimonials_data'] = $this->MenuSubject_model->get_testimonials($config['per_page'],$this->uri->segment(3));
            

           

            $this->template->set('title','MenuSubject');
            $this->template->set_layout('layout_main','front');
            $this->template->build('menuSubject',$data);
        }

        

    } 

?>