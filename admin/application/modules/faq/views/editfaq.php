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
                           <h3> Edit faq <a href="<?php echo base_url('faq');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                            <?php  foreach($single_data as $single){ 


                                ?>
                            <form role="form" method="POST" action="" enctype="multipart/form-data">
                                 <!-- <div class="form-group">
                                    <label for="inputslidercaption">Faq Topics<span>*</span> </label>
                                    <select name="faq_topic_id" class="form-control" id="usertype_id">
                                        <option >------Select Faq Topics------</option>
                                        <?php  
                                        //print_r($faqtopics_data);die;
                                        //foreach($faqtopics_data as $topics){  ?>
                                            <option value="<?php 
                                               // echo $topics->id ;?>" 
                                        <?php //if($topics->id == $single->faq_topic_id){ 
                                            //echo 'selected' ;} ?>><?php //echo $topics->topics_name ;?></option>
                                           
                                         <?php  // } ?>
                                    </select>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label for="inputslidercaption">Faq Topics<span>*</span> </label>
                                    <select name="faq_topic_id" class="form-control" id="usertype_id">
                                        <option >Select Faq Topics</option>
                                        <?php  
                                        //print_r($faqtopics_data);die;
                                        foreach($faqtopics_data as $topics){  
                                            // print_r($topics);die;
                                            if($topics->id == $single->faq_id){ 
                                            ?>
                                            <option value="<?php echo $topics->id ;?>" selected><?php echo $topics->topics_name ;?></option>
                                           
                                         <?php   }else{ ?>
                                            <option value="<?php echo $topics->id ;?>" ><?php echo $topics->topics_name ;?></option>

                                       <?php   }  } ?>
                                    </select>
                                </div> -->
                               
                                <div class="form-group">
                                    <label for="inputslidercaption">Question </label>
                                    <input name="question" value="<?php echo $single->question;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Question ">
                                </div>
                                
                                 <div class="form-group">
                                    <label for="inputslidercaption">Description</label>
                                    <textarea name="answer"  id="answer" class="form-control"><?php echo $single->answer;?></textarea>
                                    <!-- <textarea name="answer" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"><?php echo $single->answer;?></textarea> -->
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

<!-- <script src="https://pagecdn.io/lib/ckeditor/4.13.0/ckeditor.js" integrity="sha256-yoULaG5POtLMfQWKvJ1pCbUSX4eM29SBpDbjkZAK6qs=" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard-all/ckeditor.js"></script> -->
<!--  faq description ckeditor -->
<script src="<?php echo base_url()?>themes/admin/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('answer');
</script>

<!-- <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
        ClassicEditor
            .create( document.querySelector( '#answer' ) )
            .catch( error => {
                console.error( error );
            } );
    </script> -->