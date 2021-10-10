<?php if(!isset($_SESSION['is_login'])){ ?>
        <style>
            #main-wrapper[data-layout=vertical][data-sidebartype=full] .page-wrapper{
                margin-left:0px!important;
            }
        </style>
<?php } ?>
<header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <!-- <img src="plugins/images/logo-icon.png" alt="homepage" /> -->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <!-- <img src="plugins/images/logo-text.png" alt="homepage" /> -->
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a onclick="show_header()" class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                   
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                     <!--    <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li>
                        <?php if($page=="addtext.php"){?>
                            <a class="profile-pic" href="javascript:void(0);" onclick="manage_step(1)">
                                <i class="fas fa-home"></i><span style="margin-left: 6px;" class="text-white font-medium">Home</span>
                            </a>
                            <?php } if(isset($_SESSION['is_login'])){ ?>
                            <a class="profile-pic" href="#">
                                <img src="<?php echo $_SESSION['user']['profile']!=""?base_url('uploads/profile/'.$_SESSION['user']['profile']):base_url("plugins/images/users/genu.jpg") ?>" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium"><?php echo isset($_SESSION['is_login'])?$_SESSION['user']['Name']:'Anonymous' ?></span>
                            </a>
                             <a class="profile-pic" href="<?php echo base_url('home/logout') ?>">
                                Logout
                                </a>
                            <?php } ?>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </header>
<?php if(isset($_SESSION['is_login'])){ 
    if($page!="addtext.php"){?>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="javascript:void(0)" onclick="manage_step(1);"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('home/profile') ?>"
                                aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('home/render_videos') ?>"
                                aria-expanded="false">
                                <i class="fas fa-play" aria-hidden="true"></i>
                                <span class="hide-menu">Rendered videos</span>
                            </a>
                        </li>
                        <?php if($_SESSION['user']['is_admin']==1){ ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('home/manage_user') ?>"
                                aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Manage Users</span>
                            </a>
                        </li>
                        <?php } ?>
                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic-table.html"
                                aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Basic Table</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="fontawesome.html"
                                aria-expanded="false">
                                <i class="fa fa-font" aria-hidden="true"></i>
                                <span class="hide-menu">Icon</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="map-google.html"
                                aria-expanded="false">
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                <span class="hide-menu">Google Map</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="blank.html"
                                aria-expanded="false">
                                <i class="fa fa-columns" aria-hidden="true"></i>
                                <span class="hide-menu">Blank Page</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="404.html"
                                aria-expanded="false">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                <span class="hide-menu">Error 404</span>
                            </a>
                        </li> -->
                        
                    </ul>

                </nav>
            </div>
        </aside>
<?php }} ?>
<script>
function show_header(){
    $('.navbar-collapse').toggleClass('collapse');
}
function manage_step(step){
  $('.preloader').show();
  $('#step_manager').html('<i class="fas fa-spinner fa-pulse"></i>');
  $.ajax({
    statusCode: {
        504: function() {
        window.location.href='';
        }
        },
    url:'<?php echo base_url('home/manage_step') ?>',
    type:'post',
    data:'step='+step,
    success:function(res){
      window.location.href="<?php echo base_url('home?redirect=1') ?>";
    }
  })
}

</script>
