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
                           <h3> Add featured <a href="<?php echo base_url('featured');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
							
                            <form role="form" method="POST" action="" enctype="multipart/form-data">
                               
                                <div class="form-group">
                                    <label for="inputslidercaption">Heading </label>
                                    <input name="heading" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Heading ">
                                </div>
                                <div class="form-group">
                                    <label for="inputsliderimage">Featured Image</label>
                                    <input type="file" name="image_src" id="inputsliderimage" accept="image/*" />
                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>
                                </div>
								
                               <!--  <div class="form-group">
                                    <label for="inputslidercaption">Answer</label>
                                    <textarea name="answer" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Answer"></textarea>
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