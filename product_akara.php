<?php include 'connect.php';

  $search1 = $_POST['search'];
  $sql = "SELECT *
      from product
      where pro_id LIKE '$search1%'";
  $query = mysqli_query($conn,$sql);


?>

<!DOCTYPE html>
<html>
<head>
	<!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<?php include 'menu.php'?>
<h2 style="text-align: center">Akara Product</h2>
<table>
  <tr>
    <th>ID</th>
    <th>Brand</th>
    <th>Price</th>
    <th>KG</th>
    <th>Scale</th>
    <th>Add</th>
  </tr>
  <?php foreach($query as $data){?>
    <tr>
    <th><?=$data['pro_id']?></th>
    <th><?=$data['pro_brand']?></th>
    <th><?=$data['pro_price']?></th>
    <th><?=$data['kg']?></th>
    <th><?=$data['d']?>*<?=$data['D1']?>*<?=$data['B']?></th>
    <th><a class="btn btn-outline-success mt-2" href="order.php?id=<?=$data['pro_id']?>">Add Cart</a>
</th>
  </tr>
  <?php }?>
</table>

</body>
</html>