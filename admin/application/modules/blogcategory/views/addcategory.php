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
                           <h3> Add Blog Category <a href="<?php echo base_url('blogcategory');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
							
                            <form role="form" method="POST" action="" enctype="multipart/form-data">
                               
                               <div class="form-group">
                                  <label for="sel1">Select User Type:</label>
                                  <select class="form-control" id="sel1" name="user_type_id">
                                    <option>----Select Type----</option>
                                    <?php foreach($user_type as $user){?>
                                    <option value="<?php echo $user->type_id; ?>"><?php echo $user->type_name;?></option>
                                    <?php } ?>
                                    <?php echo form_error('user_type_id', '<div class="error">', '</div>'); ?>
                                  </select>
                                </div> 
                               
                                <div class="form-group">
                                    <label for="inputslidercaption">Category Title :<span>*</span> </label>
                                    <input name="title" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Title">
                                    <?php echo form_error('title', '<div class="error">', '</div>'); ?>
                                </div>
                               <div class="form-group">
                                    <label for="inputslidercaption">Category Slug :<span>*</span></label>
                                    <input name="slug" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Slug Name ">
                                    <?php echo form_error('slug', '<div class="error">', '</div>'); ?>
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