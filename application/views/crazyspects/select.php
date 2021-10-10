<?php
$videos=$this->db->where(['user_id'=>$_SESSION['user']['id'],'is_delete'=>0])->order_by('id','desc')->get('upload_video')->result_array();
$renders_videos=$this->db->where(['user_id'=>$_SESSION['user']['id'],"isDeleted"=>0])->order_by('id','desc')->get('rendered_videos')->result_array();
if($_SESSION['user']['is_pro']!=1){
          if($_SESSION['user']['is_admin']!=1){
              $before_time=strtotime('-24 hours', time());
              $render_vidos_count=$this->db->query("select * from rendered_videos where time>='{$before_time}' and user_id='{$_SESSION['user']['id']}'")->result_array();
              if(count($render_vidos_count)>=5){
                  $msg="Daily free render limit reached!";
              }
            //   $getID3 = new getID3;
            //   $file = $getID3->analyze(SERVER_PATH.'/uploads/videos/'.$vid[0]['url']);
            //   $vid_duration=round($file['playtime_seconds']);
            //   $five=60*5;
            //   if($vid_duration>=$five){
            //     echo json_encode(["status"=>0,"err"=>"Video Length should be less then or equal then 5 mins!"]);
            //     $_SESSION['step']=2;
            //     exit(); 
            //   }
          }
      }
?>
<div class="page-breadcrumb bg-white">
<div class="notification-top-bar">
  <?php if($_SESSION['user']['is_pro']==0){ ?>
  <p>You have a free account, you can only render 5 videos per day of up to 5 minutes each. <small><a href="#">GO Pro</a></small></p>
  <?php }else{ ?>
  <p>Pro User</p>
  <?php } ?>
</div>
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Step 1 - Upload</h4>
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
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">


    <!-- ============================================================== -->
    <!-- Three charts -->
    <!-- ============================================================== -->
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Total Rendered Videos</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li>
                        <div id="sparklinedash"><canvas width="67" height="30"
                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                    </li>
                    <li class="ms-auto"><span class="counter text-success"><?php echo count($renders_videos) ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-md-12" style="display:none;">
            <div class="white-box analytics-info">
                <h3 class="box-title">Total Draft Design</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li>
                        <div id="sparklinedash2"><canvas width="67" height="30"
                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                    </li>
                    <li class="ms-auto"><span class="counter text-purple">869</span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Total Videos Added</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li>
                        <div id="sparklinedash3"><canvas width="67" height="30"
                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                    </li>
                    <li class="ms-auto"><span class="counter text-info"><?php echo count($videos) ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- PRODUCTS YEARLY SALES -->
    <!-- ============================================================== -->

    <style type="text/css">
        
    </style>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box" style="height: 500px;">
                <h3 class="box-title">Upload Video</h3>
                <!-- <label>Choose Thumbnail</label>
               <input type="file" name="thumbnail" id="fileinput" class="form-control"> -->
               <div id="drop_file_zone" ondragover="return false">
                <br>
                    <div id="drag_upload_file">
                    <br>
                        <p>Upload You File</p>
                        
                        <p>
                            <input style="color: white;" type="button" value="Select File" class="btn btn-cyan" onclick="file_explorer();" /></p>
                        <form id="video_upload_by_device" enctype='multipart/form-data'>
                        <input type="file" name="file" id="selectfile" accept=".mp4,.wmv,.mov,.3gp"//>
                        </form>
                        
                    </div>
                </div>
