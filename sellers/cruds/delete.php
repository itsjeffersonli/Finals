<?php
include($_SERVER['DOCUMENT_ROOT']. '/admin/config.php');
//Delete Products
$id1 = $_GET['id'];
$sql1 = "DELETE FROM tblproduct WHERE id = $id1"; 

if (mysqli_query($db, $sql1)) {
    mysqli_close($db);
    header('Location: ../sellers.php'); 
    exit;
} else {
    echo "Error deleting record";
}

?>