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
               <h3> Edit teacher <a href="<?php echo base_url('teacher');?>" class="btn btn-danger flotright">Back</a></h3>
            </header>
            <div class="panel-body">
                <div>
                <?php  foreach($single_data as $single){?>
                <?php    //echo  '<pre>';print_r($single);die; ?>
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    
                    <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Username: <span>*</span></label>
                            <input type="text" value="<?php echo $single->name;?>"  class="form-control" name ="name" >
                        </p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Email Address: <span>*</span></label>
                            <input type="email" class="form-control" name="email" value="<?php echo $single->email;?>">
                           
                        </p>
                        </div>
                    </div>
                    <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Firstname: <span>*</span></label>
                            <input type="text" value="<?php echo $single->firstname;?>" class="form-control" name ="firstname" >
                        </p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Lastname: <span>*</span></label>
                            <input type="text" value="<?php echo $single->lastname;?>" class="form-control" name ="lastname">
                           
                        </p>
                        </div>
                    </div>
                    <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Title: <span>*</span></label>
                            <select name="title" class="form-control" id="title">
                                <option class="register-as-option" value="Mr"
                                <?php if($single->title=='Mr'){echo 'selected';}?>
                                >Mr.</option>
                                <option class="register-as-option" value="Ms"
                                <?php if($single->title=='Ms'){echo 'selected';}?>
                                >Ms.</option>
                                <option class="register-as-option" value="Mrs"
                                <?php if($single->title=='Mrs'){echo 'selected';}?>
                                >Mrs.</option>
                            </select>
                        </p>
                        
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <p>
                            <label>Gender: <span>*</span></label>
                            <select name="gender" class="form-control" id="gender">
                                <option class="register-as-option" value="Male"
                                <?php if($single->gender=='Male'){echo 'selected';}?>
                                >Male</option>
                                <option class="register-as-option" value="Female"
                                <?php if($single->gender=='Female'){echo 'selected';}?>
                                >Female</option>
                                <option class="register-as-option" value="Trans"
                                <?php if($single->gender=='Trans'){echo 'selected';}?>
                                >Trans</option>
                            </select>
                        </p>
                        
                        </div>
                    </div>
                    <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Phone: <span>*</span></label>
                            <input type="text" value="<?php echo $single->phone;?>" class="form-control" name ="phone" >
                        </p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>University: <span>*</span></label>
                            <input type="text" value="<?php echo $single->university;?>" class="form-control" name ="university">
                           
                        </p>
                        </div>
                    </div>
                    <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Degree: <span>*</span></label>
                            <input type="text" value="<?php echo $single->degree;?>" class="form-control" name ="degree">
                        </p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Image: <span>*</span></label>
                            <img src="<?php echo base_url()?>uploads/teacher_image/<?php echo $single->image_src;?>" height=100px; width=100px;>
                             <input type="file" value="<?php echo $single->image_src;?>" class="form-control" name ="image_src"> 
                           
                        </p>
                        </div>
                    </div>


                    <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Address1: <span>*</span></label>
                            <input type="text" value="<?php echo $single->address1;?>" class="form-control" name ="address1">
                        </p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                           <label>Address2: <span>*</span></label>
                            <input type="text" value="<?php echo $single->address2;?>" class="form-control" name ="address2"> 
                           
                        </p>
                        </div>
                    </div>
                    <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Town: <span>*</span></label>
                            <input type="text" value="<?php echo $single->town;?>" class="form-control" name ="town">
                        </p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                           <label>County: <span>*</span></label>
                            <input type="text" value="<?php echo $single->county;?>" class="form-control" name ="county"> 
                        </p>
                        </div>
                    </div>
                    <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Country: <span>*</span></label>
                            <select name="country" class="form-control" id="country">
                                <option class="register-as-option" value="UK"
                                <?php if($single->country=='UK'){echo 'selected';}?>
                                >United Kingdom</option>
                                <option class="register-as-option" value="France"
                                <?php if($single->country=='France'){echo 'selected';}?>
                                >France</option>
                                <option class="register-as-option" value="US"
                                <?php if($single->country=='US'){echo 'selected';}?>
                                >United States</option>
                                <option class="register-as-option" value="Germany"
                                <?php if($single->country=='US'){echo 'selected';}?>
                                >Germany</option>
                            </select>
                        </p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                           <label>Post Code: <span>*</span></label>
                            <input type="text" value="<?php echo $single->postalcode;?>" class="form-control" name ="postalcode"> 
                        </p>
                        </div>
                    </div>
                    <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Date of Birth: <span>*</span></label>
                            <input type="date" value="<?php echo $single->dateofbirth;?>" class="form-control" name ="dateofbirth">

                        </p>
                        </div>
                        
                    </div>
                    <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                          <label for="distance">Distance Willing to Travel</label>
                                <select name="travel" class="form-control" id="distance">
                                    <option class="register-as-option" value="home"
                                    <?php if($single->travel=='home'){echo 'selected';}?>
                                    >Home Only</option>
                                    <option class="register-as-option" value="5 miles"
                                    <?php if($single->travel=='5 miles'){echo 'selected';}?>
                                    >Within 5 miles</option>
                                    <option class="register-as-option" value="10 miles"
                                    <?php if($single->travel=='10 miles'){echo 'selected';}?>
                                    >Within 10 miles</option>
                                    <option class="register-as-option" value="20 miles"
                                    <?php if($single->travel=='20 miles'){echo 'selected';}?>
                                    >Within 20 miles</option>
                                    <option class="register-as-option" value="50 miles"
                                    <?php if($single->travel=='50 miles'){echo 'selected';}?>
                                    >Within 50 miles</option>
                                </select> 
                        </p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>language: <span>*</span></label>
                            <select name="language" class="form-control" id="distance">
                                    <option class="register-as-option" value="English"
                                    <?php if($single->language=='English'){echo 'selected';}?>
                                    >English</option>
                                    <option class="register-as-option" value="German"
                                    <?php if($single->language=='German'){echo 'selected';}?>
                                    >German</option>
                                    <option class="register-as-option" value="French"
                                    <?php if($single->language=='French'){echo 'selected';}?>
                                    >French</option>
                                    <option class="register-as-option" value="Japanese"
                                    <?php if($single->language=='Japanese'){echo 'selected';}?>
                                    >Japanese</option>
                                    <option class="register-as-option" value="Spanish"
                                    <?php if($single->language=='Spanish'){echo 'selected';}?>
                                    >Spanish</option>
                                    <option class="register-as-option" value="Chinese"
                                    <?php if($single->language=='Chinese'){echo 'selected';}?>
                                    >Chinese</option>
                                    <option class="register-as-option" value="Arabic"
                                    <?php if($single->language=='Arabic'){echo 'selected';}?>
                                    >Arabic</option>
                                    <option class="register-as-option" value="Czech"
                                    <?php if($single->language=='Czech'){echo 'selected';}?>
                                    >Czech</option>
                                    <option class="register-as-option" value="Irish"
                                    <?php if($single->language=='Irish'){echo 'selected';}?>
                                    >Irish</option>
                                    <option class="register-as-option" value="Sweddish"
                                    <?php if($single->language=='Sweddish'){echo 'selected';}?>
                                    >Sweddish</option>
                                </select>
                        </p>
                        </div>
                    </div>

                    <div class="formhold row">
                       <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                           <label>Your Bio: <span>*</span></label>
                            
                            <textarea name="yourbio" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Your Bio"><?php echo $single->yourbio;?></textarea> 
                        </p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                           <label>Experience: <span>*</span></label>
                            
                            <textarea name="experience" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Experience"><?php echo $single->experience;?></textarea> 
                        </p>
                        </div>
                    </div>
                    <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                           <label>  Price: <span>*</span></label>
                            <input type="text" value="<?php echo $single->price;?>" class="form-control" name ="price"> 
                        </p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Total Session: <span>*</span></label>
                            <input type="text" value="<?php echo $single->total_session;?>" class="form-control" name ="total_session">
                        </p>
                        </div>
                    </div>
                    <div class="formhold row">
                       <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                           <label>About: <span>*</span></label>
                            
                            <textarea name="about" class="form-control editor_big" id="inputslidercaption" placeholder="Enter about"><?php echo $single->about;?></textarea> 
                        </p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                           <label>Session: <span>*</span></label>
                            
                            <textarea name="session" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Session"><?php echo $single->session;?></textarea> 
                        </p>
                        </div>
                    </div>

                    <!-- ////// -->


   
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">Qualification</th>
                        <th scope="col">Grade</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php //foreach($qualification_data as $qualification){  ?>
                      <!-- <tr>
                        <td><?php echo $qualification->subjects;?></td>
                        <td><?php echo $qualification->levels;?></td>
                        <td><?php echo $qualification->grade;?></td>
                      </tr> -->
                        <?php //} ?>
                      <tr>
                        <td>Maths</td>
                        <td>A-Level</td>
                        <td>A*</td>
                      </tr>
                      
                    </tbody>
                  </table>
            </div>


             





                                  <br><br><br>


                    <!-- ////// -->
                    <div class="form-group">
                        <label for="inputslidercaption">Subjects </label><br>
                        <?php
                         $sub=json_decode($single->subjects); // from signup table
                        foreach($subjects_data as $multi){  // from subject table
                            //echo '<pre>';
                            //print_r($multi); 
                         //echo $multi->name;  die;
                           
                            if(in_array($multi->name,$sub)){  ?>
                        
                                <input type='checkbox' name='subjects[]' value='<?php echo $multi->name ;?>' checked> &nbsp; <?php echo $multi->name; ?>&nbsp;
                                <?php  }else{ ?>
                                <input type='checkbox' name='subjects[]' value='<?php echo $multi->name;?>'> &nbsp; <?php echo $multi->name ?> &nbsp;
                                <?php } ?>
                   
                            <?php }   ?>
                        <?php echo form_error('subjects[]', '<div class="error">', '</div>'); ?> 
                    </div>
                    <div class="form-group">
                    <label for="inputslidercaption">Levels </label><br>
                    <?php
                        $lev=json_decode($single->levels);
                        // echo '<pre>';
                        // print_r($lev);die;
                        foreach($levels_data as $multilevel){

                        if(in_array($multilevel->name,$lev)){  ?>
                
                        <input type='checkbox' name='levels[]' value='<?php echo $multilevel->name ;?>' checked> &nbsp; <?php echo $multilevel->name; ?>&nbsp;
                        <?php  }else{ ?>
                        <input type='checkbox' name='levels[]' value='<?php echo $multilevel->name;?>'> &nbsp; <?php echo $multilevel->name ?> &nbsp;
                        <?php } ?>

                    <?php }   ?>
                    
                    <?php echo form_error('levels[]', '<div class="error">', '</div>'); ?> 
                </div>

                    <!-- <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                           <label>  subject_offered: <span>*</span></label>
                            <input type="text" value="<?php echo $single->subject_offered;?>" class="form-control" name ="price"> 
                        </p>
                        </div>
                       
                    </div> -->

                    <div class="form-group">
                        <label for="inputslidercaption">Subject Offered </label><br>
                        <?php
                         $offered=json_decode($single->subject_offered);
                        foreach($subject_offered as $off){
                            //echo '<pre>';
                            //print_r($multi); 
                         //echo $multi->name;  die;
                           
                            if(in_array($off->name,$offered)){  ?>
                        
                                <input type='checkbox' name='subject_offered[]' value='<?php echo $off->name ;?>' checked> &nbsp; <?php echo $off->name; ?>&nbsp;
                                <?php  }else{ ?>
                                <input type='checkbox' name='subject_offered[]' value='<?php echo $off->name;?>'> &nbsp; <?php echo $off->name ?> &nbsp;
                                <?php } ?>
                   
                            <?php }   ?>
                        <?php echo form_error('subject_offered[]', '<div class="error">', '</div>'); ?> 
                    </div>
                    <!--  -->
                    
                    
                   
                    
                
                
            

             <div class="form-group">
                    <label for="inputslidercaption">Grade </label><br>
                    <?php
                        foreach($grade_data as $gra){
                        // echo '<pre>';
                        // print_r($gra); 
                        // echo $gra->name;  die;
                           $grad2 = $gra->name;
                          // $single->grade;  
                    ?>
                    
                     <input type="radio" name="grade" value="<?php echo $grad2;?>" 
                      <?php if($single->grade == $grad2) echo "checked" ?>
                      >
                     &nbsp;  <?php echo $grad2;?>&nbsp;
                    <?php } ?>
                    <?php echo form_error('grade', '<div class="error">', '</div>'); ?> 
                   
            </div>
        <div class="form-group">
            <label for="inputslidercaption">AVAILABILITY </label><br>
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
                                <?php
                                    foreach($timing_data as $time){
                                 ?>
                                <tr>
                                    <th scope="row"><?php echo $time->timing;?></th>
                                    <!-- <td><span class="az-no"><i class="fas fa-times-circle"></i></span></td>
                                    <td><span class="az-no"><i class="fas fa-times-circle"></i></span></td>
                                    <td><span class="az-no"><i class="fas fa-times-circle"></i></span></td>
                                    <td><span class="az-no"><i class="fas fa-times-circle"></i></span></td>
                                    <td><span class="az-no"><i class="fas fa-times-circle"></i></span></td>
                                    <td><span class="az-yes"><i class="fas fa-check-circle"></i></span></td>
                                    <td><span class="az-yes"><i class="fas fa-check-circle"></i></span></td> -->
                                </tr>
                              
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
        </div>
                
                 <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Rating: <span>*</span></label>
                            <div class="rateyo" id= "rating"
                             data-rateyo-rating="<?php echo $single->rating;?>"
                             data-rateyo-num-stars="5"
                             data-rateyo-score="3">
                            </div>
                            <!-- <span class='result'><?php echo $single->rating;?></span> -->
                            <input type="hidden" name="rating" value="<?php echo $single->rating;?>">
                        </p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Total Reviews: <span>*</span></label>
                            <input type="text" value="<?php echo $single->total_reviews;?>" class="form-control" name ="total_reviews">
                        </p>
                        </div>
                        
                    </div>  
                       
                
                 
                <button type="submit" class="btn btn-info">Submit</button>
            </form>
            <?php } ?>
        </div>

    </div>
</section>

            </div>
        </div>
        <!-- page end-->
    </section>
</section>



     <!-- <div class="form-group">
                    <label for="inputslidercaption">Subjects </label><br>
                <?php
                  $sub=json_decode($single->subjects);
                ?>
                
                <input type="checkbox" name="subjects[]" value="Chemistry" <?php echo(in_array("Chemistry",$sub) ? 'checked=""' : '')?>>&nbsp;Chemistry&nbsp;
            </div> -->

<!-- rateyo // Rating  sysytem// rateYo-->
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



<!-- add more dropdown -->
<!-- <script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="addmore[][name]" placeholder="Enter your Name" class="form-control name_list" required /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });
  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
  
    });  
</script> -->

