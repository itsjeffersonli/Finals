<?php
include ('config.php');
session_start();
$sql = "SELECT * FROM inquiries";
$result_inquiries = $db->query($sql);

$sql1 = "SELECT * FROM tblproduct";
$result_products = $db->query($sql1);

$sql2 = "SELECT * FROM sellers";
$result_sellers = $db->query($sql2);

$sql3 = "SELECT * FROM users";
$result_users = $db->query($sql3);

?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/admin_tables.css">
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/shop-homepage.css" rel="stylesheet">
    <link href="/assets/style.css" type="text/css" rel="stylesheet" />
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Admin Panel</a>
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
            <a class="nav-link" href="#"><?php echo $_SESSION['username']; ?></a>
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
            <h1>Inquiries</h1>
            <?php
if ($result_inquiries->num_rows > 0) {
    echo "<table>
<tr>
<th>INQ ID</th>
<th>Name</th>
<th>Email</th>
<th>Title</th>
<th>

</tr>";
    while ($row = mysqli_fetch_array($result_inquiries)) {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Title'] . "</td>";
        echo "<td><a  href='delete.php?ID=".$row['ID']."'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
        </div>
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

</tr>";
    while ($row = mysqli_fetch_array($result_products)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['code'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['description']. "</td>";
        echo "<td><a  href='/admin/cruds/delete.php?id=".$row['id']."'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
        </div>
        <div class="col-md-12">
            <br>
            <br>
            <h1>Sellers</h1>
            <?php
if ($result_sellers->num_rows > 0) {
    echo "<table>
<tr>
<th>UserID</th>
<th>Username</th>
<th>Name</th>
<th>Telephone Number</th>
<th>Email</th>
<th>

</tr>";
    while ($row = mysqli_fetch_array($result_sellers)) {
        echo "<tr>";
        echo "<td>" . $row['UserID'] . "</td>";
        echo "<td>" . $row['SellerUsername'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['TelNumber'] . "</td>";
        echo "<td>" . $row['Email']. "</td>";
        echo "<td><a  href='/admin/cruds/delete.php?UserID=".$row['UserID']."'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
        </div>
        <div class="col-md-12">
            <br>
            <br>
            <h1>Users</h1>
            <?php
if ($result_users->num_rows > 0) {
    echo "<table>
<tr>
<th>UserID</th>
<th>Name</th>
<th>Email</th>
<th>

</tr>";
    while ($row = mysqli_fetch_array($result_users)) {
        echo "<tr>";
        echo "<td>" . $row['UserID'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Email']. "</td>";
        echo "<td><a  href='/admin/cruds/delete.php?UserID=".$row['UserID']."'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
        </div>
    </div>
</body>

</html>
