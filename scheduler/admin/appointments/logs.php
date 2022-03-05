<?php

//require("db/db.php");
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $id = $_GET['id'];
  }
$qry = $conn->query("SELECT *  FROM `comments` where patient_id = '$id' ORDER BY date_time desc;");
while($row = $qry->fetch_assoc()){
echo "<div class='comments_content'>"; 
echo "<h4><a href='delete.php?id=" . $row['ID'] . "&patientId=" . $id . "'> <i class='fa fa-trash' style='font-size:14px;color:grey'></i></a></h4>";
// echo "<h1>" . $row['name'] . "</h1>";
echo "<h1>" . "<b>" . "Appointment" . "</b>" . "</h1>";
echo "<h2>" . $row['date_time'] . "</h2></br></br>";
echo "<h3>" . $row['comments_text'] . "</h3>";
echo "</div>";
}
//mysqli_close($con);

?>