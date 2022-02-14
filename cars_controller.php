<?php
    session_start();
    require_once('dbconnect.php');

    $reg_no=$_GET['reg_no'];
        
    $remove_car = "DELETE FROM vehicle WHERE reg_no=$reg_no";
    $remove_reservation = "DELETE FROM reservation WHERE reg_no=$reg_no";

    $result=mysqli_query($conn, $remove_car);
    $result2=mysqli_query($conn, $remove_reservation);

    Print '<script>window.location.assign("cars.php");</script>';
?>