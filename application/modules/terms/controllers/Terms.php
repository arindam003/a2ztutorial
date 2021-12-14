<?php
    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

    class Terms extends MX_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Terms_model');

        }
        public function index(){
            $data['tnc_data'] = $this->Terms_model->get_tnc();
            


            $this->template->set('title','Terms');
            $this->template->set_layout('layout_main','front');
            $this->template->build('terms',$data);
        }

        



    } 

?>