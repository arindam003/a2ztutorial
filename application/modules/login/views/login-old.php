<section class="login-register-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12"></div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 login-wrapper">
                <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 login">
                    <h2>Log in</h2>
                     <!-- start message  -->
                        <div class="panel-body" style="display: block;">
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
                       
                    <form class="login-container" method="POST" >
                        <p>
                            <label>Email Address:</label>
                            <input type="email" name ="email" placeholder="Email">
                            <small style="color:red;"><?php echo form_error('email');?></small>
                        </p>
                        <p>
                            <label>Password:</label>
                            <input type="password" name="password" placeholder="Password">
                            <small style="color:red;"><?php echo form_error('password');?></small>
                        </p>
                        <div class="register-as-a">
                          <label class="label-heading" for="register">I am a: </label>
                              <select name="usertype_id" id="register">
                                <option>Select Usertype</option>
                                <?php  foreach($usertype_data as $usertype){  ?>
                                  <option class="register-as-option" value="<?php echo $usertype->type_id ;?>"><?php echo $usertype->type_name ;?> </option>
                                  
                                  <?php } ?>
                              </select>
                        </div>
                        <p><input type="submit" value="LOG IN"></p>
                        <div class="az-forgotpass">
                            <a href="<?php echo base_url('forgotpassword');?>"><small>Forgot Password?</small></a>
                        </div>
                    </form>
                </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 go-to-reglog">
                    <h2>Don't have an account yet? <p><a href="<?php echo base_url('signup');?>">Sign Up</a></p></h2>
                </div>
            </div>
             </div>
             <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12"></div>
        </div>
    </div>
    </section>