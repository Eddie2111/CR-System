<?php
    session_start();
    require_once('dbconnect.php');

    $nid=$_GET['nid'];

    $sql = "SELECT * FROM reservation WHERE nid=$nid";
    $result1 = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result1) > 0) {

        Print '<script>alert("This user has a rented car!");</script>';
        Print '<script>window.location.assign("users.php");</script>';

    } else {

        $remove_user = "DELETE FROM customer WHERE nid=$nid";
        $remove_reservation = "DELETE FROM reservation WHERE nid=$nid";

        $result2 = mysqli_query($conn, $remove_user);
        $result3 = mysqli_query($conn, $remove_reservation);

        Print '<script>window.location.assign("users.php");</script>';

    }
        
?>