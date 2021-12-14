 <section class="profile-body">
    <div class="container">
      <div class="row">
         <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
         </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
              <div class="profile-wrapper">
                  <div class="card reset-card">
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
                      <div class="reset-password">
                        <h3>Reset Password</h3>
                      </div>
                          
            <form method="POST">
                <div class="card-body">
                      <input type="hidden" name="token" value=" <?php echo sha1(date("Y/m/d h:i:sa")); ?>">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6>Password</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="password" name="password" class="form-control" >
                        </div>
                        <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                         
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-3">
                            <h6>Repeat Password</h6>
                        </div>
                      <div class="col-sm-9 text-secondary">
                            <input type="password" name="confirm_password" class="form-control" >
                        </div>
                        <?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?>
                    </div>

                    <div class="row">
                      <div class="col-sm-3"></div>
                          <div class="col-sm-6 text-secondary password-button">
                            <button type ="submit" class="btn-block save-changes-button">Change Password</button>
                             </div>
                      <div class="col-sm-3"></div>
                    </div>
              </div>
               
            </form>
                  <?php// } ?>
          </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
       </div>
          </div>
      </div>
    </div>
  </section>