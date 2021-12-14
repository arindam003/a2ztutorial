
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
                           <h3> Add Uni Email Domain <a href="<?php echo base_url('uniemaildomain');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                            
                            <form role="form" method="POST">
                               
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">University<span>*</span> </label>
                                    <select name="university_id" class="form-control" id="university_id">
                                        <option >Select University</option>
                                        <?php  foreach($university_data as $univer){  ?>
                                        <option value="<?php echo $univer->id ;?>"><?php echo $univer->uni_name ;?></option>
                                         <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Uni Emaildomain <span>*</span> </label>
                                    <input name="email_domain" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Uni Emaildomain Name ">
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



