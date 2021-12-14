
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-lg-12">
                  
             
        <section class="panel">
            <header class="panel-heading">
               <h3>Add Teacher <a href="<?php echo base_url('teacher');?>" class="btn btn-danger flotright">Back</a></h3>
            </header>
            <div class="panel-body">
                <div>
               
               <div class="panel-body" style="display: block;">
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
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    
                    <div class="col-xl- col-lg-8 col-md-8 col-sm-12 col-12">
                            
                            <p>
                                <label>Full Name: <span>*</span></label>
                                <input type="text" class="form-control" name ="name" placeholder="Enter Full Name">
                                 <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                            </p>
                            <p>
                                <label>Phone: <span>*</span></label>
                                <input type="text" class="form-control" name ="phone" placeholder="Enter Phone">
                                 <?php echo form_error('phone', '<div class="error">', '</div>'); ?>
                            </p>
                            <!-- <p>
                                <label>University: <span>*</span></label>
                                <select name="university" class="form-control" id="university_id">
                                    <option >Select University</option>
                                    <?php  //foreach($university_data as $univer){  ?>
                                    <option value="<?php //echo $univer->id ;?>"><?php //echo $univer->uni_name ;?></option>
                                     <?php //} ?>
                                </select>
                               <?php //echo form_error('university' ,'<div class="text-danger">','</div>' );?>
                                 
                            </p> -->
                            <p>
                                <label> Email </label>
                                <input type="email" name="email" class="form-control" placeholder="Personal Email">
                                <?php echo form_error('email' ,'<div class="text-danger">','</div>' );?>
                                 
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
    </div>
</section>

        </div>
    </div>
        <!-- page end-->
    </section>
</section>
<!-- university wise email domain (studying)-->
<script type="text/javascript">
    $(document).ready(function(){

     $("#university_id").change(function(){
           var uni_id = $("#university_id").val();
           // alert(uni_id);

            $.ajax({

                url :'<?php echo base_url('teacher/ajax_university');?>',
                
                type:'POST',
                data:{
                    university_id:uni_id
                    
                    
                },
                success:function(data){
                   // alert(data);

                    $('#email_domain').html(data);
                    
                },
                 error:function(data){
                     //alert('Error');
                 }
            });
        });

    });
</script>



