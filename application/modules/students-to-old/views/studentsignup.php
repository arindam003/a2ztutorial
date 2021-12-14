<section class="signup-bg">
  <div class="container">
    <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">&nbsp; </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="signup"> 
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
              <?php $this->session->unset_userdata('err_msg');} 
              ?>

              
        <div class="signup-ti">
        <h2>Student Sign up</h2>
         <a  href="<?php echo base_url('students/login')?>">Log in</a> </div>
        <form class="login-container" method="POST">
                    <p>
                        <label>Name: <span>*</span></label>
                        <input type="text" name="name" placeholder="Full Name">
                        <small style="color:red;"><?php echo form_error('name');?></small>
                    </p>
                    <p>
                        <label>Email Address: <span>*</span></label>
                        <input type="email" name="email"   placeholder="Email">
                        <small style="color:red;"><?php echo form_error('email');?></small>
                    </p>
                   
                    <p>
                        <label>DATE OF BIRTH: <span>*</span></label>
                        <input type="date" id="start" name="dateofbirth">
                       <!-- <input type="date" id="start" name="trip-start" value="" min="1980-01-01" > -->
                        <small style="color:red;"><?php echo form_error('dateofbirth');?></small>
                    </p>
                    <p>
                        <label>Password: <span>*</span></label>
                        <input type="password" name="password" placeholder="Password">
                        <small style="color:red;"><?php echo form_error('password');?></small>
                    </p>
                    <p>
                        <label>Confirm Password: <span>*</span></label>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                        <small style="color:red;"><?php echo form_error('confirm_password');?></small>
                    </p>
                    
                    <p><input type="submit" value="SIGN UP"></p>
                    <div class="google-btn">
                        <a href="#">
                      <div class="google-icon-wrapper">
                      
                        <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
                      </div>
                   <!-- <p class="btn-text"><a href="<?php //echo base_url('students/google');?>">Sign in with google</a></p> -->
                      <button onClick="window.location = '<?php echo base_url('students/google')?>';">
                         Sign in with google</button> -->
                      </a>
                    </div>
                    </form>
         </div>
      </div>

       <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">&nbsp; </div>
     
      
    </div>
  </div>
</section>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>