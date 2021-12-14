<!-- Rating  sysytem-->
<head>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    
</head>
<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
           <div class="col-lg-12">
            <?php if($this->session->flashdata('err_msg')!="") { ?>
                         <div class="clearfix"></div>
<div class="alert alert-danger">
  <strong>Danger!</strong> <?=$this->session->flashdata('err_msg');?>
</div>
  <?php } ?>
                    <section class="panel">
                        <header class="panel-heading">
                           <h3> Edit testimonials <a href="<?php echo base_url('testimonials');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                           
                            <form role="form" method="POST" action="" enctype="multipart/form-data">
                                
                               
                                 <?php  foreach($single_data as $single){
                                 //    echo '<pre>';
                                 // print_r($single); die;
                                  ?>
                               <div class="form-group">
                                    <label for="inputslidercaption">Usertype<span>*</span> </label>
                                    <select name="usertype_id" class="form-control" id="usertype_id">
                                        <option >Select Usertype</option>
                                        <?php  foreach($usertype_data as $usertype){  ?>
                                        <option value="<?php 

                                        echo $usertype->type_id ;?>" 
                                        <?php if($usertype->type_id == $single->usertype_id){ 
                                            echo 'selected' ;} ?>><?php echo $usertype->type_name ;?></option>
                                         <?php }    ?>

                                            
                                       
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">By Testimonials (Name)<span>*</span> </label>
                                    <select name="sender_id" class="form-control" id="testimonials_name">
                                        <option >Select Name</option>
                                        <!-- only for dropdwn edit purpose -->
                                         <?php  foreach($teacher_data as $sender){  ?>
                                        <option value="<?php echo $sender->id;?>"
                                            <?php if($sender->id == $single->sender_id){ echo 'selected';}?>
                                            ><?php echo $sender->name;?></option>
                                         <?php }    ?>
                                    </select>
                                </div>
                                <div>
                                    <?php
                                    if($single->usertype_id=='1'){
                                         if($single->googlelogin_id==TRUE){
                                               echo '<img src="'.$single->signup_image.'">';
                                         }else{
                                         if($single->signup_image==''){
                                            echo '<img height=100 width=150 src="'.base_url().'uploads/student_image/Noimage.jpg">';
                                         }else{
                                          echo '<img height=100 width=150 src="'.base_url().'uploads/student_image/'.$single->signup_image.'">';
                                         }
                                      }
                                    }
                                    if($single->usertype_id=='2'){
                                      if($single->googlelogin_id==TRUE){
                                        echo '<img src="'.$single->signup_image.'">';
                                    }else{
                                if($single->signup_image==''){
                                 echo '<img height=100 width=150 src="'.base_url().'uploads/parent_image/Noimage.jpg">';
                               }else{
                                echo '<img src="'.base_url().'uploads/parent_image/'.$single->signup_image.'">';
                                   }
                                 }
                               }
                               if($single->usertype_id=='3'){
                                      if($single->googlelogin_id==TRUE){
                                        echo '<img src="'.$single->signup_image.'">';
                                    }else{
                                if($single->signup_image==''){
                                 echo '<img height=100 width=150 src="'.base_url().'uploads/parent_image/Noimage.jpg">';
                               }else{
                                echo '<img src="'.base_url().'uploads/teacher_image/'.$single->signup_image.'">';
                                   }
                                 }
                               }
                                  ?>                  
                              </div>
                               <div class="form-group">
                                    <label for="inputslidercaption">Subjects <span>*</span> </label>
                                    <select name="subjects_id" class="form-control" id="subjects_id">
                                        <option selected disabled>Select Subjects</option>
                                        <?php  foreach($subject_data as $subject){  
                                            if($subject->id == $single->subjects_id){

                                            ?>
                                        <option value="<?php echo $subject->id ;?>" selected><?php echo $subject->name ;?></option>
                                        <?php } else{?>
                                             <option value="<?php echo $subject->id ;?>"><?php echo $subject->name ;?></option>
                                            <?php } }?>  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputslidercaption">Teacher <span>*</span> </label>
                                    <select name="teacher_id" class="form-control" id="teacher_id">
                                        <option selected disabled>Select Teacher</option>
                                        <?php  foreach($teacher_data as $teacher){  ?>
                                            <option value="<?php echo $teacher->id ;?>"
                                                <?php if($teacher->id == $single->teacher_id){ echo 'selected';}?>
                                                ><?php echo $teacher->name ;?></option>
                                        
                                          <?php  }?>  
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Levels <span>*</span> </label>
                                    <select name="levels_id" class="form-control" id="register">
                                        <option selected disabled>Select Levels</option>
                                        <?php  foreach($level_data as $level){ ?>
                                        <option value="<?php echo $level->id ;?>"
                                            <?php if($level->id == $single->levels_id){ echo 'selected';}?>
                                            ><?php echo $level->name ;?></option>
                                         <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputsliderimage">Review Date </label>
                                    <input type="text" name="review_date" value="<?php echo $single->review_date;?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Text</label>
                                    <textarea name="descrip" class="form-control editor_big" id="inputslidercaption"><?php echo $single->descrip;?></textarea>
                                </div>
                                 <div class="form-group">
                                   <div class="rateyo" id= "rating"
                                         data-rateyo-rating="<?php echo $single->rating;?>"
                                         data-rateyo-num-stars="5"
                                         data-rateyo-score="3">
                                    </div>

                                    <span class='result'><?php echo $single->rating;?></span>
                                    <input type="hidden" name="rating" value="<?php echo $single->rating;?>">
                                </div>
                              
                            <?php } ?>
                                
                                 
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                           
                        </div>

                        </div>
                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>
    </section>

<!-- Rating  sysytem-->
     <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>


    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
             //alert(data.rating);
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });

</script>
<!-- usertype_id wise user -->
<script type="text/javascript">
    $(document).ready(function(){

     $("#usertype_id").change(function(){
           var userid = $("#usertype_id").val();
        //alert(userid);

            $.ajax({

                url :'<?php echo base_url('testimonials');?>/ajax_usertypedata',
                
                type:'POST',
                data:{
                    usertype_id:userid
                    
                    
                },
                success:function(data){
                   // alert(data);

                    $('#testimonials_name').html(data);
                    // $('#usertype_id').html(data);
                    // $('#testimonials_name').html('<option value="">Select Name</option>');
               
                },
                 error:function(data){
                     //alert('Error');
                 }
            });
        });

    });
</script>

<!-- subject wise teacher -->

<script type="text/javascript">
    $(document).ready(function(){

     $("#subjects_id").change(function(){
           var subid = $("#subjects_id").val();
            //alert(subid);

            $.ajax({

                url :'<?php echo base_url('testimonials');?>/ajax_subjectdata',
                
                type:'POST',
                data:{
                    subjects_id:subid
                    
                    
                },
                success:function(data){
                   // alert(data);

                    $('#teacher_id').html(data);
                    
                },
                 error:function(data){
                     alert('Error');
                 }
            });
        });

    });
</script> 