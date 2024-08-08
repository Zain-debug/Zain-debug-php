<?php
require '../Database.php';
session_start();
if (!empty($_SESSION["id"])) {
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $fullName = htmlspecialchars($row['name']);
        $email = htmlspecialchars($row['email']);
        $phone = htmlspecialchars($row['phone']);
        $address = htmlspecialchars($row['address']);
        $profileImage = htmlspecialchars($row['profile_image']);

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
    <title>Dashboard</title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php
        require "../layouts/Users/header.php";
    ?>
    <?php
        require "../layouts/Users/sidebar.php";
    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
    <div class="container">
    <div ><center><br><h4 >Edit Personal Information</center>  </h4> </div>

        <!-- Html code for Labels  -->
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Edit Your Full Name" value="<?php echo $fullName; ?>"><br>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Edit Your Email" value="<?php echo $email; ?>"><br>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="phone" placeholder="Edit Your Phone Number" value="<?php echo $phone; ?>"><br>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Edit Your Address" value="<?php echo $address; ?>"><br>
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Update" name="update">

            </div>
            
        </form>
    </div>
    </main>


</body>