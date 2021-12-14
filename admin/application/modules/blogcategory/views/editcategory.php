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
                           <h3> Edit Blog Category <a href="<?php echo base_url('blogcategory');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                            <?php  foreach($single_data as $single){ ?>
                            <form role="form" method="POST" action="" >
                                <div class="form-group">
                                  <label for="sel1">Select User Type:</label>
                                  <select class="form-control" id="sel1" name="user_type_id">
                                    <option>----Select Type----</option>
                                    <?php foreach($user_type as $user){?>
                                    <option value="<?php echo $user->type_id; ?>" <?php if($user->type_id==$single->user_type_id){echo 'selected';}?>><?php echo $user->type_name;?></option>
                                    <?php } ?>
                                    <?php echo form_error('user_type_id', '<div class="error">', '</div>'); ?>
                                  </select>
                                </div>

                               
                                <div class="form-group">
                                    <label for="inputslidercaption">Title :<span>*</span> </label>
                                    <input name="title" value="<?php echo $single->title?>" type="text" class="form-control" id="inputslidercaption" >
                                    <?php echo form_error('title', '<div class="error">', '</div>'); ?>
                                </div>
                               
                                <div class="form-group">
                                    <label for="inputslidercaption">Slug Name : <span>*</span></label>
                                    <input name="slug" value="<?php echo $single->slug;?>" type="text" class="form-control" id="inputslidercaption">
                                    <?php echo form_error('slug', '<div class="error">', '</div>'); ?>
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