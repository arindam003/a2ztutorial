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
                          <label>Slug Name: <span>*</span></label>
                            <input type="text" value="<?php echo $single->slug_name;?>" class="form-control" name ="slug_name" disabled>  
                           
                        </p> 
                        
                        </div>
                    </div>
                    <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <!-- <p>
                            <label>Uni Email : <span>*</span></label>
                            <input type="text" value="<?php echo $single->uni_emaildomain;?>" class="form-control" disabled >
                        </p> -->
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                           <label>Personal Email: <span>*</span></label>
                            <input type="email" class="form-control" name="email" value="<?php echo $single->email;?>">
                        </p>
                        </div>
                    </div>
                    
                    <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <label>Date of Birth: <span>*</span></label>
                            <input type="date" value="<?php echo $single->dateofbirth;?>" class="form-control" name ="dateofbirth">
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <p>
                            <label>Gender: <span>*</span></label></p>
                            <p >
                            <input name="gender"  type="radio" id="gender" value="Male" <?php if($single->gender=='Male'){echo "checked=checked";}?>/>&nbsp;Male 
                            <input name="gender"  type="radio" id="gender" value="Female" <?php if($single->gender=='Female'){echo "checked=checked";}?>/>&nbsp;Female 
                            <input name="gender" type="radio" id="gender" value="Trans" <?php if($single->gender=='Trans'){echo "checked=checked";}?>/>&nbsp;Trans
                            
                            <!-- <select name="gender" class="form-control" id="gender">
                                <option class="register-as-option" value="Male"
                                <?php if($single->gender=='Male'){echo 'selected';}?>
                                >Male</option>
                                <option class="register-as-option" value="Female"
                                <?php if($single->gender=='Female'){echo 'selected';}?>
                                >Female</option>
                                <option class="register-as-option" value="Trans"
                                <?php if($single->gender=='Trans'){echo 'selected';}?>
                                >Trans</option>
                            </select> -->
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
                            <?php
                                foreach($university_data as $university){
                                    if($university->id == $single->university){?>
                            <input type="text" value="<?php echo $university->uni_name;?>" class="form-control" disabled>
                           <?php } } ?>
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
                            <label>Preferred Location: <span>*</span></label>
                            <textarea name="preferred_location" cols="5" rows="3" class="form-control " id="inputslidercaption" placeholder="Enter Preferred Location"><?php echo $single->preferred_location;?></textarea>
                           
                            
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
                    <!-- <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Date of Birth: <span>*</span></label>
                            <input type="date" value="<?php echo $single->dateofbirth;?>" class="form-control" name ="dateofbirth">

                        </p>
                        </div>
                        
                    </div> -->
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
                                    >Within 5 miles radius</option>
                                    <option class="register-as-option" value="10 miles"
                                    <?php if($single->travel=='10 miles'){echo 'selected';}?>
                                    >Within 10 miles radius</option>
                                    <option class="register-as-option" value="20 miles"
                                    <?php if($single->travel=='20 miles'){echo 'selected';}?>
                                    >Within 20 miles radius</option>
                                    <option class="register-as-option" value="50 miles"
                                    <?php if($single->travel=='50 miles'){echo 'selected';}?>
                                    >Within 50 miles radius</option>
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
                           <label>  Hourly Rate: <span>*</span></label>
                            <input type="text" value="<?php echo $single->price;?>" class="form-control" name ="price"> 
                        </p>
                        <?php echo form_error('price', '<div class="error">', '</div>'); ?>
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
                        <?php echo form_error('about', '<div class="error">', '</div>'); ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                           <label>Session: <span>*</span></label>
                            
                            <textarea name="session" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Session"><?php echo $single->session;?></textarea> 
                        </p>
                        <?php echo form_error('session', '<div class="error">', '</div>'); ?>
                        </div>
                    </div>

                  

                    <div class="form-group">
                        <label for="inputslidercaption">Subject Offered </label><br>
                        <?php
                         $offered=json_decode($single->subject_offered); // 2)) fetch from tbl_signup
                         // print_r($offered); die;
                         // echo "<pre>";print_r($offered);die;
                         //echo "<pre>";print_r($single->subject_offered);die;
                        foreach($subject_offered as $off){  //1))  fetch from tbl_subjects
                            //echo '<pre>';
                           
                         //echo $off->name;  die;
                           
                            if(in_array($off->name,$offered)){  // 3)) checked array or not
                            ?>
                        
                                <input type='checkbox' name='subject_offered[]' value='<?php echo $off->name ;?>' checked> &nbsp; <?php echo $off->name.' ,' ?>&nbsp;
                                <?php  }else{ ?>
                                <input type='checkbox' name='subject_offered[]' value='<?php echo $off->name;?>'> &nbsp; <?php echo $off->name .' ,'?> &nbsp;
                                <?php } ?>
                   
                            <?php }   ?>
                        <?php echo form_error('subject_offered[]', '<div class="error">', '</div>'); ?> 
                    </div>
                   
                 <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            
                         <p>
                            <label>Rating: <span>*</span></label>
                            <div class="form-group">
                               <div class="rateyo" id= "rating"
                                     data-rateyo-rating="<?php echo $single->rating;?>"
                                     data-rateyo-num-stars="5"
                                     data-rateyo-score="3">
                                </div>

                                <span class='result'><?php echo $single->rating;?></span>
                                <input type="hidden" name="rating" value="<?php echo $single->rating;?>">
                            </div>
                        </p> 
                        <?php echo form_error('rating', '<div class="error">', '</div>'); ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Total Reviews: <span>*</span></label>
                            <input type="text" value="<?php echo $single->total_reviews;?>" class="form-control" name ="total_reviews">
                            <?php echo form_error('total_reviews', '<div class="error">', '</div>'); ?>
                        </p>
                        </div>
                      </div>  
                       

                    <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Lession Complete: <span>*</span></label>
                            <input type="text" value="<?php echo $single->total_session;?>" class="form-control" name ="total_session">
                           
                           
                        </p>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <p>
                            <label>In Person: <span>*</span></label>
                            <input name="in_person"  type="radio" id="in_person" value="1" <?php if($single->in_person=='1'){echo "checked=checked";}?>/>&nbsp;Yes 
                            <input name="in_person"  type="radio" id="in_person" value="0" <?php if($single->in_person=='0'){echo "checked=checked";}?>/>&nbsp;No 
                            <!-- <select name="in_person" class="form-control" >
                                <option class="register-as-option" value="1"
                                <?php if($single->in_person=='1'){echo 'selected';}?>
                                >YES</option>
                                <option class="register-as-option" value="0"
                                <?php if($single->in_person=='0'){echo 'selected';}?>
                                >NO</option>
                               
                            </select> -->
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



    
<!--rateyo // Rating  sysytem-->
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