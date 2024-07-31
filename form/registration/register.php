<?php
    include "../database.php";

    if (isset($_POST['register'])) {
        ob_start(); // Start output buffering

        $name =     $_POST['fullname'];
        $email =    $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['repeat_password'];
        $phone =    $_POST['phone'];
        $address =  $_POST['address'];

        // Check if email already exists
        $duplicateEntry = mysqli_query($conn, "SELECT * FROM usersdata WHERE email = '$email'");
        if(mysqli_num_rows($duplicateEntry) > 0) {
            echo "<script>alert('Email has already been taken');</script>";
            header("location: registration.html");
            exit();
        }   else {
            // Check if passwords match
            if($password == $confirmPassword){
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                
                // Insert new user data
                $insertData = "INSERT INTO `usersdata`(`full_name`, `email`, `password`, `phone`, `Address`) 
                VALUES ('$name','$email','$hashedPassword','$phone','$address')";
                $inserted = mysqli_query($conn, $insertData);
                if($inserted){
                    echo 
                    "<script> alert('Registration Successfull ..!');
                        window.location.href = '../login/login.html';
                    </script>";
                } else {
                    echo "<script>alert('Oops, there are some problems!');</script>";
                }
            } else {
                echo "<script>alert('Your password is not matching!');
                    window.location.href = 'registration.html';
                </script>";
            }
        }

        ob_end_flush(); // End output buffering
    }
?>
