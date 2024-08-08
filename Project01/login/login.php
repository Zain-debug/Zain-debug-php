<?php 
require '../Database.php';

// Start the session
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $row["id"];
            $_SESSION['profile_image'] = $row["profile_image"];
            $_SESSION['name'] = $row["name"];

            if ($row["user_type"] == 1) {
                header('Location: ../Admin/DashBoard.php');
                exit();
            } else {
                header('Location: ../Users/userDashBoard.php');
                exit();
            }
        } else {
            echo "<script> alert('Credentials does not match ..!'); window.location.href = 'login.html'; </script>";
        }
    } else {
        echo "<script> alert('User not registered'); window.location.href = 'login.html'; </script>";
    }
}
?>
