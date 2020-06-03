
<?php

include ("config.php");

session_start();

if(isset($_SESSION['is_login']))
{
    if($_SESSION['is_login']==true)
    {
      header("location:home.php");
    }
    else
    {
    }
}
else
{
    // header("location:login.php");
}



  if(isset($_POST['submit']))
  {
       $emailid = trim($_POST['email']);

       $password = trim($_POST['password']);
       //$hash_password=md5($password);

       $encrypted_password= hash('sha256', $password);

       //selecting all values(row) which matches the below query
       $query = $conn->prepare("SELECT emailf FROM form WHERE email=? AND password=?");

       $query->execute(array($emailid,$encrypted_password));

       //setting or giving permission to $query to fetch the elements something like that
       $query->setFetchMode(PDO::FETCH_ASSOC);

      if($query->rowCount()>0)
         
      {
        
        header("Location: home.php");

        session_start();

        $_SESSION["is_login"]=true;

        $_SESSION['email']=$emailid;

        echo 'hi there';

        exit;
       }

     else

       {

       echo "<script>alert('Invalid Login');</script>";

       }

   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <style>
        body
         {
            background-image: url("code3.jpg");
            background-repeat: no-repeat;
            background-size: cover;
         }
        
        .box
         {
            background-color: #fff;
            border: 1px solid #e6e6e6;
            position: absolute;
            top: 170px;
            width: 350px;
            height: 417px;
            border-radius: 6px;
            left: 38%;
            margin: 40 5 10px !important;
            padding: 40px 45px;
         }
        
        .btn 
         {
            width: 260px;
            margin: 33 5 10px;
            padding: 10px 34px;
                    }
    </style>
</head>

<body>
    <div class="container">
        <div class="col-md-4"></div>
        <center>
            <div class="col-md-4 box">
                <form action="login.php" method="post" name="form" class="bg-light pure-form" onsubmit="return validation()">

                    <h2 class="text-success"> Login</h2><br>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                        <span id="email1" class="text-danger font-weight-bold"></span>
                    </div><br>
                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control" id="password" size="15" maxlength="20" onkeyup="return passwordChanged();" name="password" onkeyup="CheckPasswordStrength(this.value)" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                            required><br><input type="checkbox" onclick="myFunction()"><label style="color:gray;font-weight:1px;">Show Password</label>
                        <span id="pwd1" class="text-danger font-weight-bold"></span>
                    </div>
                    <button type="submit" class="btn btn-success pure-button pure-button-primary" name="submit">Submit</button><br><br><br>
                    <p class="bg-light"style="color:gray;">Don't have an Account ?&nbsp;&nbsp;<a href="index.php">Sign up.</a> </p></div>
                   
    </div>
    </form>
    </center>
    <div class="col-md-4"></div>

    <script>
        function validation(email) {

            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            var address = document.getElementById[email].value;
            if (reg.test(email) == false) {
                alert('Invalid Email Address');
                return (false);
            }
        }
        function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
    </script>
</body>

</html>