<?php 
    require '../database.php';
    session_start();

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = mysqli_query($conn, "SELECT * FROM usersdata WHERE email = '$email'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
            if (password_verify($password, $row['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['id'] = $row["id"];
                echo 
                "<script> alert('Welcome To dashboard ..!');
                    window.location.href = '../index/index.php';
                </script>";

            }else{
                echo 
                "<script> alert('Credentials does not match ..!');
                    window.location.href = 'login.html';
                </script>";
            }

        }else{
            echo 
            "<script>alert ('User not registered');
                window.location.href = 'login.html';
            </script>";
        }
    }
?> 