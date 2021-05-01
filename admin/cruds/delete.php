<?php
include($_SERVER['DOCUMENT_ROOT']. '/admin/config.php');

//Delete Inquiries
$id = $_GET['ID'];
$sql = "DELETE FROM inquiries WHERE ID = $id"; 

if (mysqli_query($db, $sql)) {
    mysqli_close($db);
    header('Location: ../admin.php'); 
    exit;
} else {
    echo "Error deleting record";
}

//Delete Products
$id1 = $_GET['id'];
$sql1 = "DELETE FROM tblproduct WHERE id = $id1"; 

if (mysqli_query($db, $sql1)) {
    mysqli_close($db);
    header('Location: ../admin.php'); 
    exit;
} else {
    echo "Error deleting record";
}

//Delete Sellers
$id1 = $_GET['UserID'];
$sql2 = "DELETE FROM sellers WHERE UserID = $id1"; 

if (mysqli_query($db, $sql2)) {
    mysqli_close($db);
    header('Location: ../admin.php'); 
    exit;
} else {
    echo "Error deleting record";
}

//Delete Users
$id1 = $_GET['UserID'];
$sql3 = "DELETE FROM users WHERE UserID = $id1"; 

if (mysqli_query($db, $sql3)) {
    mysqli_close($db);
    header('Location: ../admin.php'); 
    exit;
} else {
    echo "Error deleting record";
}
?>
