<?php
   //  echo '<pre>';
   // print_r($this->session); die;


    // $popularsubjectsdata = get_popularsubjects();
    // $allsubjectsdata = get_allsubjects();
    $settingsdata = get_settings_data();
    
    
    $oauthid = $this->session->userdata('oauth_uid');
    $oauthname = $this->session->userdata('name');
             //echo $oauthid;die;
    


    $googleloginid = $this->session->userdata('googlelogin_id');
    $googlename = $this->session->userdata('name');
    //echo $googleloginid;die;


// helper
     // $googleloginstudent = get_googleloginstudent();
     // $googlestudentid = $googleloginstudent[0]->id;
     // $googlestudentname = $googleloginstudent[0]->name;
      

      

      // echo '<pre>'; 
      // echo $googlestudentname;
      //print_r($googleloginstudent);
      //die;

    $student_id = $this->session->userdata('student_id');
    $parent_id = $this->session->userdata('parent_id');
    $teacher_id = $this->session->userdata('teacher_id');


    $parent_name = $this->session->userdata("parent_name");
    $student_name = $this->session->userdata("student_name");
    $teacher_name = $this->session->userdata("teacher_name");
  
//echo '<pre>'; 
//print_r($settingsdata[0]->logo); die; 
//print_r($settingsdata);die;

?>

<!DOCTYPE html>

<html lang="en">



<head>
    <link rel="shortcut icon" href="<?php echo base_url()?>admin/uploads/settings_image/logo_green4.png" type="image/x-icon">
    
    <title> | A2Z Tutorials</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo base_url();?>themes/front/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>themes/front/css/owl.carousel.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>themes/front/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>themes/front/css/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css">
    <link rel="stylesheet" href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">

    

    <link rel="stylesheet" href="<?php echo base_url();?>themes/front/css/style.css">


    <link rel="stylesheet" href="<?php echo base_url();?>themes/front/css/responsive.css">
       



   
    <script src="<?php echo base_url();?>themes/front/js/jquery-3.5.1.min.js"></script>

    <script src="<?php echo base_url();?>themes/front/js/popper.min.js"></script>

    <script src="<?php echo base_url();?>themes/front/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script src="<?php echo base_url();?>themes/front/js/aos.js"></script>

    <script src="<?php echo base_url();?>themes/front/js/owl.carousel.min.js"></script>

    <script src="<?php echo base_url();?>themes/front/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.full.min.js"></script>
    <!-- testing me -->
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js'></script> -->

</head>



