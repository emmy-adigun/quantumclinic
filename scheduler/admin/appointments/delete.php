<?php
require("db/db.php");
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$patientId = $_GET['patientId'];
mysqli_query($con,"DELETE FROM comments WHERE ID='$id'");

header("location: appointments/comment_index.php?id=$patientId");

}
mysqli_close($con);
?>
