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
                           <h3> Add Subjects <a href="<?php echo base_url('subjects');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
							
                            <form role="form" method="POST" action="" enctype="multipart/form-data">
                               
                               
                                <div class="form-group">
                                    <label for="inputslidercaption">Subject Name </label>
                                    <input name="name" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Name ">
                                </div>
                               <div class="form-group">
                                    <label for="inputslidercaption">Slug Name </label>
                                    <input name="subject_slugname" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Slug Name ">
                                </div>
                              <!--  <div class="form-group">
                                    <label for="inputslidercaption">Subject Type </label><br>
                                    <input name="popular_subjects" type="checkbox" id="inputslidercaption" value="1">&nbsp;&nbsp;Popular Subjects
                                </div> -->
                                
                                 
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