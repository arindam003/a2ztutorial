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
                           <h3> Edit Qualifications <a href="<?php echo base_url('qualifications');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                        <div>
                            
                        <form role="form" method="POST" >
                             <?php  foreach($single_data as $single){?>  
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
                                <label>Subjects: <span>*</span></label>
                                <?php  
                                    foreach($subjects_data as $subjects){
                                        if($subjects->id == $single->subject_id){
                                ?>
                                <input type="text" class="form-control" 
                                value="<?php echo $subjects->name ;?>" disabled>
                                <?php  } } ?>
                                <?php echo form_error('subject_id','<div class="text-danger">','</div>');?>
                            </p>
                            </div>

                            
                        </div>

                         <div class="formhold row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <p>
                                <label>Levels: <span>*</span></label>
                                <?php  
                                    foreach($levels_data as $levels){
                                        if($levels->id == $single->levels_id){
                                ?>
                                <input type="text" class="form-control" 
                                value="<?php echo $levels->name ;?>" disabled>
                                <?php  } } ?>
                                <?php echo form_error('levels_id','<div class="text-danger">','</div>');?>
                            </p>
                            </div>
                            
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <p>
                                <label>Price: <span>*</span></label>
                                <input type="text" class="form-control" name ="price" value="<?php echo $single->price ;?>">
                                </p> 
                            </div>
                        </div>
                        
                               
                               
                                
                                 
                                <button type="submit" class="btn btn-info">Submit</button>
                            <?php } ?>
                            </form>
                            
                        </div>

                        </div>
                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>
    </section>