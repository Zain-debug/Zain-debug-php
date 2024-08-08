<?php
    include '../Database.php'; // Include database connection

    session_start(); // Start the session

    if (!empty($_SESSION["id"])) { // Check if user is logged in
        $id = $_SESSION["id"]; // Get user ID from session

        // Fetch user data including profile image and name
        $query = "SELECT * FROM users WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        if(!empty($row)){
            $fullName = $row['name'];
            $profileImage = $row['profile_image'];
            mysqli_close($conn); // Close the database connection
        }
        else{
            echo "<script>alert('You are not logged in.'); window.location.href = '../login/login.html';</script>";
            exit();
        }

    } 
    else{
        echo "<script>alert('You are not logged in.'); window.location.href = '../login/login.html';</script>";
        exit();
    }
?>