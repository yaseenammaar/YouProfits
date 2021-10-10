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
            <h2>Forgot Password</h2>
          </div>
          <div class="login-form">
            <form id="register-form">
              <div class="from-group" id="phone-data">
                <input type="text" name="phone" placeholder="Your Mobile Number" class="logi-form">
              </div>
              <div class="from-group" id="otp-data" style="display:none;">
                <input type="number" name="otp" placeholder="Your OTP Number" class="logi-form">
              </div>
              <div id="from-error">
                
              </div>
              <div class="from-group" id="form-button">
                <button class="logi-btn" onclick="submit_form()">Submit</button>
              </div>
            </form>
            <form id="reset-form" style="display:none">
              <div class="from-group" id="phone-data">
                <input type="password" name="pass" placeholder="Your Mobile Number" class="logi-form">
              </div>
              <div class="from-group" id="otp-data" style="display:none;">
                <input type="password" name="conf_pass" placeholder="Your OTP Number" class="logi-form">
              </div>
              <div id="from-error">
                
              </div>
              <div class="from-group" id="form-button">
                <button class="logi-btn" onclick="resetsubmit()">Submit</button>
              </div>
            </form>
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
		   url:'<?php echo base_url('home/password_reset') ?>',
		   type:'post',
		   data:formdata1,
		   contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
           processData: false,
		 success:function(result){
		  $('#form-button').html('<button type="button"  onclick="submit_form()" class="logi-btn"> SUBMIT</button>');
		  var obj=JSON.parse(result);
		  if(obj.status==1){
		      if(obj.otp==1){
		      $('#phone-data').remove();
		      $('#otp-data').show();
		      }else{
		        $('#register-form').remove();  
		      }
		  }else{
		     $('#from-error').html('<p style="color:red">'+obj.err+'</p>'); 
		  }
		 }
	   });   
     } 
         function resetsubmit(){
            $('#form-button').html('<button type="button" class="logi-btn"><i class="fas fa-spinner fa-pulse"></i></button>');
          var form=jQuery("#register-form")[0];
	      var formdata1=new FormData(form);
	   //   jQuery(form).trigger("reset");
	      jQuery.ajax({
		   url:'<?php echo base_url('home/password_reset') ?>',
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
		          window.location.href='<?php echo base_url('home/login') ?>'}, 5000);
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