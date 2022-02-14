<?php
	session_start();
	require_once('dbconnect.php');

	$username = mysqli_real_escape_string($conn, $_POST['name']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	mysqli_select_db($conn, "crs") or die("Cannot connect to database"); //Connect to database

	$query_users = mysqli_query($conn, "SELECT * FROM employee WHERE id ='$username' "); //Query the users table if there are matching rows equal to $username
    $query_customer = mysqli_query($conn, "SELECT * FROM customer WHERE name ='$username' "); //Query the customer table if there are matching rows equal to $username

	$table_users = "";
	$table_password = "";
    $table_type = "";
	if(($query_users == false) && ($query_customer == false)) //IF there are no returning rows or no existing username
	{
        Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
		Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
	}

	else
	{  
        while($row = mysqli_fetch_assoc($query_users)) //display all rows from query
		{
			$table_users = $row['id']; // the first username row is passed on to $table_users, and so on until the query is finished
			$table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
            if(($username == $table_users) && ($password == $table_password)) // checks if there are any matching fields
            { 
                $_SESSION['user'] = $table_users; //set the username in a session. This serves as a global variable
                $_SESSION['type'] = "admin";
                Print '<script>window.location.assign("index.php");</script>'; // redirects the user to the authenticated home page
            }
            else
            {
                Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
                Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
            }
		}
        
        while($row = mysqli_fetch_assoc($query_customer)) //display all rows from query
		{
			$table_users = $row['name']; // the first username row is passed on to $table_users, and so on until the query is finished
			$table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
            if(($username == $table_users) && ($password == $table_password)) // checks if there are any matching fields
            { 
                $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
                $_SESSION['type'] = "customer";            
                $query = "SELECT NID FROM customer";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($result)){
                    $_SESSION['nid'] = $row['NID'];
                }
                Print '<script>window.location.assign("index.php");</script>'; // redirects the user to the authenticated home page				
            }
            else
            {
                Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
                Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
            }
		}
		
	}
?>