<?php
require '../Database.php';

if (!empty($_GET["id"])) {
    $id     = $_GET['id'];
    $delete = "DELETE FROM `users` WHERE id = '$id'";
    
    $result = $conn->query($delete);
    if($result){
        
        echo 
        "<script>alert('Record Data Delete successfully.'); 
        window.location.href='../Admin/users.php';</script>";
    } else {
        echo "<script>alert('Error Delete record: " . $conn->error . "');</script>";
    }
} else {
    echo "<script>alert('No data is delete.');</script>";
}
    
?>