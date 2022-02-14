<?php
	session_start();
    require_once('dbconnect.php');
	 
    $nid = $_SESSION['nid'];
    $days = $_POST['days'];
    $reg_no = $_GET['reg_no'];
    $res_id = $nid."".$reg_no;
    $date = $_POST['date'];
    $start_date = strval(date("Y-m-d", strtotime($date)));
    var_dump($start_date);

    $sql="INSERT INTO `reservation` (`res_id`, `reg_no`, `nid`, `start_date`, `timeframe`) VALUES (".$res_id.",".$reg_no.",".$nid.", '".$start_date."', ".$days.")";
    $result=mysqli_query($conn, $sql);

    $sql2 = "UPDATE vehicle SET res_id = $res_id WHERE reg_no = $reg_no";
    $result2 = mysqli_query($conn, $sql2);
    
    // Print '<script>window.location.assign("invoice.php?res_id='.$res_id.'");</script>';
    header("Location: invoice.php?res_id=$res_id&reg_no=$reg_no&days=$days");
    exit;

?>