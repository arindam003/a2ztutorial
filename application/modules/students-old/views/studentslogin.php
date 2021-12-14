<section class="login-register-bg">
  <div class="container">
    <div class="row">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12"></div>
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 ">
        <?php if($this->session->flashdata('success_msg')!="") { ?>
                                                 <div class="clearfix"></div>
              <div class="alert alert-success">
                <strong>Success!</strong> <?=$this->session->flashdata('success_msg');?>
              </div>
                <?php $this->session->unset_userdata('success_msg'); } ?>
                
                 <?php if($this->session->flashdata('err_msg')!="") { ?>
                                       <div class="clearfix"></div>
              <div class="alert alert-danger">
                <strong>Error!</strong> <?=$this->session->flashdata('err_msg');?>
              </div>
               <?php $this->session->unset_userdata('err_msg'); } ?>
      <div class="new-login-d">
        <div class="u-hide--small"><img src="<?php echo base_url()?>themes/front/images/login2.png" alt="Tutor" height="143" width="165">
              <h2>I am a Student</h2>
              <p>Give lessons or manage bookings with your customers</p>
            </div>
             
        <form id="form" name="form" method="post" enctype="application/x-www-form-urlencoded" data-partialsubmit="true">
                        <p>
                            <label>Email Address:</label>
                            <input type="email" name="email" class="validate[required,custom[email]] feedback-input" pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$" placeholder="Email">
                            <small style="color:red;"><?php echo form_error('email');?></small>
                        </p>
                        <p>
                            <label>Password:</label>
                            <input type="password" name="password" placeholder="Password">
                            <small style="color:red;"><?php echo form_error('password');?></small>
                        </p>
                       
                        
                        <p><input type="submit" value="LOG IN"></p>
                        <div class="google-btn">
                        <a href="#">
                      <div class="google-icon-wrapper">
                      
                        <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
                      </div>
                      <p class="btn-text"><a href="<?php echo base_url('students/google');?>">Sign in with google</a></p>
                      </a>
                    </div>
                        <div class="az-forgotpass">
                            <a href="<?php echo base_url('forgotpassword');?>"><small>Forgot Password?</small></a>
                            </div>
    </form>
      </div> </div>
      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12"></div>
      
    </div>
  </div>
</section>