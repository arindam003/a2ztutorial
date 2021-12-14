 <section class="profile-body">
        <div class="container">
            <div class="row">
               
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="profile-wrapper">
                        <div class="card">
                            <div class="panel-body" style="display: block;">
                             <?php if($this->session->flashdata('success_msg')!="") { ?>
                                                     <div class="clearfix"></div>
                            <div class="alert alert-success">
                              <strong>Success!</strong> <?=$this->session->flashdata('success_msg');?>
                            </div>
                              <?php  
                              $this->session->unset_userdata('success_msg');
                              }
                              ?>
                              
                               <?php if($this->session->flashdata('err_msg')!="") { ?>
                                                     <div class="clearfix"></div>
                            <div class="alert alert-danger">
                              <strong>Error!</strong> <?=$this->session->flashdata('err_msg');?>
                            </div>
                              <?php 
                                } 
                              $this->session->unset_userdata('err_msg');
                              ?>
                          </div>
                             <?php // foreach($single_data as $single){ //echo 'hi' ?>
                            <form method="POST">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Old Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" name="old_pass" class="form-control">
                                    </div>
                                    <?php echo form_error('old_pass', '<div class="error">', '</div>'); ?>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>New Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" name="new_pass" class="form-control">
                                    </div>
                                    <?php echo form_error('new_pass', '<div class="error">', '</div>'); ?>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Confirm Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" name="con_pass" class="form-control" >
                                    </div>
                                     <?php echo form_error('con_pass', '<div class="error">', '</div>'); ?>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        
                                      <button class="save-changes-button">
                                          <a  href="<?php echo base_url('tutors');?>">Back</a></button>
                                        <button type ="submit" class="save-changes-button">Update Password</button>
                                        
         
            
                                    </div>
                                </div>
                               
                                
                                
                            </div>
                        </form>
                    <?php// } ?>
                    </div>
                </div>
            </div>
       
        </div>
    </section>