<body>

    <header>

        <div class="header-sec1">

            <div class="container">

                <div class="row">

                    <div class="h1-left col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                        <p><span><i class="fas fa-phone-alt"></i></span> <?php echo $settingsdata[0]->phone_no_1;?> <span><i

                                    class="fas fa-envelope"></i></span> <?php echo $settingsdata[0]->email;?></p>

                    </div>

                    <div class="h1-right col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                        <div class="az-smi">

                            <a href="<?php echo $settingsdata[0]->facebook;?>" target="_blank"><span class="smi-fb"><i class="fab fa-facebook-f"></i></span></a>

                            <a href="<?php echo $settingsdata[0]->twitter;?>" target="_blank"><span class="smi-tw"><i class="fab fa-twitter"></i></span></a>

                            <a href="<?php echo $settingsdata[0]->instagram;?>" target="_blank"><span class="smi-insta"><i class="fab fa-instagram"></i></span></a>

                            <a href="<?php echo $settingsdata[0]->linkedin;?>" target="_blank"><span class="smi-li"><i class="fab fa-linkedin-in"></i></span></a>

                            <a href="#" target="_blank"><span class="smi-insta"><i class="fab fa-youtube"></i></span></a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="header-sec2" id="myHeader">

            <div class="container">

                <div class="row">

                    <div class="header-sec2-l col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">

                       
                        <a href="<?php echo base_url('home');?>"><img src="<?php echo base_url();?>admin/uploads/settings_image/<?php echo $settingsdata[0]->logo;?>"/></a>

                    </div>

                    <div class="header-sec2-r col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12">

                        <div class="navbar-section">

                            <nav id="menu" class="nav1 navbar navbar-expand-md">

                                <div class="container">

                                    <button type="button" class="navbar-toggler" data-toggle="collapse"

                                        data-target="#navbarCollapse">

                                        <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>

                                    </button>

                                    <div class="collapse navbar-collapse" id="navbarCollapse">

                                        <ul class="navbar-nav">

                                            <li><a class="nav-active nav-item nav-link" href="<?php echo base_url();?>">Home</a>

                                            </li>

                                           

                                            <!-- <li class="az-dropdown dropdown"><a class="nav-item nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">Subjects <span class="caret"></span></a>

                                             <ul class="dropdown-menu" role="menu">
                                                    <li class="dropdown-submenu">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                            role="button" aria-haspopup="true" aria-expanded="false">
                                                            <span class="nav-label">Popular Subjects</span><span
                                                                class="caret"></span></a>
                                                        <ul class="dropdown-menu">
                                                            <?php //print_r($popularsubjectsdata);
                                                           // foreach($popularsubjectsdata as $val){ 
                                                                //print_r($val);
                                                                ?>
                                                           
                                                            <li><a href="<?php //echo base_url();?>menuSubject/<?php //echo $val->subject_slugname;?>"><?php //echo $val->name;?></a></li>
                                                            
                                                             <?php //} ?>
                                                             
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown-submenu">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                            role="button" aria-haspopup="true" aria-expanded="false">
                                                            <span class="nav-label">All Subjects</span><span
                                                                class="caret"></span></a>
                                                        <ul class="dropdown-menu">
                                                            <?php //foreach($allsubjectsdata as $val){ ?>
                                                            <li><a href="<?php //echo base_url();?>menuSubject/<?php //echo $val->subject_slugname;?>"><?php //echo $val->name;?></a></li>
                                                            
                                                             <?php //} ?>
                                                        </ul>
                                                    </li>
                                                </ul>   
                                            </li> -->

                                            <li><a class="nav-item nav-link" href="<?php echo base_url('findTutor');?>">Find A Tutor</a></li>

                                            <li><a class="nav-item nav-link" href="<?php echo base_url('becometutor');?>">Become A Tutor</a></li>

                                            <li><a class="nav-item nav-link" href="<?php echo base_url('reviews');?>">Reviews</a></li>

                                            <li><a class="nav-item nav-link" href="<?php echo base_url('contact');?>">Contact</a></li>
                                            <li><a class="nav-item nav-link" href="<?php echo base_url('blog');?>">Blog</a></li>

                                        </ul>

                                    </div>

                                    <div class="registration-button">
                                    <?php
                                        if($parent_id){
                                    ?>
                                    <div class="dropdown">
                                      <a class="nav-item nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <?php echo $parent_name;?>
                                       <span class="caret"></span></a>

                                      <ul class="dropdown-menu" role="menu">
                                        <li><a class="dropdown-item" href="<?php echo base_url('parentprofile');?>">Profile</a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url('parents/parent_logout');?>">Logout</a></li>
                                        
                                      </ul>
                                    </div>
                                <?php }else if($student_id ){ ?>
                                     <div class="dropdown">
                                      <a class="nav-item nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"> <?php echo $student_name;?> <span class="caret"></span></a>

                                      <ul class="dropdown-menu" role="menu">
                                        <li><a class="dropdown-item" href="<?php echo base_url('students');?>">Profile</a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url('students/logout');?>">Logout</a></li>
                                        
                                      </ul>
                                    </div>
                                     <?php //}else if($googlestudentid){?>
                                     <?php }else if($googleloginid){?>
                                         <div class="dropdown">
                                      <a class="nav-item nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"> <?php echo $googlename;?> <span class="caret"></span></a>

                                      <ul class="dropdown-menu" role="menu">
                                        <li><a class="dropdown-item" href="<?php echo base_url('students');?>">Profile</a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url('students/googlelogout');?>">Logout</a></li>
                                        
                                      </ul>
                                    </div> 
                                  <?php }else if($teacher_id){ ?>
                                     <div class="dropdown">
                                      <a class="nav-item nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"> <?php echo $teacher_name;?> <span class="caret"></span></a>

                                      <ul class="dropdown-menu" role="menu">
                                        <li><a class="dropdown-item" href="<?php echo base_url('tutors');?>">Profile</a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url('tutors/teacher_logout');?>">Logout</a></li>
                                        
                                      </ul>
                                    </div>   
                                <?php }else{ ?>
                                        
                                         <button onClick="window.location = '<?php echo base_url('login');?>';">Login</button>
                                         <button onClick="window.location = '<?php echo base_url('signup');?>';">Sign Up</button>

                                     <?php } ?>   
                                      
                                        

                                    </div>

                                </div>

                            </nav>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </header>

