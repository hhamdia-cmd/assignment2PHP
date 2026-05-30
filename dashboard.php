<?php 
include("db.php"); 

if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}

// حذف ناعم
if(isset($_GET['del_id'])){
    $id_to_delete = $_GET['del_id'];

    mysqli_query($conn, "UPDATE news SET deleted = 1 WHERE id = $id_to_delete");

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>لوحة التحكم الرئيسية</title>
</head>
<body>

<h2>مرحباً بك في لوحة التحكم</h2>

<table border="1">
<tr>
    <td><a href="addCategory.php">إضافة فئة</a></td>
    <td><a href="viewCategories.php">عرض الفئات</a></td>
    <td><a href="addNews.php">إضافة خبر</a></td>
    <td><a href="deletedNews.php">سلة المحذوفات</a></td>
    <td><a href="logout.php">تسجيل الخروج</a></td>
</tr>
</table>

<br><br>

<h3>الأخبار الحالية</h3>

<table border="1">
<tr>
<th>ID</th>
<th>العنوان</th>
<th>التفاصيل</th>
<th>الصورة</th>
<th>الفئة</th>
<th>العمليات</th>
</tr>

<?php
$res = mysqli_query($conn, "
SELECT news.*, categories.name AS cat_name
FROM news
JOIN categories ON news.category_id = categories.id
WHERE deleted = 0
");

while($row = mysqli_fetch_assoc($res)) {

    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['title']}</td>";
    echo "<td>{$row['details']}</td>";
    echo "<td><img src='images/{$row['image']}' width='60'></td>";
    echo "<td>{$row['cat_name']}</td>";
    echo "<td>
            <a href='editNews.php?id={$row['id']}'>تعديل</a> | 
            <a href='dashboard.php?del_id={$row['id']}' onclick='return confirm(\"هل تريد الحذف؟\")'>حذف</a>
          </td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>