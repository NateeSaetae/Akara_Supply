<?php
include 'connect.php';
	$id = $_POST['id'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$provinces = $_POST['provinces'];
	$district = $_POST['district'];
	$subdistrict = $_POST['subdistrict'];
	$zip_code = $_POST['zip_code'];

	mysqli_query($connect,"INSERT INTO customer (id,name,address,provinces,district,subdistrict,zipCode)
							VALUES ('$id','$name','$address','$provinces','$district','$subdistrict','$zip_code')");
?>