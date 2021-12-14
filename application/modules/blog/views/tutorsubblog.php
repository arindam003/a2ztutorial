<section class="az-contact-banner">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
        <h1>Tutors Blog</h1>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6"> </div>
    </div>
  </div>
</section>
<section class="az-contact-body">
  <div class="container">
 
    
    
     <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="blog-subcats">
          <a class="revealed active" href="#">All</a>
          <?php  
        //   echo '<pre>';
        // print_r($parents_catblog);die; 
          foreach($tutors_catblog as $catblog){ ?>
          <a class="revealed" href="<?php echo base_url('blog/tutors/'.$catblog->slug.'/')?>"><?php echo $catblog->title?></a>
          
          <?php } ?>                          
      </div>
    </div></div>
    <div class="row">

      <?php 
      // echo '<pre>';
      //   print_r($parents_catblog);die; 

       foreach($tutors_subcatblog as $blog){ 
      
        ?>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        
        <div class="blog-featured-w">
          
         <div class="blog-featured-img">
         <img src="<?php echo base_url();?>admin/uploads/blog_image/<?php echo $blog->blog_image_src_1; ?>"/>
         </div>
         <div class="blog-container">
           <div class="blog-featured-c">
           
              
              <h4><?php echo $blog->title;?></h4>
           
            <h5><?php echo $blog->blog_title;?></h5>
           <div class="cat-and-date"><span class="date"> 
            <?php 
              $orgDate = strtotime($blog->added_on);  
              $newDate = time_elapsed_string($orgDate);  
              echo $newDate;
            ?>  
          </span></div>
           <h4>For parents</h4>
           <p><?php echo $blog->description_1;?></p>
           
           <a href="<?php echo base_url('blog/tutors/').$blog->slug.'/'.$blog->blog_slug.'/'?>">Read more</a>
           </div>
        </div> 
      
        </div>
      </div>
    <?php } ?>

       
     
       
    </div>
   
  </div>
</section>