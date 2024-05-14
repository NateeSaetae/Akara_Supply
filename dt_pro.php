<?php include 'connect.php'?>
<!DOCTYPE html>
<html>
<head>
	<title>Akara</title>
	<!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<?php include 'menu.php'?>
	<div class="container">
  <div class="row">
  	<?php
  	$ids = $_GET['id'];
  	$sql = "SELECT * FROM product WHERE pro_id='$ids'";
  	$result = mysqli_query($conn,$sql);
  	$row=mysqli_fetch_array($result)
  	?>
    <div class="col-md-4">
      <img src="img/<?=$row['picture']?>"width="250px" height="250px" class="mt-5 p-2 my-2 border">
    </div>

    <div class="col-md-6">
    	<br><br>
      <h5 class="text-success"> ID : <?=$row['pro_id']?> <br>
        Brand : <?=$row['pro_brand']?> </h5><br>
        weight : <?=$row['kg']?> <br>
      	Scale : <?=$row['d']?>*<?=$row['D1']?>*<?=$row['B']?> <br>
      Price :<b class="text-danger"> <?=$row['pro_price']?> bath </b><br>
      <a class="btn btn-outline-success mt-2" href="order.php?id=<?=$row['pro_id']?>">Add Cart</a>

    </div>
  </div>
</div>
<?php
mysqli_close($conn);
?>
</body>
</html>