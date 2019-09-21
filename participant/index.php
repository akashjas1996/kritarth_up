<?php
session_start(); ?>

<!DOCTYPE html>
<?php
include '../inc/dbconnection.php';
function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}

function nl2br2($string) {
$string = str_replace(array("\r\n", "\r", "\n"), "</li><li>", $string);
$string = substr($string,0,strlen($string)-2);
return $string;
}



if(isset($_POST['participation_pressed'])){
	$evnt =  $_POST['req_event'];
	$kid =  $_POST['k_id'];
	$event_query = "SELECT * FROM pratispradha_chunao WHERE event_id='$evnt' AND kritarth_id = '$kid'";
	$res_event = mysqli_query($link, $event_query);
	if(mysqli_num_rows($res_event)>0){
			echo '<script type="text/javascript">';
  		echo 'setTimeout(function () { swal("Oops!","Already participating.","warning");';
  		echo '}, 1000);
  		</script>';
		}
		else{

			$query_event_insert = "INSERT INTO pratispradha_chunao(event_id, kritarth_id) VALUES('$evnt','$kid')";
			$res_event_insert = mysqli_query($link, $query_event_insert);
			echo mysqli_error($link);
			echo '<script type="text/javascript">';
  		echo 'setTimeout(function () { swal("Wow!","Added to participating events.","success");';
  		echo '}, 1000);
  		</script>';
		}
}

if(isset($_POST['participation_removal_pressed'])){
	$del_event = $_POST['del_event_id'];
	$del_id = $_SESSION['k_id'];
	$query_del = "DELETE FROM pratispradha_chunao WHERE event_id = '$del_event' AND kritarth_id='$del_id'";
	// echo $query_del;
	$res_del = mysqli_query($link, $query_del);
	// echo 
}

 ?>


