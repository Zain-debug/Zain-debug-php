<?php
require '../database.php';
session_start();
if (!empty($_SESSION["id"])) {
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM usersdata WHERE id = $id");
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $username = htmlspecialchars($row['full_name']);
        $email = htmlspecialchars($row['email']);
        $phone = htmlspecialchars($row['phone']);
        $address = htmlspecialchars($row['Address']);
    } else {
        echo "<script> alert('Error fetching data.');</script>";
    }
} else {
    echo "<script> alert('User not logged in.');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
    <div ><center><h4 >Edit Personal Information</center>  </h4> </div>

        <!-- Html code for Labels  -->
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Edit Your Full Name" value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Edit Your Email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="phone" placeholder="Edit Your Phone Number" value="<?php echo $phone; ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Edit Your Address" value="<?php echo $address; ?>">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Update" name="update">

            </div>
            
        </form>
    </div>
</body>
</html>
