<?php
include '../inc/dbconnection.php';


        $buyer = '1604488@kiit.ac.in';
        $trs_id = "MOJO7404452741342351";
        $date_time = date('Y-m-d h:i:sa');
        $query_update_payment_status = "UPDATE khata SET payment_status=1, transaction_id='$trs_id', payment_date_time='$date_time' WHERE email='$buyer'";
        $res_update_payment_status = mysqli_query($link, $query_update_payment_status);
    }
   
}
?>