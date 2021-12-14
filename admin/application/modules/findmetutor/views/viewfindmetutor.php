
<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Findmetutor Details Management
                        
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
                                   <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url()?>findmetutor">
                                       Back 
                                    </a>
                                </div>
                               
                            </div>
                        
                            <div class="space15"></div>
                            
                            <div class="container" style="padding-left: 10%;">
                              <?php 
                                                            
                                foreach($findmerequest_view as $view) { ?>
                                  
                                <p> Name :
                                <?php echo $view->fullname;?></p>
                                <p>Email :<?php echo $view->email;?></p>
                                <p>Phone :<?php echo $view->phone;?></p>
                                <p>Gender :<?php echo $view->gender;?></p>
                               
                                <p>Message :<?php echo $view->message;?></p>
                                <p>Subject :<?php echo $view->subjects_name;?></p>
                                <p>Levels :<?php echo $view->levels_name;?></p>
                                <p>Goal :<?php echo $view->goal_name;?></p>
                                <p>Lessons :<?php echo $view->lessons_name;?></p>
                                <!-- <p>Like to Spend :=
                                    
                                  <?php 
                                  if($view->starting_price == '' && $view->ending_price == ''){ ?>
                                    <p>Price :<?php echo $view->sp_titile;?></p>
                                  <?php } else{?>
                                 <p>Price: £<?php echo $view->starting_price ;?> - £<?php echo $view->ending_price ;?></p>
                               <?php } ?>
                                </p> -->
                                <p>Like to Spend := <?php echo $view->spend_price;?></p>
                                 <!-- <p>Description :<?php echo $view->description;?></p> -->
                                 <p>Pickday :<?php echo $view->pick_date;?></p>
                                 <p>Picktime :<?php echo $view->pick_time;?></p>
                                   
                                 </p>
                                

                                
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
    
 