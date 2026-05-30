<?php
// بيانات الاتصال  من لوحة التحكم الخاصة بكِ
$host = "sql210.infinityfree.com"; 
$user = "if0_42055072";            
$pass = "msKY3gD5XA";             
$db   = "if0_42055072_db";      

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>