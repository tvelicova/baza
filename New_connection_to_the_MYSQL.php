<?php
// Create connection
$con=mysqli_connect('localhost', 'velicova1','mili', 'zip'); 
echo "You are connected" ;
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?> 