<?php
require '../database.php';
session_start();
if (!empty($_SESSION["id"])) {
    $id     = $_SESSION['id'];
    $delete = "DELETE FROM `usersdata` WHERE id = '$id'";
    
    $result = $conn->query($delete);
    if($result){
        
        echo 
        "<script>alert('Record Data Delete successfully.'); 
        window.location.href='../registration/registration.html';</script>";
    } else {
        echo "<script>alert('Error Delete record: " . $conn->error . "');</script>";
    }
} else {
    echo "<script>alert('No data is delete.');</script>";
}
    
?>