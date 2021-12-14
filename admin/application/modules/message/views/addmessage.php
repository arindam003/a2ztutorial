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
                           <h3> Add message <a href="<?php echo base_url('message');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
							
                            <form role="form" method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="inputslidercaption">Teacher name </label>
                                    <select name="teacher_id" class="form-control">
                                        <option>Select Teacher</option>
                                        <?php  foreach($teacher_data as $teacher){  ?>
                                        <option value="<?php echo $teacher->id ;?>"><?php echo $teacher->name ;?></option>
                                        <?php } ?>
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">User name </label>
                                    
                                    <select name="user_id" class="form-control">
                                        <option>Select user</option>
                                        <?php  foreach($user_data as $user){  ?>
                                        <option value="<?php echo $user->id ;?>"><?php echo $user->name ;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">message </label>
                                    <input name="message" type="text" class="form-control" id="inputslidercaption" placeholder="Enter message ">
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