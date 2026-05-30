<?php 
include("db.php"); 

// حماية الصفحة
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}

if(isset($_POST['save_cat'])){

    $cat_name = $_POST['cat_name'];

    // تنظيف المدخلات (حماية بسيطة)
    $cat_name = mysqli_real_escape_string($conn, $cat_name);

    // التحقق من عدم تكرار الفئة
    $check = mysqli_query($conn, "SELECT id FROM categories WHERE name='$cat_name'");

    if(mysqli_num_rows($check) > 0){
        echo "<p style='color:red'>هذه الفئة موجودة مسبقاً!</p>";
    } else {

        $sql = "INSERT INTO categories (name) VALUES ('$cat_name')";

        if(mysqli_query($conn, $sql)){
            echo "<p style='color:green'>تم حفظ الفئة بنجاح!</p>";
        } else {
            echo "<p style='color:red'>حدث خطأ أثناء الحفظ</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<body>

<h2>إضافة فئة جديدة</h2>

<form method="post">
    اسم الفئة: 
    <input type="text" name="cat_name" required><br><br>

    <input type="submit" name="save_cat" value="إضافة">
</form>

<br>
<a href="dashboard.php">رجوع للرئيسية</a>

</body>
</html>