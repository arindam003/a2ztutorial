

<!-- rating system for color  --><head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>
<?php 
 if($this->session->flashdata('success_msg')!="") { ?>
        
<div class="clearfix"></div>
    <div class="alert alert-success">
      <strong>Success!</strong> <?=$this->session->flashdata('success_msg');?>
    </div>
      <?php  
      $this->session->unset_userdata('success_msg');
  }
   
                             
    //$teacherdata = get_teacher($subject_data[0]->id);

  // echo '<pre>'; print_r($teacherdata); die;

      // print_r($subject_data);die;
//echo $subject_data[0]->id; die;

?>
<section class="az-banner">
        <!-- <div class="owl-carousel1 owl-carousel owl-theme"> -->
           
            <?php  foreach($home_banner as $banner){ ?>
             
            <div class="item">
                <img src="<?php echo base_url();?>admin/uploads/slider_image/<?php echo $banner->image_src; ?>" alt ="banner1.jpg"/>
                <div class="banner-contents">
                    <img src="<?php echo base_url();?>admin/uploads/slider_image/<?php echo $banner->image_src2; ?>" alt ="logo_white.png"/>
                    <h1> <span><?php echo $banner->image_caption;?> </span> <br>
                    <?php echo $banner->image_caption2;?></h1>
                    <h6><?php echo $banner->image_caption3;?></h6>

        <!-- ajax subjects id wise teacher select2 using onchange(new)-->


    <div class="az-searchbar">
        <form method="POST" name="frm" id="frm">
            <select class="form-control" id="subject"  name="subject"
            data-placeholder="Search a subject" data-tabindex="1">
            <option>Search a subject</option>
           <optgroup label="Popular Subjects">
               
           <?php foreach($popularsubject_data as $popularsubject){?>
           
                 <option  value="<?php echo $popularsubject->subject_slugname ;?>"><a href="#teacher"> <?php echo $popularsubject->name ;?></a></option>   
                 <?php } ?> 
              
            </optgroup>
            <optgroup label="All Subjects">
                <?php foreach($allsubject_data as $allsubject){?>
               
               <option value="<?php echo $allsubject->subject_slugname ;?>"><a href="#teacher"> <?php echo $allsubject->name ;?></a></option>
              
                 <?php } ?>
            </optgroup> 
        </select>

        <!-- <button onClick="window.location = '<?php //echo base_url('seetutors')?>/<?php //echo $popularsubject->subject_slugname;?>';"> FIND A TUTOR</button> -->

        <!-- <button onclick="myFunction();"> FIND A TUTOR</button> -->

        <button name ="search"  id="search">FIND A TUTOR</button>
        </form>
    </div>



<!--  subjects input wise teacher (old)-->
      <!-- <div class="az-searchbar" >
        <form method="POST">
            <input type="text" id="subject" name="subject" placeholder="Subject..">
            <input type="submit" name= "search" id="search" >
            
        </form>
        </div> -->

   <!-- <div class="az-searchbar">
        <select class="form-control select_data" id="select2-single-box"  name="select_data"
            data-placeholder="Search a subject" data-tabindex="1">
            <option></option>
           <optgroup label="Popular Subjects">
               
           <?php //foreach($popularsubject_data as $popularsubject){?>
           
                 <option  value="<?php //echo $popularsubject->id ;?>"><a href="#teacher"> <?php //echo $popularsubject->name ;?></a></option>   
                 <?php //} ?> 
              
            </optgroup>
           <optgroup label="All Subjects">
                <?php //foreach($allsubject_data as $allsubject){?>
               
               <option value="<?php //echo $allsubject->id ;?>"><a href="#teacher"> <?php //echo $allsubject->name ;?></a></option>
              
                 <?php //} ?>
            </optgroup>
        </select>
        <button name ="search" id="search">FIND A TUTOR</button>
    </div> -->

                    
                </div>
            </div>
        
        <?php } ?> <!-- owl carousel1 end -->
       
        <!-- </div>   -->
        
    </section>
    
    

