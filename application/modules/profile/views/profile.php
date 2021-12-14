 <?php  
//print_r($profile_data);die;
 ?>
 <section class="profile-body">
        <div class="container">
            
            <div class="row">
                <?php foreach($profile_data as $profile) {   ?>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    
                    <div class="profile-wrapper">
                       
                        <div class="row">

                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
                                <div class="az-fat-tutor-img">
                                    <img  src="<?php echo base_url()?>admin/uploads/teacher_image/<?=$profile->image_src?>" >
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
                                <div class="profile-heading">
                                    <!-- <h3><?php echo $profile->firstname.' '.$profile->lastname;?></h3> -->
                                    <h3><?php echo $profile->name;?></h3>
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
                    <?php
                  
                   

                   if($this->session->userdata('student_id')==TRUE){
                     $userid=$this->session->userdata('student_id');
                    }
                    if($this->session->userdata('parent_id')==TRUE){
                     $userid=$this->session->userdata('parent_id');
                    }
                    //print_r($userid);die;
                   $teacherid = $profile->id;
                   $slugname = $profile->slug_name;

                 ?>
                    <div class="profile-side" id="msg">
                    <h4>Talk to <span><?php echo $profile->name;?></span></h4>
                    <h6>Send a message</h6>
                    <form  id="myForm" method="POST">
                        <p class="text">
                            <textarea name="message" class="feedback-input"
                                id="comment" placeholder="Message"></textarea>
                               
                        </p>
                     
                        
                     <input type="hidden" id ="userid" value="<?php echo $userid;?>">
                    <input type="hidden" id ="teacherid" value="<?php echo $teacherid;?>">
                     <input type="hidden" id ="slug" value="<?php echo $slugname;?>">
                        <!-- <div class="submit"> -->
                            <button type="button" id ="profilemsg" class="profile-send-msg">SEND</button>
                          <!-- </div> -->
                    </form>
                    </div>
                  </div>
           <?php } ?>

            </div>

        </div>


    </section>


<!-- pop up message --> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#profilemsg").click(function(){

            var userid = $('#userid').val();
            var teacherid = $('#teacherid').val();
            var msg = $('#comment').val();
            //var slug = $('#slug').val()
            if(userid==false){
                  swal('please login');
            }else{
            $.ajax({

                 method:'POST',
                 url :'<?php echo base_url();?>message',
                 dataType: "JSON",
                 data:{
                   message:msg,
                   user_id:userid,
                   teacher_id:teacherid
                },

                success:function(data){
                  //alert(data);
                  //console.log(data);
                  // var dataResult = JSON.parse(data);
                  if(data.success){
                     swal(data.success);
                     $('#comment').val('');
                  }
                  else{
                    swal(data.error);
                  }

                },

                    
                });
            
       }
        
        }); 
           
     });

</script>


<!-- <script>
        $(document).ready(function(){
   // $('#myForm').on('submit', function(e){
        $('#myForm').submit(function(){
    //e.preventDefault();
        var userid = $('#userid').val();
        var teacherid = $('#teacherid').val();
        var msg = $('#comment').val();
        
        $.ajax({
                url:'<?php //echo base_url('profile/messageinsert')?>',
                type:'POST',
                data:{
                    message:msg,
                    user_id:userid,
                    teacher_id:teacherid
                },
                success:function(data){
                   // alert(userid);
                     //alert(data);
                    // console.log(data);
                },
                error:function(data){
                    alert("Error detected");
                }

            });
    });
});
</script> -->

<!-- new -->



<!-- <script type="text/javascript">
    $(document).ready(function(){
        $("#profilemsg").click(function(){
            //$('#profilemsg').on("click",function(){
            
            var userid = $('#userid').val();
            var teacherid = $('#teacherid').val();
            var msg = $('#comment').val();

            $.ajax({
                    //url :'<?php //echo base_url('profile');?>',
                  url :'<?php //echo base_url("profile");?>/messageinsert',
                 
                
                type:'POST',
                data:{
                    message:msg,
                    user_id:userid,
                    teacher_id:teacherid
                },

                success:function(data){
                    //alert(userid);
                    if(data==''){
                        alert('No Data'); 
                     }else{
                        $('#msg').html(data); 
                       // $('#myForm').html(data);
                        }
                    },
                    error:function(data){
                     }
                });
          }); 
     });

</script>
 -->

<!-- old -->
 <!--  <script type="text/javascript">
    $(document).ready(function(){
        $('#profilemsg').click(function(){
            //$('#profilemsg').on("click", function () {
            var userid = $('#userid').val();
            var teacherid = $('#teacherid').val();
            var msg = $('#comment').val();
            
            $.ajax({
                url :'<?php //echo base_url('profile');?>/messageinsert',
                type:'POST',
                data:{
                    message:msg,
                    user_id:userid,
                    teacher_id:teacherid
                },
                success:function(data){
                     //alert(data);
                    //console.log(data);
                },
                error:function(data){
                    alert("Error detected");
                }

            });

        });
    });

</script> -->
 <!-- <script type="text/javascript">
        $(document).ready(function(){
          $("#profilemsg").click(function(){
            var userid = $('#userid').val();
            var teacherid = $('#teacherid').val();
            var msg = $('#comment').val();
            
             $.ajax({
                url :'<?php //echo base_url('profile/messageinsert');?>',
                type:'POST',
                data:{
                    message:msg,
                    user_id:userid,
                    teacher_id:teacherid
                },
                
                success:function(data){
                    //  return data; 
                    // alert(userid);
                   // alert(data);
                //console.log(data);
                    
                    //$('#msgfrm').html(data);
                },
                    error:function(data){
                        alert("Error detected");
                     }
                });
             

          });  

        });
    </script> -->
