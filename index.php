<?php include("db.php"); ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<body>

<h2>تسجيل دخول المسؤول</h2>

<?php
if(isset($_POST['login'])){
    extract($_POST);

    // نجيب المستخدم حسب الإيميل فقط
    $sql = "SELECT * FROM users WHERE email='$email'";
    $res = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($res);

    // التحقق من كلمة المرور المشفرة
    if($user && password_verify($pass, $user['password'])){
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
    } else {
        echo "<p style='color:red'>خطأ في البيانات!</p>";
    }
}
?>

<form method="post">
    البريد: <input type="email" name="email" required><br><br>
    كلمة المرور: <input type="password" name="pass" required><br><br>
    <input type="submit" name="login" value="دخول">
</form>

<a href="register.php">إنشاء حساب جديد</a>

</body>
</html>