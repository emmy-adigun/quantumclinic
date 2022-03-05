<?php
require("db/db.php");
if(isset($_GET['id'])){
	$id = $_GET['id'];
	
mysqli_query($con,"DELETE FROM room WHERE ID='$id'");

}
mysqli_close($con);

header("location: http://localhost/scheduler/admin/?page=room");
?>
