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
                           <h3> Add Availability <a href="<?php echo base_url('availability');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
							
                    <form role="form" method="POST" action="">


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
                                <label>Timings: <span>*</span></label>
                                <select name="timing_id" class="form-control" id="timing_id">
                                    <option>------------------Select Timings------------------</option>
                                    <?php  foreach($timing_data as $tim){  ?>
                                    <option  value="<?php echo $tim->id ;?>"><?php echo $tim->timing ;?></option>

                                   <?php } ?>
                                   
                                </select>
                                <?php echo form_error('timing','<div class="text-danger">','</div>');?>
                            </p>
                            </div>
                        </div>

                       
                    <br>
                     <div class="formhold row">
                         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <label for="inputslidercaption">Days</label><br>
                          <div class="form-control">      
                            <input type="checkbox" name="Mon" value="on">&nbsp;Mon&nbsp;
                            <input type="checkbox" name="Tue" value="on">&nbsp;Tue&nbsp;
                            <input type="checkbox" name="Wed" value="on">&nbsp;Wed&nbsp;
                            <input type="checkbox" name="Thu" value="on">&nbsp;Thu&nbsp;
                            <input type="checkbox" name="Fri" value="on">&nbsp;Fri&nbsp;
                            <input type="checkbox" name="Sat" value="on">&nbsp;Sat&nbsp;
                            <input type="checkbox" name="Sun" value="on">&nbsp;Sun&nbsp;
                         </div>
                    </div>
                </div>
                   <br><br>
                        

                                
                                 
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




    <style>

    </style>