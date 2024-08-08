<?php
include "../Database.php";

if (isset($_POST['update'])) {
    $fullName = $_POST['name'];
    $user_id   = $_POST['id'];
    $email     = $_POST['email'];
    $phone     = $_POST['phone'];
    $address   = $_POST['address'];

    $sql = "UPDATE `users` SET
        `name` = '$fullName', 
        `email`     = '$email', 
        `phone`     = '$phone', 
        `Address`   = '$address'    
        WHERE `id`  = '$user_id'";

    $result = $conn->query($sql);

    if ($result) {
        echo 
        "<script>alert('Record updated successfully.'); 
        window.location.href='personalInfo.php';</script>";
    }   else {
        echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
    }
}       else {
        echo "<script>alert('No data to update.');</script>";
}
?>
