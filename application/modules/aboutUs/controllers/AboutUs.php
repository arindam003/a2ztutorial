<?php
    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

    class AboutUs extends MX_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('AboutUs_model');

        }
        public function index(){
            $data['about_data'] = $this->AboutUs_model->get_about();
            //$data['ourteam_data'] = $this->AboutUs_model->get_ourteam();
           
           // echo '<pre>';
           // print_r($data); die;
          $this->load->library('pagination'); 
          $config['base_url'] = base_url('ourteam/index');
          $config['per_page'] = 3;
          $config['total_rows'] = $this->AboutUs_model->num_rows();

          $this->pagination->initialize($config);


            // parameter config,offset
          $data['ourteam_data'] = $this->AboutUs_model->get_ourteam($config['per_page'],$this->uri->segment(3));
         //  echo '<pre>';
        // print_r($data); die;

            $this->template->set('title','AboutUs');
            $this->template->set_layout('layout_main','front');
            $this->template->build('aboutUs',$data);
        }

        



    } 

?>