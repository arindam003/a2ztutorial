
<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Testimonials Details Management
                        
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
                                   <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url()?>testimonials">
                                       Back 
                                    </a>
                                </div>
                               
                            </div>
                        
                            <div class="space15"></div>
                            
                            <div class="container" style="padding-left: 10%;">
                              <?php 
                                                            
                                foreach($testimonials_view as $view) { ?>
                                  
                                <p>By testimonals Name :
                                <?php echo $view->sign_name;?></p>
                              
                                <p>Usertype :<?php echo $view->type_name;?></p>

                                <p>Teacher :
                                  <?php 
                                        foreach($testimonials_teacher as $teacher) { 
                                          if($teacher->id == $view->teacher_id){
                                            echo $teacher->name;
                                            }
                                          }
                                ?></p>

                                <p>Subject :<?php echo $view->sub_name;?></p>

                                <p>Level :<?php echo $view->lev_name;?></p>

                                <p>Description :<?php echo $view->descrip;?></p>

                                <p>Rating :
                                  <!-- <div class="rateyo" id= "rating"
                                   data-rateyo-rating="<?php echo $all->rating;?>"
                                   data-rateyo-num-stars="5"
                                   data-rateyo-score="3">
                                  </div>  -->
                                  <?php echo $view->rating;?></p>

                                <!-- <p>Status :<?php 
                                         //if($all->status == "1") { 
                                            //echo $stat='<button type="button" class="btn btn-success">Active</button>';
                                          //} else {
                                           //echo $stat='<button type="button" class="btn btn-success">Inactive</button>';
                                          }
                                ?></p> -->
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
    
 