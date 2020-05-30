<?php
$conn = mysqli_connect("test1.c7ymk1olnnnd.us-east-2.rds.amazonaws.com","tharan","Tharan2000","tharantest");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }
?>
