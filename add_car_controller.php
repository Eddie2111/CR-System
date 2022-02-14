<?php
session_start();
require_once('dbconnect.php');

if (isset($_POST['reg_no']) && isset($_POST['vehicle_id']) && isset($_POST['mileage']) && isset($_POST['insurance']) && isset($_POST['rent']) && isset($_POST['fuel_type']) && isset($_POST['state']) && isset($_POST['model']) && isset($_POST['year']) && isset($_POST['colour']) && isset($_POST['description'])){
    echo("??");
    $rn=$_POST['reg_no'];
    $v=$_POST['vehicle_id'];
    $m=$_POST['mileage'];
    $i=$_POST['insurance'];
    $r=$_POST['rent'];
    $ft=$_POST['fuel_type'];
    $s=$_POST['state'];
    $md=$_POST['model'];
    $y=$_POST['year'];
    $c=$_POST['colour'];
    $d=$_POST['description'];
    
    if(isset($_POST['upload'])){
        $image_name = $_FILES['image']['name'];
        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];

        $temp = explode("/", $_FILES["image"]["type"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $path = "uploads/$newfilename";
    
        move_uploaded_file($image_tmp_name, $path);
        $mysql_path = "uploads/".$newfilename;
    
        $sql="INSERT INTO `vehicle` (`reg_no`, `vehicle_id`, `mileage`, `insurance`, `rent`, `state`, `model`, `year`, `colour`, `fuel_type`, `description`, `image`) VALUES (".$rn.",".$v.",".$m.", ".$i.", ".$r.", '".$s."', '".$md."', '".$y."', '".$c."', '".$ft."', '".$d."', '".$mysql_path."')";
        $result=mysqli_query($conn, $sql);
        echo $sql;
        Print '<script>window.location.assign("cars.php");</script>';
        exit;

    } else {

        Print '<script>alert("Please Also Add An Image!");</script>';
        Print '<script>window.location.assign("add_car.php");</script>';
        exit;
    }

} else {

    Print '<script>alert("Please Input In All The Fields And/Or Add An Image!");</script>';
    Print '<script>window.location.assign("add_car.php");</script>';
    exit;
}

//Delete
if(isset($_POST['reg_no']) && !isset($_POST['drop'])){
    $r=$_POST['reg_no']; //takes the information from the admin
    
    $remove_car = "DELETE FROM vehicle WHERE reg_no=$r"; //delete command
    $remove_images = "DELETE FROM images WHERE reg_no=$r";
    // $remove_Info = "DELETE * FROM vehicle INNER JOIN images  ON vehicle.reg_no = images.reg_no  WHERE reg_no='$keyID' ";
    //Execute
    $result=mysqli_query($conn, $remove_car); //conncets to the database
    $resultimages=mysqli_query($conn, $remove_images);
}

//Update
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['drop']) && isset($_POST['reg_no'])){
    $r=$_POST['reg_no'];
    $update = mysqli_real_escape_string($conn, $_POST['update']);
    $drop = mysqli_real_escape_string($conn, $_POST['drop']);
    $sql="UPDATE `vehicle` SET `$drop`='$update' WHERE reg_no='$r'";
    $result= mysqli_query($conn, $sql);
}

// Print '<script>window.location.assign("add_car.php");</script>';

?>