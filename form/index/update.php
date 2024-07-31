<?php
include "../database.php";

if (isset($_POST['update'])) {
    $firstname = $_POST['fullname'];
    $user_id   = $_POST['id'];
    $email     = $_POST['email'];
    $phone     = $_POST['phone'];
    $address   = $_POST['address'];

    $sql = "UPDATE `usersdata` SET 
        `full_name` = '$firstname', 
        `email`     = '$email', 
        `phone`     = '$phone', 
        `Address`   = '$address'    
        WHERE `id`  = '$user_id'";

    $result = $conn->query($sql);

    if ($result) {
        echo 
        "<script>alert('Record updated successfully.'); 
        window.location.href='index.php';</script>";
    }   else {
        echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
    }
}       else {
        echo "<script>alert('No data to update.');</script>";
}
?>
