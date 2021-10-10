<script src="https://demos.jquerymobile.com/1.4.2/js/jquery.mobile-1.4.2.min.js"></script>
<link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Result Output</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                           
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="container-fluid">


                <style type="text/css">
                    
                </style>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <?php $vid=$this->db->where('user_id',$_SESSION['user']['id'])->limit(1)->order_by('id','desc')->get('rendered_videos')->result_array(); ?>
                            <center>
                                <video style="width:100%" controls>
  <source src="<?php echo base_url().'uploads/videos/'.$vid[0]['url'] ?>" type="video/mp4" />
</video>
                            </center>
                            <a  href="javascript:void(0)" onclick="manage_step('1')">
                                      <button style="color: #fff!important;
    text-shadow: 0 1px 0 #f3f3f3;
    width: 20%;" class="btn btn-success text-white btn" id="step_manager" type="button">
                                       Home 
                                      </button>
                                    </a>
                                    <a  href="<?php echo base_url().'uploads/videos/'.$vid[0]['url'] ?>" target="_blank">
                                      <button style="color: #fff!important;
    text-shadow: 0 1px 0 #f3f3f3;
    width: 20%;float: right;" class="btn btn-success text-white btn" id="step_manager" type="button">
                                       Download 
                                      </button>
                                    </a>

                </div>
                <!-- ============================================================== -->
                <!-- RECENT SALES -->
                <!-- ============================================================== -->
                
                    <!-- /.col -->
                </div>
            </div>
            <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            