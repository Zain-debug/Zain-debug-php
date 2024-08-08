<?php
require '../Database.php';
session_start();

if (!empty($_GET["id"])) 
{
    $user_id = $_GET['id']; 
    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'"; 
    $result = $conn->query($sql);     
   if ($result->num_rows > 0) 
   {  
    while ($row = $result->fetch_assoc()) 
        {   
            $id = $row['id'];       
            $name = $row['name'];           
            $email = $row['email'];          
            $address = $row['address'];           
            $phone  = $row['phone'];
            $profile_image  = $row['profile_image'];           
        }  
    }   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Info</title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <?php require "../layouts/Admin/header.php"; ?>
    <?php require "../layouts/Admin/sidebar.php"; ?>
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
    <div class="container">
    <div><center><br><h4>Edit User Information</h4></center></div>

        <form action="update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Edit Your Full Name" value="<?php echo $name; ?>" required><br>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Edit Your Email" value="<?php echo $email; ?>"><br>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Edit Your Address" value="<?php echo $address; ?>"><br>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="phone" placeholder="Edit Your Phone Number" value="<?php echo $phone; ?>"><br>
            </div>
            <div class="form-group">
                <span>Old Profile Image : </span>
                <img src="../profile_images/<?php echo $profile_image; ?>" alt="Profile Image" style="width: 100px; height: 100px; border-radius: 30px;">
            </div>
            <div class="form-group">
                <input type="file" class="form-control" name="profileImage"><br>
            </div>

            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Update" name="update">
            </div>
        </form>
    </div>
    </main>
</body>
</html>
