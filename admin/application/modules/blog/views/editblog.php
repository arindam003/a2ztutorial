<?php //echo '<pre>';print_r($single_data);die;?>
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
                           <h3> Edit Blog <a href="<?php echo base_url('blog');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home"><strong>General</strong></a></li>
                <li><a data-toggle="tab" href="#menu1"><strong>SEO Meta</strong></a></li>
                  </ul>
                  <form role="form" method="POST" action="" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="tab-content">
                               <div id="home" class="tab-pane fade in active">
                            
                               <input type="hidden" id="blog_id" value="<?=$single_data[0]->id;?>">      
                               <div class="form-group">
                                    <label for="inputsliderimage">Image 1 :</label>
                                    <img src="<?php echo base_url()?>uploads/blog_image/<?=$single_data[0]->blog_image_src_1;?>" height=100px; width=100px;>
                                    <input type="file" name="blog_image_src_1" id="inputsliderimage" accept="image/*" />
                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>
                                </div>
                                <div class="form-group">
                                    <label for="inputsliderimage">Image 2 :</label>
                                    <img src="<?php echo base_url()?>uploads/blog_image/<?=$single_data[0]->blog_image_src_2;?>" height=100px; width=100px;>
                                    <input type="file" name="blog_image_src_2" id="inputsliderimage" accept="image/*" />
                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>
                                </div>
                               <div class="form-group">
                      <label for="sel1">Select User Type :<span>*</span></label>
                      <select class="form-control" name="user_type_id" id="u_type_id">
                                    <option>----Select User Type----</option>
                                    <?php foreach($usertype_data as $usertype){?>
                                    <option value="<?php echo $usertype->type_id;?>" <?php if($usertype->type_id==$single_data[0]->user_type_id){echo 'selected';}?>><?php echo $usertype->type_name; ?></option>
                                    <?php } ?>
                                  </select>
                                  <?php echo form_error('user_type_id', '<div class="error">', '</div>'); ?>
                               </div>
                               <div class="form-group">
                                  <label for="sel1">Select Category :<span>*</span></label>
                                  <select class="form-control" name="blog_cat_id" id="b_cat_id">
                                    <option>----Select Category----</option>
                                    <?php foreach($category_data as $category){?>
                                       
                                        <option value="<?php echo $category->id;?>" <?php if($category->id==$single_data[0]->blog_cat_id){echo 'selected';}?>><?php echo $category->title ?></option>
                                   <?php }?>
                                  </select>
                                  <?php echo form_error('blog_cat_id', '<div class="error">', '</div>'); ?>
                               </div>
                               <div class="form-group">
                                <label for="sel1">Select Related Block :</label>
                               <div class="form-check" id="check_blog">
                               	<?php $related_sub = json_decode($single_data[0]->related_blog);?>
                               	<?php foreach($blog_data as $blog){?>
                                 <?php //if(in_array()){?>
                                <input class="form-check-input" type="checkbox" value="<?=$blog->id?>" name="related_blog[]" <?php if(in_array($blog->id,$related_sub)){echo 'checked';}?>>
                                <label class="form-check-label" for="flexCheckDefault"><?=$blog->blog_title?>
                               </label>&nbsp;&nbsp;|&nbsp;&nbsp;
                                <?php } ?>
                              </div>
                              </div>
                               <div class="form-group">
                                    <label for="inputslidercaption">Tittle <span>*</span></label>
                                    <input name="blog_title" type="text" class="form-control" id="inputslidercaption" value="<?=$single_data[0]->blog_title;?>" placeholder="Enter Heading ">
                                <?php echo form_error('blog_title', '<div class="error">', '</div>'); ?>
                                </div> 
                                <div class="form-group">
                                    <label for="inputslidercaption">Slug :<span>*</span></label>
                                    <input name="blog_slug" type="text" class="form-control" id="inputslidercaption" value="<?=$single_data[0]->blog_slug;?>" placeholder="Enter Heading ">
                                    <?php echo form_error('blog_slug', '<div class="error">', '</div>'); ?>
                                </div> 
                                <div class="form-group">
                                    <label for="inputslidercaption">Heading 1 :</label>
                                    <input name="heading_1" type="text" class="form-control" id="inputslidercaption" value="<?=$single_data[0]->heading_1;?>" placeholder="Enter Heading ">
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Description 1 :</label>
                                    <textarea name="description_1" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"><?=$single_data[0]->description_1;?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Heading 2 :</label>
                                    <input name="heading_2" type="text" class="form-control" id="inputslidercaption" value="<?=$single_data[0]->heading_2;?>" placeholder="Enter Heading ">
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Description 2 :</label>
                                    <textarea name="description_2" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"><?=$single_data[0]->description_2;?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Heading 3 :</label>
                                    <input name="heading_3" type="text" class="form-control" id="inputslidercaption" value="<?=$single_data[0]->heading_3;?>" placeholder="Enter Heading ">
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Description 3 :</label>
                                    <textarea name="description_3" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"><?=$single_data[0]->description_3;?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Heading 4 :</label>
                                    <input name="heading_4" type="text" class="form-control" id="inputslidercaption" value="<?=$single_data[0]->heading_4;?>" placeholder="Enter Heading ">
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Description 4 :</label>
                                    <textarea name="description_4" class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"><?=$single_data[0]->description_4;?></textarea>
                                </div>
                               </div>
                               
                               <div id="menu1" class="tab-pane fade">
                               <div class="form-group">
                                    <label for="inputslidercaption">Meta Title</label>
                                    <input name="meta_title" type="text" class="form-control" id="inputslidercaption" value="<?=$single_data[0]->meta_title;?>" placeholder="Enter Meta Title">
                                    
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Meta Keyword</label>
                                    <input name="meta_keyword" type="text" class="form-control" id="inputslidercaption" value="<?=$single_data[0]->meta_keyword;?>"  placeholder="Enter Meta Keyword">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Meta Description</label>
                                    <textarea name="meta_descrip" rows="5"    class="form-control" id="inputslidercaption" value="<?=$single_data[0]->meta_descrip;?>" placeholder="Enter Meta Description"></textarea>
                                    
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Canonical Tag</label>
                                    <input name="canonical_tag" type="text" class="form-control" id="inputslidercaption" value="<?=$single_data[0]->meta_descrip;?>"  placeholder="Enter Canonical Tag">
                                     
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Robot Index</label><br />
                                    
                                     Index <input name="robot_index" value="index" type="radio" <?php if($single_data[0]->robotindex=='index'){?> checked="checked" <?php }?>>&nbsp;&nbsp;
                                     No Index <input name="robot_index"  value="noindex" type="radio"  <?php if($single_data[0]->robotindex=='noindex'){?> checked="checked" <?php } ?>><br />
                                     <label for="inputslidercaption">Follow</label><br />
                                     Follow <input name="follow" value="follow" type="radio" <?php if($single_data[0]->follow=='follow'){?> checked="checked" <?php } ?>>&nbsp;&nbsp;
                                     No Follow <input name="follow"  value="nofollow" type="radio" <?php if($single_data[0]->follow=='nofollow'){?> checked="checked" <?php } ?>>
                                </div>  
                              
                             </div> 
              <div class="panel-footer">  <button type="submit" class="btn btn-info">Submit</button></div>
                            
              
                        </div>
                         </div>
                        </div>
                        </form>
                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function(){

     $("#u_type_id").change(function(){
           var usertypeid = $("#u_type_id").val();
            //alert(usertypeid);

            $.ajax({

                url :'<?php echo base_url('blog');?>/ajax_blog_cat_data',
                method :'POST',
                data:{
                    usertype_id:usertypeid
                 },
                success:function(data){
                    //alert(data);
                  $('#b_cat_id').html(data);
                },
                 error:function(data){
                     //alert('Error');
                 }
            });
         });

    });
</script>
<script type="text/javascript">
    $(document).ready(function(){

     $("#b_cat_id").change(function(){
           var catid = $("#b_cat_id").val();
           var id = $("#blog_id").val();
           // alert(id);

            $.ajax({

                url :'<?php echo base_url('blog');?>/edit_ajax_blog_data',
                method :'POST',
                data:{
                    catid:catid,
                    id:id
                 },
                success:function(data){
                    //alert(data);
                  $('#check_blog').html(data);
                },
                 error:function(data){
                     //alert('Error');
                 }
            });
         });

    });
</script>
