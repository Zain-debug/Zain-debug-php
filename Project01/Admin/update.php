<?php
include "../Database.php";

if (isset($_POST['update'])) {
    $fullName = $_POST['name'];
    $user_id = $_POST['id'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    // Start with the base SQL update query
    $sql = "UPDATE `users` SET `name` = ?, `email` = ?, `phone` = ?, `address` = ?";

    // Check if a new profile image is being uploaded
    if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] == UPLOAD_ERR_OK) {
        $filename = $_FILES['profileImage']['name'];
        $fileTmpPath = $_FILES['profileImage']['tmp_name'];
        $uploadFileDir = '../profile_images/';
        $dest_path = $uploadFileDir . $filename;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            // Add profile image update to SQL query
            $sql .= ", `profile_image` = ?";
            $params = [$fullName, $email, $phone, $address, $filename];
        } else {
            echo "<script>alert('There was a problem uploading the image.');</script>";
            exit;
        }
    } else {
        // No new image, update without profile image
        $params = [$fullName, $email, $phone, $address];
    }

    $sql .= " WHERE `id` = ?"; // Finalize SQL query
    $params[] = $user_id;

    // Prepare and execute the statement
    if ($stmt = $conn->prepare($sql)) {
        $types = str_repeat('s', count($params) - 1) . 'i'; // Types for binding parameters
        $stmt->bind_param($types, ...$params);

        if ($stmt->execute()) {
            echo "<script>alert('Record updated successfully.'); window.location.href='users.php';</script>";
        } else {
            echo "<script>alert('Error updating record: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Error preparing the statement.');</script>";
    }

    $conn->close();
} else {
    echo "<script>alert('No data to update.');</script>";
}
?>
