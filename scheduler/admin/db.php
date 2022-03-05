<?php
$conn = mysqli_connect("localhost","root","","scheduler_db2") ;

if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>