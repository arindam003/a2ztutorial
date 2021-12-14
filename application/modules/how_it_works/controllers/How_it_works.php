<?php
    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

    class How_it_works extends MX_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('How_it_works_model');

        }
        public function index(){
            $data['howworks_data'] = $this->How_it_works_model->get_works();
            $data['howworks_data2'] = $this->How_it_works_model->get_works2();
            

            $this->template->set('title','How_it_works');
            $this->template->set_layout('layout_main','front');
            $this->template->build('how_it_works',$data);
        }

        



    } 

?>