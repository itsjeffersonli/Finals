<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php');
session_start();

// initializing variables
$errors = array();

// Add Product
if (isset($_POST['add_product'])) {
    // receive all input values from the form
    $Product_Name  = mysqli_real_escape_string($db, $_POST['name']);
    $code          = mysqli_real_escape_string($db, $_POST['code']);
    $path          = mysqli_real_escape_string($db, $_POST['path']);
    $image_tmp     = "product-images/$path";
    $Price         = mysqli_real_escape_string($db, $_POST['price']);
    $Description   = mysqli_real_escape_string($db, $_POST['description']);
    $target_dir    = "../../product-images/";
    $target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk      = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    if (empty($Product_Name)) {
        array_push($errors, "Product Name is required");
    }
    if (empty($Description)) {
        array_push($errors, "Description is required");
    }
    if (empty($Price)) {
        array_push($errors, "Price is required");
    }

    $query = "INSERT INTO tblproduct (name, code, image, price, description) 
                    VALUES('$Product_Name', '$code', '$image_tmp', '$Price', '$Description')";
    mysqli_query($db, $query);
    header('location: ../sellers.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="/assets/login_register.css">
</head>

<body>
    <div class="register-page">
        <div class="form">
            <div class="Title">
                <p>Add Product</p>
            </div>
            <form method="POST" action="add.php" enctype="multipart/form-data">
                <input type="text" placeholder="Product Name" name="name" value=""/>
                <input type="text" placeholder="Product code" name="code" value="" />
                <input type="file" name="fileToUpload" id="fileToUpload" />
                <input type="text" placeholder="Exact Image Name with extenstion" name="path" value="" />
                <input type="text" placeholder="Price" name="price" />
                <textarea name="description" placeholder="Write Description.." style="width: 98%;"></textarea>
                <button type="submit" class="btn" name="add_product">Add Product</button>
            </form>
        </div>
    </div>
</body>

</html>