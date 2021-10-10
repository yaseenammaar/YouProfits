<html>
<head>
  <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
  <title><?php echo $title ?></title>
  <meta name="theme-color" content="#000000" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/auth.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css') ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<style>
  
</style>
</head>
<body>
   <section id="login-section">
  <div class="container-fluid">
    <div class="row row-1 flex-box flex-wrap">
      <div class="col col-1 col-md-6 col-sm-6 col-xs-12 pr-5">
        <div class="content-wrap text-center"> <img src="<?php echo base_url('img/thumb_logo') ?>" alt="Site Logo" class="img-responsive mb-4" width="450">
          <h3 class="white-font">
              Easily create thumbnails for your videos using proven templates.
              <span>Access our easy to use editor</span>
              and growth tools to help you grow your YouTube channel in <?php echo date("Y") ?>.
              Create Stunning Thumbnails for your Freelance Clients.
          </h3>
          </div>
      </div>
      <div class="col col-2 col-md-6 col-sm-6 col-xs-12 pl-5">
        <div class="form-wrap">
          <form id="register-form" onsubmit="return submit_form()">
            <div class="form-title text-center mb-5">
              <h4 class="white-font" style="color: black;">Create Your Account Now</h4> </div>
            <label class="form-input">
               <input type="text" required="" name="name">
               <span class="label white-font">
             Name</span> <span class="underline"></span>
              </label>
              <input type="hidden" required=""  value="" name="phone">
              <label class="form-input">
               <input type="email" required="" name="email">
               <span class="label white-font">
             Email</span> <span class="underline"></span>
              </label>
            <label class="form-input">
              <input type="password" name="password"> 
              <span class="label white-font">Password</span>
              <div class="underline"></div>
            </label>
            <label class="form-input">
              <input type="password" name="confirm_password"> 
              <span class="label white-font">Confirm Password</span>
              <div class="underline"></div>
            </label>
            <div id="from-error">
              
            </div>
            <div class="submit-container text-center mb-4">
              <input id="submit" type="submit" value="SIGN UP" role="button" class="btn btn-irenic login-button" tabindex="0"> 
            </div>
          </form>
          <div class="form-footer text-center">
              <p class="white-font" style="color:black">
                Have Account ?
                <a href="<?php echo base_url('home') ?>" id="fogot-pass">Click here</a>
              </p>
            </div>
          <!--          </form>-->
        </div>
      </div>
    </div>
  </div>
</section>
   <script>
         function submit_form(){
          $('.login-button').val('Please Wait...');
          var form=jQuery("#register-form")[0];
        var formdata1=new FormData(form);
     //   jQuery(form).trigger("reset");
        jQuery.ajax({
       url:'<?php echo base_url('home/sign_up') ?>',
       type:'post',
       data:formdata1,
       contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
           processData: false,
     success:function(result){
      $('.login-button').val('SIGN UP');
      var obj=JSON.parse(result);
      if(obj.status==1){
          jQuery(form).trigger("reset");
          $('#from-error').html('<p style="color:green">'+obj.err+'</p>');
          setTimeout(function() { 
              window.location.href='<?php echo base_url('home') ?>'}, 3000);
      }else{
         $('#from-error').html('<p style="color:red">'+obj.err+'</p>'); 
      }
     }
     }); 
     return false;  
     }  
      </script>
      <script src="<?php echo base_url() ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
      <script src="<?php echo base_url('css/bootstrap.js') ?>"></script>

  </body>
</html>