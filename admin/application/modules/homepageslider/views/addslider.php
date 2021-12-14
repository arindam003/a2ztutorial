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
                           <h3> Add Slider <a href="<?php echo base_url('homepageslider');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                                <form role="form" method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="inputslidercaption">Slide Caption1</label>
                                    <input name="image_caption" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Caption">
                                </div>
								<div class="form-group">
                                    <label for="inputslidercaption2">Slide Caption2</label>
                                    <input name="image_caption2" type="text" class="form-control" id="inputslidercaption2" placeholder="Enter Caption">
                                </div>
								<div class="form-group">
                                    <label for="inputslidercaption3">Slide Caption3</label>
                                    <input name="image_caption3" type="text" class="form-control" id="inputslidercaption3" placeholder="Enter Caption">
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption2">Link Button Name</label>
                                    <input name="link_bttn_name" type="text" class="form-control" id="inputslidercaption2" placeholder="Enter Link Button Name">
                                </div>
                               
                               <div class="form-group">
                                    <label for="inputslidercaption2">Link Button Slug Link</label>
                                    <input name="link_bttn_link" type="text" class="form-control" id="inputslidercaption2" placeholder="Enter Link Button Slug Link">
                                </div>
                               
                                <div class="form-group">
                                    <label for="inputsliderimage">Slide Image</label>
                                    <input type="file" name="image_src" id="inputsliderimage" accept="image/*" />
                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>
                                </div>
                                <div class="form-group">
                                    <label for="inputsliderimage">Extra Image</label>
                                    <input type="file" name="image_src2" id="inputsliderimage" accept="image/*" />
                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>
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