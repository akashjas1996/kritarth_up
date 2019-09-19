<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Gallery | Band Template</title>
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>

	<body>
		
		<div id="site-content">
			<?php include 'inc/header.php' ?>
			
			<main class="main-content">
				<div class="fullwidth-block gallery">
					<div class="container">
						<div class="content fullwidth">
							<h2 class="entry-title">Gallery</h2>
							<div class="filter-links filterable-nav">
								<select class="mobile-filter">
									<option value="*">Events</option>
								</select>
								<a href="#" class="current" data-filter="*">Events</a>
							</div>
							<div class="filterable-items">
								<div class="filterable-item concert">
									<a href="images/evet_icons/devils_advocate.jpg"><figure><img src="images/event_icons/devils_advocate.jpg"></figure></a>
								</div>

								<div class="filterable-item concert">
									<a href="images/event_icons/kanvassing.jpg"><figure><img src="images/event_icons/kanvassing.jpg"></figure></a>
								</div>
								<div class="filterable-item concert">
									<a href="images/event_icons/klickit.png"><figure><img src="images/event_icons/klickit.png"></figure></a>
								</div>
								<div class="filterable-item concert">
									<a href="images/event_icons/kostumbre.jpg"><figure><img src="images/event_icons/kostumbre.jpg"></figure></a>
								</div>
								<div class="filterable-item concert">
									<a href="images/event_icons/KGT.jpg"><figure><img src="images/event_icons/KGT.jpg"></figure></a>
								</div>
								
								<div class="filterable-item concert">
									<a href="images/event_icons/Rocket_Singh.png"><figure><img src="images/event_icons/Rocket_Singh.png"></figure></a>
								</div>

							</div>
						</div>
					</div>
				</div> <!-- .testimonial-section -->

				
			</main> <!-- .main-content -->

			<?php include 'inc/footer.php' ?>
		</div> <!-- #site-content -->

		<script src="js/jquery-1.11.1.min.js"></script>		
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>
