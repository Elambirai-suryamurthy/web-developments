<?php

session_start();

if(isset($_SESSION['is_login']))
{
    if($_SESSION['is_login']==true)
    {
    //   header("location:home.php");
    }
    else
    {
        header("location:login.php");
    }
}
else
{
    header("location:login.php");
}

?>