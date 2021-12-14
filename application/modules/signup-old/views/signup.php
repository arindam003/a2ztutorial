 <section class="login-register-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12"></div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 login-wrapper">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 go-to-reglog">
                        <div class="register-create">
                        <h2>Already have an account? <p><a href="<?php echo base_url('login');?>">Log In</a></p></h2>
                    </div>
                    </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 login">
                    <h2>Sign Up</h2>
                    <!-- start message -->
                            <div class="panel-body" style="display: block;">
                             <?php if($this->session->flashdata('success_msg')!="") { ?>
                                                     <div class="clearfix"></div>
                            <div class="alert alert-success">
                              <strong>Success!</strong> <?=$this->session->flashdata('success_msg');?>
                            </div>
                              <?php  $this->session->unset_userdata('success_msg'); } ?>
                              
                               <?php if($this->session->flashdata('err_msg')!="") { ?>
                                                     <div class="clearfix"></div>
                            <div class="alert alert-danger">
                              <strong>Error!</strong> <?=$this->session->flashdata('err_msg');?>
                            </div>
                              <?php $this->session->unset_userdata('err_msg');} ?>
                    <form class="login-container" method="POST">
                    <p>
                        <label>Name: <span>*</span></label>
                        <input type="text" name="name" placeholder="Full Name">
                        <small style="color:red;"><?php echo form_error('name');?></small>
                    </p>
                    <p>
                        <label>Email Address: <span>*</span></label>
                        <input type="email" name="email" class="validate[required,custom[email]] feedback-input" pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$" placeholder="Email">
                        <small style="color:red;"><?php echo form_error('email');?></small>
                    </p>
                    <p>
                        <label>Confirm Email: <span>*</span></label>
                        <input type="email" name="confirm_email" placeholder="Confirm Email">
                        <small style="color:red;"><?php echo form_error('confirm_email');?></small>
                    </p>
                    <p>
                        <label>Contact No.:</label>
                        <input type="tel" name="phone" placeholder="Mobile No.">
                        <small style="color:red;"><?php echo form_error('phone');?></small>
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
                    <div class="register-as-a">
                        <label class="label-heading" for="register">I am a: </label>
                            <select name="usertype_id" id="register">
                                 <option>Select Usertype</option>
                                 <?php  foreach($usertype_data as $usertype){  ?>
                                <option class="register-as-option" value="<?php echo $usertype->type_id ;?>"><?php echo $usertype->type_name ;?></option>
                                <?php } ?>
                            </select>
                    </div>
                    <p><input type="submit" value="SIGN UP"></p>
                    </form>
                </div>
                    <p><a href="<?php echo base_url('becometutor');?>">To Register as a Tutor, visit here.</a></p>
                    </div>
                </div>
             </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12"></div>
             </div>
        </div>
        </section>