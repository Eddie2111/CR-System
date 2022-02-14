<?php
    session_start();
    require_once('dbconnect.php');

    $res_id=$_GET['res_id'];

    

    if (isset($_POST['delete'])) {
        
        $remove_reservation = "DELETE FROM reservation WHERE res_id=$res_id";
        $result=mysqli_query($conn, $remove_reservation);

        $remove_invoice = "DELETE FROM invoice WHERE res_id=$res_id";
        $result=mysqli_query($conn, $remove_invoice);

        $remove_reservation_id = "UPDATE vehicle SET res_id = 0 WHERE res_id = $res_id";
        $result=mysqli_query($conn, $remove_reservation_id);

        Print '<script>alert("Reservation Deleted!");</script>';
		Print '<script>window.location.assign("reservations.php");</script>';

    } elseif (isset($_POST['update'])) {

        $value = $_POST['newValue'];
        
        if ($value != 0) {
            $timeframe = $_POST['update'];
            $newValue = $value + $timeframe;
            $update_reservation = "UPDATE reservation SET timeframe = $newValue WHERE res_id=$res_id";
            $result=mysqli_query($conn, $update_reservation);

            Print '<script>alert("Reservation Updated!");</script>';
            Print '<script>window.location.assign("reservations.php");</script>';

        } else {

            Print '<script>window.location.assign("reservations.php");</script>';

        }

    } else {

        Print '<script>alert("Something Went Wrong");</script>';
		Print '<script>window.location.assign("reservations.php");</script>';

    }

?>