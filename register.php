<?php 
include("db.php"); 
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>إنشاء حساب</title>
</head>
<body>

<h2>إنشاء حساب مستخدم جديد</h2>

<?php
if(isset($_POST['reg'])){

    $name  = $_POST['u_name'];
    $email = $_POST['u_email'];
    $pass  = $_POST['u_pass'];

    // 🔐 تشفير كلمة المرور
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check_email) > 0) {
        echo "<p style='color:red'>
        هذا البريد الإلكتروني مسجل بالفعل! 
        <a href='index.php'>سجل دخولك من هنا</a>
        </p>";
    } else {

        $sql = "INSERT INTO users (name, email, password) 
                VALUES ('$name', '$email', '$hashed_pass')";

        if(mysqli_query($conn, $sql)){
            echo "<p style='color:green'>
            تم التسجيل بنجاح! 
            <a href='index.php'>اضغط هنا لتسجيل الدخول</a>
            </p>";
        } else {
            echo "حدث خطأ!";
        }
    }
}
?>

<form method="post">
    الاسم: <input type="text" name="u_name" required><br><br>
    البريد: <input type="email" name="u_email" required><br><br>
    كلمة المرور: <input type="password" name="u_pass" required><br><br>
    <input type="submit" name="reg" value="تسجيل">
</form>

<br>
<a href="index.php">لديك حساب بالفعل؟ سجل دخولك</a>

</body>
</html>