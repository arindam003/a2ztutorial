<head>
    <style type="text/css">
        p.error{
            color: red;
        }
    </style>
</head>
<section class="tutor-register-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12"></div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 tutor-reg-wrapper">

                           
                    <form id="form-id" class ="myform" method="POST">
                        <ul class='progress'>
                          <li class="active"><label>ACCOUNT INFORMATION</label></li>
                          <li><label>PERSONAL INFORMATION</label></li>
                          <li><label>PROFILE INFORMATION</label></li>
                        </ul>
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
                            </div>
                        <fieldset id="first-form">
                        <div >
                         <h2 class='heading-title'>ACCOUNT INFORMATION</h2>
                            <div class="formhold row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <p>
                                <label>Username: <span>*</span></label>
                                <input type="text" name ="name" id ="name" placeholder="Username">
                                <p class ="error" id="name-error"></p>
                            </p>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <p><label>Email Address: <span>*</span></label>
                                <input type="email" name ="email" id ="email" placeholder="Email" pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$">
                               <p class ="error" id="email-error"></p>
                            </p>
                            </div>
                            </div>
                            <div class="formhold row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <p><label>Password: <span>*</span></label>
                                <input type="password" name ="password" id="password"
                                placeholder="Password">
                                <p class ="error" id="password-error"></p>
                            </p>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <p><label>Confirm Password: <span>*</span></label>
                                <input type="password" id="confirm_password" name ="confirm_password" placeholder="Confirm Password">
                                <p class ="error" id="confirm_password-error"></p>
                            </p>
                            </div>  
                            </div>

                            <input type="checkbox" id="agree" name="agree" value="1" required="">
                            
                            <label for="agreement" class="agreement-label"> I agree to A2Z Tutorials' <a href="<?php echo base_url('tnc');?>">Terms & Conditions</a> and <a href="<?php echo base_url('privacypolicy');?>">Privacy Policy</a>.</label>
                            <p class ="error" id="agree-error"></p>

                            <br>
                            <input type='button' name='next' id="nextBtn-1"  class='next-button custom-button' value="Next">
                           
                            </div> 
                        </fieldset>
                        <fieldset id="second-form">
                            <div >
                          <h2 class='heading-title'>PERSONAL INFORMATION</h2>
                            <div class="formhold row" >
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <label>Title</label>
                                    <select name="title" id="title" >
                                        <option class="register-as-option">Select</option>
                                        <option class="register-as-option" value="Mr">Mr.</option>
                                        <option class="register-as-option" value="Ms">Ms.</option>
                                        <option class="register-as-option" value="Ms">Mrs.</option>
                                    </select>
                                   <p class ="error" id="title-error"></p>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <label>Gender</label>
                                    <select name="gender" id="gender">
                                        <option class="register-as-option">Select</option>
                                        <option class="register-as-option" value="Male">Male</option>
                                        <option class="register-as-option" value="Female">Female</option>
                                        <option class="register-as-option" value="Trans">Trans</option>
                                    </select>
                                    <p class ="error" id="gender-error"></p>
                                </div>
                            </div>
                            <div class="formhold row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <p><label>First Name: <span>*</span></label>
                                    <input type="text" id="firstname" name ="firstname" placeholder="First Name">
                                    <p class ="error" id="firstname-error"></p>
                                </p>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <p><label>Last Name: <span>*</span></label>
                                    <input type="text" id="lastname" name ="lastname" placeholder="Last Name">
                                     <p class ="error" id="lastname-error"></p>
                                </p>
                                </div>
                            </div>
                            <div class="formhold row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <p><label>Address1: <span>*</span></label>
                                    <input type="text" id="address1" name ="address1" placeholder="Address1">
                                     <p class ="error" id="address1-error"></p>
                                </p>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <p><label>Address2: </label>
                                    <input type="text" id= "address2" name ="address2" placeholder="Address2">
                                    <p class ="error" id="address2-error"></p>
                                </p>
                                </div>
                            </div>
                            <div class="formhold row">
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12">
                                <p><label>Preferred Location: </label>
                                   
                                    <textarea name="preferred_location" cols="5" rows="5" class="bio" id="preferred_location" placeholder="Preferred Location"></textarea>
                                    
                                    <p class ="error" id="preferred_location-error"></p>
                                </p>
                                </div>
                                
                                
                            </div>

                            <div class="formhold row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label>Online Lesson: </label>&nbsp;
                              
                                     <input name="online_lesson"  type="radio" id="online_lesson" value="1" />&nbsp;Yes 
                                     <input name="online_lesson"  type="radio" id="online_lesson" value="0" />&nbsp;No 
                                <p class ="error" id="online_lesson-error"></p>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label>In Person: </label>&nbsp;
                               
                                    <input name="in_person"  type="radio" id="in_person" value="1" />&nbsp;Yes 
                                     <input name="in_person"  type="radio" id="in_person" value="0" />&nbsp;No 
                                <p class ="error" id="in_person-error"></p>
                               
                                </div>
                            </div>
                            <div class="formhold row">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                                <p><label>Town: </label>
                                    <input type="text" id="town" name ="town" placeholder="Town">
                                    <p class ="error" id="town-error"></p>
                                </p>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                                <p><label>County: </label>
                                    <input type="text" id="county" name ="county" placeholder="County">
                                    <p class ="error" id="county-error"></p>
                                </p>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                                <label>Country: </label>
                                <select name="country" id="country">
                                    <option class="register-as-option" value="UK">United Kingdom</option>
                                    <option class="register-as-option" value="Fra">France</option>
                                    <option class="register-as-option" value="US">United States</option>
                                    <option class="register-as-option" value="Ger">Germany</option>
                                </select>
                                <p class ="error" id="country-error"></p>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                                <p><label>Post Code: </label>
                                    <input type="number" id="postalcode" name ="postalcode" placeholder="Post Code">
                                    <p class ="error" id="postalcode-error"></p>
                                </p>
                                </div>
                            </div>
                            <div class="formhold row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <p><label>Phone Number:</label>
                                    <input type="tel" id="phone" name ="phone" placeholder="Phone No.">
                                   <p class ="error" id="phone-error"></p>
                                </p>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <label for="dateofbirth">Date of Birth</label>
                                    <input type="date" id="dateofbirth" name="dateofbirth" id="dateofbirth">
                                    <p class ="error" id="dateofbirth-error"></p>
                                </div>
                            </div>
                            <input type='button' name='prev' id="prevBtn-1"  class='prev-button custom-button' value="Back">
                            <input type='button' name='next' id="nextBtn-2"  class='next-button custom-button' value="Next">
                            </div>
                        </fieldset>
                        <fieldset id="third-form">
                            <div >
                            <h2 class='heading-title'>PROFILE INFORMATION</h2>
                            <div class="formhold row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label for="distance">Distance Willing to Travel</label>
                                <select name="travel" id="travel">
                                    <option class="register-as-option">Select</option>
                                    <option class="register-as-option" value="home">Home Only</option>
                                    <option class="register-as-option" value="5 miles">Within 5 miles</option>
                                    <option class="register-as-option" value="10 miles">Within 10 miles</option>
                                    <option class="register-as-option" value="20 miles">Within 20 miles</option>
                                    <option class="register-as-option" value="50 miles">Within 50 miles</option>
                                </select>
                                <p class ="error" id="travel-error"></p>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label for="language">Your Native Language</label>
                                <select name="language" id="language">
                                    <option class="register-as-option">Select</option>
                                    <option class="register-as-option" value="English">English</option>
                                    <option class="register-as-option" value="German">German</option>
                                    <option class="register-as-option" value="French">French</option>
                                    <option class="register-as-option" value="Japanese">Japanese</option>
                                    <option class="register-as-option" value="Spanish">Spanish</option>
                                    <option class="register-as-option" value="Chinese">Chinese</option>
                                    <option class="register-as-option" value="Arabic">Arabic</option>
                                    <option class="register-as-option" value="Czech">Czech</option>
                                    <option class="register-as-option" value="Irish">Irish</option>
                                    <option class="register-as-option" value="Sweddish">Sweddish</option>
                                </select>
                                <p class ="error" id="language-error"></p>
                                </div>
                            </div>
                                <label for="bio">Your Bio</label>
                                <textarea name="yourbio" class="bio" id="yourbio" placeholder="Your Bio"></textarea>
                                <p class ="error" id="yourbio-error"></p>
                                <label for="exp">Your Experience</label>
                                <textarea name="experience" class="exp" id="experience" placeholder="Your Experience"></textarea>
                                <p class ="error" id="experience-error"></p>

                                <input type="hidden" name="usertype_id" value="3">

                            <p>
                             <input type='button' name='prev' id="prevBtn-2"  class='prev-button custom-button' value="Back">   
                            
                            <input type="submit" id ="signup" value="SIGN UP"></p>
                            </div>
                        </fieldset>
                      </form>
                 
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12"></div>
           </div>
       </div>
       </section>

