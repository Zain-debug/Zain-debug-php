<?php
include '../Database.php';

session_start();
if (!empty($_SESSION["id"])) {
    // Display the form to add a subject
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subject</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php
    require "../layouts/Admin/header.php";
    require "../layouts/Admin/sidebar.php";
    ?>
    <div class="container">
        <div><center><h4>Add Subject</h4></center></div>
        <form action="createSubject.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="subject" class="form-control" placeholder="Enter Subject:" required><br>
                <button type="submit" name="Add" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php
} else {
    echo "<script>alert('You are not logged in.'); window.location.href = '../login/login.html';</script>";
    exit();
}
?>
