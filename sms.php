<?php

include 'inc/dbconnection.php';
$query = "SELECT * FROM khata WHERE contact>0 and pass=0";
$res_query = mysqli_query($link, $query);
while($row_query = mysqli_fetch_assoc($res_query))
{
  echo "<br>";

  	$kid = $row_query['kritarth_id'];
	
	$mbl = $row_query['contact'];

$curl = curl_init();

// curl_setopt_array($curl, array(
//    CURLOPT_URL => "https://api.msg91.com/api/sendhttp.php?mobiles=".$mbl."&authkey=296366AFcEP9oki5d8fad56&route=4&sender=KRTRTH&message=".$otp." is your verification Code.",



$curl = curl_init();
echo $kid;
echo $mbl;
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://control.msg91.com/api/sendotp.php?template=hello&otp=".$kid."&otp_length=4&otp_expiry=10&sender=KRTRTH&message=".$kid." is your KID, please collect your Kritarth ID Card Today(18/10/2019) before 7 PM.&mobile=".$mbl."&authkey=296366AFcEP9oki5d8fad56",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;

	$query_set_status = "UPDATE khata SET sms=1 WHERE kritarth_id='$kid'";
	$res_set_hash = mysqli_query($link, $query_set_status);

}




}
?>