<?php
// بيانات الاتصال الدقيقة والصحيحة لقاعدة بيانات Render Postgres الفعالة
$host = "dpg-d8dc6ic0tmc73dpkk8g-a.oregon-postgres.render.com"; 
$db   = "my_database_t03o";
$user = "my_database_t03o_user";
$pass = "1Hi5ev42HGZOLhDiKHPQsDfX0gyZuD31"; 
$port = "5432";

try {
    // صياغة نص الاتصال مع نمط تشفير require الإجباري للربط الخارجي في Render
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";
    
    // خيارات لضمان توافق واستقرار جلسة التشفير عبر الـ PDO
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    // إنشاء الاتصال الفعلي بالخادم
    $conn = new PDO($dsn, $user, $pass, $options);

} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// بدء الجلسة بأمان للمستخدمين
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>