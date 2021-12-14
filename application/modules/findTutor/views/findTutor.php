 <!-- rating system for color  --><head>

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

    <section class="az-fat-filter">

        <div class="container">

            <div class="row">

                <div class="filter-wrapper">

                    <div id="mySidebar" class="sidebar">

                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

                        <form action="#" name="FTutor" id="FTutor" class="FTutor" method="POST">

                            <label class="label-heading" for="subjects">Subject:&emsp;</label>

                            <select name="subject" id="subject">

                              <option value="All Subjects">All Subjects</option>

                              <?php foreach($subjects_data as $subjects){?>

                              <option value="<?php echo $subjects->id ;?>"><?php echo $subjects->name ;?></option>

                              <?php } ?>

                            </select>

                            <br><br>

                            <label class="label-heading" for="level">Level: &emsp;&emsp;&ensp;</label>

                            <select name="level" id="level">

                              <option value="All Levels">All Levels</option>

                              <?php foreach($levels_data as $levels){?>

                              <option value="<?php echo $levels->id ;?>"><?php echo $levels->name ;?></option>

                              <?php } ?>

                            </select>

                            <br><br>

                            <label class="label-heading">Gender: </label><br>

                            <input class="az-fat-fil-check Gen" type="checkbox" id="male" name="gender" value="Male">

                            <label for="male"> MALE</label><br>

                            <input class="az-fat-fil-check Gen" type="checkbox" id="female" name="gender" value="Female">

                            <label for="female"> FEMALE</label>

                            <br><br>

                            <label class="label-heading">Availability</label><br>

                            <label class="label-heading" for="time"><small>Time: </small></label><br>

                            <?php foreach($timing_data as $time){?>



                            <input class="az-fat-fil-check timing" type="checkbox" id="time1" name="time" value="<?php echo $time->id ;?>">

                            <label for="time1"><?php echo $time->timing ;?></label><br>

                            <?php } ?>



                            <label class="label-heading" for="days"><small>Days: </small></label><br>

                            <input class="az-fat-fil-check mon" type="checkbox" id="mon" name="days" value="1">

                            <label for="Mon"> Mon</label><br>

                            <input class="az-fat-fil-check tue" type="checkbox" id="tue" name="days" value="2">

                            <label for="Tue"> Tue</label><br>

                            <input class="az-fat-fil-check wed" type="checkbox" id="wed" name="days" value="3">

                            <label for="Wed"> Wed</label><br>

                            <input class="az-fat-fil-check thu" type="checkbox" id="thu" name="days" value="4">

                            <label for="Thu"> Thu</label><br>

                            <input class="az-fat-fil-check fri" type="checkbox" id="fri" name="days" value="5">

                            <label for="Fri"> Fri</label><br>

                            <input class="az-fat-fil-check sat" type="checkbox" id="sat" name="days" value="6">

                            <label for="Sat"> Sat</label><br>

                            <input class="az-fat-fil-check sun" type="checkbox" id="sun" name="days" value="7">

                            <label for="Sun"> Sun</label>

                            <br><br>



                            <input class="az-fat-fil-submit" id ="apply" name="apply" type="button" value="Apply">

                          </form>

                    </div>

                    <div class="az-filters" id="main">

                        <button class="openbtn" onclick="openNav()">

                            <i class="fas fa-angle-double-right"></i>

                        </button>

                    </div>

                    <!-- <div class="az-filters" id="main">

                        <button class="openbtn" onclick="openNav()"><i class="fas fa-filter"></i>

                            Filter

                        </button>

                        <h5>Filter your search and get results matching your preferences</h5>

                    </div>  -->                    

                </div>

            </div>

        </div>

    </section>

    <section class="az-fat-tutors" id="scrollHere" >

        <div class="container" id="findtutorSec">

            <h2><span><?php echo $findtu; ?></span> Tutors Available</h2>

            

            <div class="row" >

                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12" >

                    <?php foreach($findTutor_data as $findTutor){ ?>

                   <div class="row" >

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">

                             <div class="az-fat-tutor-img">

                               <?php if($findTutor->image_src==''){ ?>

                                <img src="<?php echo base_url()?>themes/front/images/User.png" >

                            <?php }else{ ?>

                                

                                <img src="<?php echo base_url()?>admin/uploads/teacher_image/<?=$findTutor->image_src?>" >

                                

                          <?php  } ?>

                            

                        </div>

                        </div>

                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">

                            <div class="az-fat-tutor-bio">

                            <h3><?php echo $findTutor->name;?> </h3>

                            <h6><?php echo $findTutor->university;?> - <?php echo $findTutor->degree;?></h6>

                             <p class="qualified-button" style="color: #80bf1f;font-size : 80%;">

                                <?php  if($findTutor->in_person == '1'){?>  

                               In person :<?php //echo 'Y';?> &nbsp;<i class="fas fa-check-circle"></i>

                              



                                <?php  } ?>

                            </p>
                            <div class="qualified-button">
                            <p><?php  if($findTutor->online_lesson == '1'){?>  

                                     <i class="fas fa-desktop"></i>&nbsp;<a href="#">Online Lesson

                                        </a>



                                        <?php  } ?>

                                    </p>

                                      <?php  if($findTutor->qualified == '1'){?>   

                                    <button>

                                    <span><i class="fas fa-check"></i></span>

                                   <?php  echo 'Qualified Teacher';?>

                                   </button>

                               <?php  } ?>

                              </div>

                           

                            

                            <small><?php echo $findTutor->yourbio;?></small> <br> <br>

                            <p>Subjects: <span><?php 

                           

                                $offered = json_decode($findTutor->subject_offered);

                               echo implode(' , ', $offered);

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

                  

                <?php } ?>

                    <div class="az-pagination-wrapper">

                        <div class="az-pagination">

                            <?php echo $this->pagination->create_links();?> 



                           

                        </div>

                    </div> 

                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">

                    <?php foreach($pages_data as $pages){?>

                        <div class="az-fat-more">

                           <img  src="<?php echo base_url()?>admin/uploads/pages_image/<?=$pages->image_src?>" >

                            <h4><?php echo $pages->heading_title;?>?</h4>

                            <p><?php echo $pages->descrip;?></p>

                            <div class="az-fat-tutors-button">

                               <button onClick="window.location = '<?php echo base_url('findmetutor')?>';">

                                    FIND ME A TUTOR

                                </button>

                            </div>

                            <?php } ?>

                        </div>

                </div>

            </div>

        

        </div>

        

       <!--  <div class="az-pagination-wrapper">

            <div class="az-pagination">

                <?php //echo $this->pagination->create_links();?> 



               

            </div>

        </div>  -->

       

         

    </section>

    <section class="az-fat-reviews" id="find2">

        <div class="container">

            <h2>TrustPilot <small>- <i class="fas fa-star"></i> 9.7/10 Ratings</small> <span>Views on TrustPilot</span></h2>

            <div class="wrapper">

                <div class="owl-carousel3 owl-carousel owl-theme">

                    <?php foreach($findTutor_data as $findTutor){?>

                    <div class="item">

                        <div class="item-body">

                            <div class="item-content">

                                <div class="carousel-cont">

                                    <div class="rev-cont1">

                                       

                                        <div class="az-rating">

                                            <div class="rateyo" id= "rating"

                                             data-rateyo-rating="<?php echo $findTutor->rating;?>"

                                             data-rateyo-num-stars="5"

                                             data-rateyo-score="3">

                                            </div> 

                                        </div>

                                        <h5><?php echo $findTutor->name;?> -</h5>

                                        <!-- <p>“<?php //echo $findTutor->about;?>” -->

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    

                    <?php } ?>

                </div>

            </div>

            <div class="az-view-all">

                <button onClick="window.location = '<?php echo base_url('reviews')?>';">

                    VIEW ALL

                </button>

            </div>

        </div>

    </section>



     <!-- Rating  sysytem-->

     <!-- Latest compiled and minified JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <script>





    $(function () {

        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {

            var rating = data.rating;

             //alert(data.rating);

            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));

            $(this).parent().find('.result').text('rating :'+ rating);

            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field

        });

    });



</script>

<!-- sidbar filter with ajax -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){

           $("#apply").click(function(){

             // $('select').change(function (){
           var sub = $('#subject').val();
           var lev = $('#level').val();
           var checkboxes_value =  $('input[name="gender"]:checked').val() ;
           if(sub=='All Subjects'){
                   swal('Please select a subject');
           }
           else{
           


              $.ajax({

                url :'<?php echo base_url('findTutor');?>/ajax_data',

                type:'POST',

                data:{

                    sub_id:sub,

                    lev_id:lev,

                    checkboxes_gender:checkboxes_value

                   
                  },

                success:function(data){
                  //alert(data);
                if(data == ''){

                    alert('No Record Available');

                }else{

                    $('#findtutorSec').html(data);

                }

                  },

                 error:function(data){

                 }

            });

        $(this).parents('.sidebar').remove();
         }
       }); 
   var elem = $('#scrollHere');
    if(elem) {
        $('html').scrollTop(elem.offset().top);
        $('html').scrollLeft(elem.offset().left);
    }
    
 

});

</script>

<style>
#scrollHere{
position:relative;
padding-top:80px;   

}
</style>