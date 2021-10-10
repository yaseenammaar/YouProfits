<?php
$videos=$this->db->where(['user_id'=>$_SESSION['user']['id'],'is_delete'=>0])->get('upload_video')->result_array();
$renders_videos=$this->db->where('user_id',$_SESSION['user']['id'])->get('rendered_videos')->result_array();
?>
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Manage Users</h4>
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

    <style type="text/css">
        
    </style>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="d-md-flex mb-3">
                    <h3 class="box-title mb-0">Manage Users</h3>
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
                                <th class="border-top-0">Profile</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Phone</th>
                                <th class="border-top-0">Last Visit</th>
                                <th class="border-top-0">Is Pro</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $users=$this->db->where("is_admin",0)->get('tblusers')->result_array();
                            if(count($users)>0){
                            $i=0;
                            foreach($users as $key=>$user){
                            $i++; ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><img class='<?php echo $user['profile']!=""?base_url('uploads/profile/'.$user['profile']):base_url("plugins/images/users/genu.jpg") ?>'></td>
                                <td class="txt-oflo"><?php echo $user['Name'] ?></td>
                                <td class="txt-oflo"><?php echo $user['emailId'] ?></td>
                                <td class="txt-oflo"><?php echo $user['mobileNumber'] ?></td>
                                <td class="txt-oflo"><?php echo date("d,M Y",$user['last_login']) ?></td>
                                <td class="txt-oflo"><?php echo $user['is_pro']==1?'PRO':'FREE' ?>, <a href="<?php echo base_url('home/change_type/'.$user['id']) ?>">Change</a></td>
                                <td><a href="<?php echo base_url('home/delete_user/'.$user['id']) ?>" class="fw-normal">Delete</a></td>,
                                <td><a href="<?php echo base_url('home/change_account_type/'.$user['id']) ?>" class="fw-normal"><?php echo $user['is_bann']==1?'Un Block':'Block' ?></a></td>
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