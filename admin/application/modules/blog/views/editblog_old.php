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
                           <h3> Edit Becometutor <a href="<?php echo base_url('becometutorMid');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                            <?php  foreach($single_data as $single){ ?>
                            <form role="form" method="POST" action="" enctype="multipart/form-data">
                                
                               
                                <div class="form-group">
                                    <label for="inputslidercaption">Heading </label>
                                    <input name="heading" value="<?php echo $single->heading?>" type="text" class="form-control" id="inputslidercaption" >
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Description</label>
                                    <textarea name="descrip" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"><?php echo $single->descrip;?></textarea>
                                </div>
                                <div class="form-group">
                                <img src="<?php echo base_url()?>uploads/pages_image/<?=$single->image_src;?>" height=100px; width=100px;>
                                    <label for="inputsliderimage"> Image</label>
                                    <input type="file" name="image_src" value="<?=$single->image_src;?>" id="inputsliderimage" accept="image/*" />
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