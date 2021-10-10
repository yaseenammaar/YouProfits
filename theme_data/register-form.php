<!doctype html>
<html>
<head>
<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Days+One&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Baloo+Da&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
		<link rel="preload" as="font" href="fonts/icomoon/fonts/icomoon.ttf?x9i9xv" type="font/ttf" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		
	
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/style.css">
		
		<style>
		.tooltip .tooltiptext {
    width: 45px;
    background: red;
    color: #fff;
    text-align: center;
    border-radius: 0px;
    padding: 1px 0;
    position: absolute;
    z-index: 1;
    top: 65px;
    right: -50px;
    font-size: 13px;
}
.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 9px;
    left: 43%;
    margin-left: -2px;
    border-width: 12px;
    border-style: solid;
    border-color: red transparent transparent transparent;
    transform: rotate(-270deg);
}

.form-control{
	height: 40px;
}

.col-lg-12.col-md-12.col-sm-12.col-xs-12.tabber{
    margin-left: 36px;
    margin-top: 30px;
}
.tabber2, .tabber3{
	display: none;
}
.fa {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
     
}
/**i {
    background: url(../image/12.jpg) no-repeat 0 0;
    display: inline-block;
    vertical-align: baseline;
}**/
@media only screen and (max-width: 600px) {
.tooltip .tooltiptext{width: 45px;font-size:10px;top: 15px;right: -40px;padding: 2px 0;}
.tooltip .tooltiptext::after{top: 35%;
    left: 44%;}
	.tooltip{z-index: 1;}
	.moblie-slid .tooltip .tooltiptext::after {
    top: 4px;
}
}
	
@media only screen 
and (min-device-width : 601px) 
and (max-device-width : 767px)  {
.tooltip .tooltiptext{width: 50px;font-size: 10px;top:47px;right: -50px;padding: 2px 0;}
.tooltip .tooltiptext::after{top: 40%;
    left: 50%;} 
.moblie-slid .tooltip .tooltiptext{
	top: 0px !important;
}
}
	
@media only screen and (min-device-width:768px) and (max-device-width: 1024px){

.tooltip .tooltiptext{width: 50px;font-size: 11px;top:50px;right: -50px;padding: 2px 0;}
.tooltip .tooltiptext::after{top: 40%;
    left: 50%;}
}

</style>
</head>
<body>
<!---header part start--->
<?php include('header.php') ?><!---header part start--->
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="login-fom">
					<form method="post" class="fom-mag">
						<div class="row">
							<div class="col-md-6">
								<label class="account-login">Name*</label>
								<input class="form-control" type="text" name="your-name" id="your-name" placeholder="First Name">
							</div>
							<div class="col-md-6">
								<label class="account-login">Last Name</label>
								<input class="form-control" type="text" name="last-name" id="Last-name" placeholder="Last Name">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label class="account-login">Email*</label>
								<input class="form-control" type="email" name="your-email" id="your-email" placeholder="Your Mail">
							</div>
							<div class="col-md-6">
								<label class="account-login">Gender*</label>
									<select name="gender" class="form-control form-control-sm">
										<option selected value=""> Select Gender</option>
										<option value="male">Male</option>
										<option value="female">Female</option>
									</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label class="account-login">Address</label>
								<textarea rows="3" class="form-control form-group" ></textarea> 
							</div>
							<div class="col-lg-6">
								<label class="account-login">Locality / Town</label>
								<input type="text" class="form-control form-group" name="Locality" id="Locality" placeholder="">
								<label class="form-head">state</label>
								<input type="text" class="form-control form-group" name="state" id="state" placeholder="">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label class="account-login">Mobile Number</label>
								<input type="text" class="form-control form-group" name="mobile-no" id="mobile-no" placeholder="">
							</div>
							<div class="col-lg-6">
								<label class="account-login">User Name*</label>
								<input type="password" class="form-control form-group" name="username" id="username" placeholder="">
								
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label class="account-login">Choose a password*</label>
								<input type="text" class="form-control form-group" name="choosePassword" id="choosePassword" placeholder="">
							</div>
							<div class="col-lg-6">
								<label class="account-login">Repeat your password*</label>
								<input type="password" class="form-control form-group" name="passwordRepeat" id="passwordRepeat" placeholder="">
								
							</div>
						</div>
						<div class="log-button">
							<li><a href="#" class="bt-n btn-primary ">Submit</a></li>
						</div>
				</form>
				</div>

			</div>
			
		</div>
	</div>
</section>
<!-----------popup-------------------->


<?php include('footer.php') ?><!---header part start--->

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="js/main.js"></script>
		<script src="assets/zoomsl.js"></script>
		<script src="assets/script.js"></script>
		
		<script>
		$(".accordin > h1").click( function(){
	$(this).next().slideToggle();
	$(this).toggleClass('active');
	$(this).children().find('.accordin-content').slideUp();
	//$(this).children().find('h1').removeClass('active');
}

);

		//---------------------------------------------------

		$(".getone").click(function(){
					var val = $(this).val();
					$(".fill-here").hide();
					$("."+val).show();
		})


		
		$(document).ready(function(){
$(".click").click(function(){
					//alert("shdjhj");
					var a=$(".tabber1").css("display");
					var b=$(".tabber2").css("display");
					var c=$(".tabber3").css("display");
				
				if(a=="block"){
					$(".tabber1").hide();
					$(".tabber2").show();
					$("#tabber1").removeClass("active");
					$("#tabber2").addClass("active");
				}
					
		})
				
				
				
				

});


		

		</script>
		
</body>
</html>