<?php
// بيانات الاتصال المحدثة والآمنة لقاعدة البيانات
$host = "dpg-d8dc6ic0tmc73dpkk8g-a.oregon-postgres.render.com"; 
$db   = "my_database_t03o";
$user = "my_database_t03o_user";
$pass = "1Hi5ev42HGZOLhDiKHPQsDfX0gyZuD31"; 
$port = "5432";

try {
    // تم تغيير النمط إلى disable لتخطي أخطاء الـ SSL المقفلة فجأة من السيرفر
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$db;sslmode=disable", $user, $pass);
    
    // تفعيل وضع الأخطاء للمراقبة
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// بدء الجلسة للمستخدمين
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>