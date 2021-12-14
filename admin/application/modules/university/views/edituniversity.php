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
                           <h3> Edit University <a href="<?php echo base_url('university');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                            <?php  foreach($single_data as $single){ ?>
                            <form role="form" method="POST" action="" >
                                
                               
                                <div class="form-group">
                                    <label for="inputslidercaption">University Name </label>
                                    <input name="uni_name" type="text" class="form-control" id="inputslidercaption" value="<?php echo $single->uni_name ;?>">
                                    <!-- <select name="uni_name" class="form-control" id="uni_name" >
                                        <option selected disabled>Select University</option>
                                        <?php  foreach($uni_data as $univer){  ?>
                                        <option value="<?php echo $univer->id ;?>"><?php echo $univer->uni_name ;?></option>
                                         <?php } ?>
                                    </select> -->
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