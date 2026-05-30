<?php 
include("db.php"); 

// حماية الصفحة
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<body>

<h2>جميع الفئات المخزنة</h2>

<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>اسم الفئة</th>
</tr>

<?php
$res = mysqli_query($conn, "SELECT id, name FROM categories");

while($row = mysqli_fetch_assoc($res)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
          </tr>";
}
?>

</table>

<br>
<a href="dashboard.php">رجوع للرئيسية</a>

</body>
</html>