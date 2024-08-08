<?php
include '../Database.php';
if(isset($_POST['Register'])){
    ob_start();
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $address= $_POST['address'];
    $phone  = $_POST['phone'];
    $filename = $_FILES["profileImage"]["name"];
    $password        = $_POST['password'];
    $confirmPassword = $_POST['repeat_password'];
    $userType = 2;
    //Check the email is already register or not
    $duplicateEmail = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if(mysqli_num_rows($duplicateEmail)>0){
        echo "<script>
        alert('Email is Already Taken..!');
        window.location.href = 'registration.html';
        </script>";
        exit();
    }
    else{

        //confirm the password with repeat password
        if($password === $confirmPassword){
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $insertData = "INSERT INTO `users`(`name`, `email`, `address`, `phone`, `profile_image`, `user_type`, `password`) 
            VALUES ('$name', '$email', '$address', '$phone', '$filename','$userType', '$hashedPassword')";
            $inserted = mysqli_query($conn,$insertData);
            if($inserted){
                move_uploaded_file($_FILES["profileImage"]["tmp_name"],"../profile_images/".$_FILES["profileImage"]["name"]);
                echo "<script>
                alert('Registration Successfull..!');
                window.location.href = '../login/login.html';
                </script>";
            }else{
                echo "<script>
                alert('Opps, there are Problem');
                </script>";
            }
        }else{
            echo "<script>
            alert('Password is not matching Please Try Again..!');
            window.location.href = 'registeration.html';
            </script>";
        }
    }
    ob_end_flush();
}
?>