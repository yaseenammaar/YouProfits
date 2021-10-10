<?php
unset($_SESSION['trim_videos']);
?>
  
  
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <script src="https://demos.jquerymobile.com/1.4.2/js/jquery.mobile-1.4.2.min.js"></script>
        <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Step 3 - Trim Videos</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                           
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <style>
            span.step {
    /* background: #cccccc; */
    border-radius: 0.8em;
    -moz-border-radius: 0.8em;
    -webkit-border-radius: 0.8em;
    /* color: #ffffff; */
    display: inline-block;
    font-weight: bold;
    line-height: 1.6em;
    margin-right: 5px;
    text-align: center;
    width: 11.6em; 
}
            </style>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">


                <!-- ============================================================== -->
                <!-- PRODUCTS YEARLY SALES -->
                <!-- ============================================================== -->

                <style type="text/css">
                    
                </style>
                <div class="row">

                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Trim</h3>
                            <?php if($_SESSION['user']['is_pro']==0){?>
                            <center><p style="color:red!important">Note: Your Account is not pro you can only render less than 5 mins video</p></center>
                            <?php } ?>
                            <?php 
                            $videos=$this->db->where(['user_id'=>$_SESSION['user']['id'],'is_saved'=>0])->order_by('sorting_num','asc')->get('select_video')->result_array();
                            $i=0;
                            if(count($videos)>0){
                             foreach($videos as $key=>$video){
                             $vid=$this->db->where(['id'=>$video['video_id'],'is_delete'=>0])->get('upload_video')->result_array();
include_once(SERVER_PATH.'/plugins/Video_details/getid3/getid3.php');
$getID3 = new getID3;
$file = $getID3->analyze(SERVER_PATH.'/uploads/videos/'.$vid[0]['url']);
// echo "Duration: ".$file['playtime_string'].
// " / Dimensions: ".$file['video']['resolution_x']." wide by ".$file['video']['resolution_y']." tall".
// " / Filesize: ".$file['filesize']." bytes<br />";
                             $i++;
                            ?>
                            <div id="div_fortrim<?php echo $i ?>" style="display:<?php echo $i==1?'block':'none'; ?>">
                            <center>
                             <span class="step"><?php echo $i ?> Video Out Of <?php echo count($videos)?> Videos</span>
                                <!-- <img style="width: 100%;padding: 0px 60px 0px 60px" src="<?php echo base_url('uploads/thumbnails/'.$vid[0]['thumbnail']) ?>"> -->
                                <video style="width: 100%;" 
    controls
    width="640"
    height="264"
    
  >
  <source src="<?php echo base_url().'uploads/videos/'.$vid[0]['url'] ?>" type="video/mp4" />
</video>
                            </center>
<script>
function gettime(sec){
  var hour="0";
  var minutes = Math.floor(sec / 60);
  if(minutes<10){
    minutes="0"+ minutes; 
  }
  if(sec>=60){
      sec=sec-minutes*60;
  }
  if(sec<10){
      sec="0"+sec;
  }
  if(sec>=3600){
      hour=Math.floor(sec / 3600);
  }
  if(hour<10){
      hour="0"+hour;
  }
  return hour+":"+minutes+":"+sec;
}
  $( function() {
    $( "#slider-range_<?php echo $i ?>" ).slider({
      range: true,
      min: 0,
      max: <?php echo round($file['playtime_seconds']) ?>,
      values: [ 0, <?php echo round($file['playtime_seconds']) ?> ],
      slide: function( event, ui ) {
        $( "#amount_<?php echo $i ?>" ).text(  gettime(ui.values[ 0 ]) + " - " + gettime(ui.values[ 1 ] ));
        $("#start_trim_unique_<?php echo $i ?>").val(ui.values[ 0 ]);
        $("#end_trim_unique_<?php echo $i ?>").val(ui.values[ 1 ]-ui.values[ 0 ]);
      }
    });
    $( "#amount_<?php echo $i ?>" ).val( "Second " + $( "#slider-range_<?php echo $i ?>" ).slider( "values", 0 ) +
      " -Second " + $( "#slider-range_<?php echo $i ?>" ).slider( "values", 1 ) );
    $( "#amount_<?php echo $i ?>" ).text('00:00:00 - '+gettime(<?php echo round($file['playtime_seconds']) ?>));
  } );
  
</script>                            
                            <form id="trim_video_submit_<?php echo $i ?>" onsubmit="return trim_video('<?php echo $i ?>')">
                                <input type="hidden" name="video_id" value="<?php echo $vid[0]['id'] ?>">
                                <input type="hidden" name="video_duration" value="<?php echo $file['playtime_seconds'] ?>">
                                <input type="hidden"  id="start_trim_unique_<?php echo $i ?>" name="start_trim" value="0">
                                <input type="hidden" id="end_trim_unique_<?php echo $i ?>" name="end_trim" value="<?php echo round($file['playtime_seconds']) ?>">
<center><p>
  <label for="amount">Duration Range:</label>
  <span id="amount_<?php echo $i ?>"></span>
</p></center>
                                <div id="slider-range_<?php echo $i ?>"></div>
                                <div id="from-error" style="margin:5px;">
                                </div>
                                
                                <button style="left: 40%;
    color: #fff!important;
    text-shadow: 0 1px 0 #f3f3f3;
    width: 20%;" type="submit" id="fwxm" class="btn btn-success">
                                    Apply
                                </button>
                                <button style="width: 20%;float: right;" onclick="skipvideo(<?php echo $i ?>);" class="btn btn-success text-white btn" id="step_manager" type="button">
                      Skip This Video  
                     </button>
                            </form>
                        </div>
                    <?php }}else{
                        echo "<p>There is No Video To tream Click Next Or Back Button to add Video</p>";
                    } ?>

                     <button style="width: 20%;float: right;" onclick="merge_video();" class="btn btn-success text-white btn" id="step_manager" type="button">
                      Next - Add Text  
                     </button>
                     
                     <button style="width: 20%;" onclick="manage_step('2')" class="btn btn-success text-white btn" id="step_manager" type="button">
                      Back - Arrange  
                     </button>
                  
                </div>
                 
                <!-- ============================================================== -->
                <!-- RECENT SALES -->
                <!-- ============================================================== -->
                
                    <!-- /.col -->
                </div>
               
            </div>
            <script>
                // function set_time(elem){
                //  console.log(elem);
                // }
                var count=<?php echo $i ?>;
                var forms_id=[];
                function trim_video(form_id){
                    if(forms_id.includes(form_id)==true){
                       swal("oops!", "You Already Tream This Video!", "warning", {
                        button: "Okay",
                       });
                       return false; 
                    }else{
                     forms_id.push(form_id);  
                    }
                    $('.preloader').show();
                    $('#fwxm').html('<i class="fas fa-spinner fa-pulse"></i>');
                    var form=jQuery("#trim_video_submit_"+form_id)[0];
                    var formdata1=new FormData(form);
                    jQuery.ajax({
                      statusCode: {
        500: function() {
          alert("something went wrong error code is 500");
          $('.preloader').hide();
        },
        504: function() {
          jQuery(form).trigger("reset");
                       $('#div_fortrim'+form_id).hide();
                       var upcount=parseInt(form_id)+1;
                       $('#div_fortrim'+upcount).show();
                       $('.preloader').hide();
                       if(count==form_id){
                          merge_video(); 
                       }
        }
        },
                      url:'<?php echo base_url('home/manage_trim_video') ?>',
                      type:'post',
                      data:formdata1,
                      contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                      processData: false,
                      success:function(result){
                        var obj=JSON.parse(result);
                      if(obj.status==1){
                        jQuery(form).trigger("reset");
                       $('#div_fortrim'+form_id).hide();
                       var upcount=parseInt(form_id)+1;
                       $('#div_fortrim'+upcount).show();
                       $('.preloader').hide();
                       if(count==form_id){
                          merge_video(); 
                       }
                        // window.location.href="";
                      }else{
                       $('#from-error').html('<p style="color:red">'+obj.err+'</p>'); 
                        $('.preloader').hide();
                      }
                     },
                     fail: function(xhr, textStatus, errorThrown){
                      alert('Something went wrong! Please Try Again Later');
                      $('.preloader').hide();
                     }
                  });
                    return false;
                }
                function skipvideo(form_id){
                  $('#div_fortrim'+form_id).hide(); 
                  var upcount=parseInt(form_id)+1;
                  $('#div_fortrim'+upcount).show();
                  if(count==form_id){
                     merge_video(4); 
                  }     
                }
                function merge_video(){
                    $.ajax({
                        url:'<?php echo base_url('home/checkrenderlimit') ?>',
                        success:function(res){
                          if(res==1){
                            manage_step('4');  
                          }else{
swal("Video Length should be less then or equal then 5 mins!")
.then((value) => {
  window.location.href='';
});  
                          }  
                        }
                    });
                    
//                  $('.preloader').show();
//                  $.ajax({
//                   statusCode: {
//         500: function() {
//           alert("something went wrong error code is 500");
//           $('.preloader').hide();
//         },
//         504: function() {
//           $('.preloader').hide();
//           manage_step(4);
//         }
//         },
//                   url:'<?php echo base_url('home/merge_video'); ?>',
//                   success:function(res){
//                     $('.preloader').hide();
//                     var obj=JSON.parse(res);
//                      if(obj.status==1){
//                       manage_step(4);
//                      }else{
//                     swal(obj.err)
// .then((value) => {
//   window.location.href='';
// });
//                      }
//                   }
//                  });
                }
            </script>
            <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
   