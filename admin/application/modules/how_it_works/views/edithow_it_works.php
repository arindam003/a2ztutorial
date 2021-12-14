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
                           <h3> Edit How it Works <a href="<?php echo base_url('how_it_works');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                            <?php  foreach($single_data as $single){ ?>
                            <form role="form" method="POST" action="" enctype="multipart/form-data">
                                
                               
                                <div class="form-group">
                                    <label for="inputslidercaption">Heading </label>
                                    <input name="heading" value="<?php echo $single->heading;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Heading ">
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Description</label>
                                    <textarea name="descrip" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"><?php echo $single->descrip;?></textarea>
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