<!-- Ajax call to home controller page id="teacherSec" ** teacher list show  this div only-->
   
   <div class="subjectswise-teacher" id="teacher">
        <div class="container">
            <div id="teacherSec">
                
            </div>
        </div>
    </div>
    


 <!-- <section class="az-fat-filter">

        <div class="container">

            <div class="row">

                <div class="filter-wrapper">

                    <div id="mySidebar" class="sidebar">

                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

                        <form action="#" name="FTutor" id="FTutor" class="FTutor" method="POST">

                            <label class="label-heading" for="subjects">Subject:&emsp;</label>

                            <select name="subject" id="subject">

                              <option value="All Subjects">All Subjects</option>

                              <?php //foreach($subjects_data as $subjects){?>

                              <option value="<?php //echo $subjects->id ;?>"><?php //echo $subjects->name ;?></option>

                              <?php //} ?>

                            </select>

                            <br><br>

                            <label class="label-heading" for="level">Level: &emsp;&emsp;&ensp;</label>

                            <select name="level" id="level">

                              <option value="All Levels">All Levels</option>

                              <?php //foreach($levels_data as $levels){?>

                              <option value="<?php //echo $levels->id ;?>"><?php //echo $levels->name ;?></option>

                              <?php //} ?>

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

                            <?php //foreach($timing_data as $time){?>



                            <input class="az-fat-fil-check timing" type="checkbox" id="time1" name="time" value="<?php //echo $time->id ;?>">

                            <label for="time1"><?php //echo $time->timing ;?></label><br>

                            <?php //} ?>



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

                   //// <div class="az-filters" id="main">

                        <button class="openbtn" onclick="openNav()"><i class="fas fa-filter"></i>

                            Filter

                        </button>

                        <h5>Filter your search and get results matching your preferences</h5>

                    </div> //                   

                </div>

            </div>

        </div>

 </section> -->
   
<!-- <section class="az-fat-tutors">
  <div class="container" id="findtutorSec">   
 
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

         </div>
    </div>
  </div>
  <?php //echo $this->pagination->create_links();?> 
