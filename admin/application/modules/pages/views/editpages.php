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
                           <h3> Edit pages <a href="<?php echo base_url('pages');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
							<?php foreach($single_data as $singledata){ ?>
                            <form role="form" method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="inputslidercaption">Title</label>
                                    <input name="title" value="<?php echo $singledata->title;?>" type="text" class="form-control" id="inputslidercaption" >
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Slug Name </label>
                                    <input name="page_slug" value="<?php echo $singledata->page_slug;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Page Slug Name">
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Heading </label>
                                    <input name="heading_title"  value="<?php echo $singledata->heading_title;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Heading Title">
                                </div>
								
                                 <div class="form-group">
                                    <label for="inputslidercaption">Description</label>
                                    <textarea name="descrip" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"><?php echo $singledata->descrip;?></textarea>
                                </div>
                                <div class="form-group">
                                <img src="<?php echo base_url()?>uploads/pages_image/<?php echo $singledata->image_src;?>" height=100px; width=100px;>
                                    <label for="inputsliderimage"> Image</label>
                                    <input type="file" name="image_src" value ="<?php echo base_url()?>uploads/pages_image/<?php echo $singledata->image_src;?>" id="inputsliderimage" accept="image/*" />
                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>
                                </div>

                                 <!-- Section 2 -->
                                <div class="form-group">
                                    <label for="inputslidercaption">Heading </label>
                                    <input name="heading2" value="<?php echo $singledata->heading2;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Heading ">
                                </div>
                                
                                 <div class="form-group">
                                    <label for="inputslidercaption">Description</label>
                                    <textarea name="descrip2" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"><?php echo $singledata->descrip2;?></textarea>
                                </div>
                                <div class="form-group">
                                <img src="<?php echo base_url()?>uploads/pages_image/<?php echo $singledata->image_src2;?>" height=100px; width=100px;>
                                    <label for="inputsliderimage"> Image</label>
                                    <input type="file" name="image_src2" value ="<?php echo base_url()?>uploads/pages_image/<?php echo $singledata->image_src2;?>" id="inputsliderimage" accept="image/*" />

                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Heading </label>
                                    <input name="heading3" value="<?php echo $singledata->heading3;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Heading ">
                                </div>
                                
                                 <div class="form-group">
                                    <label for="inputslidercaption">Description</label>
                                    <textarea name="descrip3" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"><?php echo $singledata->descrip3;?></textarea>
                                </div>
                                <div class="form-group">
                                    
                                <img src="<?php echo base_url()?>uploads/pages_image/<?php echo $singledata->image_src3;?>" height=100px; width=100px;>
                               
                                    <label for="inputsliderimage"> Image</label>
                                    <input type="file" name="image_src3" value ="<?php echo base_url()?>uploads/pages_image/<?php echo $singledata->image_src3;?>" id="inputsliderimage" accept="image/*" />

                                    <p class="help-block" style="color:red;"> Select Only Image.</p>
                                </div>

                                <!-- Section 4 -->
                                <div class="form-group">
                                    <label for="inputslidercaption">Heading </label>
                                    <input name="heading4" value="<?php echo $singledata->heading4;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Heading ">
                                </div>
                                
                                 <div class="form-group">
                                    <label for="inputslidercaption">Description</label>
                                    <textarea name="descrip4" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"><?php echo $singledata->descrip4;?></textarea>
                                </div>
                                <div class="form-group">
                                   
                                <img src="<?php echo base_url()?>uploads/pages_image/<?php  echo $singledata->image_src4;?>" height=100px; width=100px;>
                               
                                    <label for="inputsliderimage"> Image</label>
                                    <input type="file" name="image_src4" value ="<?php echo base_url()?>uploads/pages_image/<?php echo $singledata->image_src4;?>" id="inputsliderimage" accept="image/*" />
                                    <p class="help-block" style="color:red;"> Select Only Image.</p>
                                </div>
                                <!-- Section 5 -->
                                <div class="form-group">
                                    <label for="inputslidercaption">Heading </label>
                                    <input name="heading5" value="<?php echo $singledata->heading5;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Heading ">
                                </div>
                                
                                 <div class="form-group">
                                    <label for="inputslidercaption">Description</label>
                                    <textarea name="descrip5" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"><?php echo $singledata->descrip5;?></textarea>
                                </div>
                                <div class="form-group">
                                    <img src="<?php echo base_url()?>uploads/pages_image/<?php  echo $singledata->image_src5;?>" height=100px; width=100px;>
                                    <label for="inputsliderimage"> Image</label>
                                    <input type="file" name="image_src5" value ="<?php echo base_url()?>uploads/pages_image/<?php echo $singledata->image_src5;?>" id="inputsliderimage" accept="image/*" />
                                    <p class="help-block" style="color:red;"> Select Only Image.</p>
                                </div>




								<div class="form-group">
                                    <label for="inputslidercaption">Meta Title</label>
                                    <input name="meta_title"  value="<?php echo $singledata->meta_title;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Meta Title">
                                </div>
                                  
                                  <div class="form-group">
                                    <label for="inputslidercaption">Meta Keyword</label>
                                    <input name="meta_keyword"  value="<?php echo $singledata->meta_keyword;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Meta Keyword">
                                </div>
								
                                <div class="form-group">
                                    <label for="inputslidercaption">Meta Description</label>
                                    <textarea name="meta_descrip"    class="form-control editor_big" id="inputslidercaption" placeholder="Enter Meta Description"><?php echo $singledata->meta_descrip;?></textarea>
                                </div>
                               
                                <div class="form-group">
                                    <label for="inputslidercaption">Extra Block Title</label>
                                    <input name="extra_title"  value="<?php echo $singledata->extra_title;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Extra Block Title">
                                </div>
								
                                 <div class="form-group">
                                    <label for="inputslidercaption">Extra Block Description</label>
                                    <textarea name="extra_descrip"   class="form-control editor_big" id="inputslidercaption" placeholder="Enter Extra Description"><?php echo $singledata->extra_descrip;?></textarea>
                                </div>
                                
                                
                                 <div class="form-group">
                                    <label for="inputslidercaption">Canonical Tag</label>
                                    <input name="canonical_tag"  value="<?php echo $singledata->canonical_tag;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Canonical Tag">
                                </div>
                                
                                
                                  <div class="form-group">
                                    <label for="inputslidercaption">Robot Index</label><br />
                                     Index <input name="robotindex"  value="index" type="radio" <?php if($singledata->robotindex=='index'){?> checked="checked" <?php }?>>&nbsp;&nbsp;
                                     No Index <input name="robotindex"  value="noindex" type="radio"  <?php if($singledata->robotindex=='noindex'){?> checked="checked" <?php } ?> ><br />
                                    Follow <input name="robot_index"  value="follow" type="radio" <?php if($singledata->robot_index=='follow'){?> checked="checked" <?php } ?>>&nbsp;&nbsp;
                                     No Follow <input name="robot_index"  value="nofollow" type="radio"  <?php if($singledata->robot_index=='nofollow'){?> checked="checked" <?php } ?> >
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