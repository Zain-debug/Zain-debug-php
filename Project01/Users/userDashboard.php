<?php
include '../Database.php'; // Include database connection

session_start(); // Start the session

if (!empty($_SESSION["id"])) { // Check if user is logged in
    $id = $_SESSION["id"]; // Get user ID from session

    // Fetch user data including profile image and name
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $fullName = htmlspecialchars($row['name']); // User's name
        $profileImage = htmlspecialchars($row['profile_image']); // Profile image filename
    } else {
        echo "<script>alert('No user data found.'); window.location.href = '../login/login.html';</script>";
        exit();
    }

    mysqli_close($conn); // Close the database connection
} else {
    echo "<script>alert('You are not logged in.'); window.location.href = '../login/login.html';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
        
    <?php
        require "../layouts/Users/header.php";
    ?>
    <?php
        require "../layouts/Users/sidebar.php";
    ?>
       

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <!-- Main content goes here -->
                <h1>Welcome to the Dashboard</h1>
                <p>Your main content goes here.</p>
                <div class="container p-5">
        
</body>
</html>
