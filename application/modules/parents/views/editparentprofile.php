 <section class="profile-body">
        <div class="container">
            <div class="row">
               
                
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="profile-wrapper">
                        <div class="card">
                             <?php  foreach($single_data as $single){  ?>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name ="name"  class="form-control" value="<?php echo $single->name;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Image</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                       <img  src="<?php echo base_url()?>admin/uploads/parent_image/<?php echo $single->image_src;?>" width="100" height="100">
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
                                        <textarea name ="address1" class="form-control"><?php echo $single->address1;?></textarea>
                                        
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Address2</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                       <textarea name ="address2" class="form-control"><?php echo $single->address2;?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Town</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name ="town" class="form-control" value="<?php echo $single->town;?>">
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
                                        <h6>Date of Birth:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="date" name ="dateofbirth" class="form-control" value="<?php echo $single->dateofbirth;?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6>Post Code:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name ="postalcode" class="form-control" value="<?php echo $single->postalcode;?>">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        
                                        <button type="submit"class="save-changes-button">Update</button>
                                        <button class="save-changes-button"><a  href="<?php echo base_url();?>parents/<?php echo $profile->id;?>">Back</a></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
    </section>