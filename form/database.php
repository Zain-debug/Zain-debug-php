<?php
$serverName = 'localhost';
$username = 'root';
$password = '';
$dbname = 'form';
$conn = new mysqli($serverName,$username,$password,$dbname);
if(!$conn){
    die("Something went wrong");
}
?>