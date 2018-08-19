
<?php
include("config.php");
try {
    if(isset($_POST['submit']))
    {
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $password=$_POST['password'];
    $encrypted_password= hash('sha256', $password);

   // $hash_password=md5($password);(another method of encripting) 
    
    $query = $conn->prepare("SELECT email FROM form WHERE email=?");
    $query->execute(array($email));
   
    
  if($query->rowCount() > 0){
    echo "<script>alert('Email is already exist');</script>";
  
}
else {
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO `form` (`firstname`, `email`, `password`) 
    VALUES (?,?,?)");
    // insert a row
    $stmt->execute(array($firstname,$email,$encrypted_password));
    echo "<script>alert('New records created successfully');</script>";
    header("Location: login.php");
    
     }
    
    }
}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
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
    <style>
        body {
            background-image: url("code3.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .box {
            background-color: #fff;
            border: 1px solid #e6e6e6;
            position: absolute;
            top: 170px;
            width: 350px;
            height: 480px;
            border-radius: 6px;
            left: 38%;
            margin: 40 5 10px !important;
            padding: 40px 45px;
        }
    </style>
</head>

<body>

    <div class="container box">
        <center>
            <h2 class="text-success"> Sign up</h2>
        </center> <br>
        <form action="index.php" method="post" name="form" class="bg-light pure-form" onsubmit="return validation()">
            <div class="form-group">


                <input id="name" class="form-control" name="firstname" type="text" pattern="[a-zA-Z]{6,}" placeholder="Enter Name" title="Minimum 6 letters and all should be in Alphabets" required />
                <span id="name1" class="text-danger font-weight-bold"></span>
            </div><br>
            <div class="form-group">

                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                <span id="email1" class="text-danger font-weight-bold"></span>
            </div><br>
            <div class="form-group">

                <input type="password" class="form-control" id="password" size="15" placeholder="Password" maxlength="20" onkeyup="return passwordChanged();" name="password" onkeyup="CheckPasswordStrength(this.value)" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                    required>
                <span id="pwd1" class="text-danger font-weight-bold"></span>
            </div>
            <br>
            <div class="form-group">

                <input type="password" class="form-control" id="confirm_password" placeholder="Confirm password" name="confirm_password" required>
                <span id="cpwd1" class="text-danger font-weight-bold"></span>
            </div><br>

            <button type="submit" class="btn btn-success pure-button pure-button-primary" name="submit">Submit</button><br>
            <a href="login.php" style="position: absolute;left: 150px;top:405px;">already have account?</a>
        </form>
    </div>
    <script>
        function validation(email) {

            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            var address = document.getElementById[email].value;
            if (reg.test(email) == false) {
                alert('Invalid Email Address');
                return (false);
            }
        }

        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>

    </form>
    </div>

</body>

</html>
<!-- dbname----myTask
table-----form
id
firstname
textarea -->