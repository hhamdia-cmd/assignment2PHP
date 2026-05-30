
<?php 
include("db.php"); 

$id = $_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM news WHERE id = $id");
$old = mysqli_fetch_assoc($res);

if(isset($_POST['edit'])){
    extract($_POST);
    
    // فحص الصورة
    if(!empty($_FILES['pic']['name'])){
        $img = $_FILES['pic']['name'];
        move_uploaded_file($_FILES['pic']['tmp_name'], "images/".$img);
    } else {
        $img = $old['image'];
    }
    
    $sql = "UPDATE news SET title='$title', details='$details', image='$img' WHERE id = $id";
    if(mysqli_query($conn, $sql)){
        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<body>

<h2>تعديل الخبر</h2>

<form method="post" enctype="multipart/form-data">

العنوان: 
<input type="text" name="title" value="<?php echo $old['title']; ?>"><br><br>

التفاصيل: 
<textarea name="details"><?php echo $old['details']; ?></textarea><br><br>

الصورة الحالية: 
<img src="images/<?php echo $old['image']; ?>" width="50"><br>

تغيير الصورة: 
<input type="file" name="pic"><br><br>

<input type="submit" name="edit" value="تحديث البيانات">

</form>

</body>
</html>