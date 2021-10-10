<style>
.user-bg .overlay-box{
    background:#313131!important;
}
.card {
    background-color: #313131;
}
</style>
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-12">
                        <div class="white-box">
                            <div class="user-bg" style="height: 200px;"> 
                            
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)">
                                          <img src="<?php echo $_SESSION['user']['profile']!=""?base_url('uploads/profile/'.$_SESSION['user']['profile']):base_url("plugins/images/users/genu.jpg") ?>"
                                                class="thumb-lg img-circle" alt="img">
                                        </a>
                                        <h4 class="text-white mt-2">Name</h4>
                                        <h5 class="text-white mt-2"><?php echo $_SESSION['user']['Name'] ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" id="register-form" onsubmit="return submit_form()">
                                  <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="<?php echo $_SESSION['user']['Name']?>" placeholder="johnathan@admin.com"
                                                class="form-control p-0 border-0" name="name"
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Email</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" value="<?php echo $_SESSION['user']['emailId']?>" placeholder="johnathan@admin.com"
                                                class="form-control p-0 border-0" name="email"
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4" hidden>
                                        <label class="col-md-12 p-0">Phone No</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            
                                        </div>
                                    </div>
                                    <input type="hidden" name="mobile" value="<?php echo $_SESSION['user']['mobileNumber']?>" placeholder="123 456 7890"
                                                class="form-control p-0 border-0">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Profile Pic</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" name="image" 
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">YouTube Api Key</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <textarea rows="2" class="form-control p-0 border-0" name='apikey'><?php echo $_SESSION['user']['YoutubeAPIKey'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">YouTube Api Secret</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <textarea rows="2" class="form-control p-0 border-0" name='apisec'><?php echo $_SESSION['user']['YoutubeAPISecret'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group" id="from-error">
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12 unique-button">
                                            <button class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
<script>
  function submit_form(){
    $('.unique-button').html('<button type="button" class="btn btn-success"><i class="fas fa-spinner fa-pulse"></i></button>');
          var form=jQuery("#register-form")[0];
        var formdata1=new FormData(form);
     //   jQuery(form).trigger("reset");
        jQuery.ajax({
       url:'<?php echo base_url('home/update_profile') ?>',
       type:'post',
       data:formdata1,
       contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
       processData: false,
     success:function(result){
      $('.unique-button').html('<button class="btn btn-success">Update Profile</button>');
      var obj=JSON.parse(result);
      if(obj.status==1){
          jQuery(form).trigger("reset");
          $('#from-error').html('<p style="color:green">'+obj.err+'</p>');
          setTimeout(function() { 
              window.location.href=''}, 2000);
      }else{
         $('#from-error').html('<p style="color:red">'+obj.err+'</p>'); 
      }
     }
     }); 
    return false;
  }
</script>