<?php
// بيانات الاتصال بقاعدة بيانات Render Postgres الجديدة
$host = "dpg-cv82m4d2ng1s73eddq0g-a.oregon-postgres.render.com"; 
$db   = "my_database_t03o";
$user = "my_database_t03o_user";
$pass = "1Hi5ev42HGZOLhDiKHPQsDfXOgyZuD31";
$port = "5432";

try {
    // إنشاء الاتصال باستخدام الـ PDO المخصص لـ Postgres
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    // تفعيل وضع الأخطاء للمساعدة في المراقبة
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

session_start();
?>