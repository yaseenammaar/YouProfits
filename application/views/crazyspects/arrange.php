
            <div class="container-fluid">


                <!-- ============================================================== -->
                <!-- PRODUCTS YEARLY SALES -->
                <!-- ============================================================== -->

                <style type="text/css">
                    
                </style>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Arrange</h3>
                            <div class="drag-container">
                                <ul class="drag-list">
                                    <li class="drag-column drag-column-on-hold">
                                      
                                            
                                        <div class="drag-options" id="options1"></div>
                                        
                                        <ul class="drag-inner-list" id="1">
                                            <?php 
                                            $videos=$this->db->where(['user_id'=>$_SESSION['user']['id']])->order_by('sorting_num','asc')->get('select_video')->result_array();
                                            if(count($videos)>0){
                                            $i=0;
                                            foreach($videos as $key=>$video){
                                            $delete_opr=false;
                                            $vid=$this->db->where(['id'=>$video['video_id'],'is_delete'=>0])->get('upload_video')->result_array();
                                            if($vid[0]['url']==""){
                                                $delete_opr=true;
                                            }
                                            if(!file_exists(SERVER_PATH.'/uploads/videos/'.$vid[0]['url'])){
                                                $delete_opr=true;
                                            }
                                            if($delete_opr==true){
                                              $this->db->where('id',$video['id'])->delete('select_video');
                                              continue;
                                            }
                                            $i++;?>
                                            
                                            <li class="drag-item" >
                                            
                                                <video style="width:100%" controls class="arrange-pic <?php echo $video['id'] ?>">
                                                <source src="<?php echo base_url('uploads/videos/'.$vid[0]['url']) ?>" type="video/mp4">
                                                </video>
                                                
                                            </li>
                                            
                                        <?php }} ?>
                                            
                                        </ul>
                                    </li>






                    </div>
                                    <a href="javascript:void(0)" style="float:right" onclick="manage_sorting()">
                                      <button class="btn btn-success text-white btn" id="step_manager" type="button">
                                       Next - Trim  
                                      </button>
                                    </a>
                                     <a href="javascript:void(0)" onclick="manage_step('1')">
                                      <button class="btn btn-success text-white btn" id="step_manager" type="button">
                                       Back - Upload  
                                      </button>
                                    </a>

                </div>
                    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="d-md-flex mb-3">
                    <h3 class="box-title mb-0">Uploaded Videos</h3>
                    
                </div>
                <div class="table-responsive">
                    <table class="table no-wrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Preview</th>
                                <th class="border-top-0">Video</th>
                                <!-- 
                                <th class="border-top-0">Date</th>
                                <th class="border-top-0">Use</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $videos=$this->db->where(['user_id'=>$_SESSION['user']['id'],'is_delete'=>0])->order_by('id','desc')->get('upload_video')->result_array();
                            if(count($videos)>0){
                            $i=0;
                            foreach($videos as $key=>$video){
                            $i++; ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><img class="img-preview" src="<?php echo base_url('uploads/thumbnails/'.$video['thumbnail']) ?>"></td>
                                <td class="txt-oflo"><a href="javascript:void(0)" onclick="add_video('<?php echo $video['id'] ?>')">
                                <?php if($this->db->where(["video_id"=>$video['id'],"user_id"=>$_SESSION['user']['id']])->get('select_video')->num_rows()>0){echo "Remove"; }else{ echo "Add";} ?>

                            </a></td>
                                <!-- 
                                <td class="txt-oflo">October 28, 2021</td>
                                <td><a href="#" class="fw-normal">Add</a></td> -->
                            </tr>
                        <?php }}else{} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
                </div>
            </div>
<script>
    function add_video(vid){
     $.ajax({
        url:'<?php echo base_url('home/update_status_video') ?>',
        type:'post',
        data:'vid='+vid,
        success:function(res){
         if(res=='true'){
          window.location.href='';
      }
        }
     });
    }
</script>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            