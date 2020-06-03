
<?php
include("config.php");
if (isset($_POST['submit'])) 
{
        # code...
    $name=$_POST['name'];
    $img=$_FILES['image']['name'];
    $insert="insert into image_upload values ('NULL','$name','$img')";
    if (mysqli_query($conn,$insert))
    {
        # code...
        move_uploaded_file($_FILES['image']['tmp_name'],"picture/$img");
        echo "<script>alert('images has been uploaded')</script>";
    }
   else 
    {
    # code...
        echo "<script>alert('images has not been uploaded')</script>";
   }
}
?>
<html>

<body>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name"><br><br>
        <label for="file">Filename:</label>
        <input type="file" name="image" id="file"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>