<?php
session_start();
include 'inc/dbconnection.php';
 ob_start();
 require_once 'vendor/autoload.php';
 
 if(1)
 {
     $selQuery="SELECT * FROM khata WHERE payment_status=0 AND mail_1=0";
     $res = mysqli_query($link,$selQuery);
     while($row =  mysqli_fetch_assoc($res)){
     	$email = $row['email'];
     $mail = new PHPMailer();
     $mail->setFrom("info@kritarth.org","KRITARTH 5.0");
     $mail->addAddress($email,$row['email']);
     $mail->isHTML(TRUE);
     $mail->Subject = "PARTICIPATION CONFIRMATION OF KRITARTH 5.0";
      $mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.hostinger.in";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "info@kritarth.org";                 
$mail->Password = "RF4k!a0h";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port =587;

echo "Reaching";
     $mail->Body  = <<<EOF
                <!DOCTYPE html>
<html>

<head>
    <style>
        .br{
            /*border:0px solid black;*/
        }
    </style>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title></title>

    <style type="text/css">
      /*.br{
        border:1px solid black;
      }*/
      .button {
  background-color: #a23938; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-decoration: none;
  display: inline-block;
  border-radius: 20px;
  font-size: 16px;
}
    </style>
    <!--[if (mso 16)]>
    <style type="text/css">
    a {text-decoration: none;}
    </style>
    <![endif]-->
    <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
</head>

<body>
    <div class="es-wrapper-color">
        <table class="br es-wrapper" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="esd-email-paddings" valign="top">
                        <table class="es-content" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe">
                                        <table class="br es-content-body" style="border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p40b es-p40r es-p40l" esd-custom-block-id="8537" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0" class="br">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" align="left" width="518">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                            <!--tr><td><center><div style="width: 100%; padding: 10px; background-color: #58b4f1"> KRITARTH 5.0</div></center></td></tr>

                                                                                <tr-->
                                                                                    <center><img width="20%" src="https://kritarth.org/images/kritarth-black.png"></center>
                                                                                    <br>
                                                                                </tr>
                                                                              
                                                                                <tr>
                                                                                    <td class="br esd-block-text es-m-txt-c">
                                                                                        <h2>Hey $row[name]! &nbsp; Reminder for participation.<br></h2>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="br esd-block-text es-m-txt-c es-p15t">
                                                                                        <p>It is a gentle reminder that you need to make your payment towards registration for the events of Kritarth 5.0.<br>

                                                                                         <center><a href="https://kritarth.org/login/index.php"><button style="width: 50%; height: 30px">Pay Now</button></a></center>

                                                                                         <br> Hope to see you  at Kritarth 5.0.



                                                                                            <br><br>

                                                                                            Regards,<br> Team Kritarth
                                                                                        </p>

                                                                                    </td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="position: absolute; left: -9999px; top: -9999px; margin: 0px;"></div>
</body>

</html>
EOF;
     if($mail->send())
      {
          
          echo "BHEJA GAYA";
          $current_email = $row['email'];
          $query_mail = "UPDATE khata SET mail_1=1 WHERE email='$current_email'";
          $res_mail = mysqli_query($link, $query_mail); 
      }
      else
      {
           echo "MAIL Failed";
           $current_email = $row['email'];
          $query_mail = "UPDATE khata SET mail_1=2 WHERE email='$current_email'";
          $res_mail = mysqli_query($link, $query_mail); 
      }
 }

}
ob_end_flush();
?>