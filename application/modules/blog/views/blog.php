<section class="az-contact-banner">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
        <h1> Blog</h1>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6"> </div>
    </div>
  </div>
</section>
<section class="az-contact-body">
  <div class="container">
 
    <div class="row">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="blog-w">
           <div class="blog-t-img">
           <img src="<?php echo base_url();?>themes/front/images/blog_parents_image.png" alt ="blog_parents_image.png"/>
           </div>
           <div class="blog-container">
           <div class="blog-t-c">
           <h3>For parents</h3>
           <p>Find up-to-date expert advice for supporting your teen's studies & wellbeing.</p>
           <a href="<?php echo base_url('blog/parents');?>">Go to parents blog</a>
           </div>
          </div> 
        </div>
      </div>

      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
       <div class="blog-w">
        <div class="blog-t-img">
       <img src="<?php echo base_url();?>themes/front/images/blog_students_image.png" alt ="blog_students_image.png"/>
       </div>
       <div class="blog-container">
       <div class="blog-t-c">
       <h3>For students</h3>
       <p>Find up-to-date expert advice for supporting your teen's studies & wellbeing.</p>
       <a href="<?php echo base_url('blog/students');?>">Go to students blog</a>
       </div>
      </div> 
      </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
      <div class="blog-w">
        <div class="blog-t-img">
         <img src="<?php echo base_url();?>themes/front/images/blog_tutors_image.png" alt ="blog_tutors_image.png"/>
         </div>
          <div class="blog-container">
         <div class="blog-t-c">
         <h3>For tutors</h3>
         <p>Find up-to-date expert advice for supporting your teen's studies & wellbeing.</p>
         <a href="<?php echo base_url('blog/tutors');?>">Go to tutors blog</a>
         </div>
        </div> 
      </div>
    </div>


    </div>
    
     <div class="row">
     <div class="featured-title">
    <h2>Featured</h2>
    </div></div>
    <div class="row"> 
      <?php 
        // echo '<pre>';
        // print_r($blogfeatured_data);die; //user_type_id
      foreach($blogfeatured_data as $featured){?>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="blog-featured-w">
         <div class="blog-featured-img">
         <img src="<?php echo base_url();?>admin/uploads/blog_image/<?php echo $featured->blog_image_src_1; ?>"/>
         </div>
         <div class="blog-container">
         <div class="blog-featured-c">
         <div class="cat-and-date">
          <?php 
          foreach($blogcat_data as $blogcat){ 
            if($featured->blog_cat_id==$blogcat->id){ 
              $blogcat_slug = $blogcat->slug;

            ?>
            <h4><?php echo $blogcat->title;?></h4>

          <?php } } ?>
        <span class="date"> 
          <?php 
              $date = strtotime($featured->added_on);
              $orgDate = time_elapsed_string($date);  
              echo $orgDate;
            ?> 
          </span></div>
        <?php  
        
          foreach($usertype_data as $usertype){ 
            if($usertype->type_id==$featured->user_type_id){?>
            <!-- <h4> For <?php// echo $usertype->type_name;?></h4> -->

          <?php } } ?> 
        
         <h4><?php echo $featured->blog_title;?></h4>
         <p><?php echo $featured->description_1;?></p>

         <?php  
         
         if($featured->user_type_id=='1'){?>
         <a href="<?php echo base_url('blog/students/');?><?php echo $blogcat_slug.'/'?><?php echo $featured->blog_slug?>">Read more</a>
         <?php } ?>

         <?php  if($featured->user_type_id=='2'){?>
         <a href="<?php echo base_url('blog/parents/');?><?php echo $blogcat_slug.'/'?><?php echo $featured->blog_slug?>">Read more</a>
         <?php } ?>

         <?php  if($featured->user_type_id=='3'){?>
         <a href="<?php echo base_url('blog/tutors/');?><?php echo $blogcat_slug.'/'?><?php echo $featured->blog_slug?>">Read more</a>
         <?php } ?>
         </div>
        </div> 
        </div>
      </div>
  <?php } ?>
      
       
    </div>
    
  </div>
</section>