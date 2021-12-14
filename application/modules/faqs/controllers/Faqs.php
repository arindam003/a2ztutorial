<?php 
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Faqs extends MX_Controller{

     public function __construct(){

        parent::__construct();
        
        $this->load->model('Faqs_model');
     }

      public function index(){
        // $data['faqtopics_data'] = $this->Faqs_model->get_faqtopics();
        $data['faq_data'] = $this->Faqs_model->get_faq();


        $this->template->set('title','Faqs');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('faqs',$data);
       
        
      }



}


?>