<?php
include ("config.php");
if(isset($_POST['submit']))
{
$emailid = trim($_POST['email']);
$password = trim($_POST['password']);
//$npass=md5($password);
$query = "SELECT email, password FROM form WHERE email='$emailid' 
AND password='$password'";

$result = mysqli_query($mysqli,$query)or die(mysqli_error());
$num_row = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
if( $num_row ==1 )
     {
 header("Location: home.html");
 echo 'hi there';
 exit;
  }
  else
     {
 echo 'oops  can not do it';
  }
 }
?>
<!-- $conn = null;
if (!empty($_POST['submit'])) 
{
$username=$_POST['firstname'];
$emailid=$_POST['email'];
$password=$_POST['password'];

/* Regular expression check */
$username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $emailid);
$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
} -->