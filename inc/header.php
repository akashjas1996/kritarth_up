<head>
	<style>
		.main-navigation {
  color: #ffffff !important;
  float: right; }
  
		.main-navigation .menu a {
      display: block;
      position: relative;
      padding: 45px 20px;
      color: #ffffff;
      font-size: 15px;
      font-size: 0.9375em;
      font-weight: 600;
      text-decoration: none;
      -webkit-transition: .3s ease;
              transition: .3s ease; }
      /* line 94, sass/layout/_header.scss */
      .main-navigation .menu a:after {
        content: "/";
        position: absolute;
        right: 0;
        color: #ffffff;
        font-weight: 300; }
	</style>
</head>

<header class="site-header">
				<div class="container" style="background-color: gray" >
					<a href="../" id="branding" >
						<img width="220px" src="../images/kritarth-white.png" alt="Site Title">
						<!-- <small class="site-description">Slogan goes here</small> -->
					</a> <!-- #branding -->
					
					<nav class="main-navigation">
						<button type="button" class="toggle-menu"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<!-- current-menu-item -->
							<li class="menu-item"><a href="../">Home</a></li>
							<li class="menu-item"><a href="../Gallery">Gallery</a></li>
							<li class="menu-item"><a href="../Events">Events</a></li>
							<li class="menu-item"><a href="../Contact">Contact</a></li>
							<?php
							if(isset($_SESSION['k_id'])){
								$name = $_SESSION['name'];
								echo '<li class="menu-item"><a href="../participant">'.$name.'</a></li>';
							}
							else{
								echo '<li class="menu-item"><a href="../login">Login</a></li>';
							 
							}
							?>

								<?php
							if(isset($_SESSION['k_id'])){
								echo '<li class="menu-item"><a href="../logout">Logout</a></li>';
							}
							else{
								echo '<li class="menu-item"><a href="../Registration">Register</a></li>';
							 
							}
							?>
						</ul> <!-- .menu -->
					</nav> <!-- .main-navigation -->
					<div class="mobile-menu"></div>
				</div>
			</header> <!-- .site-header -->