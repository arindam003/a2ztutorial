<section class="signup-bg">
  <div class="container">
    <div class="row">
    <div class="col-xl-3 col-lg-2 col-md-12 col-sm-12 col-12"></div>
      <div class="col-xl-6 col-lg-8 col-md-12 col-sm-12 col-12 ">
        <div class="signup"> 
      <h2>Sign up</h2>
      <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Currently studying</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Recently graduated</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">

  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <form class="login-container" method="POST">
        <p>
            <label>Name: <span>*</span></label>
            <input type="text" name="name" id="name" placeholder="Full Name">
            <?php echo form_error('name' ,'<div class="text-danger">','</div>' );?>
        </p>
        <p>
            <label>University</label>
            <select name="university" class="form-control" id="university_id">
                <option >Select University</option>
                <?php  foreach($university_data as $univer){  ?>
                <option value="<?php echo $univer->id ;?>"><?php echo $univer->uni_name ;?></option>
                 <?php } ?>
            </select>
           <?php echo form_error('university' ,'<div class="text-danger">','</div>' );?>

        </p>
       
        <p>
            <label>Uni email prefix</label>
            <input type="text" name="email_prefix" id="email_prefix" placeholder="Email Prefix">
            <?php echo form_error('email_prefix' ,'<div class="text-danger">','</div>' );?>
        </p>
        
       <p>
            <label> Uni email domain</label>
            <select name="email_domain" class="form-control" id="email_domain">
                <option >Select Name</option>
            </select>
            <?php echo form_error('email_domain' ,'<div class="text-danger">','</div>' );?>
        </p>
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
<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  <form class="login-container" method="POST">
          <p>
              <label>Name: <span>*</span></label>
              <input type="text" name="name" id="name" placeholder="Full Name">
              <?php echo form_error('name' ,'<div class="text-danger">','</div>' );?>
          </p>
          <p>
              <label>Personal email</label>
              <input type="email" name="email" id= "email" pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$"placeholder="Personal email">
              <?php echo form_error('email' ,'<div class="text-danger">','</div>' );?>
          </p>
          <p>
              <label>University</label>
              <select name="university" class="form-control" id="university_id2">
                <option >Select University</option>
                <?php  foreach($university_data as $univer){  ?>
                <option value="<?php echo $univer->id ;?>"><?php echo $univer->uni_name ;?></option>
                 <?php } ?>
              </select>
         <?php echo form_error('university' ,'<div class="text-danger">','</div>' );?>
            
          </p>
                   
          <p>
              <label>Uni email prefix</label>
              <input type="text" name="email_prefix" placeholder="Email Prefix">
              <?php echo form_error('email_prefix' ,'<div class="text-danger">','</div>' );?>
          </p>
          <p>
              <label> Uni email domain</label>
            <select name="email_domain" class="form-control" id="email_domain2">
              <option >Select Name</option>
            </select>
          <?php echo form_error('email_domain' ,'<div class="text-danger">','</div>' );?>
          </p>
         
          <p>
              <label>Password: <span>*</span></label>
              <input type="password" name="password" placeholder="Password">
              <?php echo form_error('password' ,'<div class="text-danger">','</div>' );?>
          </p>
          <p>
              <label>Confirm Password: <span>*</span></label>
              <input type="password" name="confirm_password" placeholder="Confirm Password">
              <?php echo form_error('confirm_password' ,'<div class="text-danger">','</div>' );?>
          </p>
          <p><input type="checkbox" name="agree">
            <span>I don't have access to my uni email</span></p>
          <p><input type="submit" name ="graduated" value="SIGN UP"></p>
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