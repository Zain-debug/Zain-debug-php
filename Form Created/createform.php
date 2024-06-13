<?php
include('createconnection.php');
if(isset($_post['submit'])){
    $username = $_POST ('name');
    $email = $_POST ('email');
    $password = $_POST ('password');
    $insertdata = "INSERT INTO 'Employee' ('name', 'email', 'password') Values ($username,$email,$password)";
    $result = $conn->query($insertdata);
    if($result){
        echo "data is submitted successfully";
    }
    else{
        echo "Please Fill all required data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <form action="" method="post">
        <div class="row p-5">
            <div class="col-6 offset-3">
            <label for="Name"> Name :</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required><br>
            <label for="Email"> Email :</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required><br>
            <label for="Password">Password :</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Your Password" required><br>
            <button type="submit" name="submit" class="btn btn-primary" style=";">Submit</button>
            <button type="reset" name="reset" class="btn btn-primary" style="">reset</button>

            
        </div>
        </div>
    </form>
</body>
</html>