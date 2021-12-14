
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
                           <h3> Edit Uni Email Domain <a href="<?php echo base_url('uniemaildomain');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                            <?php  foreach($single_data as $single){ ?>
                            <form role="form" method="POST">
                               
                                
                               
                                <!-- <div class="form-group">
                                    <label for="inputslidercaption">University<span>*</span> </label>
                                    <select name="university_id" class="form-control" id="university_id" >
                                        <option >Select University</option>
                                        <?php  foreach($university_data as $univer){  ?>
                                        <option value="<?php 

                                        echo $univer->id ;?>" 
                                        <?php if($univer->id == $single->university_id){ 
                                            echo 'selected' ;} ?>><?php echo $univer->uni_name ;?></option>
                                         <?php }    ?>

                                            
                                       
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label for="inputslidercaption">University<span>*</span> </label>
                                    <?php  foreach($university_data as $univer){  
                                     if($univer->id == $single->university_id){ 
                                             ?>
                                    <input type="text" class="form-control" id="inputslidercaption" value="<?php echo $univer->uni_name ;?>" disabled>
                                     <?php } }   ?>
                                            
                                       
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Uni Emaildomain <span>*</span> </label>
                                    <input name="email_domain" type="text" class="form-control" id="inputslidercaption"value="<?php echo $single->email_domain ;?>">
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



