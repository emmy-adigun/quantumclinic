<?php 
$host = 'localhost';
$username = 'root';
$pass = '';
$db = 'scheduler_db2';

$db = new mysqli($host,$username,$pass,$db);

if ($db->connect_error) {
	 die("Connection Failed". $db->connect_error);
}

if (isset($_POST['country_id'])) {
$code = $_POST['country_id'];
	$query = "SELECT * FROM service where ID=".$_POST['country_id'];
	$result = $db->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select Service</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['ID'].'>'.$row['service_name'].'</option>';
		 }
	}else{

		echo '<option>No Service Found!</option>';
	}

}elseif (isset($_POST['state_id'])) {
	 

	$query = "SELECT * FROM city where s_id=".$_POST['state_id'];
	$result = $db->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select City</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['id'].'>'.$row['city_name'].'</option>';
		 }
	}else{

		echo '<option>No City Found!</option>';
	}

}


?>
