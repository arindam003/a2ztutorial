 <section class="profile-body">
        <div class="container">
            <div class="row">
               
                <?php  foreach($single_data as $single){  ?>
              
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="profile-wrapper">
                        <div class="card">
                            <form role="form" method="POST" action="" enctype="multipart/form-data">
                            <div class="card-body">
                                 <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Title</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                         <input name="title"  type="radio" id="title" value="Mr" <?php if($single->title=='Mr'){echo "checked=checked";}?>/>&nbsp;Mr 
                                        <input name="title"  type="radio" id="title" value="Ms" <?php if($single->title=='Ms'){echo "checked=checked";}?>/>&nbsp;Ms 
                                        <input name="title" type="radio" id="title" value="Mrs" <?php if($single->title=='Mrs'){echo "checked=checked";}?>/>&nbsp;Mrs
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name ="name"  class="form-control" value="<?php echo $single->name;?>">
                                    </div>
                                </div>
                                
                                <input type="hidden" value="<?php echo $single->slug_name;?>" class="form-control" name ="slug_name" >
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Image</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                       <img  src="<?php echo base_url()?>admin/uploads/teacher_image/<?php echo $single->image_src;?>" width="100" height="100">
                                        <input type="file" name="image_src" value="<?php echo $single->image_src;?>" id="inputsliderimage" accept="image/*" />
                                    </div>
                                </div>
                                
                                
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name ="email" class="form-control" value="<?php echo $single->email;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name ="phone" class="form-control" value="<?php echo $single->phone;?>">
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Gender</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                         <input name="gender"  type="radio" id="gender" value="Male" <?php if($single->gender=='Male'){echo "checked=checked";}?>/>&nbsp;Male 
                                        <input name="gender"  type="radio" id="gender" value="Female" <?php if($single->gender=='Female'){echo "checked=checked";}?>/>&nbsp;Female 
                                        <input name="gender" type="radio" id="gender" value="Trans" <?php if($single->gender=='Trans'){echo "checked=checked";}?>/>&nbsp;Trans
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Address1</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea name="address1" cols="5" rows="3" class="form-control " id="inputslidercaption"><?php echo $single->address1;?></textarea>  
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Address2</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name ="address2" class="form-control" value="<?php echo $single->address2;?>">
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Degree</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name ="degree" class="form-control" value="<?php echo $single->degree;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Preferred Location</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                         <textarea name="preferred_location" cols="5" rows="3" class="form-control " id="inputslidercaption"><?php echo $single->preferred_location;?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Hourly Rate</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                         <input type="text" value="<?php echo $single->price;?>" class="form-control" name ="price"> 
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Total Session</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                         <input type="text" value="<?php echo $single->total_session;?>" class="form-control" name ="total_session"> 
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>About</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea name="about" class="form-control editor_big" id="inputslidercaption" ><?php echo $single->about;?></textarea> 
                                          
                                    </div>
                                </div>
                                 <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Session</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea name="session" class="form-control editor_big" id="inputslidercaption" ><?php echo $single->session;?></textarea> 
                                          
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Subject Offered</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php
                                    $offered=json_decode($single->subject_offered);
                                    //print_r($offered); //die;
                                    //echo "<pre>";print_r($single->subject_offered);die;
                                    foreach($subject_offered as $off){
                                        // echo '<pre>';
                                        // echo $off->name;  die;
                                        if(in_array($off->name,$offered)){
                                    ?>
                                    <input type='checkbox' name='subject_offered[]' value='<?php echo $off->name ;?>' checked> &nbsp; <?php echo $off->name.' ,' ?>&nbsp;
                                    <?php  }else{ ?>
                                    <input type='checkbox' name='subject_offered[]' value='<?php echo $off->name;?>'> &nbsp; <?php echo $off->name .' ,'?> &nbsp;
                                   
                                    <?php  } }   ?>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>In Person</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                         <input name="in_person"  type="radio" id="in_person" value="1" <?php if($single->in_person=='1'){echo "checked=checked";}?>/>&nbsp;Yes 
                                        <input name="in_person"  type="radio" id="in_person" value="0" <?php if($single->in_person=='0'){echo "checked=checked";}?>/>&nbsp;No 
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Online Lesson</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                         <input name="online_lesson"  type="radio" id="online_lesson" value="1" <?php if($single->online_lesson=='1'){echo "checked=checked";}?>/>&nbsp;Yes 
                                        <input name="online_lesson"  type="radio" id="online_lesson" value="0" <?php if($single->online_lesson=='0'){echo "checked=checked";}?>/>&nbsp;No 
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Town</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name ="town"  class="form-control" value="<?php echo $single->town;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>County</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name ="county" class="form-control" value="<?php echo $single->county;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Country</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name ="country" class="form-control" value="<?php echo $single->country;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Postal Code</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="number" name ="postalcode" class="form-control" value="<?php echo $single->postalcode;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Date of Birth</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="date" name ="dateofbirth" class="form-control" value="<?php echo $single->dateofbirth;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Travel</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        
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
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Language</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                       
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
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Your Bio</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name ="yourbio" class="form-control" value="<?php echo $single->yourbio;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Experience</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name ="experience" class="form-control" value="<?php echo $single->experience;?>">
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        
                                        <button class="save-changes-button">Update</button>
                                        <button class="save-changes-button"><a  href="<?php echo base_url();?>tutors/<?php echo $profile->id;?>">Back</a></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php } ?>

        </div>
    </section>