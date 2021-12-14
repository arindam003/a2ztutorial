
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-lg-12">
                  
            <?php if($this->session->flashdata('success_msg')!="") { ?>
                                <div class="clearfix"></div>
                            <div class="alert alert-success">
                              <strong>Success!</strong> <?=$this->session->flashdata('success_msg');?>
                            </div>
                              <?php  
                              $this->session->unset_userdata('success_msg');
                          }
                              ?>
                              
                               <?php if($this->session->flashdata('err_msg')!="") { ?>
                                                     <div class="clearfix"></div>
                            <div class="alert alert-danger">
                              <strong>Error!</strong> <?=$this->session->flashdata('err_msg');?>
                            </div>
                              <?php 
                                } 
                              $this->session->unset_userdata('err_msg');
                              ?>
             
        <section class="panel">
            <header class="panel-heading">
               <h3>Add Student <a href="<?php echo base_url('student');?>" class="btn btn-danger flotright">Back</a></h3>
            </header>
            <div class="panel-body">
                <div>
               
               
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    
                    <div class="col-xl- col-lg-8 col-md-8 col-sm-12 col-12">
                            
                            <p>
                                <label>Name: <span>*</span></label>
                                <input type="text" class="form-control" name ="name" placeholder="Enter Full Name">
                                <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                            </p>
                           
                            <input type="hidden" class="form-control" name ="usertype_id" value="1">
                            <p>
                              <label>Email : <span>*</span></label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email">
                             <?php echo form_error('email', '<div class="error">', '</div>'); ?>  
                            </p>
                            <p>
                              <label>Confirm Email: <span>*</span></label>
                              <input type="email" name="confirm_email" class="form-control" placeholder="Confirm Email">
                               <?php echo form_error('confirm_email', '<div class="error">', '</div>'); ?> 
                            </p>
                      
                        <p>
                            <label>Phone: <span>*</span></label>
                            <input type="text" class="form-control" name ="phone" placeholder="Enter Phone">
                             <?php echo form_error('phone', '<div class="error">', '</div>'); ?>
                        </p>
                        
                        
                        <p>
                            <label>Password: <span>*</span></label>
                            <input type="password" class="form-control" name ="password" placeholder="Enter Password">
                            <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                        </p>
                       
                   
                      
                        <p>
                            <label>Confirm Password: <span>*</span></label>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Enter Confirm Password">
                            <?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?>
                        </p>
                       
                  
                    
                    
                        
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                   
                   
                    
                  
                   
                  

                   
                  
                
            

            
               
                  
                 
               
            </form>
          
        </div>

    </div>
</section>

            </div>
        </div>
        <!-- page end-->
    </section>
</section>


