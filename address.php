<?php
include 'connect.php';
if(isset($_POST['funtion'])&&$_POST['funtion']=='provinces'){
	$code =  $_POST['code'];
	$sql = "SELECT * FROM district WHERE province_code = '$code'";
	$query = mysqli_query($conn,$sql);
	echo '<option selected disabled>Select your district</option>';
	foreach ($query as $value) {
		echo '<option value ="'.$value['code'].'">'.$value['name_th'].'</option>';
	}
	exit();
}

if(isset($_POST['funtion'])&&$_POST['funtion']=='district'){
	$code =  $_POST['code'];
	$sql = "SELECT * FROM subdistrict WHERE district_code = '$code'";
	$query = mysqli_query($conn,$sql);
	echo '<option selected disabled>Select your district</option>';
	foreach ($query as $value) {
		echo '<option value ="'.$value['code'].'">'.$value['name_th'].'</option>';
	}
	exit();
}
if(isset($_POST['funtion'])&&$_POST['funtion']=='subdistrict'){
	$code =  $_POST['code'];
	$sql = "SELECT * FROM subdistrict WHERE code = '$code'";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_fetch_assoc($query);
	echo $result['zip_code'];
	exit();
}
?>