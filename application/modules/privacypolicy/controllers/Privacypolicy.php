<?php
    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

    class Privacypolicy extends MX_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Privacypolicy_model');

        }
        public function index(){
            $data['privacypolicy_data'] = $this->Privacypolicy_model->get_Privacypolicy();
            


            $this->template->set('title','Privacypolicy');
            $this->template->set_layout('layout_main','front');
            $this->template->build('privacypolicy',$data);
        }

        



    } 

?>