<?php
	session_start();
  require_once('dbconnect.php');
	$user = null;
	$type = null;
	if (isset($_SESSION['user'])) {
		$user=$_SESSION['user'];
		$type=$_SESSION['type'];
	} else {
		header("location:login.php");
	}

    $nid = $_SESSION['nid'];
    $reg_no = $_GET['reg_no'];
    $res_id = $_GET['res_id'];
    $days = $_GET['days'];

    $sql1 = "SELECT * FROM customer WHERE nid=$nid";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($result1);

    $sql2 = "SELECT * FROM vehicle WHERE reg_no=$reg_no";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);

    $sql3 = "SELECT * FROM reservation WHERE res_id=$res_id";
    $result3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_array($result3);

?>

<html>

	<head>
	<title>Car Rental Service</title>
		<style type="text/css">
		body {		
			font-family: Verdana;
		}
		
		div.invoice {
		border:1px solid #ccc;
		padding:10px;
		height:740pt;
		width:570pt;
		}

		div.company-address {
			border:1px solid #ccc;
			float:left;
			width:200pt;
		}
		
		div.invoice-details {
			border:1px solid #ccc;
			float:right;
			width:200pt;
		}
		
		div.customer-address {
			border:1px solid #ccc;
			float:right;
			margin-bottom:50px;
			margin-top:100px;
			width:200pt;
		}
		
		div.clear-fix {
			clear:both;
			float:none;
		}
		
		table {
			width:100%;
		}
		
		th {
			text-align: left;
		}
		
		.text-left {
			text-align:left;
		}
		
		.text-center {
			text-align:center;
		}
		
		.text-right {
			text-align:right;
		}
		
		</style>
	</head>

	<body>
	<div class="invoice">
		<div class="company-address">
			Car Rental Service 
			<br />
			Madartek
			<br />
			Dhaka
			<br />
		</div>
	
		<div class="invoice-details">
			Invoice No: <?php echo $res_id ?>
			<br />
			Date: <?php echo date("Y/m/d") ?>
		</div>
		
		<div class="customer-address">
			To:
			<br />
			<?php echo $row1['name'] ?>
			<br />
			<?php echo $row1['phone'] ?>
			<br />
			<?php echo $row1['billing_address'] ?>
			<br />
		</div>
		
		<div class="clear-fix"></div>
			<table border='1' cellspacing='0'>
				<tr>
					<th width=250>Year - Model - Colour - Mileage</th>
					<th width=80>Days</th>
					<th width=100>Rent (per day)</th>
					<th width=100>Total Rent</th>
				</tr>

				<?php

					$nid = $row1['nid'];

					$year = $row2['year'];
					$model = $row2['model'];
					$colour = $row2['colour'];
					$mileage = $row2['mileage'];
					$rent = $row2['rent'];

					// $days = $row3['timeframe'];
					$total = $rent * $days;

					$vat = 5;
					$payment_method = "cash";
					$overtime = 0;

					echo("<tr>");
					echo("<td>$year - $model - $colour - $mileage(km)</td>");
					echo("<td class='text-center'>$days</td>");
					echo("<td class='text-right'>$rent</td>");
					echo("<td class='text-right'>$total</td>");
					echo("</tr>");

					echo("<tr>");
					echo("<td colspan='3' class='text-right'>Sub total</td>");
					echo("<td class='text-right'>" . number_format($total,2) . "</td>");
					echo("</tr>");
					echo("<tr>");
					echo("<td colspan='3' class='text-right'>VAT</td>");
					echo("<td class='text-right'>" . number_format(($total*$vat)/100,2) . "</td>");
					echo("</tr>");
					echo("<tr>");
					echo("<td colspan='3' class='text-right'><b>TOTAL</b></td>");
					echo("<td class='text-right'><b>" . number_format(((($total*$vat)/100)+$total),2) . "</b></td>");
					echo("</tr>");

					$sql="INSERT INTO invoice (res_id, total_amount, payment_method, overtime) VALUES ($res_id,$total,'".$payment_method."', $overtime)";
					$result=mysqli_query($conn, $sql);
					echo $sql;

				?>
			</table>
		</div>
	</body>

</html>