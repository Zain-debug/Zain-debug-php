<?php
include '../Database.php';

if (isset($_POST['Add'])) {
    $subjectName = $_POST['subject'];

    // Check if the subject already exists
    $query = "SELECT * FROM subjects WHERE name = '$subjectName'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
        alert('Subject is Already Taken..!');
        window.location.href = 'subjects.php';
        </script>";
    } else {
        // Insert the new subject
        $insertQuery = "INSERT INTO subjects (name) VALUES ('$subjectName')";
        if (mysqli_query($conn, $insertQuery)) {
            echo "<script>
            alert('Subject Added Successfully..!');
            window.location.href = 'subjects.php';
            </script>";
        } else {
            echo "<script>
            alert('Oops, There is a Problem, Try Again..!');
            window.location.href = 'subjects.php';
            </script>";
        }
    }
}
?>
