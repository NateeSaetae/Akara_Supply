<?php
session_start();
include 'connect.php';
$sql1="SELECT * from receipt r ";
$result1=mysqli_query($conn,$sql1);
$rw=mysqli_fetch_array($result1);
$total_price = $rw['total_ppp'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>list</title>
	<!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-10">
      <div class="alert alert-success" role="alert" mt-4 style="text-align: center">
        Success
		</div>
		<div class="card mb-4 mt-4">
			<div class="card-body">
		<table class="table">
  <thead>
    <tr>
      <th>Product</th>
      <th>Brand</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	$sql="SELECT * from receipt r,product p WHERE (r.pro_id=p.pro_id) and inv = '".$_SESSION["order_id"]."'";
  	$result=mysqli_query($conn,$sql);
  	while($row=mysqli_fetch_array($result)){
  	?>
    <tr>
      <th><?=$row['pro_id']?></th>
      <td><?=$row['pro_brand']?></td>
      <td><?=$row['pro_price']?></td>
      <td><?=$row['quantity']?></td>
      <td><?=$row['total_pp']?></td>
    </tr>	
  </tbody>
<?php  }  ?>
</table>
<h6 class="text-end">Total Price  <?=number_format($total_price)?>  Baht </h6> <br>
</div>
</div>
<div class="text-center">
	<a href="show_pro.php" class="btn btn-success">back</a>
	<button onclick="window.print()" class="btn btn-success">Print</button>
    </div>	
  </div>
</div>
</body>
</html>