<!--   -->

<?php echo $template['body']; ?> 

     <footer>

        <div class="top-footer">

            <div class="container">

                <div class="row">

                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">

                        <div class="list1">

                            <img src="<?php echo base_url();?>themes/front/images/logo_green.png" />

                            <ul>

                                <li><a href="<?php echo base_url();?>">HOME</a></li>

                                <li><a href="<?php echo base_url('reviews');?>">Reviews</a></li>

                                <li><a href="#">Subjects</a></li>

                                <li><a href="<?php echo base_url('faqs');?>">FAQs</a></li>

                                <li><a href="<?php echo base_url('findTutor');?>">Find A Tutor</a></li>

                                <li><a href="<?php echo base_url('becometutor');?>">Become A Tutor</a></li>

                                <li><a href="<?php echo base_url('how_it_works');?>">How It Works</a></li>

                                <li><a href="<?php echo base_url('aboutUs');?>">About Us</a></li>

                                <li><a href="<?php echo base_url('ourteam');?>">Our Team</a></li>

                                <li><a href="<?php echo base_url('privacypolicy');?>">Privacy Policy</a></li>

                                <li><a href="<?php echo base_url('contact');?>">Contact</a></li>

                                <li><a href="<?php echo base_url('terms');?>">Terms & Conditions</a></li>

                            </ul>

                        </div>

                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

                        <div class="list2">

                            <h4>GET IN TOUCH</h4>

                            <ul>

                                <li><span><i class="fas fa-phone-alt"></i></span> <?php echo $settingsdata[0]->phone_no_1;?></li>

                                <li><span><i class="far fa-envelope"></i></span> <?php echo $settingsdata[0]->email;?></li>

                                <li><span><i class="fas fa-map-marker-alt"></i>

                                </span> 

                                    

                                    <?php echo $settingsdata[0]->address;?>

                                </li>

                                <div class="az-smi">

                                    <a href="<?php echo $settingsdata[0]->facebook;?>" target="_blank"><span class="smi-fb"><i class="fab fa-facebook-f"></i></span></a>

                                    <a href="<?php echo $settingsdata[0]->twitter;?>" target="_blank"><span class="smi-tw"><i class="fab fa-twitter"></i></span></a>


                                    <a href="<?php echo $settingsdata[0]->instagram;?>" target="_blank"><span class="smi-insta"><i class="fab fa-instagram"></i></span></a>

                                    <a href="<?php echo $settingsdata[0]->linkedin;?>" target="_blank"><span class="smi-li"><i class="fab fa-linkedin-in"></i></span></a>
                                    
                                    <a href="#" target="_blank"><span class="smi-insta"><i class="fab fa-youtube"></i></span></a>
                                </div>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

            <hr />

        </div>

        <div class="bottom-footer">

            <p>© 2021 All Rights Reserved. Designed By : <a

                    href="https://www.businessdesignz.com">businessdesignz.com</a>

            </p>

        </div>

    </footer>

<!-- </body> -->



<script>

    AOS.init();

