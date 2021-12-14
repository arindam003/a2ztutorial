  <?php 
 if($this->session->flashdata('success_msg')!="") { ?>
        <div class="clearfix"></div>
    <div class="alert alert-success">
      <strong>Success!</strong> <?=$this->session->flashdata('success_msg');?>
    </div>
      <?php  
      $this->session->unset_userdata('success_msg');
  }
?>
 <section class="profile-body">
        <div class="container">
            <div class="row">
                <?php  
                
                foreach($teacherprofile_data as $profile){  ?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="profile-wrapper">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="mt-3">
                                        <img  src="<?php echo base_url()?>admin/uploads/teacher_image/<?php echo $profile->image_src;?>" width="100" height="100" >
                                        
                                        <h4><?php echo $profile->name;?></h4>
                                        <p class="text-secondary mb-1">Teacher</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="profile-wrapper">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Title</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text"  class="form-control" disabled value="<?php echo $profile->title;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text"  class="form-control" disabled value="<?php echo $profile->name;?>">
                                    </div>
                                </div>
                                
                                
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>University</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php
                                        foreach($university_data as $university){
                                            if($university->id == $profile->university){?>
                                        <input type="text"  class="form-control" disabled value="<?php echo $university->uni_name;?>">
                                        <?php } } ?>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Uni Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" disabled value="<?php echo $profile->uni_emaildomain;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text"  class="form-control" disabled value="<?php echo $profile->phone;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Gender</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text"  class="form-control" disabled value="<?php echo $profile->gender;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Address1</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" disabled value="<?php echo $profile->address1;?>">
                                    </div>
                                </div>
                                
                            <!--    <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Town</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" disabled value="<?php echo $profile->town;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>County</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text"  class="form-control" disabled value="<?php echo $profile->county;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Country</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text"  class="form-control" disabled value="<?php echo $profile->country;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Postal Code</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="number" class="form-control" disabled value="<?php echo $profile->postalcode;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Travel</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" disabled value="<?php echo $profile->travel;?>">
                                    </div>
                                </div>
                                 <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Language</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text"  class="form-control" disabled value="<?php echo $profile->language;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Your Bio</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text"  class="form-control" disabled value="<?php echo $profile->yourbio;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Experience</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" disabled value="<?php echo $profile->experience;?>">
                                    </div>
                                </div> -->
                                

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                       
                                        <button class="save-changes-button"><a  href="<?php echo base_url();?>tutors/edit/<?php echo $profile->slug_name;?>">Edit</a></button>
                                        <button class="save-changes-button">
                                            <a  href="<?php echo base_url('tutors/changepassword');?>">Change Password</a></button>

                                       
                                        
          
            
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </section>