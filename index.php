<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Kritarth 5.0</title>
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet" type="text/css">
		<link href="../fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>

	<body class="header-collapse">
		
		<div id="site-content">
			<?php include 'inc/header.php' ?>
			
			<div class="hero">
				<div class="slider">
					<ul class="slides">

						<li class="lazy-bg" data-background="dummy/slide-2.jpg">
							<div class="container">
									<h2 class="slide-title">Kritarth 5.0</h2>
									<h3 class="slide-subtitle">19th - 20th October 2019</h3>
									<!-- <p class="slide-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br>Fugiat aliquid minus nemo sed est.</p> -->

									<a href="register.php" class="button cut-corner">Register</a>
							</div>
						</li>


						<li class="lazy-bg" data-background="dummy/slide-1.jpg">
							<div class="container">
								<h2 class="slide-title">Kritarth 5.0</h2>
								<h3 class="slide-subtitle"></h3>
								<p class="slide-desc">#MillionDollarSmile</p>

								<a href="events.php" class="button cut-corner">Events</a>
							</div>
						</li>
						
						<!-- <li class="lazy-bg" data-background="dummy/slide-3.jpg">
							<div class="container">
									<h2 class="slide-title">Kritarth 5.0</h2>
									<h3 class="slide-subtitle">Less important text goes here</h3>
									<p class="slide-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br>Fugiat aliquid minus nemo sed est.</p>

									<a href="#" class="button cut-corner">Read More</a>
							</div>
						</li> -->
					</ul>
				</div>
			</div>
			
			<main class="main-content">
				<div class="fullwidth-block testimonial-section">
					<div class="container">
						<div class="quote-slider">
							<ul class="slides">
								<li>
									<blockquote>
										<p>Established on our honourable founder sir's philosophy of "Art of Giving", Kritarth is a one-of-a-kind  extravaganza of KIIT University, this year, being the torchbearer of the "Million Dollar Smile". Moreover, it provides a platform for a profusion of talents of huge diversity.</p>
										<!-- <cite>John Smith</cite> -->
										<!-- <span>Corporation CEO, books author</span> -->
									</blockquote>
								</li>
								<li>
									<blockquote>
										<p>Established on our honourable founder sir's philosophy of "Art of Giving", Kritarth is a one-of-a-kind  extravaganza of KIIT University, this year, being the torchbearer of the "Million Dollar Smile". Moreover, it provides a platform for a profusion of talents of huge diversity.</p>
										<!--cite>John Smith</cite-->
										<!-- <span>Corporation CEO, books author</span> -->
									</blockquote>
								</li>
							</ul>
						</div>
					</div>
				</div> <!-- .testimonial-section -->

				<div class="fullwidth-block upcoming-event-section" data-bg-color="#191919">
					<div class="container">
						
						<div class="event-carousel">
							
							
							
							
							
							
							
						
							
							
						
							
							
						
							
						</div> <!-- .event-carousel -->
					</div> <!-- .container -->
				</div> <!-- .upcoming-event-section -->

				
					</div> <!-- .container -->
				</div> <!-- .why-chooseus-section -->
			</main> <!-- .main-content -->

			<?php include 'inc/footer.php' ?>
		</div> <!-- #site-content -->

		<script src="js/jquery-1.11.1.min.js"></script>		
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>