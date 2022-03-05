<?php
require("db/db.php");
if(isset($_GET['id'])){
	$id = $_GET['id'];
    
	
mysqli_query($con,"DELETE FROM patient_list WHERE id='$id'");
mysqli_query($con,"DELETE FROM appointments WHERE patient_id='$$id'");

}
mysqli_close($con);

header("location: http://localhost/scheduler/admin/?page=appointments");
?>
