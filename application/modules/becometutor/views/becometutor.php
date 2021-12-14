<!-- rating system for color  --><head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    

</head>

<!--<section class="az-bat-banner">
<div class="container">

            <div class="row">

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

                    <h1>Become A Tutor</h1>

                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

                    

                </div>

            </div>

        </div>

    </section>-->



    <section class="az-bat-sec1">

        <div class="container">
<div class="row">

<?php foreach($becometutor_data as $becometutor){?> 
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                 <h2><?php echo $becometutor->heading_title;?></h2>

            <p><?php echo $becometutor->descrip;?></p>
   <button onClick="window.location = '<?php echo base_url('tutors/signup');?>';">Apply Now</button>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="az-bat-header-img"><img src="<?php echo base_url();?>admin/uploads/pages_image/<?php echo $becometutor->image_src; ?>" alt="bat1.png" /></div>
                </div>
                <?php } ?>
                </div>
          

            <div class="row">

                 <?php foreach($becometutor_mid_data as $becometutor2){?>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

                    <div class="hiw-features">

                        <div class="bat-feat-img">

                            <img src="<?php echo base_url();?>admin/uploads/pages_image/<?php echo $becometutor2->image_src; ?>"  />

                        </div>

                        <h5><?php echo $becometutor2->heading_title;?></h5>

                        <p><?php echo $becometutor2->descrip;?></p>

                    </div>

                </div>

                 <?php } ?>

                

            </div>

        </div>

    </section>

    <section class="az-bat-sec2">

        <div class="container">

            <?php foreach($becometutor_data as $becometutor){?>

            <div class="row">

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                    <img src="<?php echo base_url();?>admin/uploads/pages_image/<?php echo $becometutor->image_src2; ?>" alt="bat2.png" />

                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                    <h4><?php echo $becometutor->heading2;?></h4>

                    <p><?php echo $becometutor->descrip2;?></p>

                </div>

            </div>

            <div class="row">

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                    <img src="<?php echo base_url();?>admin/uploads/pages_image/<?php echo $becometutor->image_src3; ?>" alt="bat3.png" />

                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                    <h4><?php echo $becometutor->heading3;?></h4>

                    <p><?php echo $becometutor->descrip3;?></p>

                </div>

            </div>

            <div class="row">

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                    <img src="<?php echo base_url();?>admin/uploads/pages_image/<?php echo $becometutor->image_src4; ?>" alt="bat4.png" />

                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                    <h4><?php echo $becometutor->heading4;?></h4>

                    <p><?php echo $becometutor->descrip4;?></p>

                </div>

            </div>

            <?php } ?>

        </div>

    </section>



    <!-- testimonials -->

    <section class="az-testi">

        <div class="container">

            <h3>What <span>Teachers</span> Think About Us</h3>

            <div class="wrapper">

                <div class="owl-carousel2 owl-carousel owl-theme">

                    <?php foreach($testimonials_data as $testimonials){?>

                    <div class="item">

                        <div class="item-body">

                            <div class="item-content">

                                <div class="carousel-cont">

                                    <div class="testi-cont1">

                                        <div class="testi-img-cont">

                                            <img src="<?php echo base_url();?>admin/uploads/teacher_image/<?php echo $testimonials->image_src; ?>" />

                                        </div>

                                        <h5><?php echo $testimonials->name;?></h5>

                                        <h6><?php 

                                       // echo $testimonials->id;

                                        foreach($usertype_data as $usertype){

                                        if($usertype->type_id == $testimonials->id){

                                            echo $usertype->type_name;

                                            }

                                        }

                                        ?></h6>

                                        <div class="az-rating">

                                            <div class="rateyo" id= "rating"

                                             data-rateyo-rating="<?php echo $testimonials->rating;?>"

                                             data-rateyo-num-stars="5"

                                             data-rateyo-score="3">

                                            </div> 

                                        <?php //echo $testimonials->rating;?>

                                        </div>

                                        <p>“<?php echo $testimonials->yourbio;?> ”</p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                   

                <?php } ?>

                </div>

            </div>

        </div>

    </section>

    <section class="az-bat-sec3">

        <div class="container">

            <div class="row">

                <?php foreach($becometutor_data as $becometutor){?>

                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12"></div>

                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">

                    <h2><?php echo $becometutor->heading5;?></h2>

                    <p><?php echo $becometutor->descrip5;?></p>

                <button onClick="window.location = '<?php echo base_url('tutors/signup');?>';">Apply Now</button>

                 </div>

        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12"></div>

    <?php } ?>

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