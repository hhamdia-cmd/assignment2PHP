<?php
// بيانات الاتصال الداخلي (الموصى بها داخل سيرفرات Render)
$host = "dpg-d8dc6ic0tmc73dpkk8g-a"; 
$db   = "my_database_t03o";
$user = "my_database_t03o_user";
$pass = "1Hi5ev42HGZOLhDiKHPQsDfX0gyZuD31"; 
$port = "5432";

try {
    // الاتصال الداخلي لا يتطلب إعدادات تشفير معقدة لأنه يتم داخل بيئة Render الآمنة
    $dsn = "pgsql:host=$host;port=$port;dbname=$db";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    
    $conn = new PDO($dsn, $user, $pass, $options);

} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// بدء الجلسة للمستخدمين
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>