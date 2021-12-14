<section class="signup-bg">

  <div class="container">

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

    <div class="row">

    <div class="col-xl-3 col-lg-2 col-md-12 col-sm-12 col-12"></div>



      <div class="col-xl-6 col-lg-8 col-md-12 col-sm-12 col-12 ">

        <div class="signup"> 

      <h2>Sign up</h2>

      <nav>

 

</nav>

<div class="tab-content" id="nav-tabContent">



  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


    <form class="login-container" method="POST" enctype= multipart/form-data>

        <!-- <input type="hidden" name="mail_varify"> -->

        <p>

            <label>Name: <span>*</span></label>

            <input type="text" name="name" id="name" placeholder="Full Name">

            <?php echo form_error('name' ,'<div class="text-danger">','</div>' );?>

        </p>

        <p>

            <label>Email </label>

            <input type="email" name="email" id="email" placeholder="Email " pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$">

            <?php echo form_error('email' ,'<div class="text-danger">','</div>' );?>

        </p>

        <p>

            <label>Contact: <span>*</span></label>

            <input type="text" name="phone" id="phone" placeholder="Full Contact">

            <?php echo form_error('phone' ,'<div class="text-danger">','</div>' );?>

        </p>

        <p>

            <label>CV: <span>*</span></label>

            <input type="file" name="file_src" id="inputsliderimage" />

            <!-- <p class="help-block" style="color:red;">Please Upload CV.</p> -->
           
        <?php //echo  $error;?>
            <?php echo form_error('file_src' ,'<div class="text-danger">','</div>' );?>

        </p>





    <div class="user-details">

      <div class="user_data">

            <div class="form-group">

              <label>Subject  <span>*</span></label>

                <select name="subject_id[]" class="form-control" id="subjects">

                    <option>----Select Subjects----</option>

                    <?php  foreach($subjects_data as $sub){  ?>

                    <option  value="<?php echo $sub->id ;?>"><?php echo $sub->name ;?></option>



                   <?php } ?>

                   

                </select>

            </div>

            <div class="form-group">
             <div class="row">

              <?php  foreach($levels_data as $lev){  ?>
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">

                   <input class="form-check-input" type="checkbox" value="<?=$lev->id?>" name="levels_id[]" >

                    <label class="checkbox-inline" for="flexCheckDefault">&nbsp;&nbsp;&nbsp;<?=$lev->name?></label>
                    </div>

                <?php } ?>

            </div>
  			</div>
        </div>

    </div>

    <div class="form-group">

        <input value="Add More" class="add_details" autocomplete="false" type="button">

    </div>











        

        <p>

            <label>Password: <span>*</span></label>

            <input type="password" name="password" id="password" placeholder="Password">

            <?php echo form_error('password' ,'<div class="text-danger">','</div>' );?>

        </p>

        <p>

            <label>Confirm Password: <span>*</span></label>

            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">

            <?php echo form_error('confirm_password' ,'<div class="text-danger">','</div>' );?>

        </p>

                    

        <p><input type="submit" name= "studying" id="studying" value="SIGN UP"></p>

        <div class="google-btn">

            <a href="#">

          <div class="google-icon-wrapper">

          

            <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>

          </div>

          <p class="btn-text"><b>Sign in with google</b></p>

          </a>

        </div>

    </form>

</div>



</div>



</div>

      

       </div>

      <div class="col-xl-3 col-lg-2 col-md-12 col-sm-12 col-12"></div>

      

    </div>

  </div>

</section>

<!-- university wise email domain (studying)-->

<script type="text/javascript">

    $(document).ready(function(){



     $("#university_id").change(function(){

           var uni_id = $("#university_id").val();

           // alert(uni_id);



            $.ajax({



                url :'<?php echo base_url('tutors');?>/ajax_university',

                

                type:'POST',

                data:{

                    university_id:uni_id

                    

                    

                },

                success:function(data){

                   // alert(data);



                    $('#email_domain').html(data);

                    

                },

                 error:function(data){

                     //alert('Error');

                 }

            });

        });



    });

</script>



<!-- university wise email domain (graduated)-->

<script type="text/javascript">

    $(document).ready(function(){



     $("#university_id2").change(function(){

           var uni_id = $("#university_id2").val();

           // alert(uni_id);



            $.ajax({



                url :'<?php echo base_url('tutors');?>/ajax_university2',

                

                type:'POST',

                data:{

                    university_id2:uni_id

                    

                    

                },

                success:function(data){

                   // alert(data);



                    $('#email_domain2').html(data);

                    

                },

                 error:function(data){

                     //alert('Error');

                 }

            });

        });



    });

</script>

<!--################  add remove subject level ################-->



 <script>    

  $(".add_details").click(function(){

    

      //the below code will append a new user_data div inside user-details container

   

        $(".user-details").append(' <div class="user_data"><div class="form-group"><label>Subject  <span>*</span></label><select name="subject_id[]" class="form-control" id="subjects"><option>----Select Subjects----</option><?php  foreach($subjects_data as $sub){  ?><option  value="<?php echo $sub->id ;?>"><?php echo $sub->name ;?></option><?php } ?></select></div><div class="form-group"><div class="row"> <?php  foreach($levels_data as $lev){  ?><div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 "><input class="form-check-input" type="checkbox" value="<?=$lev->id?>" name="levels_id[]" ><label class="checkbox-inline" for="flexCheckDefault">&nbsp;&nbsp;&nbsp;<?=$lev->name?></label></div><?php } ?></div><button class="remove-btn" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt" aria-hidden="true"></i></button></div>');

    

          

  });

  $("body").on("click",".remove-btn",function(e){

       $(this).parents('.user_data').remove();

      //the above method will remove the user_data div

  });

</script> 



<!--using clone////--- <script type="text/javascript">

  function addsublev(){



    $('#firstsubjectlev .subjectleveldiv').clone().find('input').val('').end().appendTo('#moresubjectlev');

 }

 

  function removesublev(){

  $('#moresubjectlev .subjectleveldiv').last().remove();

 }



</script> -->



<!-- validation -->

<!-- <script type="text/javascript">

    $(document).ready(function(){

        $('#studying').click(function(){

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

                 $.ajax({



                    url :'<?php echo base_url('tutors');?>/signup',

                    type:'POST',

                    data:{

                        name:name,

                        email:email,

                        password:password,

                        



    

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

       

        



       

             



            // if($('#travel').val() == 'Select' || (travel.trim()=="")){

            //     $('#travel-error').html('Travel is required !');

            //     return false;

            // }

            



      



    });

</script> -->