</script>

<!-- home page slide -->
<script>

    $(document).ready(function () {

        $('.owl-carousel2').owlCarousel({

            loop: true,

            margin: 10,

            autoplay: true,

            autoplayTimeout: 4000,

            responsiveClass: true,

            responsive: {

                0: {

                    items: 1,

                    nav: true

                },

                600: {

                    items: 2,

                    nav: true

                },

                1000: {

                    items: 2,

                    nav: true,

                    loop: true

                }

            }

        });

        $('.owl-carousel1').owlCarousel({

            loop: true,

            margin: 0,

            autoplay: true,

            autoplayTimeout: 4000,

            responsiveClass: true,

            singleItem: true,

            responsive: {

                0: {

                    items: 1,

                    nav: true

                },

                600: {

                    items: 1,

                    nav: true

                },

                1000: {

                    items: 1,

                    nav: true,

                    loop: true

                }

            }

        });

        $('.owl-carousel3').owlCarousel({

            loop: true,

            margin: 10,

            autoplay: true,

            autoplayTimeout: 4000,

            responsiveClass: true,

            responsive: {

                0: {

                    items: 1,

                    nav: true

                },

                600: {

                    items: 3,

                    nav: true

                },

                1000: {

                    items: 4,

                    nav: true,

                    loop: true

                }

            }

        });

    });

</script>

<!-- findtutor closenav tab -->
<script>

    function openNav() {

      document.getElementById("mySidebar").style.width = "200px";

    }

    

    function closeNav() {

      document.getElementById("mySidebar").style.width = "0";

    }

</script>

<script>

    window.onscroll = function () {

        myFunction()

    };



    var header = document.getElementById("myHeader");

    var sticky = header.offsetTop;



    function myFunction() {

        if (window.pageYOffset > sticky) {

            header.classList.add("sticky");

        } else {

            header.classList.remove("sticky");

        }

    }

</script>

<script type="text/javascript">

    const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");



    accordionItemHeaders.forEach(accordionItemHeader => {

        accordionItemHeader.addEventListener("click", event => {

            const currentlyActiveAccordionItemHeader = document.querySelector(".accordion-item-header.active");

            if (currentlyActiveAccordionItemHeader && currentlyActiveAccordionItemHeader !== accordionItemHeader) {

                currentlyActiveAccordionItemHeader.classList.toggle("active");

                currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;

            }

            accordionItemHeader.classList.toggle("active");

            const accordionItemBody = accordionItemHeader.nextElementSibling;

            if (accordionItemHeader.classList.contains("active")) {

                accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";

            }

            else {

                accordionItemBody.style.maxHeight = 0;

            }



        });

    });

</script>

<script>

    $(document).ready(function() {

  $('.bar span').hide();

  $('#bar-five').animate({

     width: '75%'}, 1000);

  $('#bar-four').animate({

     width: '35%'}, 1000);

  $('#bar-three').animate({

     width: '20%'}, 1000);

  $('#bar-two').animate({

     width: '15%'}, 1000);

  $('#bar-one').animate({

     width: '30%'}, 1000);

  

  setTimeout(function() {

    $('.bar span').fadeIn('slow');

  }, 1000);

  

});

</script>

<!-- mutistep form tutor registration -->
<!-- <script type="text/javascript">

    $(document).ready(function(){

      $('.next-button').click(function(){

            var current = $(this).parent();

            var next = $(this).parent().next();

            $(".progress li").eq($("fieldset").index(next)).addClass("active");

            current.hide();

            next.show();

      })

      

      $('.prev-button').click(function(){

            var current = $(this).parent();

            var prev = $(this).parent().prev()

            $(".progress li").eq($("fieldset").index(current)).removeClass("active");

            current.hide();

            prev.show();

      })

    })

</script> -->




    <!-- header dropdown subjects -->
<script>
    $(document).ready(function () {
        $('.dropdown-submenu .dropdown-toggle').on('click', function (e) {
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });
</script>

</body>

</html>