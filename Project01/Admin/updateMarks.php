<?php
include '../Database.php';
session_start();

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $user_name = $_POST['user_name'];
    $subject_name = $_POST['subject_name'];
    $obtained_marks = $_POST['obtained_marks'];

    // Get user ID based on user name
    $user_query = "SELECT id FROM `users` WHERE name = '$user_name'";
    $user_result = $conn->query($user_query);
    $user_id = ($user_result->num_rows > 0) ? $user_result->fetch_assoc()['id'] : '';

    // Get subject ID based on subject name
    $subject_query = "SELECT id FROM `subjects` WHERE name = '$subject_name'";
    $subject_result = $conn->query($subject_query);
    $subject_id = ($subject_result->num_rows > 0) ? $subject_result->fetch_assoc()['id'] : '';

    // Update the record if IDs are valid
    if ($user_id && $subject_id) {
        $sql = "UPDATE `marks` SET
            `user_id` = '$user_id', 
            `subject_id` = '$subject_id', 
            `obtained_marks` = '$obtained_marks'    
            WHERE `id` = '$id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Record updated successfully.'); 
            window.location.href='subjectsMarks.php';</script>";
        } else {
            echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Invalid user or subject name.');</script>";
    }

    $conn->close();
} else {
    echo "<script>alert('No data to update.');</script>";
}
?>
