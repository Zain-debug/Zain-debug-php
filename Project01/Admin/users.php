<?php
include '../Database.php';

    // Fetch all users' data
    $query = "SELECT * FROM `users` WHERE user_type = 2";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows ($result) > 0 ) {
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'email' => $row['email'],
                'address' => $row['address'],
                'phone' => $row['phone'],
                'profile_image' => $row['profile_image'],
            ];
        }
        // echo '<pre>';
        // print_r($users);
        // echo '</pre>';
        // die();
        // # code...
        // # code...
    }
    else{
        echo "<script>alert('No user data found.'); window.location.href = '../login/login.html';</script>";
        exit();
    }

    // if (mysqli_num_rows($result) > 0) {
    //     $users = [];
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $users[] = [
    //             'id' => htmlspecialchars($row['id']),
    //             'name' => htmlspecialchars($row['name']),
    //             'email' => htmlspecialchars($row['email']),
    //             'phone' => htmlspecialchars($row['phone']),
    //             'address' => htmlspecialchars($row['address']),
    //             'profile_image' => htmlspecialchars($row['profile_image'])
    //         ];
    //     }
    // } else {
    //     echo "<script>alert('No user data found.'); window.location.href = '../login/login.html';</script>";
    //     exit();
    // }

    mysqli_close($conn); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Data</title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <?php
        require "session_data.php";
    ?>

    <?php
        require "../layouts/Admin/header.php";
    ?>
    <?php
        require "../layouts/Admin/sidebar.php";
    ?>

    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
        <div><center><br><h4>Users Information</h4></center></div>
        <div class="row">
            <div class="col-12 mx-auto">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Profile Image</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars($user['id']); ?></th>
                            <td><?php echo htmlspecialchars($user['name']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['phone']); ?></td>
                            <td><?php echo htmlspecialchars($user['address']); ?></td>
                            <td><img src="../profile_images/<?php echo htmlspecialchars($user['profile_image']); ?>" alt="Profile Image" style="width: 40px; height: 40px; border-radius: 30px;"></td>
                            <td>
                                <a href="useredit.php?id=<?php echo urlencode($user['id']); ?>"><i class="fas fa-edit"></i></a>
                                <a href="delete.php?id=<?php echo urlencode($user['id']); ?>"><i class="fas fa-trash"></i></a>
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
