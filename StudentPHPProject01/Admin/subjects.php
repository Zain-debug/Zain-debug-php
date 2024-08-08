<?php
include '../Database.php';

session_start();
if (!empty($_SESSION["id"])) {
    // Fetch all subjects' data
    $query = "SELECT * FROM `subjects`";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $subjects = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $subjects[] = [
                'id' => htmlspecialchars($row['id']),
                'name' => htmlspecialchars($row['name']),
            ];
        }
    } else {
        echo "<script>alert('No subject data found.'); window.location.href = '../login/login.html';</script>";
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
    <title>Subjects Data</title>
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

    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
        <div>
            <center><br><h4>Subjects Information</h4></center>
        </div>
        <form action="addSubject.php" method="post">
            <div class="form-btn d-flex justify-content-end">
                <input type="submit" name="Add" value="Add" class="btn btn-primary">
            </div>
        </form>
        <div class="row">
            <div class="col-12 mx-auto">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($subjects as $subject): ?>
                        <tr>
                            <th scope="row"><?php echo $subject['id']; ?></th>
                            <td><?php echo $subject['name'] ?></td>
                            <td>
                                <a href="subjectEdit.php?id=<?php echo $subject['id'] ?>"><i class="fas fa-edit"></i></a>
                                <a href="subjectDelete.php?id=<?php echo $subject['id']; ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
