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
                <?php   foreach($parentprofile_data as $profile){  ?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="profile-wrapper">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="mt-3">
                                        <p><img src="<?php echo base_url();?>admin/uploads/parent_image/<?php echo $profile->image_src; ?>" width="80" height="80"/></p>
                                        <h4><?php echo $profile->name;?></h4>
                                        <p class="text-secondary mb-1">Parent</p> 
                                       
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
                                        <h6>Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" disabled value="<?php echo $profile->name;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" disabled value="<?php echo $profile->email;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" disabled value="<?php echo $profile->phone;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Gender</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" disabled value="<?php echo $profile->gender;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Address1</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea disabled class="form-control"><?php echo $profile->address1;?></textarea>
                                        
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Address2</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea disabled class="form-control"><?php echo $profile->address2;?></textarea>
                                        
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Town</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" disabled value="<?php echo $profile->town;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Country</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" disabled value="<?php echo $profile->country;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Date of Birth</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" disabled value="<?php echo $profile->dateofbirth;?>">
                                    </div>
                                </div>
                                 <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Post Code</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" disabled value="<?php echo $profile->postalcode;?>">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        
                                        <button class="save-changes-button"><a  href="<?php echo base_url('parents/edit/');?><?php echo $profile->slug_name;?>">Edit</a></button>
                                        <button class="save-changes-button">
                                            <a  href="<?php echo base_url('parents/changepassword');?>">Change Password</a></button>

                                        
                                        
           
            
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </section>