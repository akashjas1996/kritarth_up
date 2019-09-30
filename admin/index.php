<?php session_start(); ?>

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



 ?>


<html lang="en">
	<head>

		<style>
			table.blueTable {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 100%;
  text-align: left;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 13px;
}
table.blueTable tr:nth-child(even) {
  background: #D0E4F5;
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #FFFFFF;
  background: #D0E4F5;
  background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  border-top: 2px solid #444444;
}
table.blueTable tfoot td {
  font-size: 14px;
}
table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
}
		</style>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<title> Login| Kritarth.org</title>
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet" type="text/css">
		<link href="../fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="../style/style.css">
		<link rel="shortcut icon" href="../images/favicon.png">
		
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
						<center> <h2 class="page-title">Welcome 
							<?php $kid =  $_SESSION['k_id'];
							$query_get_email = "SELECT * FROM khata WHERE kritarth_id = '$kid'";
							$res_get_email = mysqli_query($link, $query_get_email);
							$row_get_email = mysqli_fetch_assoc($res_get_email);
							$email = $row_get_email['email'];
							echo $row_get_email['name']." !";
						  ?></h2> </center>
						<div class="row">
							<?php
								$query_get_events = "SELECT * FROM pratispradha_mukhiya WHERE email='$email'";
								$res_get_events = mysqli_query($link, $query_get_events); ?>
								<table class="blueTable">
									<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Shedule</th>
									<th>Venue</th>
									<th></th>
									<th></th>
									</tr>
								<?php
								while($row_get_events = mysqli_fetch_assoc($res_get_events)){
									echo '<tr>';
									$current_event =  $row_get_events['pratispradha_id'];
									$query_get_edit = "SELECT * FROM pratispradha WHERE event_id = '$current_event'";
									$res_get_edit = mysqli_query($link, $query_get_edit);
									$row_get_edit = mysqli_fetch_assoc($res_get_edit);
									$eid=$row_get_edit['event_id'];
									echo '<td>'.$row_get_edit['event_id'].'</td>';
									echo '<td>'.$row_get_edit['event_name'].'</td>';
									echo '<td>'.$row_get_edit['shedule'].'</td>';
									echo '<td>'.$row_get_edit['venue'].'</td>';
									echo '<td> <center> <button> EDIT  </button> </center> </td>';
									echo '<td> <center> <a href="checkReg?eid='.$eid.'"> <button> Check Registrations  </button> </a> </center> </td>';

									echo '<td> <form action="../checkReg" method="POST"> 
											<input  type="hidden" name="eid" value="'.$eid.'"> 
											<input type="submit"> 
											</form> 
										</td>';


									echo '</tr>';
								}
								echo '</table>';
							 ?>
						</div>
					</div>
				</div> <!-- .testimonial-section -->

				
			</main> <!-- .main-content -->

			<?php include '../inc/footer1.php' ?>

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
		
	</body>

</html>