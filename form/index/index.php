<?php
require '../database.php';
session_start();
if(!empty($_SESSION["id"])){
    $id= $_SESSION['id'];
    $result    =    mysqli_query($conn, "SELECT * FROM usersdata WHERE id = $id" );
    $row       =    mysqli_fetch_assoc($result);
    $username  =    htmlspecialchars($row['full_name']);
    $email     =    htmlspecialchars($row['email']);
    $phone     =    htmlspecialchars($row['phone']);
    $address   =    htmlspecialchars($row['Address']);
}
    else
    {
    echo "<script> alert('Welcome To dashboard ..!');</script>"; 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container p-5">
        <div class="row">
            <div class="col-12 text-center">
                <h3>Hi <?php echo $username; ?> Welcome to Dashboard</h3>
            </div>
        </div><br>
        <div class="col-6 mx-auto">
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"><?php echo $username; ?></th>
                <td><?php echo $email; ?></td>
                <td><?php echo $phone; ?></td>
                <td><?php echo $address; ?></td>
                <td>
                    <a href="useredit.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>&nbsp;
                    <a href="delete.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
        <a href="../logout.php" class="btn btn-primary">Logout</a>
    </div>
</body>
</html>