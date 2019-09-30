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
		<title> Registrations| Kritarth.org</title>
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
						<center> <h2 class="page-title">
							<?php $kid =  $_SESSION['k_id'];
							$event_id = $_POST['eid'];
							$query_ev = "SELECT * FROM pratispradha WHERE event_id='$event_id'";
							$res_ev = mysqli_query($link, $query_ev);
							$row_ev = mysqli_fetch_assoc($res_ev);
							echo $row_ev['event_name'];
							// $query_get_email = "SELECT * FROM khata WHERE kritarth_id = '$kid'";
							// $res_get_email = mysqli_query($link, $query_get_email);
							// $row_get_email = mysqli_fetch_assoc($res_get_email);
							// $email = $row_get_email['email'];
							// echo $row_get_email['name']." !";
						  ?></h2> </center>
						  <?php $count=0; ?>
						<div class="row">
							<table class="blueTable">
								<tr>
								<th>Sl.</th>
								<th>Kritarth ID </th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Payment Status</th>
								<th>Attendance</th>
								</tr>

							<?php
								
								$query_get_std = "SELECT * FROM pratispradha_chunao WHERE event_id='$event_id'";
								$res_get_std = mysqli_query($link, $query_get_std);
								while($row_get_std = mysqli_fetch_assoc($res_get_std)){
									$current_kid = $row_get_std['kritarth_id'];
									$query_std_details = "SELECT * FROM khata WHERE kritarth_id='$current_kid'";
									$res_std_details = mysqli_query($link, $query_std_details);
									$row_std_details = mysqli_fetch_assoc($res_std_details);
									echo '<tr>';
									echo '<td>'.$count.'</td>'
									$count++;
									echo '<td>'.$row_std_details['kritarth_id'].'</td>';
									echo '<td>'.$row_std_details['name'].'</td>';
									echo '<td>'.$row_std_details['email'].'</td>';
									echo '<td>'.$row_std_details['contact'].'</td>';
									if($row_std_details['payment_status']==1){
										$pay = "PAID";
									}
									else{
										$pay = "NOT PAID";
									}
									echo '<td>'.$pay.'</td>'; ?>
									<td> <select onchange="mark_attendance(<?php echo $row_std_details['kritarth_id'] ?>,<?php echo $_POST['eid'] ?>, this)">
									<option disabled selected="selected" >
										<?php
										$kid = $row_std_details['kritarth_id'];
										$eid = $_POST['eid'];
											$query_check_att = "SELECT * FROM pratispradha_chunao WHERE kritarth_id='$kid' AND event_id='$eid'";
											$res_check_att = mysqli_query($link, $query_check_att);
											$row_check_att = mysqli_fetch_assoc($res_check_att);
											echo $row_check_att['status'];
										?>
									</option>
										<option>PRESENT</option>
										<option>ABSENT</option>
									</select></td>
									<?php echo '</tr>';
								}
								?>
							</table>
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
		<script type="text/javascript">
			// function mark_attendance(a,b){
			// 	console.log(a);
			// 	console.log(b);
			// }

			function mark_attendance(kid,eventid,ob) {
               // alert(status);
                //alert(empid)
                console.log(kid);
                console.log(eventid);
                console.log(ob.value);
                $.ajax({
                    url: "checkReg/fetch_att.php",
                    method: "POST",
                    data: {
                        kid: kid,
                        eventid: eventid,
                        status:ob.value,
                    },
                    success: function(data) {
                      //  $('#result').html(data);
                    }
                });
            }


		</script>
	</body>
</html>