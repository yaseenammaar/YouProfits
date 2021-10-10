<style type="text/css">
	a.bt-n.btn-primary {
    color: #8749B6;
    border-color: #8749B6;
    border-radius: 0;
    margin-right: 10px;
    font-weight: 600;
    font-family: "Montserrat", sans-serif;
    padding: 6px 30px;
    margin-top: 25px;
}
.btn-primary:hover {
    color: #fff !important;
    background-color: #0069d9;
    border-color: #0062cc;
    text-decoration:none;
}
</style>
<header>


			<!---contact detail area start--->
	<div class="container-fluid head-one">
		<div class="row">
			<div class="col-sm-7 col-md-7">
				<div class="col-md-6 col-sm-6 head-contact ipad-head">
					<p class="contact text-xs-center text-sm-center">Call For Order : +91 9051860753 (24 x 7)</p>
				</div>
				<div class="col-md-6 col-sm-6 head-contact1 ipad-head">
					<p class="contact text-xs-center text-sm-cente">Send prescription on WhatsApp: +91 9051860753</p>
				</div>
			</div>
			<div class="col-sm-5 i-pad">
				<div class="col-md-4 col-sm-6 col-xs-4 mobile-text">
				 	<p class="text-icon part1 moblie-only"><i class="fa fa-phone"></i> <span class="mob-span-block"> 033-25480296 </span></p>
				 </div>
				 <div class="col-md-4 col-sm-6 col-xs-4 mobile-text">
				 	<p class="text-icon moblie-only"><i class="fa fa-envelope-o"></i> <span class="mob-span-block"> cs@crazyspects.com </span></p>
				 </div>
				 <div class="col-md-4 col-sm-12  col-xs-4 mobile-text">
				 	<p class="text-icon moblie-only"><i class="fa fa-android" style="color: #a9cb2b;"></i><span class="mob-span-block"> Download App Now </span></p>
				 </div>
			</div>
		</div>
	</div>

<!---contact detail area end--->
<!---------------popup---------------------------->
<section class="form-set">
	<div class="container">
		<div class="row">
			<!--<div class="col-md-3"></div>--->
			<div class="login-fm">
				<div class="login-fom col-md-12">
					<form method="post" class="fom-mag">
						<div class="fom-icon">
							<button type="button" onclick="popClose()"> <i class="fa fa-times"></i></button>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<label class="form-head">User Name*</label>
								<input type="password" class="form-control form-group" name="username" id="username" placeholder="">
								
							</div>
							<div class="col-lg-12">
								<label class="form-head">password*</label>
								<input type="password" class="form-control form-group" name="password" id="password" placeholder="">
								<li class="pass-reg"><a href="password.php">Forgot Password</a></li>
							</div>
						</div>
						<div class="row">
							<div class="submit-button col-lg-6">
								<a href="Factsheet" class="bt-n btn-primary ">Login</a>

							</div>
							<div class="submit-button col-lg-6">
								<li class="new-reg"><a href="register-form.php" class="bt-n btn-primary ">Register</a></li>

							</div>
						</div>
				</form>
				</div>

			</div>
			
		</div>
	</div>
</section>

<!---logo inputarea list  area start--->
	
	<div class="container-fluid head-two co-xs-12">
		
		<div  onclick="menuOpen()" class="mobile-icon"><img src="image/menu1 (1).svg"></div>
		<ul class="list-part for-moblie">
						<li id="showMobileSearch"><i class="fa fa-search"></i></li>
			       	   <li><i class="fa fa-heart-o"></i></li>
			           <li><i class="fa fa-shopping-cart"></i> </li>
			    </ul>
		<div class="row">
		
			<div class="col-md-3 col-sm-3 col-xs-9	logo-part">
				<img src="image/logo.png" class="logo-image">
			</div>
			<div class="col-md-5 col-sm-5 col-xs-2 input-area " id="searchMobile">
				<input type="search" name="search" class="search" placeholder="What are you looking for?"><i class="fa fa-search"></i></button>
			</div>
			<div class="col-md-4 col-sm-4 login-part">
				 <ul class="list-part"> 
			       	   <li class="col-xs-hidden" onclick="mypopup()"><a href="#" id="sign">SignIn & SignUp</a></li>
			           <li><a href="">Track Order</a></li>
			           <li class="ipad-icons"><a href=""><i class="fa fa-heart-o"></i> Shortlist</a></li>
			           <li class="ipad-icons"><a href=""><i class="fa fa-shopping-cart"></i> Cart</a></li>
	             </ul>
			</div>
			
		</div>
	</div>

