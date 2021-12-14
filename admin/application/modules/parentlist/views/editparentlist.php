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
               <h3> Edit Parent <a href="<?php echo base_url('parentlist');?>" class="btn btn-danger flotright">Back</a></h3>
            </header>
            <div class="panel-body">
                <div>
                <?php  foreach($single_data as $single){?>
               
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    
                    <div class="formhold row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <p>
                                <label>Name: <span>*</span></label>
                                <input type="text" value="<?php echo $single->name;?>"  class="form-control" name ="name" >
                            </p>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <p>
                              <label>Usertype: <span>*</span></label>
                               <?php  
                                  
                                foreach($usertype_data as $usertype) {
                                        if($usertype->type_id == $single->usertype_id) {?>
                                 <input type="text" class="form-control" 

                                value="<?php echo $usertype->type_name;;?>" disabled>

                             <?php  } } ?>
                               
                            </p>
                            </div>
                        </div>
                   
                    <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <label>Email : <span>*</span></label>
                            <input type="email" class="form-control" name="email" value="<?php echo $single->email;?>">
                        </div> 

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <p>
                            <label>Gender: <span>*</span></label></p>
                            <p >
                            <input name="gender"  type="radio" id="gender" value="Male" <?php if($single->gender=='Male'){echo "checked=checked";}?>/>&nbsp;Male 
                            <input name="gender"  type="radio" id="gender" value="Female" <?php if($single->gender=='Female'){echo "checked=checked";}?>/>&nbsp;Female 
                            <input name="gender" type="radio" id="gender" value="Trans" <?php if($single->gender=='Trans'){echo "checked=checked";}?>/>&nbsp;Trans
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
                            <label>Phone: <span>*</span></label>
                            <input type="text" value="<?php echo $single->phone;?>" class="form-control" name ="phone" >
                        </p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                            <label>Image: <span>*</span></label>
                            <img src="<?php echo base_url()?>uploads/parent_image/<?php echo $single->image_src;?>" height=100px; width=100px;>
                             <input type="file" value="<?php echo $single->image_src;?>" class="form-control" name ="image_src"> 
                           
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
                           <label>Country: <span>*</span></label>
                            <input type="text" value="<?php echo $single->country;?>" class="form-control" name ="country"> 
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
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>
                           <label>Post Code: <span>*</span></label>
                            <input type="text" value="<?php echo $single->postalcode;?>" class="form-control" name ="postalcode"> 
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


