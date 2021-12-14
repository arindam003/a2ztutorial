<?php
    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

    class Signup extends MX_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Signup_model');

        }
         public function index(){
       

            $this->template->set('title','Signup');
            $this->template->set_layout('layout_main','front');
            $this->template->build('signup',$data);
         }




    } 

?>