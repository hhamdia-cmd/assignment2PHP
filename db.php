<?php
// بيانات الاتصال المصححة والكاملة لقاعدة بيانات Render Postgres
$host = "dpg-d8dc6ic0tmc73dpkk8g-a.oregon-postgres.render.com"; 
$db   = "my_database_t03o";
$user = "my_database_t03o_user";
$pass = "1Hi5ev42HGZOLhDiKHPQsDfX0gyZuD31"; 
$port = "5432";

try {
    // إنشاء الاتصال باستخدام الـ PDO المخصص لـ Postgres مع تفعيل الـ SSL الإجباري
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$db;sslmode=require", $user, $pass);
    // تفعيل وضع الأخطاء للمساعدة في مراقبة الاتصال
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// بدء الجلسة للمستخدمين
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>