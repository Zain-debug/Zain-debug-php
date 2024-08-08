<?php
require '../Database.php';
session_start();

if (!empty($_GET["id"])) 
{
    $user_id = $_GET['id']; 
    $sql = "SELECT * FROM `subjects` WHERE `id`='$user_id'"; 
    $result = $conn->query($sql);     
   if ($result->num_rows > 0) 
   {  
    while ($row = $result->fetch_assoc()) 
        {   
            $id = $row['id'];       
            $name = $row['name'];        
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
    <?php
        require "../layouts/Admin/header.php";
    ?>
    <?php
        require "../layouts/Admin/sidebar.php";
    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
    <div class="container">
    <div><center><br><h4>Edit User Information</h4></center></div>

        <!-- Html code for Labels -->
        <form action="subjectUpdate.php" method="post">
            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Edit Your Full Name" value="<?php echo $name; ?>"><br>
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Update" name="update">
            </div>
        </form>
    </div>
    </main>
</body>
</html>
