<?php 
include("db.php"); 

// حماية الصفحة
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}

if(isset($_POST['add'])){

    $title   = $_POST['title'];
    $details = $_POST['details'];
    $cat     = $_POST['cat'];

    // تنظيف البيانات
    $title   = mysqli_real_escape_string($conn, $title);
    $details = mysqli_real_escape_string($conn, $details);

    // رفع الصورة باسم فريد
    $img_name = $_FILES['pic']['name'];
    $img_tmp  = $_FILES['pic']['tmp_name'];

    $img = time() . "_" . $img_name;

    move_uploaded_file($img_tmp, "images/" . $img);

    $u_id = $_SESSION['user_id'];

    $sql = "INSERT INTO news (title, category_id, details, image, user_id, deleted) 
            VALUES ('$title', '$cat', '$details', '$img', '$u_id', 0)";

    if(mysqli_query($conn, $sql)){
        echo "<p style='color:green'>تم نشر الخبر بنجاح!</p>";
    } else {
        echo "<p style='color:red'>حدث خطأ!</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<body>

<h2>إضافة خبر جديد</h2>

<form method="post" enctype="multipart/form-data">

العنوان:
<input type="text" name="title" required><br><br>

الفئة:
<select name="cat">
<?php
$cats = mysqli_query($conn, "SELECT id, name FROM categories");
while($c = mysqli_fetch_assoc($cats)){
    echo "<option value='{$c['id']}'>{$c['name']}</option>";
}
?>
</select><br><br>

التفاصيل:
<textarea name="details" required></textarea><br><br>

الصورة:
<input type="file" name="pic" required><br><br>

<input type="submit" name="add" value="حفظ الخبر">

</form>

<br>
<a href="dashboard.php">رجوع</a>

</body>
</html>