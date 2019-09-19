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
									<option value="*">Show all</option>
									<option value=".concert">Concert</option>
									<option value=".band">Band</option>
									<option value=".stuff">Stuff</option>
								</select>
								<a href="#" class="current" data-filter="*">Show all</a>
								<a href="#" data-filter=".concert">Concert</a>
								<a href="#" data-filter=".band">Band</a>
								<a href="#" data-filter=".stuff">Stuff</a>
							</div>
							<div class="filterable-items">
								<div class="filterable-item concert">
									<a href="dummy/large-gallery/gallery-1.jpg"><figure><img src="dummy/gallery-1.jpg" alt="gallery 1"></figure></a>
								</div>
								<div class="filterable-item concert">
									<a href="dummy/large-gallery/gallery-2.jpg"><figure><img src="dummy/gallery-2.jpg" alt="gallery 2"></figure></a>
								</div>
								<div class="filterable-item stuff">
									<a href="dummy/large-gallery/gallery-3.jpg"><figure><img src="dummy/gallery-3.jpg" alt="gallery 3"></figure></a>
								</div>
								<div class="filterable-item concert">
									<a href="dummy/large-gallery/gallery-4.jpg"><figure><img src="dummy/gallery-4.jpg" alt="gallery 4"></figure></a>
								</div>
								<div class="filterable-item band">
									<a href="dummy/large-gallery/gallery-5.jpg"><figure><img src="dummy/gallery-5.jpg" alt="gallery 5"></figure></a>
								</div>
								<div class="filterable-item stuff">
									<a href="dummy/large-gallery/gallery-6.jpg"><figure><img src="dummy/gallery-6.jpg" alt="gallery 6"></figure></a>
								</div>
								<div class="filterable-item concert">
									<a href="dummy/large-gallery/gallery-7.jpg"><figure><img src="dummy/gallery-7.jpg" alt="gallery 7"></figure></a>
								</div>
								<div class="filterable-item band">
									<a href="dummy/large-gallery/gallery-8.jpg"><figure><img src="dummy/gallery-8.jpg" alt="gallery 8"></figure></a>
								</div>
								<div class="filterable-item band">
									<a href="dummy/large-gallery/gallery-9.jpg"><figure><img src="dummy/gallery-9.jpg" alt="gallery 9"></figure></a>
								</div>
								<div class="filterable-item stuff">
									<a href="dummy/large-gallery/gallery-10.jpg"><figure><img src="dummy/gallery-10.jpg" alt="gallery 10"></figure></a>
								</div>
								<div class="filterable-item band">
									<a href="dummy/large-gallery/gallery-11.jpg"><figure><img src="dummy/gallery-11.jpg" alt="gallery 11"></figure></a>
								</div>
								<div class="filterable-item stuff">
									<a href="dummy/large-gallery/gallery-12.jpg"><figure><img src="dummy/gallery-12.jpg" alt="gallery 12"></figure></a>
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