<?php
session_start();
include 'connect.php';
  $sql = "SELECT * from provinces";
  $query = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
		<?php include 'menu.php'?>
	<div class="container">
		<form id="form1" method="post" action="insert.php">
		<div class = "row">
			<div class = "col-md-10">
				<div class="alert alert-success" role="alert" style="text-align: center">
  					Your Order 
				</div>
				<table class="table table-hover">
					<tr>
					   <th>Number</th>
					   <th>Name Product</th>
					   <th>Price</th>
					   <th>Quantity</th>
					   <th>Total Price</th>
					    <th> </th>
					   <th>Delete</th>
					</tr>
					<?php
					$Total=0;
					$sumPrice=0;
					$m=1;
					for($i=0;$i<=(int)$_SESSION["intLine"];$i++){
						if(($_SESSION["strProductID"][$i])!=""){
							$sql = "SELECT * FROM product WHERE pro_id = '".$_SESSION["strProductID"][$i]."'";
							$result=mysqli_query($conn,$sql);
							$row_pro=mysqli_fetch_array($result);

							$_SESSION["price"] = $row_pro['pro_price'];
							$Total = $_SESSION["strQty"][$i];
							$sum = $Total * $row_pro['pro_price'];
							$sumPrice = $sumPrice + $sum;
							//$sumPrice = number_format($sumPrice,2);
							$_SESSION["sum_price"] = $sumPrice;
					?>
					<tr>
					   <td><?=$m?></td>
					   <td><?=$row_pro['pro_id']?></td>
					   <td><?=$row_pro['pro_price']?></td>
					   <td><?=$_SESSION["strQty"][$i]?></td>
					   <td><?=$sum?></td>
					   <td>
					   	<a class="btn btn-outline-success mt-2" href="order.php?id=<?=$row_pro['pro_id']?>">+</a>
					   	<?php if($_SESSION["strQty"][$i] > 1){ ?>
					   	<a class="btn btn-outline-success mt-2" href="order_del.php?id=<?=$row_pro['pro_id']?>">-</a>
					   <?php } ?>
					   </td>
					   <td> <a href="delete.php?Line=<?=$i?>"><img src="img/delete.png" width="15"> </a></td> 
					</tr>
					<?php
					$m=$m+1;
				}
			}
					?>
					<tr>
						<td class="text-end" colspan="4">Total : </td>
						<td class="text-center"><?=$sumPrice?></td>
						<td>Bath</td>
					</tr>
					</table>
					<div style="text-align: right">
						<a href="show_pro.php"><button type="button" class="btn btn-outline-secondary">Choose</button></a>
						<button type="submit" class="btn btn-outline-success">Confirm</button>
					</div>
					</div>
 <div class="row">
    <div class="col-md-4">
      <div class="alert alert-secondary" role="alert" style="text-align: center">
  			Customer Data
		</div>
		Name :
		<input type="text" name="name" class="form-control" required placeholder="Cus Name"> <br>
		Tel :
		<input type="text" name="cus_tel" class="form-control" required placeholder="Cus Tel"> <br>
		Tax ID :
		<input type="text" name="cus_tax" class="form-control" required placeholder="Cus Tax"> <br>
		Fax :
		<input type="text" name="cus_fax" class="form-control" required placeholder="Cus Fax"> <br>
		Address :
		<input type="text" name="cus_Addr" class="form-control" required placeholder="Cus Address"> <br>
		<label>Provinces :</label> <br>
		<select name="provinces" id="provinces"><br><br><br>
			<option value="" selected disabled>Select your Provinces</option>
			<?php foreach ($query as $value){?>
				<option value="<?=$value['code']?>"><?=$value['name_th']?></option>
			<?php }?>
		</select><br>
		<br><label>District :</label> <br>
		<select name="district" id="district" ></select><br><br>

		<label>Subdistrict :</label> <br>
		<select name="subdistrict" id="subdistrict"></select><br><br>

		<label>Zip-Code :</label> <br>
		<input type="text" name="zip_code" id="zip_code" class="form-control" required placeholder="Cus Zip-Code"><br><br>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
		<script type="text/javascript">
			$('#provinces').change(function() {
				var code = $(this).val()
				 $.ajax({
				 	type: "post",
        			url: "address.php",
        			data: {code:code,funtion:'provinces'},
        			success: function (data) {
        				$('#district').html(data);
        				$('#subdistrict').html(' ');
        				$('#zip_code').val(' ');
        	}
    	});
	});
			$('#district').change(function() {
				var code_d = $(this).val()
				 $.ajax({
				 	type: "post",
        			url: "address.php",
        			data: {code:code_d,funtion:'district'},
        			success: function (data) {
        				//console.log(data)
        				$('#subdistrict').html(data);
        				$('#zip_code').val(' ');
        	}
    	});
	});
			$('#subdistrict').change(function() {
				var code_s = $(this).val()
				 $.ajax({
				 	type: "post",
        			url: "address.php",
        			data: {code:code_s,funtion:'subdistrict'},
        			success: function (data) {
        				//console.log(data)
        				$('#zip_code').val(data);
        	}
    	});
	});
		</script>
    </div>
  </div>
				</form>
	</div>
</body>
</html>