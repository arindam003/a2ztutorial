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
                           <h3> Add Qualifications <a href="<?php echo base_url('qualifications');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                        <div>
                            
                        <form role="form" method="POST" >
                               
                        <div class="formhold row">
                            
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <p>
                                <label>Teacher Name: <span>*</span></label>
                                <select name="teacher_id" class="form-control" id="subjects">
                                    <option>------------------Select Teacher------------------</option>
                                    <?php  foreach($teacher_data as $teacher){  ?>
                                    <option  value="<?php echo $teacher->id ;?>"><?php echo $teacher->name ;?></option>

                                   <?php } ?>
                                </select>
                                <?php echo form_error('teacher_id','<div class="text-danger">','</div>');?>
                            </p>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <p>
                                <label>Subjects: <span>*</span></label>
                                <select name="subject_id" class="form-control" id="subjects">
                                    <option>------------------Select Subjects------------------</option>
                                    <?php  foreach($subjects_data as $subjects){  ?>
                                    <option  value="<?php echo $subjects->id ;?>"><?php echo $subjects->name ;?></option>

                                   <?php } ?>
                                   
                                </select>
                                <?php echo form_error('subject_id','<div class="text-danger">','</div>');?>
                            </p>
                            </div>

                            
                        </div>

                         <div class="formhold row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <p>
                                <label>Levels: <span>*</span></label>
                                <select name="levels_id" class="form-control" id="subjects">
                                    <option>------------------Select Levels------------------</option>
                                    <?php  foreach($levels_data as $levels){  ?>
                                    <option  value="<?php echo $levels->id ;?>"><?php echo $levels->name ;?></option>
                                   <?php } ?>
                                </select>
                                <?php echo form_error('levels_id','<div class="text-danger">','</div>');?>
                            </p>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <p>
                                <label>Price: <span>*</span></label>
                                <input type="text" class="form-control" name ="price" placeholder="Enter Price">
                            </p> 
                            
                            </div>
                        </div>
                               <!-- <p>
                                <label>Grade: <span>*</span></label>
                                <select name="grade_id" class="form-control" id="subjects">
                                    <option>------------------Select Grade------------------</option>
                                    <?php // foreach($grade_data as $grade){  ?>
                                    <option  value="<?php //echo $grade->id ;?>"><?php //echo $grade->name ;?></option>
                                   <?php //} ?>
                                </select>
                                <?php //echo form_error('grade_id','<div class="text-danger">','</div>');?>
                            </p> -->
                              
                                
                                 
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