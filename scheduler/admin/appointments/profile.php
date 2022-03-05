<?php

//require("db/db.php");
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $id = $_GET['id'];
  }
$qry = $conn->query("SELECT *  FROM `patient_list` where id = '$id';");
foreach($qry->fetch_all(MYSQLI_ASSOC) as $row){
echo "<div class='comments_profile'>"; 
echo "<h1>" ."<b>" . "CLIENT INFO" . "</b>". "</h1></br>";
echo "<table class='table table-borderless table_style'>";
echo "<tr><td>" . 'Name' . "</td><td><b>" . $row['name'] . "</b></td></tr>";
echo "<tr><td>" . 'Gender' . "</td><td><b>" . $row['gender'] . "</b></td></tr>";
echo "<tr><td>" . 'Mobile' . "</td><td style='color:blue'><b>" . $row['phonenumber'] . "</b></td></tr>";
echo "<tr><td>" . 'Email' . "</td><td style='color:blue'><b>" . $row['email'] . "</b></td></tr>";
echo "<tr><td>" . 'Address' . "</td><td><b>" . $row['address'] . "</b></td></tr>";
echo "</table>";

// echo "<h1>Name: " ."<b>" . $row['name'] . "</b>". "</h1>";
// echo "<h2>Gender: " ."<b>" . $row['gender']  . "</b>". "</h2>";
// echo "<h2>Mobile: " ."<b>". $row['phonenumber']  . "</b>". "</h2>";
// echo "<h2>Email: " ."<b>". $row['email']  . "</b>". "</h2>";
// echo "<h2>Address: " ."<b>". $row['address']  . "</b>". "</h2>";
// echo "</div>";
}
//mysqli_close($con);

?>