<?php

//require("db/db.php");
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $id = $_GET['id'];
  }
$qry = $conn->query("SELECT *  FROM `patient_list` where id = '$id';");
foreach($qry->fetch_all(MYSQLI_ASSOC) as $row){
echo "<div class='comments_basic_info'>"; 
echo "<h1>" . $row['name'] . "</h1>";
echo "<h2>" . $row['date_created'] . "</h2>";
echo "</div>";
}
?>