 
<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn_pdo = new PDO("mysql:host=$servername;dbname=myTask", $username, $password);
    // set the PDO error mode to exception
    $conn_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
