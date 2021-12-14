<?php
    if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

    class Becometutor extends MX_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Becometutor_model');

        }
        public function index(){
            $data['becometutor_data'] = $this->Becometutor_model->get_becometutor();
            $data['usertype_data'] = $this->Becometutor_model->get_usertype();
            $data['testimonials_data'] = $this->Becometutor_model->get_testimonials();  // signup tabl
            $data['becometutor_mid_data'] = $this->Becometutor_model->get_becometutor_mid();


            $this->template->set('title','Becometutor');
            $this->template->set_layout('layout_main','front');
            $this->template->build('becometutor',$data);
        }

        



    } 

?>