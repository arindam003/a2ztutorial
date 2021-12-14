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
                           <h3> Edit Spend <a href="<?php echo base_url('spend');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                            <?php  foreach($single_data as $single){ ?>
                            <form role="form" method="POST" action="" >
                                
                               
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Title  </label>
                                    <input name="sp_titile" value="<?php echo $single->sp_titile?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Title  ">
                                </div>
                               
                                <div class="form-group">
                                    <label for="inputslidercaption">Starting Price  </label>
                                    <input name="starting_price" value="<?php echo $single->starting_price;?>" type="number" class="form-control" id="inputslidercaption" placeholder="Enter Price  ">
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Ending Price  </label>
                                    <input name="ending_price" value="<?php echo $single->ending_price?>" type="number" class="form-control" id="inputslidercaption" placeholder="Enter Price  ">
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Description</label>
                                    <textarea name="description" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Description"><?php echo $single->description;?></textarea>
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