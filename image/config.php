<?php
// mysqli_connect("localhost","root","","image");
// mysqli_select_db("image");


 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname="image";
 // Create connection
 $conn = new mysqli($servername, $username, $password);
 
 // Check connection
 
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 } 
 else{
      echo "Connected successfully"; 
     if(mysqli_select_db($conn,$dbname)){
       echo "Data selected";
     }
 else{
     echo "Database not selected";
 }
 }
 ?>