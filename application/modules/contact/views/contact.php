<?php
    $settingsdata = get_settings_data();
    //echo '<pre>'; print_r($settingsdata); die;
?>
<section class="az-contact-banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <h1>Contact Us</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

                </div>
            </div>
        </div>
    </section>
    <section class="az-contact-body">
        <div class="container">
            <h2>GET IN <span>TOUCH</span></h2>
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <div id="form-main">
                        <div id="form-div">
                             <!-- start message -->
                                    <div class="panel-body" style="display: block;">
                                     <?php if($this->session->flashdata('success_msg')!="") { ?>
                                                             <div class="clearfix"></div>
                                    <div class="alert alert-success">
                                      <strong>Success!</strong> <?=$this->session->flashdata('success_msg');?>
                                    </div>
                                      <?php } 
                                      $this->session->unset_userdata('success_msg');
                                      ?>
                                      
                                       <?php if($this->session->flashdata('err_msg')!="") { ?>
                                                             <div class="clearfix"></div>
                                    <div class="alert alert-danger">
                                      <strong>Success!</strong> <?=$this->session->flashdata('err_msg');?>
                                    </div>
                                      <?php 
                                        } 
                                      $this->session->unset_userdata('err_msg');
                                      ?>
                            <form class="form" method='POST' id="form1">
                                <p class="name">
                                    <input name="name" type="text"
                                        class="validate[required,custom[onlyLetter],length[0,100]] feedback-input"
                                        placeholder="Name" id="name" />
                                        <?php echo form_error('name','<div class="text-danger">','</div>');?>
                                </p>
                                <p class="email">
                                    <input name="email" type="email"
                                        class="validate[required,custom[email]] feedback-input" pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$" id="email"
                                        placeholder="Email" />
                                        <?php echo form_error('email','<div class="text-danger">','</div>');?>
                                </p>
                                <p class="text">
                                    <textarea name="message" class="feedback-input"
                                        id="comment" placeholder="Comment"></textarea>
                                        <?php echo form_error('message','<div class="text-danger">','</div>');?>
                                </p>
                                <div class="submit">
                                    <button type="submit" id="button-green">SEND</button>
                                </div>
                            </form>
                        </div>
                        <!-- end message -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="az-get-in-touch">
                            <div class="img-cont">
                                <img src="<?php echo base_url()?>themes/front/images/get-in-touch.png" />
                            </div>
                            <ul>
                                <li><span><i class="fas fa-phone-alt"></i></span> <?php echo $settingsdata[0]->phone_no_1;?></li>
                                <li><span><i class="far fa-envelope"></i></span>  <?php echo $settingsdata[0]->email;?></li>
                                <li><span><i class="fas fa-map-marker-alt"></i></span> 
                                  <?php echo $settingsdata[0]->address;?>
                                </li>
                                <div class="az-contact-smi">
                                    <a href="<?php echo $settingsdata[0]->facebook;?>" target="_blank"><span class="smi-fb"><i class="fab fa-facebook-f"></i></span></a>
                                    <a href="<?php echo $settingsdata[0]->twitter;?>" target="_blank"><span class="smi-tw"><i class="fab fa-twitter"></i></span></a>
                                    <a href="#"><span class="smi-insta"><i class="fab fa-instagram"></i></span></a>
                                    <a href="<?php echo $settingsdata[0]->linkedin;?>" target="_blank"><span class="smi-li"><i class="fab fa-linkedin-in"></i></span></a>
                                </div>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>