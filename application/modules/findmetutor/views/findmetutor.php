 <section class="find-me">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <h1>We can help you find the perfect tutor</h1>
                    <h5>Our team is on standby and ready to help! Our tailored matching service is free and easy-to-use,
                        with no obligations. 
                    </h5>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                   
                    <img src="<?php echo base_url();?>themes/front/images/find-me.png" width="100%" />
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="panel-body" style="display: block;">
                             <?php if($this->session->flashdata('success_msg')!="") { ?>
                                                     <div class="clearfix"></div>
                            <div class="alert alert-success">
                              <strong>Success!</strong> <?=$this->session->flashdata('success_msg');?>
                            </div>
                              <?php  
                              $this->session->unset_userdata('success_msg');
                          }
                              ?>
                              
                               <?php if($this->session->flashdata('err_msg')!="") { ?>
                                                     <div class="clearfix"></div>
                            <div class="alert alert-danger">
                              <strong>Error!</strong> <?=$this->session->flashdata('err_msg');?>
                            </div>
                              <?php 
                                } 
                              $this->session->unset_userdata('err_msg');
                              ?>
                    <form method="POST">
                        <div class="az-searchbar">
                            <label>Which subject do you need help with?</label>
                            <select class="form-control" id="select2-single-box searchbar" name="select2-single-box"
                                data-placeholder="Search for subject" data-tabindex="1">
                                <option></option>
                                <optgroup label="Popular Subjects">
                                    <?php foreach($popularsubject_data as $popularsubject){?>
                                    <option value="<?php echo $popularsubject->name ;?>"><?php echo $popularsubject->name ;?></option>
                                   
                                     <?php } ?>
                                </optgroup>
                                <optgroup label="All Subjects">
                                    <?php foreach($allsubject_data as $allsubject){?>
                                   <option value="<?php echo $allsubject->name ;?>"><?php echo $allsubject->name ;?></option>
                                     <?php } ?>
                                </optgroup>
                            </select>
                        </div>
                        <div class="levels-find">
                            <label>WHICH LEVEL ARE YOU LOOKING FOR?</label>
                            <div class="level">
                                <select name="level" id="level">
                                    <option>Select Levels</option>
                                    <?php foreach($levels_data as $levels){?>
                                    <option value="<?php echo $levels->name ;?>"><?php echo $levels->name ;?></option>
                                     <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="goal">
                            <label>WHAT’S YOUR MAIN GOAL?</label>
                            <div class="f-wrap" id="goal">
                                <?php foreach($goal_data as $goal){?>
                                   
                                <label class="radio">
                                    
                                    <input name="goal" type="radio" value="<?php echo $goal->reason ;?>">
                                    <?php echo $goal->reason ;?>
                                </label>
                                <?php } ?>
                                
                            </div>
                        </div>
                        <div class="lessons">
                            <label>HOW OFTEN WOULD YOU LIKE LESSONS?</label>
                            <div class="f-wrap" id="lessons">
                                <?php foreach($lessons_data as $lessons){?>
                                <label class="radio">
                                    <input name="lesson" type="radio" value="<?php echo $lessons->less_timing ;?>">
                                    <?php echo $lessons->less_timing ;?>
                                </label>
                                <?php } ?>
                                
                            </div>
                        </div>
                        <div class="price">
                            <label>HOW MUCH WOULD YOU LIKE TO SPEND?</label>
                            <div class="f-wrap" id="price">
                                <?php foreach($spend_data as $spend){ 
                                    // echo '<pre>';
                                    // print_r($spend);die;
                                    ?>
                                <label class="radio">
                                <?php 
                                    if($spend->starting_price == '' && $spend->ending_price == ''){ ?>
                                        <input name="price" type="radio" value="<?php echo $spend->sp_titile ;?>"><?php echo $spend->sp_titile ;?>
                                <?php    }else{ ?>
                                    <input name="price" type="radio" value="£<?php echo $spend->starting_price ;?> - £<?php echo $spend->ending_price ;?>">
                                    £<?php echo $spend->starting_price ;?> - £<?php echo $spend->ending_price ;?> <?php } ?>
                                   <br> <small><?php echo $spend->description;?></small>
                                </label>
                                 <?php } ?>
                                
                            </div>
                        </div>
                        <div class="datetime">
                            <label>WHEN IS A GOOD TIME TO HAVE A FREE MEETING WITH YOUR TUTOR?</label>
                            <div class="date-wrap" id="datetime">
                                <div class="date">
                                    <label>PICK A DAY</label>
                                    <input name="date" type="date" id="date">
                                </div>
                                <div class="time">
                                    <label>PICK A TIME (UK TIME)</label>
                                    <input name="time" type="time" id="time">
                                </div>
                            </div>
                        </div> 
                        <h4>As part of our matching service we offer a 15 minute completely free video chat to get to
                            know your tutor with no obligations!</h4>
                        <div class="gender" id="gender">
                            <label>Gender Preference:</label>
                            <div class="f-wrap">
                                <label class="radio">
                                    <input name="gender" type="radio" value="Male">
                                    Male
                                </label>
                                <label class="radio">
                                    <input name="gender" type="radio" value="Female">
                                    Female
                                </label>
                                <label class="radio">
                                    <input name="gender" type="radio" value="I Don't Mind">
                                    I Don't Mind
                                </label>
                            </div>
                        </div> 
                        <div class="anything-else">
                            <label>IS THERE ANYTHING ELSE WE SHOULD KNOW?</label>
                            <textarea  name="anything-else" type="text" placeholder=""></textarea>
                        </div>
                        <h2>Your contact details</h2>
                        <h6>Our tutor expert team will get back to you within the hour. We’ll then help you sort a free
                            15 minute meeting (in our lesson space) so you can get to know them before booking any
                            lessons.</h6>
                            <form method="POST">
                        <div class="name">
                            <label>Full Name</label>
                            <input type="text" id="name" name="fullname" placeholder="Type your full name..." >
                            <small style="color:red;"><?php echo form_error('fullname');?></small>
                        </div>
                        <div class="email">
                            <label>Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email..." pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$">
                            <small style="color:red;"><?php echo form_error('email');?></small>
                        </div>
                        <div class="phone">
                            <label>Phone Number</label>
                            <input type="tel" id="phone" name="phone" placeholder="Enter your contact number...">
                            <small style="color:red;"><?php echo form_error('phone');?></small>
                        </div>
                        <div class="submit">
                            <button type="submit">Submit Request</button>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="tutor-req-sum">
                        <h2>Tutor Request Summary</h2>
                        <div>
                            <h4 id="subject-show"></h4>
                            <p id="subject-title"></p>
                        </div>
                        <div>
                            <h4 id="level-show"></h4>
                            <p id="level-title"></p>
                        </div>
                        <div>
                            <h4 id="goal-show"></h4>
                            <p id="goal-title"></p>
                        </div>
                        
                        <div>
                            <h4 id="lesson-show"></h4>
                            <p id="lesson-title"></p>
                        </div>
                        <div>
                            <h4 id="price-show"></h4>
                            <p id="price-title"></p>
                        </div>
                        <div>
                            <h4><span id="date-show"></span> <span id="time-show"></span></h4>
                            <p id="datetime-title"></p>
                        </div>
                        <div>
                            <h4 id="gender-show"></h4>
                            <p id="gender-title"></p>
                        </div>
                        <div>
                            <h4 id="any-else-show"></h4>
                            <p id="any-else-title"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script>
    var goalx = null;
    var lessonx = null;
    var pricex = null;
    var genderx = null;
    var svalue = null;
    var zvalue = null;
    var xvalue = null;
    $("select[name='level']").change(function () {
        svalue = this.value;
        document.getElementById('level-show').innerHTML = svalue;
        document.getElementById("level-title").innerHTML = "Level";
    });
    $("select[name='select2-single-box']").change(function () {
        zvalue = this.value;
        document.getElementById('subject-show').innerHTML = zvalue;
        document.getElementById("subject-title").innerHTML = "Subject";
    });
    $("textarea[name='anything-else']").change(function () {
        xvalue = this.value;
        document.getElementById('any-else-show').innerHTML = xvalue;
        document.getElementById("any-else-title").innerHTML = "Notes";
    });
    $("input[name='goal']").click(function () {
        goalx = this.value;
        
        document.getElementById("goal-show").innerHTML = goalx;
        document.getElementById("goal-title").innerHTML = "Goal";
    });
    $("input[name='lesson']").click(function () {
        lessonx = this.value;
        document.getElementById("lesson-show").innerHTML = lessonx;
        document.getElementById("lesson-title").innerHTML = "Frequency";
    });
    $("input[name='price']").click(function () {
        pricex = this.value;
        document.getElementById("price-show").innerHTML = pricex;
        document.getElementById("price-title").innerHTML = "Price";
    });
    $("input[name='gender']").click(function () {
        pricex = this.value;
        document.getElementById("gender-show").innerHTML = pricex;
        document.getElementById("gender-title").innerHTML = "Gender";
    });
</script>
<script>
    $(document).ready(function () {
        $('#goal input:radio').change(function () {
            $('#goal label.label-active').removeClass('label-active');
            $(this).closest('label').addClass('label-active');
        });
    });
    $(document).ready(function () {
        $('#lessons input:radio').change(function () {
            $('#lessons label.label-active').removeClass('label-active');
            $(this).closest('label').addClass('label-active');
        });
    });
    $(document).ready(function () {
        $('#price input:radio').change(function () {
            $('#price label.label-active').removeClass('label-active');
            $(this).closest('label').addClass('label-active');
        });
    });
    $(document).ready(function () {
        $('#gender input:radio').change(function () {
            $('#gender label.label-active').removeClass('label-active');
            $(this).closest('label').addClass('label-active');
        });
    });
</script>
<script>
    $(function () {
        const days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
        const month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        $("#date").datepicker({ dateFormat: "dd-mm-yyyy" });
        $("#date").on("change", function () {
            var selected = $(this).val();
            var fdate = new Date(selected);
            var day = fdate.getDay();
            var mon = fdate.getMonth();
            var datex = fdate.getDate();
            document.getElementById('date-show').innerHTML = days[day] + ', ' + datex + ' ' + month[mon];
            document.getElementById('datetime-title').innerHTML = "Availability";
        });
    });
    $(function () {
        $("#time").on("change", function () {
            var select = $(this).val();
            document.getElementById('time-show').innerHTML = ' - ' + select;
            document.getElementById('datetime-title').innerHTML = "Availability";
        });
    });
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
    $(document).ready(function () {
        $('.next-button').click(function () {
            var current = $(this).parent();
            var next = $(this).parent().next();
            $(".progress li").eq($("fieldset").index(next)).addClass("active");
            current.hide();
            next.show();
        })

        $('.prev-button').click(function () {
            var current = $(this).parent();
            var prev = $(this).parent().prev()
            $(".progress li").eq($("fieldset").index(current)).removeClass("active");
            current.hide();
            prev.show();
        })
    })
</script>
<script>
    var elements = $(document).find("select.form-control");
    for (var i = 0, l = elements.length; i < l; i++) {
        var $select = $(elements[i]),
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

</script> 