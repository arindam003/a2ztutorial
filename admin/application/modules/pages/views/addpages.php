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
                           <h3> Add pages <a href="<?php echo base_url('pages');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
							
                            <form role="form" method="POST" action="" enctype="multipart/form-data">
                                <!-- Section 1 -->
                                <div class="form-group">
                                    <label for="inputslidercaption">Title</label>
                                    <input name="title" type="text" class="form-control" id="inputslidercaption" >
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Slug Name </label>
                                    <input name="page_slug" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Page Slug Name">
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Heading </label>
                                    <input name="heading_title" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Heading Title">
                                </div>
								
                                 <div class="form-group">
                                    <label for="inputslidercaption">Description</label>
                                    <textarea name="descrip" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputsliderimage"> Image</label>
                                    <input type="file" name="image_src" id="inputsliderimage" accept="image/*" />
                                    <p class="help-block" style="color:red;"> Select Only Image.</p>
                                </div>

                                <!-- Section 2 -->
                                <div class="form-group">
                                    <label for="inputslidercaption">Heading </label>
                                    <input name="heading2" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Heading ">
                                </div>
                                
                                 <div class="form-group">
                                    <label for="inputslidercaption">Description</label>
                                    <textarea name="descrip2" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputsliderimage"> Image</label>
                                    <input type="file" name="image_src2" id="inputsliderimage" accept="image/*" />
                                    <p class="help-block" style="color:red;"> Select Only Image.</p>
                                </div>
                                <!-- Section 3 -->
                                <div class="form-group">
                                    <label for="inputslidercaption">Heading </label>
                                    <input name="heading3" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Heading ">
                                </div>
                                
                                 <div class="form-group">
                                    <label for="inputslidercaption">Description</label>
                                    <textarea name="descrip3" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputsliderimage"> Image</label>
                                    <input type="file" name="image_src3" id="inputsliderimage" accept="image/*" />
                                    <p class="help-block" style="color:red;"> Select Only Image.</p>
                                </div>

                                <!-- Section 4 -->
                                <div class="form-group">
                                    <label for="inputslidercaption">Heading </label>
                                    <input name="heading4" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Heading ">
                                </div>
                                
                                 <div class="form-group">
                                    <label for="inputslidercaption">Description</label>
                                    <textarea name="descrip4" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputsliderimage"> Image</label>
                                    <input type="file" name="image_src4" id="inputsliderimage" accept="image/*" />
                                    <p class="help-block" style="color:red;"> Select Only Image.</p>
                                </div>
                                <!-- Section 5 -->
                                <div class="form-group">
                                    <label for="inputslidercaption">Heading </label>
                                    <input name="heading5" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Heading ">
                                </div>
                                
                                 <div class="form-group">
                                    <label for="inputslidercaption">Description</label>
                                    <textarea name="descrip5" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputsliderimage"> Image</label>
                                    <input type="file" name="image_src5" id="inputsliderimage" accept="image/*" />
                                    <p class="help-block" style="color:red;"> Select Only Image.</p>
                                </div>

								<div class="form-group">
                                    <label for="inputslidercaption">Meta Title</label>
                                    <input name="meta_title" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Meta Title">
                                </div>
                                  
                                  <div class="form-group">
                                    <label for="inputslidercaption">Meta Keyword</label>
                                    <input name="meta_keyword" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Meta Keyword">
                                </div>
								
                                <div class="form-group">
                                    <label for="inputslidercaption">Meta Description</label>
                                    <textarea name="meta_descrip" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Meta Description"></textarea>
                                </div>
                               
                                <div class="form-group">
                                    <label for="inputslidercaption">Extra Block Title</label>
                                    <input name="extra_title" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Extra Block Title">
                                </div>
								
                                 <div class="form-group">
                                    <label for="inputslidercaption">Extra Block Description</label>
                                    <textarea name="extra_descrip"   class="form-control editor_big" id="inputslidercaption" placeholder="Enter Extra Description"></textarea>
                                </div>
                                
                                
                                 <div class="form-group">
                                    <label for="inputslidercaption">Canonical Tag</label>
                                    <input name="canonical_tag" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Canonical Tag">
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Robot Index</label><br />
                                     Index <input name="robotindex"  value="index" type="radio" >&nbsp;&nbsp;
                                     No Index <input name="robotindex"  value="noindex" type="radio"><br />
                                     Follow <input name="robot_index"  value="follow" type="radio">&nbsp;&nbsp;
                                     No Follow <input name="robot_index"  value="nofollow" type="radio">
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