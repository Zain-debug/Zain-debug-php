<!--Php connection creating-->
<?php
    include('connection.php');
    $showRecord = "SELECT * From students";
    $result=$conn->query($showRecord);
?>
<!--creating table in html-->
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="p-5">
        <a href="create.php">
            <button class="btn btn-primary">Back</button>
        </a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Student Email</th>
                    <th scope="col">Student Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                    ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']?></th>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['password']?></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                    
            </tbody>
        </table>
    </div>
</body>
</html>