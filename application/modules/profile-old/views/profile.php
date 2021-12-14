 <?php  
//print_r($profile_data);die;
 ?>
 <section class="profile-body">
        <div class="container">
            
            <div class="row">
                <?php foreach($profile_data as $profile) {   ?>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    
                    <div class="profile-wrapper">
                        <!--Intro Video Space-->
                        <div class="row">

                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
                                <div class="az-fat-tutor-img">
                                    <img  src="<?php echo base_url()?>admin/uploads/teacher_image/<?=$profile->image_src?>" >
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
                                <div class="profile-heading">
                                    <h3><?php echo $profile->firstname.' '.$profile->lastname;?></h3>
                                    <h5><?php echo $profile->degree;?> - <?php echo $profile->university;?></h5>
                                    
                                     <div class="qualified-button">
                                    <p>
                                         <?php  if($profile->online_lesson == '1'){?>  
                                        <i class="fas fa-desktop"></i>&nbsp;<a href="#">Online Lesson </a>

                                        <?php  } ?>
                                    </p>
                                    
                                    </div>
                                    <p class="qualified-button">
                                      <?php 
                                        if($profile->qualified == '1'){?>   
                                            <button>
                                            <span><i class="fas fa-check"></i></span>
                                           <?php  echo 'Qualified Teacher';?>
                                           </button>
                                       <?php  } ?>
                                    </p>
                                    <p class="qualified-button" style="color: #80bf1f;font-size : 80%;">
                                <?php  if($profile->in_person == '1'){?>  
                               In person :<?php echo 'Y';?>
                              

                                <?php  } ?>
                            </p>
                                    <h6>Price: <span>£<?php echo $profile->price;?>/HR</span></h6>
                                    <h6>
                                        <small>
                                            <div class="az-rating">
                                            <div class="rateyo" id= "rating"
                                             data-rateyo-rating="<?php echo $profile->rating;?>"
                                             data-rateyo-num-stars="5"
                                             data-rateyo-score="3">
                                            </div> 
                                        </div>
                                             <?php echo $profile->total_reviews;?> Reviews
                                        </small>
                                    </h6>
                                    <p><span><?php echo $profile->total_session;?></span> Completed Lessons</p>

                                </div>
                            </div>

                        </div>

                        <div class="profile-description">
                            <h4> Preferred Location :</h4><?php echo $profile->preferred_location;?>
                            <h4>About</h4>
                            <p><?php echo $profile->about;?></p>
                            <h4>Sessions</h4>
                            <p><?php echo $profile->session;?></p>
                                <h4>Qualifications</h4>
                                <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Rate (£/hour)</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                         <?php foreach($qualification_data as $qualification){  
                                            //print_r($qualification);die;
                                            ?>
                                      <tr>
                                        <td><?php echo $qualification->subject_name;?></td>
                                        <td><?php echo $qualification->levels_name;?></td>
                                        <td><?php echo $qualification->price;?></td>
                                      </tr>
                                     <?php } ?>
                                    </tbody>
                                  </table>
                                  </div>
                               <h4>Availability</h4>
                               <div class="table-responsive-sm">
                               <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col"><span class="th-icon"><i class="fas fa-calendar-check"></i></span></th>
                                    <th scope="col">Mon</th>
                                    <th scope="col">Tue</th>
                                    <th scope="col">Wed</th>
                                    <th scope="col">Thu</th>
                                    <th scope="col">Fri</th>
                                    <th scope="col">Sat</th>
                                    <th scope="col">Sun</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach($availability_data as $availability){  
                                            //print_r($availability);die;
                                            ?>
                                  <br>
                                  <tr>
                                    <th scope="row"><?php echo $availability->timing;?></th>
                                   

                                    <td><?php 

                                    if($availability->mon == 'on'){ ?>
                                            <span class="az-yes"><i class="fas fa-check-circle"></i></span>
                                    <?php     } else { ?>
                                        <span class="az-no"><i class="fas fa-times-circle"></i></span>
                                    <?php  } ?>
                                        
                                    </td>
                                    <td><?php 
                                    if($availability->tue == 'on'){ ?>
                                            <span class="az-yes"><i class="fas fa-check-circle"></i></span>
                                    <?php     } else { ?>
                                        <span class="az-no"><i class="fas fa-times-circle"></i></span>
                                    <?php  } ?>
                                    </td>
                                    <td><?php 
                                        if($availability->wed == 'on'){ ?>
                                            <span class="az-yes"><i class="fas fa-check-circle"></i></span>
                                    <?php     } else { ?>
                                        <span class="az-no"><i class="fas fa-times-circle"></i></span>
                                    <?php  }?>
                                    </td>
                                    <td><?php 
                                        if($availability->thu == 'on'){ ?>
                                            <span class="az-yes"><i class="fas fa-check-circle"></i></span>
                                    <?php     } else { ?>
                                        <span class="az-no"><i class="fas fa-times-circle"></i></span>
                                    <?php  }?>
                                    </td>
                                    <td><?php 
                                        if($availability->fri == 'on'){ ?>
                                            <span class="az-yes"><i class="fas fa-check-circle"></i></span>
                                    <?php     } else { ?>
                                        <span class="az-no"><i class="fas fa-times-circle"></i></span>
                                    <?php  } ?></td>
                                    <td><?php 
                                        if($availability->sat == 'on'){ ?>
                                            <span class="az-yes"><i class="fas fa-check-circle"></i></span>
                                    <?php     } else { ?>
                                        <span class="az-no"><i class="fas fa-times-circle"></i></span>
                                    <?php  } ?></td>
                                    <td><?php
                                        if($availability->sun == 'on'){ ?>
                                            <span class="az-yes"><i class="fas fa-check-circle"></i></span>
                                    <?php     } else { ?>
                                        <span class="az-no"><i class="fas fa-times-circle"></i></span>
                                    <?php  } ?>
                                    </td>
                                    
                                </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                              </div>
                              <h4>Subjects Offered: <span><?php 
                             
                           
                            $offered = json_decode($profile->subject_offered);
                            echo implode(' , ', $offered);
                            
                              ?></span></h4>
                        </div>
                    </div>
                
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="profile-side">
                    <h4>Talk to <span><?php echo $profile->firstname.' '.$profile->lastname;?></span></h4>
                    <h6>Send him a message</h6>
                    <form method="POST">
                        <p class="text">
                            <textarea name="message" class="feedback-input"
                                id="comment" placeholder="Message"></textarea>
                               
                        </p>
                        <div class="submit">
                            <button type="submit" class="profile-send-msg">SEND</button>
                        </div>
                    </form>
                    </div>
                </div>
           <?php } ?>
            </div>

        </div>
    </section>