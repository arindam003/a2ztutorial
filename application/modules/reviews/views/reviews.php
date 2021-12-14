<!-- rating system for color  -->
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    
</head>

<section class="az-rev-banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <h1>Reviews & Ratings</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    
                </div>
            </div>
        </div>
    </section>
    <section class="az-rev-filter">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="az-rev-rating">
                        <div class="rating">
                            <span class="rating-num">4.5</span>
                            <div class="rating-stars">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star-half"></i></span>
                            </div>
                            <div class="rating-users">
                              <i class="icon-user"></i> 1,014,004 total
                            </div>
                          </div>
                          
                          <div class="histo">
                            <div class="five histo-rate">
                              <span class="histo-star star-five">
                                <i class="fas fa-star"></i> 5           </span>
                              <span class="bar-block">
                                <span id="bar-five" class="bar">
                                  <span>566,784</span>&nbsp;
                                </span> 
                              </span>
                            </div>
                            
                            <div class="four histo-rate">
                              <span class="histo-star star-four">
                                <i class="fas fa-star"></i> 4           </span>
                              <span class="bar-block">
                                <span id="bar-four" class="bar">
                                  <span>171,298</span>&nbsp;
                                </span> 
                              </span>
                            </div> 
                            
                            <div class="three histo-rate">
                              <span class="histo-star star-three">
                                <i class="fas fa-star"></i> 3           </span>
                              <span class="bar-block">
                                <span id="bar-three" class="bar">
                                  <span>94,940</span>&nbsp;
                                </span> 
                              </span>
                            </div>
                            
                            <div class="two histo-rate">
                              <span class="histo-star star-two">
                                <i class="fas fa-star"></i> 2           </span>
                              <span class="bar-block">
                                <span id="bar-two" class="bar">
                                  <span>44,525</span>&nbsp;
                                </span> 
                              </span>
                            </div>
                            
                            <div class="one histo-rate">
                              <span class="histo-star star-one">
                                <i class="fas fa-star"></i> 1&nbsp;           </span>
                              <span class="bar-block">
                                <span id="bar-one" class="bar">
                                  <span>136,457</span>&nbsp;
                                </span> 
                              </span>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="az-rev-drop">
                        <form>
                            <div class="drop-wrapper">
                            <select name="subject" id="subject">
                              <option value="All Subjects">All Subjects</option>
                              <?php foreach($subjects_data as $subjects){?>
                              <option value="<?php echo $subjects->id ;?>"><?php echo $subjects->name ;?></option>
                              <?php } ?>
                            </select>
                            <select name="level" id="level">
                              <option value="All Levels">All Levels</option>
                              <?php foreach($levels_data as $levels){?>
                              <option value="<?php echo $levels->id ;?>"><?php echo $levels->name ;?></option>
                              <?php } ?>
                            </select>
                            </div>
                            <div class="rev-button">
                                <button>Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="az-rev-body">
        <div class="container">
            <div class="row">
                <?php foreach($testimonials_data as $testimonials){?> 
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="az-reviewpage-wrapper">
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
                            <h5><?php echo $testimonials->name;?></h5>
                            <h6><?php echo $testimonials->type_name;?></h6>
                            <p><?php echo $testimonials->review_date;?></p>
                            <div class="az-rating">
                                <div class="rateyo" id= "rating"
                                 data-rateyo-rating="<?php echo $testimonials->rating;?>"
                                 data-rateyo-num-stars="5"
                                 data-rateyo-score="3">
                                </div> 
                                
                            </div>
                            <p>“<?php echo $testimonials->descrip;?>”</p>
                        </div>
                        </div>
                </div>
                
            <?php } ?>
            </div>
        </div>
       

          <div class="az-pagination-wrapper">
            <div class="az-pagination">
                <?php //echo $this->pagination->create_links();?>
               
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

