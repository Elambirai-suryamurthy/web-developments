
<?php

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO form (firstname, email, password) 
    VALUES (:firstname, :email,:password)");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    // insert a row
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $password=$_POST['password'];
    $stmt->execute();



   
    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>

