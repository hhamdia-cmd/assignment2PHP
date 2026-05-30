<?php
// بيانات الاتصال بقاعدة بيانات Render Postgres الفعالة
$host = "dpg-d8dc6icm0tmc73dpkk8g-a.oregon-postgres.render.com"; 
$db   = "my_database_t03o";
$user = "my_database_t03o_user";
$pass = "1Hi5ev42HGZOLhDiKHPQsDfX0gyZuD31"; 
$port = "5432";

try {
    // إنشاء الاتصال باستخدام الـ PDO المخصص لـ Postgres
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

session_start();
?>