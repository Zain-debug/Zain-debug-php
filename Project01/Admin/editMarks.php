<?php
require '../Database.php';
session_start();

if (!empty($_GET["id"])) 
{
    $mark_id = $_GET['id']; 
    $sql = "
        SELECT marks.id, marks.obtained_marks, users.name AS user_name, subjects.name AS subject_name
        FROM `marks`
        JOIN `users` ON marks.user_id = users.id
        JOIN `subjects` ON marks.subject_id = subjects.id
        WHERE marks.id='$mark_id'
    "; 
    $result = $conn->query($sql);     
    if ($result->num_rows > 0) 
    {  
        while ($row = $result->fetch_assoc()) 
        {   
            $id = $row['id'];       
            $user_name = $row['user_name'];
            $subject_name = $row['subject_name'];
            $obtainedMarks = $row['obtained_marks'];
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
        <div><center><br><h4>Edit Subjects Marks</h4></center></div>
        <!-- Html code for Labels -->
        <form action="updateMarks.php" method="post">
            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
            <div class="form-group">
                <input type="text" class="form-control" name="user_name" placeholder="Edit User Name" value="<?php echo isset($user_name) ? $user_name : ''; ?>" readonly><br>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="subject_name" placeholder="Edit Subject Name" value="<?php echo isset($subject_name) ? $subject_name : ''; ?>" readonly><br>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="obtained_marks" placeholder="Edit Obtained Marks" value="<?php echo isset($obtainedMarks) ? $obtainedMarks : ''; ?>"><br>
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Update" name="update">
            </div>
        </form>
    </div>
    </main>
</body>
</html>
