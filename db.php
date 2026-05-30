<?php
// بيانات الاتصال الصحيحة الكاملة لقاعدة بيانات Render Postgres
$host = "dpg-d8dc6icm0tmc73dpkk8g-a.oregon-postgres.render.com"; 
$db   = "my_database_t03o";
$user = "my_database_t03o_user";
$pass = "1Hi5ev42HGZOLhDiKHPQsDfXOgyZuD31"; 
$port = "5432";

try {
    // تغيير النمط إلى allow ليتيح للسيرفر اختيار أفضل بروتوكول متاح دون قفل الاتصال
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=allow";
    
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::ATTR_PERSISTENT         => true // الحفاظ على الاتصال مستمراً لمنع الإغلاق المفاجئ
    ];

    // إنشاء الاتصال المستقر
    $conn = new PDO($dsn, $user, $pass, $options);

} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// بدء الجلسة للمستخدمين
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>