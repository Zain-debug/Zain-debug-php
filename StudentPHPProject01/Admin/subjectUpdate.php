<?php
include "../Database.php";

if (isset($_POST['update'])) {
    $fullName = $_POST['name'];
    $user_id   = $_POST['id'];

    $sql = "UPDATE `subjects` SET
        `name` = '$fullName'   
        WHERE `id`  = '$user_id'";

    $result = $conn->query($sql);

    if ($result) {
        echo 
        "<script>alert('Record updated successfully.'); 
        window.location.href='subjects.php';</script>";
    }   else {
        echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
    }
}       else {
        echo "<script>alert('No data to update.');</script>";
}
?>
