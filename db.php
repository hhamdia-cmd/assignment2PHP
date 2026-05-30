<?php
$conn = mysqli_connect("localhost", "root", "", "new_system");
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
session_start(); 
?>
