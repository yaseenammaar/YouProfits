<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assests/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assests/css/mobile.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assests/css/style.css">
    <script src='<?php echo base_url(); ?>Assests/css/kit.js'></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <title>JJ-Communicarion</title>
  </head>
  <body>
    <?php include('include/header.php') ?>
    <main>
      <section class="login-part">
        <div class="container">
          <div class="login-dt">
            <h2>Reset Paasword</h2>
          </div>
          <div class="login-form">
            <form id="register-form">
              <?php if($type=='email'){ ?>
                                  <div class="form-group">
                                      <!--<label>Email Email</label>-->
                                      <input class="logi-form" type="tel" required="" id="phn" name="email" placeholder="Enter Email">
                                  </div>
                                  <?php }
                                  if($type=='otp'){?>
                                  <div class="form-group">
                                      <!--<label>Enter OTP</label>-->
                                      <input class="logi-form" type="number" required="" name="otp" placeholder="Enter OTP">
                                  </div>
                                 <?php }
                                 if($type=='password'){?>
                                 <div class="form-group">
                                      <!--<label>Enter New Password</label>-->
                                      <input type="password" required="" name="pass" class="logi-form" minlength="6" placeholder="Enter Password">
                                  </div>
                                  <div class="form-group">
                                      <!--<label>Confirm Password</label>-->
                                      <input type="password" required="" name="conf_password" class="logi-form" minlength="6" placeholder="Enter Confirm Password">
                                  </div>
                                 <?php } ?>
                                  <div class="form-group">
                                      <h4><a href="<?php echo base_url('home/login') ?>" id="resend" class="resend">Back To Login</a></h4>
                                  <h4 style=""></h4>
                                </div>
              <div id="from-error">
                
              </div>
              <div class="from-group" id="form-button">
                <button class="logi-btn" onclick="submit_form()">Submit</button>
              </div>
            </form>
            <h3>Or</h3>
            <button class="otp-log">Login with OTP</button>
            <p>Don't have an account?<a href="<?php echo base_url('home/register') ?>">Sign Up Now</a></p>
          </div>
        </div>
      </section>
    </main>
    <?php include('include/footer.php') ?>
      <script>
         function submit_form(){
          $('#form-button').html('<button type="button" class="logi-btn"><i class="fas fa-spinner fa-pulse"></i></button>');
          var form=jQuery("#register-form")[0];
	      var formdata1=new FormData(form);
	   //   jQuery(form).trigger("reset");
	      jQuery.ajax({
		   url:'<?php echo base_url('home/manage_reset_password') ?>',
		   type:'post',
		   data:formdata1,
		   contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
           processData: false,
		 success:function(result){
		  $('#form-button').html('<button type="button"  onclick="submit_form()" class="logi-btn"> SUBMIT</button>');
		  var obj=JSON.parse(result);
		  if(obj.status==1){
		      jQuery(form).trigger("reset");
		      $('#from-error').html('<p style="color:green">'+obj.err+'</p>');
		      setTimeout(function() { 
		          window.location.href=obj.url
		          
		      }, 2000);
		  }else{
		     $('#from-error').html('<p style="color:red">'+obj.err+'</p>'); 
		  }
		 }
	   });   
     }  
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="<?php echo base_url(); ?>Assests/js/bootstrap.bundle.min.js"></script>
      <script src="<?php echo base_url(); ?>Assests/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url(); ?>Assests/js/popper.min.js"></script>
      <script src="<?php echo base_url(); ?>Assests/js/main.js"></script>
  </body>
</html>