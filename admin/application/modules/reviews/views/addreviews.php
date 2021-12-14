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
                           <h3> Add Reviews <a href="<?php echo base_url('reviews');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
							
                            <form role="form" method="POST" action="">

                                <div class="form-group">
                                    <label for="inputslidercaption">Added by Testimonials<span>*</span> </label>
                                    <select name="testimonials_id" class="form-control" id="register">
                                        <option selected disabled>Select</option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="Parent">Parent</option>
                                    </select>
                                </div>
                               
                                <div class="form-group">
                                    <label for="inputslidercaption">Teacher<span>*</span> </label>
                                    <select name="teacher_id" class="form-control" id="register">
                                        <option selected disabled>Select</option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="Parent">Parent</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Subjects<span>*</span> </label>
                                    <select name="subjects_id" class="form-control" id="register">
                                        <option selected disabled>Select</option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="Parent">Parent</option>
                                    </select>
                                </div>
                               
                               
                                
                                 
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