<html lang="en">
	<head>
		<style>
			.card_lg{
				/*background:rgba(255,255,255,0.1);*/
				/*height: 200px;*/
				background-color: transparent;
				padding:20px
				border-radius: 30px;
				margin: 10px;
			}
			.event_img_card{
				margin-top: 20px;
				margin-bottom: : 20px;
				/*margin-bottom: 10px; */
				background-color: white;
				height: 250px;
				background-repeat: no-repeat;
				background-size: cover;
				/*background-size: auto;*/
				/*background-size:100% 100%;*/
			}
			.btn_style1{
				background-color: #D06A54;
				border: none;
			}

			.btn_style2{
				background-color: #448CB8;
				border: none;
			}
	

		</style>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<title> Register| Kritarth.org</title>
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet" type="text/css">
		<link href="../fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="../style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->
		<script>

		</script>
	</head>

	<body>
		
		<div id="site-content">
			<?php include '../inc/header.php' ?>
			
			<main class="main-content">
				<div class="fullwidth-block inner-content">
					<div class="container">
						<center> <h2 class="page-title">
							

							<?php
							if(isset($_SESSION['k_id'])){
								//echo $_SESSION['k_id'];
								echo "Welcome ";
								echo $_SESSION['name'].' ! ';
							}
							else{
							echo "Welcome Guest"; 
						}
							?>


						</h2>
						<p> Your Kritarth ID is : <?php echo $_SESSION['k_id'] ?> </p>
						<p> Payment Button will be added soon. Stay Tuned. </p>
						<br>
						<hr>
						<h1 style="color: #448CB8"> Participating Events </h1>
						<div class="container">
							<div class="row">
								<div class="col-lg-12 col-sm-12 card_lg">
									
										<?php
										if(isset($_SESSION['k_id'])){
											$k_id = $_SESSION['k_id'];
										}

										$q2 = "SELECT * FROM pratispradha_chunao WHERE kritarth_id=$k_id";
										$res2 = mysqli_query($link, $q2);
										while($row2 = mysqli_fetch_assoc($res2)){
											$current_event_id = $row2['event_id'];
											$q3 = "SELECT * FROM pratispradha WHERE event_id='$current_event_id'";
											$res3 = mysqli_query($link, $q3);
											$row3 = mysqli_fetch_assoc($res3);
										 ?>
										 <div class="row">
										<div class="col-lg-4">
											<div class="event_img_card" style='background-image: url("../images/<?php echo $row3['event_image'] ?>")'>
												<div class="row">
														<h2> <?php echo $row3['event_name'] ?> </h2>
												</div>
											</div>
											<form action="" method="POST">
												<input type="hidden" name="del_event_id" value = "<?php echo $row3['event_id'] ?>">
											<div class="row">
												<button name="participation_removal_pressed" type="submit" class="btn_style1" style="width: 93%"> Remove </button>
											</div>
										</form>
										</div>
										
										<div class="col-lg-7" style=" margin: 10px;">
											
											<h4 align="left"> Venue :  <?php echo $row3['venue'] ?> </h4>

											<h4 align="left"> Time :  <?php echo $row3['shedule'] ?> </h4>
											<div>

											</div>
											<div style="cursor: pointer;">
											<p onclick="show_long_description(<?php echo $row3['event_id'] ?>)" align="left"> <b> About : </b> <?php echo nl2br2($row3['short_description'] .' Read more...') ?>  </p>
											</div>

											<div>
											<h4 style="line-height: 0" align="left"> First Prize :  <?php echo $row3['first_prize']?> </h4>
											<h4 style="line-height: 0" align="left"> Second Prize :  <?php echo $row3['second_prize']?> </h4>
											<h4 style="line-height: 0" align="left">  <?php

											if($row3['third_prize']>0)
											 	echo 'Third Prize : '.$row3['third_prize']
											 ?> </h4>
											</div>

											<div>
											<p style="display:none;" id="long_description_box<?php echo $row3['event_id'] ?>" align="left"> <b> Rules and Regulations : </b> <?php echo nl2br2($row3['long_description']') ?>  </p>
											</div>


										</div>
										</div>
									<?php } ?>

									<?php
										$kid = $_SESSION['k_id'];
										$q4 = "SELECT * FROM pratispradha_chunao WHERE kritarth_id = '$kid'" ;
										$r4 = mysqli_query($link, $q4);
										if(mysqli_num_rows($r4)==0){
											echo "<center> <h2> No events choosen. </h2> </center>";
										}


									 ?>


									
							</div>
							</div>
						</div>
						<br><hr><br>
						<h1 style="color: #D06A54"> All Events </h1>
						<div class="container">
							<div class="row">
								<div class="col-lg-12 col-sm-12 card_lg">
									<div class="row">
										<?php
										$q1 = "SELECT * FROM pratispradha";
										$res1 = mysqli_query($link, $q1);
										while($row1 = mysqli_fetch_assoc($res1)){

										 ?>
										<div class="col-lg-4">
											<?php $event_id = $row1['event_id']; ?>
											<div onclick="check(<?php echo $event_id ?>,<?php echo $k_id; ?>)" class="event_img_card" style='background-image: url("../images/<?php echo $row1['event_image'] ?>")'>
												<h2> <?php echo $row1['event_name'] ?> </h2>
											</div>
											<br>
											
											<form action="" method="POST">
											<div class="row">
												<input type="hidden" name="req_event" value="<?php echo $event_id; ?>">
												<input type="hidden" name="k_id" value="<?php echo $k_id; ?>">
												<button name="participation_pressed" type="submit" class="btn_style2" style="width: 93%"> Participate </button>
											</div>
										</form>
										<!-- <div class="row">
												<button onclick="activate_details_box(<?php echo $event_id?>)" class="btn_style1" style="width: 93%;"> Details </button>
											</div> -->
										</div>

									<?php } ?>
									</div>
							</div>
						</div>


					</center>
				</div>
			</div>
				
			</main> <!-- .main-content -->

			<?php include '../inc/footer.php' ?>

		</div> <!-- #site-content -->

		<script src="../js/jquery-1.11.1.min.js"></script>	
		<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>	
		<script src="../js/plugins.js"></script>
		<script src="../js/app.js"></script>

		<script>
			function college_chosen(a){
				document.getElementById('fee').style.display="block";
				if(a.value==='KIIT' || a.value==='KISS' || a.value==='KIMS' || a.value==='KSOM' || a.value==='KSOL' || a.value==='Kiit International School' ){
				document.getElementById('fee').value="150";
				document.getElementById('fee_store').value="150";}
				else{
				document.getElementById('fee').value="200";
				document.getElementById('fee_store').value="150";}
			}
		</script>
		<script>
			function activate_details_box(a){
				a = 'details_box'+a;
				console.log(a);
				document.getElementById(a).style.display="block";
			}
		</script>
		<script type="text/javascript">
			function show_long_description(a){
				a = "long_description_box"+a;

				if(document.getElementById(a).style.display==='block')
					document.getElementById(a).style.display="none";
				else{
					document.getElementById(a).style.display="block";
				}
				console.log(a);
			}
		</script>
	</body>

</html>