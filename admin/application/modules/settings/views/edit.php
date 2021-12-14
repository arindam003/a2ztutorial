<style type="text/css">
    .required{color:red;}
</style>

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
                       <h3> Edit Settings <a href="<?php echo base_url('settings');?>" class="btn btn-danger flotright">Back</a></h3>
                    </header>
                    <div class="panel-body">
                        <div>
    					<?php 
                        //echo 'hi'; print
                        //echo '<pre>';
                        //print_r($all_data); die; 
                        foreach($all_data as $result) { ?>
                            <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                             <label for="inputslidercaption">Email :<span class="required">*</span></label>
                                <input name="email" type="email" value="<?php echo $result->email; ?>" class="form-control" placeholder="Enter email">
                                <?php echo form_error('email','<div class="error">','</div>'); ?>
                                
                            </div>
                            <div class="form-group">
                             <label for="inputslidercaption">Phone 1 :<span class="required">*</span></label>
                                <input name="phone_no_1" type="text" value="<?php echo $result->phone_no_1; ?>" class="form-control" placeholder="Enter Phone 1">
                                <?php echo form_error('phone_no_1','<div class="error">','</div>'); ?>
                                
                            </div>
    						<div class="form-group">
    						<label for="inputslidercaption3">Phone 2 :</label>
                                <input name="phone_no_2" type="text" class="form-control" value="<?php echo $result->phone_no_2;?>" placeholder="Enter Phone 2">
                            </div>
                            <div class="form-group">
                            <label for="inputslidercaption3">Phone 3 :</label>
                                <input name="phone_no_3" type="text" class="form-control" value="<?php echo $result->phone_no_3;?>" placeholder="Enter Phone 3">
                            </div>
                            <div class="form-group">
                            <label for="inputslidercaption3">Address :<span class="required">*</span></label>
                                <textarea name="address" class="form-contr<span>*</span>ol editor_big" value="" placeholder="Enter Address"><?php echo $result->address;?></textarea>
                                <?php echo form_error('address','<div class="error">','</div>'); ?>
                            </div>
                            <div class="form-group">
                            <label for="inputslidercaption3">facebook :<span class="required">*</span></label>
                                <input type="text" name="facebook" class="form-control" value="<?php echo $result->facebook;?>" placeholder="Enter facebook link">
                                <?php echo form_error('facebook','<div class="error">','</div>'); ?>
                            </div>
                            <div class="form-group">
                            <label for="inputslidercaption3">Instagram :<span class="required">*</span></label>
                                <input type="text" name="instagram" class="form-control" value="<?php echo $result->instagram;?>" placeholder="Enter instagram link">
                                <?php echo form_error('instagram','<div class="error">','</div>'); ?>
                            </div>
                            <div class="form-group">
                            <label for="inputslidercaption3">twitter :<span class="required">*</span></label>
                                <input name="twitter" class="form-control" value="<?php echo $result->twitter;?>" placeholder="Enter twitter link">
                                <?php echo form_error('twitter','<div class="error">','</div>'); ?>
                            </div>
                            <div class="form-group">
                            <label for="inputslidercaption3">linkedin :<span class="required">*</span></label>
                                <input type="text" name="linkedin" class="form-control" value="<?php echo $result->linkedin;?>" placeholder="Enter linkedin link">
                                <?php echo form_error('linkedin','<div class="error">','</div>'); ?>
                            </div>
                            <div class="form-group">
                            <label for="inputslidercaption3">youtube :<span class="required">*</span></label>
                                <input type="text" name="youtube" class="form-control" value="<?php echo $result->youtube;?>" placeholder="Enter youtube link">
                                <?php echo form_error('youtube','<div class="error">','</div>'); ?>
                            </div>
                            <div class="form-group">
                            <label for="inputslidercaption3">g_plus :</label>
                                <input type="text" name="g_plus" class="form-control" value="<?php echo $result->g_plus;?>" placeholder="Enter g_plus link">

                            </div>
                            <div class="form-group">
                            <label for="inputslidercaption3">Heading 1 :</label>
                                <input name="q_head_1" type="text" class="form-control" value="<?php echo $result->q_head_1;?>" placeholder="Enter Heading 1">
                            </div>
                            <div class="form-group">
                            <label for="inputslidercaption3">Heading 2 :</label>
                                <input name="q_head_2" type="text" class="form-control" value="<?php echo $result->q_head_2;?>" placeholder="Enter Heading 2">
                            </div>
                             <div class="form-group">

                                <label for="inputsliderimage">Logo :<span>*</span></label>

                                <input type="file" name="logo" id="inputsliderimage" accept="image/*" />
                              <?php if($result->logo!=''){?>
                                     <img class="" src="<?php echo base_url()?>uploads/settings_image/<?=$result->logo?>" height="150" width="150">
                                      <input name="prev_link_image_1" type="hidden" value="<?=$result->logo?>" height="150" width="150">
                                     <?php } ?>
                                     <?php echo form_error('logo', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group">

                                <label for="inputsliderimage">Fav Icon :<span>*</span></label>

                                <input type="file" name="fav_icon" id="inputsliderimage" accept="image/*" />
                                 <?php if($result->fav_icon!=''){?>
                                     <img class="" height="100" width="100" src="<?php echo base_url()?>uploads/settings_image/<?=$result->fav_icon?>">
                                      <input name="prev_link_image_2" type="hidden" value="<?=$result->fav_icon?>">
                                     <?php } ?>
                                   <?php echo form_error('fav_icon', '<div class="error">', '</div>'); ?>
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