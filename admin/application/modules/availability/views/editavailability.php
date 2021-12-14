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
                           <h3> Edit Availability <a href="<?php echo base_url('availability');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                            <?php  foreach($single_data as $single){ ?>
                            <form role="form" method="POST" action="" >
                                
                               
                            <div class="formhold row">
                            
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                            
                            <p>
                                <label>Teacher Name: <span>*</span></label>
                                <?php  
                                  
                                foreach($teacher_data as $teacher){
                                    
                                    if($teacher->id == $single->teacher_id){


                                 ?>
                                <input type="text" class="form-control" 

                                value="<?php echo $teacher->name ;?>" disabled>

                                <?php  } } ?>
                               
                                <?php echo form_error('teacher_id','<div class="text-danger">','</div>');?>
                            </p>  
                           
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                <p>
                                <label>Timings: <span>*</span></label>
                                <select name="timing_id" class="form-control" id="timing_id">
                                    <option>------------------Select Timings------------------</option>
                                    <?php  foreach($timing_data as $time){   ?>
                                   <option value="<?php 

                                        echo $time->id ;?>" 
                                        <?php if($time->id == $single->timing_id){ 
                                            echo 'selected' ;} ?>><?php echo $time->timing ;?></option>

                                   <?php } ?>
                                   
                                </select>
                                <?php echo form_error('timing','<div class="text-danger">','</div>');?>
                            </p>
                           
                            </div>
                        </div>
                    <div class="formhold row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <label>Days: <span>*</span></label><br>
                        <div class="form-control">
                            <input type="checkbox" name="Mon" 
                             <?php if($single->mon == 'on') {?>
                            value="<?php echo $single->mon;?>" checked <?php }?>>&nbsp;Mon&nbsp;

                            <input type="checkbox" name="Tue" 
                             <?php if($single->tue == 'on') {?>
                            value="<?php echo $single->tue ;?>" checked <?php }?>>&nbsp;Tue&nbsp;

                            <input type="checkbox" name="Wed" 
                            <?php if($single->wed == 'on') {?>
                            value="<?php echo $single->wed ;?>" checked <?php }?>>&nbsp;Wed&nbsp;

                            <input type="checkbox" name="Thu" 
                            <?php if($single->thu == 'on') {?>
                            value="<?php echo $single->thu ;?>" checked <?php }?>>&nbsp;Thu&nbsp;

                            <input type="checkbox" name="Fri" 
                            <?php if($single->fri == 'on') {?>
                            value="<?php echo $single->fri ;?>" checked <?php }?>>&nbsp;Fri&nbsp;

                            <input type="checkbox" name="Sat" 
                            <?php if($single->sat == 'on') {?>
                            value="<?php echo $single->sat ;?>" checked <?php }?>>&nbsp;Sat&nbsp;

                            <input type="checkbox" name="Sun" 
                            <?php if($single->sun == 'on') {?>
                            value="<?php echo $single->sun ;?>" checked <?php }?>>&nbsp;Sun&nbsp;
                        </div>
                    </div>
                </div>
                <br><br>
                       
                                 
                                 
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