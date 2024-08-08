<?php
include '../Database.php';

session_start(); 
if (!empty($_SESSION["id"])) {
    // Fetch all users' data with names and subjects
    $query = "
        SELECT marks.id, users.name AS user_name, subjects.name AS subject_name, marks.obtained_marks 
        FROM `marks`
        JOIN `users` ON marks.user_id = users.id
        JOIN `subjects` ON marks.subject_id = subjects.id
    ";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = [
                'id' => htmlspecialchars($row['id']),
                'user_name' => htmlspecialchars($row['user_name']),
                'subject_name' => htmlspecialchars($row['subject_name']),
                'obtained_marks' => htmlspecialchars($row['obtained_marks']),
            ];
        }
    } else {
        echo "<script>alert('No user data found.'); window.location.href = '../Admin/DashBoard.php';</script>";
        exit();
    }

    mysqli_close($conn); 
} else {
    echo "<script>alert('You are not logged in.'); window.location.href = '../login/login.html';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects Marks Data</title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
        
    <?php
        require "../layouts/Admin/header.php";
    ?>
    <?php
        require "../layouts/Admin/sidebar.php";
    ?>
        
    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
        <div><center><br><h4>Subjects Information</h4></center></div>
        <div class="row">
            <div class="col-12 mx-auto">
                <table class="table table-striped text-center">
                <tr>
                        <th scope="col">ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Obtained Marks</th>
                            <th scope="col">Edit Data</th>
                        </tr>
                        <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <th scope="row"><?php echo $user['id']; ?></th>
                            <td><?php echo $user['user_name'] ?></td>
                            <td><?php echo $user['subject_name'] ?></td>
                            <td><?php echo $user['obtained_marks'] ?></td>
                            <td>
                                <a href="editMarks.php?id=<?php echo $user['id'] ?>"><i class="fas fa-edit"></i></a>
                                <a href="deleteMarks.php?id=<?php echo $user['id']; ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
