<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title><?php echo $title ?></title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/45226/dragula.min.js"></script>
    <link rel="stylesheet" href="https://demos.jquerymobile.com/1.4.2/css/themes/default/jquery.mobile-1.4.2.min.css">  
    <script src="https://demos.jquerymobile.com/1.4.2/js/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/style.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/arrange.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/color.css" rel="stylesheet">
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php if(!isset($_SESSION['is_login'])){?>
        <link href="<?php echo base_url() ?>css/auth.css" rel="stylesheet">
    <?php } ?>

    
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
            <p style="margin-top: 61px;
    width: 200px;
    font-size: 20px;
    margin-left: -28px;
    color: black;">Please Wait.....</p>
        </div>
        
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include('include/header.php') ?>
        <div class="page-wrapper">



            <!-- Add Code Here -->
            

            <?php
               require($page);
                
            ?>


            <?php include('include/footer.php') ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script>
        var fileobj;
function upload_file(e) {
    e.preventDefault();
    fileobj = e.dataTransfer.files[0];
    ajax_file_upload(fileobj);
}
  
function file_explorer() {
    document.getElementById('selectfile').click();
    document.getElementById('selectfile').onchange = function() {
        oOutput = document.querySelector('.img-content'); 
        oOutput.innerHTML="";
        fileobj = document.getElementById('selectfile').files[0];
        if(fileobj.size<=100000000){
        ajax_file_upload();
        }else{
         
         oOutput.innerHTML = "<span style='color:red'>Error Video should be less or equal than 100 MB.</span>";
        }
        // document.getElementById("video_upload_by_device").submit();
    };
}
  
function ajax_file_upload() {
    // $('.preloader').show();
    var form=jQuery("#video_upload_by_device")[0];
    var formdata1=new FormData(form);
    $("#progress_unique_bar").show();
    var bar = $('.progress-bar');
    var percent = $('.percent');
    jQuery.ajax({
           xhr: function() {
            var xhr = new window.XMLHttpRequest();
             xhr.upload.addEventListener("progress", function(evt) {
            if (evt.lengthComputable) {
                var percentComplete = (evt.loaded / evt.total) * 100;
                var percentVal = Math.round(percentComplete) + '%';
                $('.progress-bar').css("width",percentVal)
                $("#unique_percantage_upload").text(percentVal);
            }
       }, false);
       return xhr;
    },
		   url:'<?php echo base_url('home/manage_ajax') ?>',
		   type:'post',
		   data:formdata1,
		   contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
           processData: false,
           success:function(result){
		  $('.preloader').hide();
		  $("#progress_unique_bar").hide();
            oOutput = document.querySelector('.img-content');
               var myArr = JSON.parse(result);
               $('.preloader').hide();
                if(myArr.status==1){
                swal("Video Successfully Uploaded!")
         .then((value) => {
         window.location.href='';
        });
                }else{
                 oOutput.innerHTML = "<span style='color:red'>Error " + myArr.err +"</span>";   
                }
                // oOutput.innerHTML = "<span style='color:red'>Error " + xhttp.status + " occurred when trying to upload your file.</span>";
		 },
		 statusCode: {
         404: function() {
          $('.preloader').hide();
          oOutput.innerHTML = "<span style='color:red'>Error " + 404+ " occurred when trying to upload your file.</span>";
         },
         500: function() {
          $('.preloader').hide();
          oOutput.innerHTML = "<span style='color:red'>Error " + 500+ " occurred when trying to upload your file.</span>";
         },
         504: function() {
          $('.preloader').hide();
          oOutput.innerHTML = "<span style='color:red'>Error " + 504+ " occurred when trying to upload your file.</span>";
         }
        }
	   });
    
}
function search_by_youtube(){
   $('.preloader').show();
   var form_data = new FormData(); 
   var str=$('#Youtube_str').val().trim();
   var form_data = new FormData(); 
   form_data.append('str', str);
   var xhttp = new XMLHttpRequest();
   xhttp.open("POST", "<?php echo base_url('home/get_youtube_result') ?>", true);
   xhttp.onload = function(event) {
    $('.preloader').hide();
    oOutput = document.querySelector('.img-content');
   if (xhttp.status == 200) {
    var myArr = JSON.parse(this.responseText);
     if(myArr.status==1){
      $('.table-youtube-result').show();
      $('#get_result_youtube').html(myArr.result);
     }else{
      oOutput.innerHTML = "<span style='color:red'>Error " + myArr.err +"</span>"; 
     }
   }else{
     oOutput.innerHTML = "<span style='color:red'>Error " + xhttp.status + " occurred when trying to upload your file.</span>";
   }

   } 
   xhttp.send(form_data); 
}
function save_youtube_video(thumbnail,video_id){
  $('.preloader').show();
  $.ajax({
    url:'<?php echo base_url('home/download_video') ?>',
    type:'post',
    data:'thumb='+thumbnail+'&video_id='+video_id,
    statusCode: {
        500: function() {
          alert("Unable To Download Your Video error code is 500");
          $('.preloader').hide();
        },
        504: function() {
          swal("Video Successfully Uploaded!");
          window.location.href='';
        }
      },
    success:function(res){
     $('.preloader').hide();
     var myArr = JSON.parse(res);
     oOutput = document.querySelector('.img-content');
     if(myArr.status==1){
        swal("Video Successfully Uploaded!")
         .then((value) => {
         window.location.href='';
        });
     }else{
        oOutput.innerHTML = "<span style='color:red'>Error " + myArr.err +"</span>";
        swal("Error!", myArr.err, "error");
     } 
    }
  });
}

function manage_sorting(){
    var count= $('.drag-inner-list').children().length;
    if(count<1){
      alert('Select Video First');
      return;
    }
    var i;
    for(i=1;i<=count;i++){
      var clases=$('.drag-inner-list .drag-item:nth-child('
        +i+') video').attr('class');
      $.ajax({
        statusCode: {
        500: function() {
          alert("something went wrong error code is 500");
        },
        504: function() {
        //   alert("something went wrong error code is 504");
        manage_step(3);
        }
        },
        url:'<?php echo base_url('home/manage_sorting') ?>',
        type:'post',
        data:'classs='+clases+'&num='+i,
        success: function(res){
         
        }
      });
    }
    manage_step(3);
}
// $( window ).unload(function() {
//   manage_step(1);
// });
    </script>
    <script src="<?php echo base_url() ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url() ?>bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>js/app-style-switcher.js"></script>
    <script src="<?php echo base_url() ?>plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url() ?>js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url() ?>js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url() ?>js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="<?php echo base_url() ?>plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="<?php echo base_url() ?>plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="<?php echo base_url() ?>js/pages/dashboards/dashboard1.js"></script>
    <?php if($page=='arrange.php'){ ?>
    <script src="<?php echo base_url() ?>js/arrange.js"></script>
  <?php }?>
</body>

</html>