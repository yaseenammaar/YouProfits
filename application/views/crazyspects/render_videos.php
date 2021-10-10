<?php
$videos=$this->db->where(['user_id'=>$_SESSION['user']['id'],'is_delete'=>0])->order_by('id','desc')->get('upload_video')->result_array();
$renders_videos=$this->db->where(['user_id'=>$_SESSION['user']['id'],"isDeleted"=>0])->order_by('id','desc')->get('rendered_videos')->result_array();
?>

<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
<style>
.overlay {
  position: absolute;
  top: 10%;
  bottom: 20%;
  left: 6%;
  right: 20%;
    height: 175px;
    width: 310px;
  opacity: 0;
  transition: .3s ease;
  background-color: black;
  border-radius: 20px;
}

.conta:hover .overlay {
  opacity: 90%;
}
.icon {
  color: white;
  font-size: 22px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
  margin-top: 130%;
  margin-left: 30%;
}
</style>

    <!-- ============================================================== -->
    <!-- Three charts -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- PRODUCTS YEARLY SALES -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- RECENT SALES -->
    <!-- ============================================================== -->
    

       <div class="row" style="display:none;">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="d-md-flex mb-3">
                    <h3 class="box-title mb-0">Rendered Videos</h3>
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
    <div class="row">
        <!-- .col -->
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card white-box p-0">
                <div class="card-body">
                    <h3 class="box-title mb-0">Rendered videos</h3>
                </div>
                <div class="comment-widgets">
                    <!-- Comment Row -->
                   
                    <!-- Comment Row -->
                    <div >
                        <div class="row" >
                        <?php if(count($renders_videos)>0){
                            $i=0;
                            foreach($renders_videos as $key=>$video){
                            $i++; ?>
                            <div class="col-md-4 conta" style="padding: 20px;">
                             <video style="width: 90%;top: 0;bottom: 0;left: 0;right: 0;height: 98%;border-radius: 20px;"><source src="<?php echo base_url('uploads/videos/'.$video['url']) ?>" type="video/mp4"></video>
  <div class="overlay">
  <center>
  <div class="row">
  <div class="col-3">
  <a href="<?php echo base_url('uploads/videos/'.$video['url']) ?>" target="_blank" class="icon" title="View">
    <i class="fas fa-eye"></i>
  </a>
  </div>
  <div class="col-3">
  <a href="<?php echo base_url('uploads/videos/'.$video['url']) ?>" download class="icon" title="Download">
    <i class="fas fa-download"></i>
  </a>
  </div>
  <div class="col-3">
  <a href="<?php echo base_url('home/delete_render_video/'.$video['id']) ?>" class="icon" title="Delete">
    <i class="far fa-trash-alt"></i>
  </a>
  </div>
  </div>
  </center>
  </div>
  </div>
                            <?php }}else{} ?>

                        </div>
                        
                        
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12" hidden>
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