<?php

include("session.php");

?>
<html>

<body>

    <h1>Welcome <?Php echo $_SESSION['email']; ?></h1>
    
    <form action="home.php" method="post">

    <button name="logout">logout</button>

    </form>
  

</body>

</html>

<?php

if(isset($_POST['logout']))
{
   session_destroy();
    header("location:login.php");
}

?>