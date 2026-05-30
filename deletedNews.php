<?php 
include("db.php"); 

if(!isset($_SESSION['user_id'])) { 
    header("Location: index.php"); 
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>سلة المحذوفات</title>
</head>
<body>

<h2>الأخبار المحذوفة</h2>

<table border="1" width="80%">
    <tr>
        <th>ID</th>
        <th>العنوان</th>
        <th>التفاصيل</th>
        <th>الصورة</th>
    </tr>

    <?php
    $res = mysqli_query($conn, "SELECT id, title, details, image FROM news WHERE deleted = 1");

    while($row = mysqli_fetch_assoc($res)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['title']}</td>
                <td>{$row['details']}</td>
                <td><img src='images/{$row['image']}' width='60'></td>
              </tr>";
    }
    ?>

</table>

<br>
<a href="dashboard.php">العودة للوحة التحكم</a>

</body>
</html>