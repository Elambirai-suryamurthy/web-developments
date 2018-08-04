<?php
include("config.php");
if(isset($_POST['but'])){
  $fname=$_POST['firstname'];
  $text=$_POST['textarea'];

    $sql="INSERT INTO `form`(`id`,`firstname`,`textarea`) VALUES (null,'$fname','$text')";

    if($conn->query($sql)=== TRUE)
    {
      echo "new record connection Successfull";
    }
    else{
      echo "error:".$sql."<br>".$conn->error;
    }
    $conn->close();
  }
?>