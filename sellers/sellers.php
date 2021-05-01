<?php
include($_SERVER['DOCUMENT_ROOT']. '/admin/config.php');
session_start();

$sql1 = "SELECT * FROM tblproduct";
$result_products = $db->query($sql1);


?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sellers Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/admin_tables.css">
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/shop-homepage.css" rel="stylesheet">
    <link href="/assets/style.css" type="text/css" rel="stylesheet" />
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Sellers Panel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../../index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><?php echo $_SESSION['seller_username']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/sellers/cruds/add.php">Add Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <div class="row">
        <div class="col-md-12">
            <br>
            <br>
            <h1>Products</h1>
            <?php
if ($result_products->num_rows > 0) {
    echo "<table>
<tr>
<th>Item ID</th>
<th>Item Name</th>
<th>Item Code</th>
<th>Item Price</th>
<th>Description</th>
<th>
<th>

</tr>";
    while ($row = mysqli_fetch_array($result_products)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['code'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['description']. "</td>";
        echo "<td><a  href='/sellers/cruds/delete.php?id=".$row['id']."'>Delete</a></td>";
        echo "<td><a  href='/sellers/cruds/edit.php?id=".$row['id']."'>Edit</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
        </div>
    </div>
</body>

</html>
