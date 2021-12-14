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
    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12"></div>
      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
      <div class="blog-details">
        <?php 
        // echo '<pre>';
        // print_r($parents_blogdetails);
        // echo $parents_blogdetails->blog_slug;
        // die; 
        foreach($parents_blogdetails as $blogdetails){?>
      <div class="breadcrumbs">
        <a href="<?php echo base_url('blog');?>">a2ztutorials Blog</a> / <a href="<?php echo base_url('blog/parents');?>">For Parents</a>
    </div>
       <img src="<?php echo base_url();?>admin/uploads/blog_image/<?php echo $blogdetails->blog_image_src_1; ?>"/>
       <div class="category">a2ztutorials for Parents</div>
       
       <h2><?php echo $blogdetails->heading_1; ?></h2>
       <div class="cat-and-date"><span class="date">
        <?php 
              $orgDate = $blogdetails->added_on;  
              $newDate = date('F j , Y', strtotime($orgDate));  
              echo $newDate;
            ?> 
          
        </span></div>
       <p><?php echo $blogdetails->description_1; ?></p>



  <img src="<?php echo base_url();?>admin/uploads/blog_image/<?php echo $blogdetails->blog_image_src_2; ?>"/>
  <h2>1. <?php echo $blogdetails->heading_2; ?></h2>
     <p><?php echo $blogdetails->description_2; ?></p>
        </div>
      <?php } ?>
      </div>
      <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12"></div> 
    </div>
    
     <div class="row">
     <div class="featured-title">
    <h2>Related articles</h2>
    </div></div>
    <div class="row">
      <?php 
        

       foreach($parents_blogdetails as $articles){
       $relatedblog=json_decode($articles->related_blog); 
        foreach($relatedblog as $blog){
          
        $related_blog = get_relatedblog($blog);
        // echo '<pre>';
        // print_r($related_blog);   die;

      foreach($related_blog as $blog){

          ?>
           
          
         
       
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="blog-featured-w">
         <div class="blog-featured-img">
         <img src="<?php echo base_url();?>admin/uploads/blog_image/<?php echo $blog->blog_image_src_1; ?>"/>
         </div>
           <div class="blog-container">
           <div class="blog-featured-c">
            <h4><?php echo $blog->title;?></h4>
           <div class="cat-and-date"><h4><?php echo $blog->blog_title;?></h4><span class="date">
            <?php 
              $orgDate = strtotime($blog->added_on);  
              $newDate = time_elapsed_string($orgDate);  
              echo $newDate;
            ?>  </span></div>
           <h4>For parents</h4>
           <p><?php echo $blog->description_1;?></p>
           <a href="<?php echo base_url('blog/parents/').$blog->slug.'/'.$blog->blog_slug;?>">Read more</a>
           
           </div>
          </div> 
        </div>
      </div>
<?php } } }?>
       
      
       
    </div>
    
  </div>
</section>