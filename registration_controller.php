<?php
    session_start();
    require_once('DBconnect.php');

    if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['nid']) && isset($_POST['driving_license_no']) && isset($_POST['billing_address']) && isset($_POST['password'])){
        $n=$_POST['name'];
        $ph=$_POST['phone'];
        $g=$_POST['gender'];
        $e=$_POST['email'];
        $nid=$_POST['nid'];
        $l=$_POST['driving_license_no'];
        $ba=$_POST['billing_address'];
        $p=$_POST['password'];

        $sql1 = "SELECT * FROM customer WHERE nid=$nid OR phone='$ph' OR email='$e' OR license_number='$g'";
        $result1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result1) > 0) {

            while ( $row = mysqli_fetch_array($result1) ) {

                if ($row['nid'] == $nid) {
                    Print '<script>alert("An account with this NID already exists!");</script>';
                } elseif ($row['phone'] == $ph) {
                    Print '<script>alert("An account with this Phone Number already exists!");</script>';
                } elseif ($row['email'] == $e) {
                    Print '<script>alert("An account with this Email already exists!");</script>';
                } elseif ($row['license_number'] == $l) {
                    Print '<script>alert("An account with this License Number already exists!");</script>';
                } else {
                    Print '<script>alert("There was a problem while creating your account, please contact support!");</script>';
                }

            }

        } else {

            $sql2 = "INSERT INTO customer values('$nid', '$n','$ph', '$e', '$g','$l','$ba','$p')";
            $result2 = mysqli_query($conn, $sql2);
            header("Location: index.php");
            
        }

    }
?>