<!---logo inputarea list  area (head part end)end--->
<menu class="hidden-md">
	<div class="container-fluid menu-section">
		<div class="container">
			<div class="row">
			<div class="col-md-3 col-sm-1"></div>
				<div class="col-md-6 col-sm-10 ipad-nav head-nav">
					<ul>
						<li><a href="#">Sunglasses</a>
							<ul sub="menu">
								<li><a href="#">ladies</a></li>
								<li><a href="#">Power Sunglass</a></li>
								<li><a href="#">Sunglass Bag</a></li>
								</ul>
						</li>
						<li><a href="#" class="mn-mar style="margin-left:30px;">Spectacles</a>
							<ul sub="menu">
								<li><a href="#">Rim less</a></li>
								<li><a href="#">Full Frame</a></li>
								<li><a href="#">Half Frame</a></li>
								<li><a href="#">ladies Frame</a></li>
							</ul>
						</li>
						<li><a href="#">Kids</a>
							<ul sub="menu">
								<li><a href="#">Spectacles For Kids</a></li>
								<li><a href="#">Sunglasses For Kids</a></li>
								
							</ul>
						</li>
						<li><a href="#">Lens</a></li>
						<li><a href="#">Deals</a></li>
						<li class="hidden-md"><a href="">SignIn & SignUp</a></li>
					
					</ul>
				</div>
			<div class="col-md-3 col-sm-1"></div>
			</div>
		</div>
	</div>
</menu>
<nav class="mobile-menu">
	<div class="moblie-nav">
	
<!-- Contenedor -->
<ul id="accordion" class="accordion">
  <li>
    <div class="link">Sunglasses<i class="fa fa-chevron-down"></i></div>
    <ul class="submenu">
      <li><a href="#">ladies</a></li>
      <li><a href="#">Power Sunglass</a></li>
      <li><a href="#">Sunglass Bag</a></li>
    </ul>
  </li>
  <li>
    <div class="link">Spectacles<i class="fa fa-chevron-down"></i></div>
    <ul class="submenu">
      <li><a href="#">Rim less</a></li>
      <li><a href="#">Full Frame</a></li>
      <li><a href="#">Half Frame</a></li>
	  <li><a href="#">Ladies Frame</a></li>
    </ul>
  </li>
  <li>
    <div class="link">Kids<i class="fa fa-chevron-down"></i></div>
    <ul class="submenu">
      <li><a href="#">Spectacles For Kids</a></li>
      <li><a href="#">Sunglasses For Kids</a></li>
      
    </ul>
  </li>
  <li>
    <div class="link">Lens</div>
    
  </li>
  <li>
    <div class="link">Deals</div>
    
  </li>
  <li>
    <div class="link">SignIn & SignUp</div>
    
  </li>
  
</ul>
		<ul  hidden>
						<li class="active"><a href="#">Sunglasses </a><span class="ullispan"> <i class="fa fa-chevron-down" aria-hidden="true"></i></span>
							<ul class="submenu active">
								<li> <i class="fa fa-chevron-right" aria-hidden="true"></i><a href="#">ladies</a></li>
								<li> <i class="fa fa-chevron-right" aria-hidden="true"></i><a href="#">Power Sunglass</a></li>
								<li> <i class="fa fa-chevron-right" aria-hidden="true"></i><a href="#">Sunglass Bag</a></li>
								</ul>
						</li>
						<li><a href="#">Spectacles</a> <span class="ullispan"> <i class="fa fa-chevron-down" aria-hidden="true"></i></span>
							<ul sub="menu">
								<li> <i class="fa fa-chevron-right" aria-hidden="true"></i><a href="#">Rim less</a></li>
								<li> <i class="fa fa-chevron-right" aria-hidden="true"></i><a href="#">Full Frame</a></li>
								<li> <i class="fa fa-chevron-right" aria-hidden="true"></i><a href="#">Half Frame</a></li>
								<li> <i class="fa fa-chevron-right" aria-hidden="true"></i><a href="#">ladies Frame</a></li>
							</ul>
						</li>
						<li><a href="#">Kids</a> <span class="ullispan"> <i class="fa fa-chevron-down" aria-hidden="true"></i></span>
							<ul sub="menu">
								<li> <i class="fa fa-chevron-right" aria-hidden="true"></i><a href="#">Spectacles For Kids</a></li>
								<li> <i class="fa fa-chevron-right" aria-hidden="true"></i><a href="#">Sunglasses For Kids</a></li>
								
							</ul>
						</li>
						<li><a href="#">Lens</a></li> 
						<li><a href="#">Deals</a></li>
						<li class="hidden-md"><a href="#">SignIn & SignUp</a></li>
					
		</ul>
	</div>
	<div class="mn-mo-icon"> <button onclick="menuClose()"> <i class="fa fa-times"></i></button></div>
</nav>
</header>