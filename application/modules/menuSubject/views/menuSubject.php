 <!-- rating system for color  -->
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    
</head>
 <section class="az-fat-banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <h1>Find a Tutor</h1>
                    <p>Find your perfect subject tutor and arrange a Free Video Meeting. Then book one-to-one Online Lessons to fit your schedule.</p>
                    <div class="fat-rating">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <h6>TrustPilot - <small>Rated: 9.7</small></h6>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    
                </div>
            </div>
        </div>
    </section>
   
    <section class="az-fat-tutors" id="findtutor-sec">
        <div class="container">
            
            <h2><span><?php echo $menuSubject_data2;?></span> Tutors Available</h2>
            
            <div class="row" >
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="findtutorSec">
                    <?php foreach($menuSubject_data as $findTutor){
                       // print_r($findTutor);die;
                        ?>
                    
                    <div class="row" >
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="az-fat-tutor-img">
                            <img  src="<?php echo base_url()?>admin/uploads/teacher_image/<?=$findTutor->image_src?>" >
                        </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                            <div class="az-fat-tutor-bio">
                            <h3><?php echo $findTutor->teacher_name;?></h3>
                            <h6><?php echo $findTutor->university;?> - <?php echo $findTutor->degree;?></h6>
                            <small><?php echo $findTutor->yourbio;?></small> <br> <br>
                            <p>Subjects: <span><?php 
                           
                                $offered = json_decode($findTutor->subject_offered);
                               echo implode(' , ', $offered)
                            ?> </span>
                               
                            </p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="az-fat-tutor-descr">
                                <h6>£<?php echo $findTutor->price;?> <small>/ HR</small></h6>
                                <p><span><i class="fas fa-star"></i></span> <?php echo $findTutor->rating;?></p>
                                <p><span><i class="fas fa-clipboard"></i></span> <?php echo $findTutor->total_reviews;?> <small>Reviews</small></p>
                                <p><span><i class="fas fa-chalkboard-teacher"></i></span> <?php echo $findTutor->total_session;?> <small>Lessons Completed</small></p>
                                <div class="az-fat-tutors-button">
                                    <button onClick="window.location = '<?php echo base_url('profile')?>/<?php echo $findTutor->slug_name;?>';">
                                        VIEW PROFILE
                                    </button>
                                </div>
                            </div>  
                        </div>
                    </div>
                   
                <?php } 

                if(!$menuSubject_data){
                    echo '<center><strong>No Teacher Available!</strong></center>';
                }

                ?>
                </div>
               
            </div>
        
        </div>
        

    
        <div class="az-pagination-wrapper">
            <div class="az-pagination">
                <?php echo $this->pagination->create_links();?>
               
            </div>
        </div> 
       
         
    </section>
   

   
