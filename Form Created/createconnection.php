<?php
$serverName= 'localhost';
$username = 'root';
$password = '';
$dbname = 'first_db';


$conn = new mysqli($serverName,$username,$password,$dbname);
if($conn){
    echo "Database connected Successfully";
}
else{
    echo "Database is not connected yet";
}