</section> -->

      
    <section class="about-section" id="aboutsec">
        <?php  foreach($home_page as $pages){  ?>
        <div class="az-about">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        
                        <img src="<?php echo base_url();?>admin/uploads/pages_image/<?php echo $pages->image_src; ?>" data-aos="fade-left" alt ="about1.png"/>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <h2 data-aos="fade-right"><?php echo $pages->heading_title ;?></h2>
                        <p data-aos="fade-right"><?php echo $pages->descrip;?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="az-about">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <img data-aos="fade-right" src="<?php echo base_url();?>admin/uploads/pages_image/<?php echo $pages->image_src2; ?>"  alt ="about2.png"/>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <h2 data-aos="fade-left"><?php echo $pages->heading2 ;?></h2>
                        <p data-aos="fade-left"><?php echo $pages->descrip2;?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="az-about">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <img data-aos="fade-left" src="<?php echo base_url();?>admin/uploads/pages_image/<?php echo $pages->image_src3; ?>" alt ="about3.png"/>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <h2 data-aos="fade-right"><?php echo $pages->heading3 ;?></h2>
                        <p data-aos="fade-right"><?php echo $pages->descrip3;?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="az-about">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <img data-aos="fade-left" src="<?php echo base_url();?>admin/uploads/pages_image/<?php echo $pages->image_src4; ?>" alt ="about3.png"/>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <h2 data-aos="fade-right"><?php echo $pages->heading4 ;?></h2>
                        <p data-aos="fade-right"><?php echo $pages->descrip4;?></p>
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>
    </section>


     <section class="az-find" id="azfindsec">
        <div class="container">
            <div class="az-find-wrapper">
                <h3>BOOK A MEETING WITH A TUTOR: </h3>
                <button onClick="window.location = '<?php echo base_url('findTutor');?>';">FIND A TUTOR</button>
            </div>
        </div>
    </section>
    <section class="az-faqs" id="azfaqs">
        <div class="container">
            <h2>FAQs</h2>
            <div class="accordion" data-aos="fade-up">
                <?php  foreach($faq_data as $faq){  ?>
                <div class="accordion-item">
                    <div class="accordion-item-header">
                        <?php echo $faq->question ;?>
                    </div>
                    <div class="accordion-item-body">
                        <div class="accordion-item-body-content">
                            <?php echo $faq->answer ;?>
                        </div>
                    </div>
                </div>
               
                <?PHP } ?>
            </div>
            <div class="az-view-all">
                <button onClick="window.location = '<?php echo base_url('faqs');?>';">
                    VIEW ALL
                </button>
            </div>
        </div>
    </section>
    <section class="az-featured" id="azfeatured">
        <div class="container">
            <h3>WE ARE FEATURED IN</h3>
           
            <div class="featured-imgs">
                <?php  foreach($featured_data as $featured){  ?>
                <img src="<?php echo base_url();?>admin/uploads/featured_image/<?php echo $featured->image_src; ?>" alt ="bbc-icon.png"/>
               
                 <?PHP } ?>
            </div>
           
        </div>
    </section>
    <section class="az-testi" id="aztesti">
        <div class="container">
            <h3>What <span>Teachers</span> and <span>Parents</span> Think About Us</h3>
            <div class="wrapper">
                <div class="owl-carousel2 owl-carousel owl-theme">
                    <?php  foreach($testimonials_data as $testimonials){  ?>
                    <div class="item">
                        <div class="item-body">
                            <div class="item-content">
                                <div class="carousel-cont">
                                    <div class="testi-cont1">
                                        <div class="testi-img-cont">
                                <?php if($testimonials->usertype_id=='2'){?>
                               <img src="<?php echo base_url();?>admin/uploads/parent_image/<?php echo $testimonials->signup_image; ?>"  />
                             <?php } ?>
                             <?php if($testimonials->usertype_id=='1'){?>
                               <img src="<?php echo base_url();?>admin/uploads/student_image/<?php echo $testimonials->signup_image; ?>"  />
                             <?php } ?>
                             <?php if($testimonials->usertype_id=='3'){?>
                               <img src="<?php echo base_url();?>admin/uploads/teacher_image/<?php echo $testimonials->signup_image; ?>"  />
                             <?php } ?>
                                        </div>
                                        <h5><?php echo $testimonials->name;?> </h5>
                                        <h6><?php echo $testimonials->type_name;?></h6>
                                        <div class="az-rating">
                                            <div class="rateyo" id= "rating"
                                             data-rateyo-rating="<?php echo $testimonials->rating;?>"
                                             data-rateyo-num-stars="5"
                                             data-rateyo-score="3">
                                            </div> 
                                        <?php //echo $testimonials->rating;?>
                                            
                                        </div>
                                        <p>“<?php echo $testimonials->descrip ;?>”
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?PHP } ?>
                    
                </div>
            </div>
            <div class="az-view-all">
                <button onClick="window.location = '<?php echo base_url('reviews');?>';">
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
<!-- ########### subjects wise teacher home page using onclick (new2 url changes ) ###### -->

<!-- <script type="text/javascript">
    $(document).ready(function(){
        $('#search').click(function(){
            var sub = $('#subjects').val();
            alert(sub);
            $.ajax({
                url:'<?php //echo base_url('seetutors')?>',
                type:'POST',
                data:{
                    subjects_id:sub
                },
                success:function(data){
                    $('#subjects').html(data);
                },
                error:function(data){
                    alert("Error detected");
                }

            });

        });
    });

</script> -->




<!-- ################# subjects wise teacher searching home page (new) ##################### -->

   <!--  <script type="text/javascript">
        $(document).ready(function(){
            
         $('#select2-single-box').on("change", function(e) {
           var sub = $(this).val();
           $.ajax({
                url :'<?php //echo base_url('home');?>/teacher_data',
                type:'POST',
                data:{
                    subjects_id:sub
                },
                 success:function(data){
                    if(data == ''){
                        alert('No Record Available');
                        // $("#aboutsec").show();
                    }
                    $('#teacherSec').html(data);
                    $("#aboutsec").hide();
                    $("#azfindsec").hide();
                    $("#azfaqs").hide();
                    $("#azfeatured").hide();
                    $("#aztesti").hide();
                },
                 error:function(data){

                 //console.log(data);
                    alert("Error detected");
                 }
            });
       }); 
    });
    </script> -->


<!--#################### sidbar filter with ajax     ############## -->

<!-- <script type="text/javascript">

    $(document).ready(function(){

           $("#apply").click(function(){

           var sub = $('#subject').val();

           var lev = $('#level').val();

           var checkboxes_value =  $('input[name="gender"]:checked').val() ;

           //alert(checkboxes_value);
            $.ajax({

                url :'<?php //echo base_url('home');?>/ajax_data',
                type:'POST',
                data:{
                    sub_id:sub,
                    lev_id:lev,
                    checkboxes_gender:checkboxes_value
                },

                success:function(data){

                if(data == ''){
                    alert('No Record Available');
                     }else{
                        //$('#findtutorSec').html(data);
                         $('#aboutsec').html(data);
                        $("#azfindsec").hide();
                        $("#azfaqs").hide();
                        $("#azfeatured").hide();
                        $("#aztesti").hide();
                    }
                },
                    error:function(data){
                     }
                });
        $(this).parents('.sidebar').remove();

        }); 
     });

</script> -->


    
    
<!--################# subjects wise teacher searching home page select2 using #####################-->
 
   

<!-- test2 subjects dropdown value show // easy code-->
   <!--  <script type="text/javascript">
        $('.select_data').select2({
      // placeholder: 'Select an option',
      // allowClear: true
    });
    </script> -->

    <!-- find subjects dropdown value show //  -->
   <!--  <script>
        var elements = $(document).find("select.form-control");
        for (var i = 0, l = elements.length; i < l; i++) {
            var $select = $(elements[i]),
           // alert($select);
                $label = $select.parents(".form-group").find("label");

            $select.select2({
                allowClear: false,
                placeholder: $select.data("placeholder"),
                minimumResultsForSearch: 0,
                theme: "bootstrap",
            });

            // Trigger focus
            $label.on("click", function (e) {
                $(this)
                    .parents(".form-group")
                    .find("select")
                    .trigger("focus")
                    .select2("focus");
            });

            // Trigger search
            $select.on("keydown", function (e) {
                var $select = $(this),
                    $select2 = $select.data("select2"),
                    $container = $select2.$container;

                // Unprintable keys
                if (
                    typeof e.which === "undefined" ||
                    $.inArray(
                        e.which,
                        [
                            0, 8, 9, 12, 16, 17, 18, 19, 20, 27, 33, 34, 35, 36, 37, 38, 39, 44,
                            45, 46, 91, 92, 93, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121,
                            123, 124, 144, 145, 224, 225, 57392, 63289,
                        ]
                    ) >= 0
                ) {
                    return true;
                }

                // Opened dropdown
                if ($container.hasClass("select2-container--open")) {
                    return true;
                }

                $select.select2("open");

                // Default search value
                var $search = $select2.dropdown.$search || $select2.selection.$search,
                    query =
                        $.inArray(e.which, [13, 40, 108]) < 0
                            ? String.fromCharCode(e.which)
                            : "";
                if (query !== "") {
                    $search.val(query).trigger("keyup");
                }
            });

            // Format, placeholder
            $select.on("select2:open", function (e) {
                var $select = $(this),
                    $select2 = $select.data("select2"),
                    $dropdown = $select2.dropdown.$dropdown || $select2.selection.$dropdown,
                    $search = $select2.dropdown.$search || $select2.selection.$search,
                    data = $select.select2("data");
                // Placeholder
                $search.attr(
                    "placeholder",
                    data[0].text !== "" ? data[0].text : $select.data("placeholder")
                );
            });
        }

    </script> -->
 
    <!-- <script>
        $(document).ready(function(){
            $('#search').click(function(){
                 var sub = $('#subject').val();
                 alert(sub);
                // //var url = '<?php //echo base_url('home/seetutors');?>';
                // var url ='http://www.w3schools.com';
                // $(location).attr('href',url);

                //window.location.replace("http://stackoverflow.com");
                // window.location.href = "http://stackoverflow.com";
               
                    
            });
        });
    </script> -->

  <!-- home search filter -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function(){
         $('#search').click(function(e){
        //$("form").submit(function(e) {
            e.preventDefault();//prevent the form from actually submitting
            var sub = $('#subject').val();
           //alert(sub);

            if(sub=='Search a subject'){
                swal('Please select a subject');
            }else{
                window.location = '<?php echo base_url('home/see_tutors/');?>'+sub;
            }


        });
});
  </script>