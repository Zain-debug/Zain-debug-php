<?php
include '../Database.php';

session_start(); 
if (!empty($_SESSION["id"])) { 
    $id = $_SESSION['id'];
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $fullName = htmlspecialchars($row['name']); 
        $email = htmlspecialchars($row['email']);
        $phone = htmlspecialchars($row['phone']);
        $address = htmlspecialchars($row['address']);
        $profileImage = htmlspecialchars($row['profile_image']);
    } else {
        echo "<script>alert('No user data found.'); window.location.href = '../login/login.html';</script>";
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

    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
    
    <div ><center><br><h4 >Personal Information</center>  </h4> </div>
        <div class="row">
            <div class="col-6 mx-auto">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $fullName; ?></th>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $phone; ?></td>
                            <td><?php echo $address; ?></td>
                            <td>
                                <a href="useredit.php?id=<?php echo $id; ?>"><i class="fas fa-edit"></i></a>
                                <a href="delete.php?id=<?php echo $id; ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
