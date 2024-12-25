<?php
$dbname= "company_db";
$conn= mysqli_connect("localhost", "root", "", $dbname,"3308");
// Check connection
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}  
else{
    echo "connected";
}