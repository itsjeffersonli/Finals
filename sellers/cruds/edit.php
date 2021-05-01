<?php
    include($_SERVER['DOCUMENT_ROOT']. '/admin/config.php');
    session_start();

    $id=$_REQUEST['id'];
    $query = "SELECT * from tblproduct where id='".$id."'"; 
    $result = mysqli_query($db, $query) or die ( mysqli_error());
    $row = mysqli_fetch_assoc($result);
    //edit
    if (isset($_POST['update_product'])) {
            $name=$_REQUEST['name'];
            $code =$_REQUEST['code'];
            $price =$_REQUEST['price'];
            $description=$_REQUEST['description'];
            $update="update tblproduct set name='".$name."',
            code='".$code."', price='".$price."',
            description='".$description."' where id='".$id."'";
            mysqli_query($db, $update) or die(mysqli_error());
  	        header('location: ../sellers.php');
    }
?>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="/assets/login_register.css">
</head>

<body>
    <div class="register-page">
        <div class="form">
            <div class="Title">
                <p>Edit Product</p>
            </div>
            <form method="POST" action="edit.php">
                <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
                <input type="text" placeholder="Product Name" name="name" value="<?php echo $row['name'];?>"/>
                <input type="text" placeholder="Product code" name="code" value="<?php echo $row['code'] ?>" />
                <input type="text" placeholder="Price" name="price" value="<?php echo $row['price']; ?>"/>
                <textarea name="description" placeholder="Write Description.." value="<?php echo $row['description']; ?>" style="width: 98%;"></textarea>
                <button type="submit" class="btn" name="update_product">Update</button>
            </form>
        </div>
    </div>
</body>

</html>