<script type="text/javascript">
    $(document).ready(function(){
        $('#nextBtn-1').click(function(){
           // e.preventDefault();
            var name = $('#name').val();
            var email = $('#email').val();
            var validEmail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
           
          
            var password = $('#password').val();
            var confirm_password = $('#confirm_password').val();

            if($('#name').val() == '' ||  (name.trim()=="")){
                $('#name-error').html('Username is required !');
                return false;
            }
            else if($('#email').val() == '' || (email.trim()=="")){
                 $('#email-error').html('Email is required !');
                return false;
            }
           
            else  if(!validEmail.test(email)){
                 $('#email-error').html('Invalid Email !');
                return false;
            }
            else if($('#password').val() == '' || (password.trim()=="") ){
                 $('#password-error').html('Password is required !');
                return false;
            }
            else if($('#confirm_password').val() == '' || (confirm_password.trim()=="")){
                 $('#confirm_password-error').html('Confirm Password is required !');
                return false;
            }
            else if($('#password').val() != $('#confirm_password').val() ){
                 $('#confirm_password-error').html('Password and Confirm Password does not match !');
                return false;
            }
            
            else if(!($('#agree').prop('checked') )){
                 $('#agree-error').html('Agree is required !');
                return false;
            }
           else{
           
                $('#second-form').show();
                $('#first-form').hide();
            }
        });
        $('#nextBtn-2').click(function(){
             var title = $('#title').val();
             var gender = $('#gender').val();
             var firstname = $('#firstname').val();
             var lastname = $('#lastname').val();
             var address1 = $('#address1').val();
             var address2 = $('#address2').val();
             var preferred_location = $('#preferred_location').val();
             var online_lesson = $('#online_lesson').val();
             var in_person = $('#in_person').val();

             var town = $('#town').val();
             var county = $('#county').val();
             var country = $('#country').val();
             var postalcode = $('#postalcode').val();
             var phone = $('#phone').val();
            
             var dateofbirth = $('#dateofbirth').val();
             
            if($('#title').val() == 'Select'){
                $('#title-error').html('Title is required !');
                return false;
            }
            
            else if($('#gender').val() == 'Select'){
                $('#gender-error').html('Gender is required !');
                return false;
            }
            else if($('#firstname').val() == '' || (firstname.trim()=="") ){
                $('#firstname-error').html('Firstname is required !');
                return false;
            } 
            else if($('#lastname').val() == '' || (lastname.trim()=="")){
                $('#lastname-error').html('Lastname is required !');
                return false;
            }
            else if($('#address1').val() == '' || (address1.trim()=="")){
                $('#address1-error').html('Address1 is required !');
                return false;
            }
            else if($('#preferred_location').val() == '' || (preferred_location.trim()=="")){
                $('#preferred_location-error').html('Preferred Location is required !');
                return false;
            }
            
            else if($('input[name=online_lesson]:checked').length == "" || (online_lesson.trim()=="")){
                $('#online_lesson-error').html('Online Lesson is required !');
                return false;
            }
            
            else if($('input[name=in_person]:checked').length == "" || (in_person.trim()=="")){
                $('#in_person-error').html('In Person is required !');
                return false;
            }
           
            else if($('#town').val() == '' || (town.trim()=="")){
                $('#town-error').html('Town is required !');
                return false;
            }
            else if($('#county').val() == '' || (gender.trim()=="")){
                $('#county-error').html('County is required !');
                return false;
            }
            else if($('#country').val() == '' || (country.trim()=="")){
                $('#country-error').html('Country is required !');
                return false;
            }
            else if($('#postalcode').val() == '' || (postalcode.trim()=="")){
                $('#postalcode-error').html('Postalcode is required !');
                return false;
            }
           else if($('#phone').val() == '' || (phone.trim()=="")){
                $('#phone-error').html('Phone is required !');
                return false;
            }
            
            else if(phone.length != 11){
                $('#phone-error').html('Phone number 11 digits is required !');
                return false;
            }
            else if($('#dateofbirth').val() == '' || (dateofbirth.trim()=="")){
                $('#dateofbirth-error').html('Date of Birth is required !');
                return false;
            }

            else{

                $('#second-form').hide();
                $('#third-form').show();
            }
        });
        $('#prevBtn-1').click(function(){
            $('#second-form').hide();
            $('#first-form').show();

        });
        $('#prevBtn-2').click(function(){
            $('#third-form').hide();
            $('#second-form').show();

        });

        $('#signup').click(function(){
             var travel = $('#travel').val();
             var language = $('#language').val();
             var yourbio = $('#yourbio').val();
             var experience = $('#experience').val();

            if($('#travel').val() == 'Select' || (travel.trim()=="")){
                $('#travel-error').html('Travel is required !');
                return false;
            }
            else if($('#language').val() == 'Select' || (language.trim()=="")){
                $('#language-error').html('Language is required !');
                return false;
            }
            else if($('#yourbio').val() == '' || (yourbio.trim()=="")){
                $('#yourbio-error').html('Yourbio is required !');
                return false;
            }
            else if($('#experience').val() == '' || (experience.trim()=="")){
                $('#experience-error').html('Experience is required !');
                return false;
            }else{
                 $.ajax({

                    url :'<?php echo base_url('tutorregistration');?>/index',
                    type:'POST',
                    data:{
                        name:name,
                        email:email,
                        password:password,
                        title:title,
                        gender:gender,
                        firstname:firstname,
                        lastname:lastname,
                        address1:address1,
                        address2:address2,
                        town:town,
                        county:county,
                        country:country,
                        postalcode:postalcode,
                        phone:phone,
                        dateofbirth:dateofbirth,
                        travel:travel,
                        language:language,
                        yourbio:yourbio,
                        experience:experience

    
                     },

                     
                    success:function(data){
                        
                       
                        //alert(data);
                       
                    },
                     error:function(data){

                     //console.log(data);
                        alert("Error detected");
                       
                        
                     }
                });
            }

        });

    });
</script>
  