<div class="progress" id="progress_unique_bar" style="height: 24px;margin-top: 10px;display:none;">
<p id="unique_percantage_upload" style="margin: 12px;">0%</p>
  <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
                <center><div class="img-content"><?php echo isset($msg)?"<p style='color:red!important'>".$msg." Go Pro</p>":'' ?></div></center>
               
                <!-- <script src="js/custom.js"></script> -->
                <br>
                <center>
                    Or Search Creative Commons on YouTube
                </center>
                <center>
                <input style="width: 50%" class="form-control mt-0" id="Youtube_str" type="text" name="YouTube" placeholder="Keyword">
                <br>
                <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button style="color: white;" class="btn btn-success" onclick="search_by_youtube()">Search</button>
                            </div>
                        </div>
            </center>
                <a style="float: right;" href="javascript:void(0)" onclick="<?php echo !isset($msg)?"manage_step(2)":"alert('".$msg."')" ?>">
                  <button class="btn btn-success text-white btn" id="step_manager" type="button">
                     Next - Arrange  
                  </button>
                </a>
            </div>
            
        </div>
        

    </div>
    <div class="row table-youtube-result" style="display:none">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="d-md-flex mb-3">
                    <h3 class="box-title mb-0">Youtube Results</h3>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-top-0">Title</th>
                                <th class="border-top-0">Thumbnail</th>
                                <th class="border-top-0">Channel Name</th>
                                <th class="border-top-0">Action</th>
                                <!-- 
                                <th class="border-top-0">Date</th>
                                <th class="border-top-0">Use</th> -->
                            </tr>
                        </thead>
                        <tbody id="get_result_youtube">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- RECENT SALES -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="d-md-flex mb-3">
                    <h3 class="box-title mb-0">Uploaded Videos</h3>
                    <!-- <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                        <select class="form-select shadow-none row border-top">
                            <option>March 2021</option>
                            <option>April 2021</option>
                            <option>May 2021</option>
                            <option>June 2021</option>
                            <option>July 2021</option>
                        </select>
                    </div> -->
                </div>
                <div class="table-responsive">
                    <table class="table no-wrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Preview</th>
                                <th class="border-top-0">Action</th>
                                <!-- 
                                <th class="border-top-0">Date</th>
                                <th class="border-top-0">Use</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($videos)>0){
                            $i=0;
                            foreach($videos as $key=>$video){
                            $i++; ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><img class="img-preview" src="<?php echo base_url('uploads/thumbnails/'.$video['thumbnail']) ?>"></td>
                                <td class="txt-oflo"><a href="<?php echo base_url('uploads/videos/'.$video['url']) ?>" target="_blank">View</a></td>
                                <td><a href="javascript:void(0)" onclick="delete_upload_video(<?php echo $video['id'] ?>)" class="fw-normal">Delete</a></td>
                            </tr>
                        <?php }}else{} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function delete_upload_video(id){
            $.ajax({
                url:'<?php echo base_url('home/delete_video')?>',
                type:'post',
                data:'video='+id,
                success:function(res){
                 window.location.href='';
                }
            });
        }
    </script>
    <!-- ============================================================== -->
    <!-- Recent Comments -->
    <!-- ============================================================== -->
    <div class="row" style="display:none">
        <!-- .col -->
        <div class="col-md-12 col-lg-8 col-sm-12">
            <div class="card white-box p-0">
                <div class="card-body">
                    <h3 class="box-title mb-0">Recent Designs</h3>
                </div>
                <div class="comment-widgets">
                    <!-- Comment Row -->
                   
                    <!-- Comment Row -->
                    <div >
                        <div class="p-2" >
                            <img src="./img/thumb5.jpeg" alt="user" class=" recent-design-layout">
                            <img src="./img/thumb6.jpeg" alt="user" class="recent-design-layout">
                            <img src="./img/thumb4.jpeg" alt="user" class="recent-design-layout">
                            <img src="./img/thumb1.jpg" alt="user" class="recent-design-layout">
                            <img src="./img/thumb2.jpg" alt="user" class="recent-design-layout">
                            <img src="./img/thumb3.png" alt="user" class="recent-design-layout">
                        
                            <img src="./img/thumb5.jpeg" alt="user" class=" recent-design-layout">
                            <img src="./img/thumb6.jpeg" alt="user" class="recent-design-layout">
                            <img src="./img/thumb4.jpeg" alt="user" class="recent-design-layout">
                            <img src="./img/img10.jpeg" alt="user" class="recent-design-layout">
                            <img src="./img/img12.jpeg" alt="user" class="recent-design-layout">
                            <img src="./img/img4.jpeg" alt="user" class="recent-design-layout">

                        </div>
                        <a href="arrange.html">
                            <button class="btn btn-success text-white btn" type="button">
                                  Next - Arrange  
                            </button>
                        </a>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="card white-box p-0">
                <div class="card-heading">
                    <h3 class="box-title mb-0">Recent YouTube Searches</h3>
                </div>
                <div class="card-body">
                    <ul class="chatonline">
                        <li>
                            <div class="call-chat">
                                <button class="btn btn-success text-white btn-circle btn" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <a href="javascript:void(0)" class="d-flex align-items-center">
                                <div class="ms-2">
                                    <span class="text-dark">iPhone <small
                                            class="d-block text-muted d-block">Tap to Search Again</small></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="call-chat">
                                <button class="btn btn-success text-white btn-circle btn" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <a href="javascript:void(0)" class="d-flex align-items-center">
                                <div class="ms-2">
                                    <span class="text-dark">Unboxing <small class="d-block text-muted">Tap to Search Again</small></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="call-chat">
                                <button class="btn btn-success text-white btn-circle btn" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <a href="javascript:void(0)" class="d-flex align-items-center">
                                <div class="ms-2">
                                    <span class="text-dark">Arm Wrestling <small class="d-block text-muted">Hover to Search Again</small></span>
                                </div>
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
</div>