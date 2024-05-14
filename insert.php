<?php
session_start();
include 'connect.php';

	$cus_name = $_POST['name'];
	$cus_tel = $_POST['cus_tel'];
	$cus_tax = $_POST['cus_tax'];
	$cus_fax = $_POST['cus_fax'];
	$address = $_POST['cus_Addr'];
	$provinces = $_POST['provinces'];
	$district = $_POST['district'];
	$subdistrict = $_POST['subdistrict'];
	$zip_code = $_POST['zip_code'];

	mysqli_query($conn,"INSERT INTO customer (cus_name,cus_tel,cus_tax,cus_fax,address,provinces,district,subdistrict,zip_Code)
							VALUES ('$cus_name','$cus_tel','$cus_tax','$cus_fax','$address','$provinces','$district','$subdistrict','$zip_code')");

	$orderID = mysqli_insert_id($conn);
	$_SESSION["order_id"] = $orderID;

	for($i=0;$i<=(int)$_SESSION["intLine"];$i++){
		if(($_SESSION["strProductID"][$i])!=""){
			$sql = "SELECT * FROM product WHERE pro_id = '".$_SESSION["strProductID"][$i]."'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($result);
			$price=$row['pro_price'];
			$total=$_SESSION["strQty"][$i]*$price;

			$sql1 = "INSERT INTO receipt (inv,total_p,quantity,total_pp,pro_id,total_ppp)
					 VALUES ('$orderID','$price','".$_SESSION["strQty"][$i]."','$total','".$_SESSION["strProductID"][$i]."','".$_SESSION["sum_price"]."')";
			mysqli_query($conn,$sql1);
			echo "<script> alert('Succeed')</script>";
			echo "<script> window.location='print.php';</script>";
		}
	}
mysqli_close($conn);
unset($_SESSION["intLine"]);
unset($_SESSION["strProductID"]);
unset($_SESSION["strQty"]);
unset($_SESSION["sum_price"]);
//session_destroy();
?>