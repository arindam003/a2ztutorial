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
                           <h3> Edit Slider <a href="<?php echo base_url();?>homepageslider" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
							<?php foreach($slider as $single_slide) { ?>
                                <form role="form" method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="inputslidercaption">Slide Caption1</label>
                                    <input name="image_caption" value="<?php echo $single_slide->image_caption?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Caption">
                                </div>
								<div class="form-group">
                                    <label for="inputslidercaption2">Slide Caption2</label>
                                    <input name="image_caption2" type="text" value="<?php echo $single_slide->image_caption2?>" class="form-control" id="inputslidercaption2" placeholder="Enter Caption">
                                </div>

								<div class="form-group">
                                    <label for="inputslidercaption3">Slide Caption3</label>
                                    <input name="image_caption3" type="text" value="<?php echo $single_slide->image_caption3?>" class="form-control" id="inputslidercaption3" placeholder="Enter Caption">
                                </div>
                               
                                <div class="form-group">
                                    <label for="inputslidercaption2">Link Button Name</label>
                                    <input name="link_bttn_name" type="text" value="<?php echo $single_slide->link_bttn_name;?>" class="form-control" id="inputslidercaption2" placeholder="Enter Link Button Name">
                                </div>
                               
                               <div class="form-group">
                                    <label for="inputslidercaption2">Link Button Slug Link</label>
                                    <input name="link_bttn_link" type="text" value="<?php echo $single_slide->link_bttn_name;?>" class="form-control" id="inputslidercaption2" placeholder="Enter Link Button Slug Link">
                                </div>
                                
                                
                                <div class="form-group">
								<img src="<?php echo base_url()?>uploads/slider_image/<?php echo $single_slide->image_src;?>" height=100px; width=100px;> 
                                
                                    <label for="inputsliderimage">Slide Image</label>
                                    <input type="file" name="image_src" id="inputsliderimage" accept="image/*" />
									
									<input name="prev_link" type="hidden" value="<?php echo $single_slide->image_src;?>" class="form-control" id="hid_class" placeholder="Enter Link Button Slug Link">
                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>
                                </div>

                                <div class="form-group">
                                <img src="<?php echo base_url()?>uploads/slider_image/<?=$single_slide->image_src2;?>" height=100px; width=100px;>
                                    <label for="inputsliderimage">Extra Image</label>
                                    <input type="file" name="image_src2" id="inputsliderimage" accept="image/*" />
                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>
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