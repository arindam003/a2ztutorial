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
                           <h3> Add faq <a href="<?php echo base_url('faq');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
							
                            <form role="form" method="POST" action="" enctype="multipart/form-data">
                               
                                <div class="form-group">
                                    <label for="inputslidercaption">Faq Topics<span>*</span> </label>
                                    <select name="faq_topic_id" class="form-control" id="faq_topic_id">
                                        <option >------Select Faq Topics------</option>
                                        <?php  foreach($faqtopics_data as $topics){  
                                          
                                        ?>
                                        <option value="<?php echo $topics->id ;?>"><?php echo $topics->topics_name ;?></option>
                                         <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Question </label>
                                    <input name="question" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Question ">
                                </div>
								
                                <div class="form-group">
                                    <label for="inputslidercaption">Answer</label>
                                    <textarea name="answer" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Answer"></textarea>
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