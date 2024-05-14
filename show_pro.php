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
	<br><br>
  <div class="row">
  	<?php
  	$sql = "SELECT * FROM product ORDER BY pro_id";
  	$result = mysqli_query($conn,$sql);
  	while($row=mysqli_fetch_array($result)){
  	?>
    <div class="col-sm-3">
    	<div class="text-center">
      <img src="img/<?=$row['picture']?>"width="150px" height="150px" class="mt-5 p-2 my-2 border"> <br>
      <h5 class="text-success"> ID : <?=$row['pro_id']?> </h5>
      <?=$row['pro_brand']?> <br>
      Price :<b class="text-danger"> <?=$row['pro_price']?> bath </b><br>
      <a class="btn btn-outline-success mt-2" href="dt_pro.php?id=<?=$row['pro_id']?>">details</a>
  </div>
  		<br>
    </div>
    <?php } ?>
  </div>
</div>
</body>
</html>