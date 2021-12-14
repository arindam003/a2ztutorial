
<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Parent Google Login Details Management
                        
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span></h3>
                       
                    </header>
                    <div class="panel-body" style="display: block;">
                     <?php if($this->session->flashdata('success_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-success">
                      <strong>Success!</strong> <?=$this->session->flashdata('success_msg');?>
                    </div>
                      <?php } ?>
                      
                       <?php if($this->session->flashdata('err_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-danger">
                      <strong>Error!</strong> <?=$this->session->flashdata('err_msg');?>
                    </div>
                      <?php } ?>
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <div class="btn-group">
                                   <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url('parentgoogle')?>">
                                       Back 
                                    </a>
                                </div>
                               
                            </div>
                        
                            <div class="space15"></div>
                            
                            <div class="container" style="padding-left: 10%;">
                              <?php 
                                foreach($parentgoogle_view as $view) { ?>
                                <p>Oauth Provider : <?php echo $view->oauth_provider;?></p>
                                <p>Oauth Id : <?php echo $view->oauth_uid;?></p>
                                <p>First Name : <?php echo $view->f_name;?></p>
                                <p>Last Name : <?php echo $view->l_name;?></p>
                                <p>Email : <?php echo $view->email;?></p>
                                <p>Usertype : <?php echo $view->type_name;?></p>
                                <p>Image : <?php echo $view->image_src;?></p>
                                <?php  } ?>    
                            </div>
                              
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    
 