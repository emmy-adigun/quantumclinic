<?php
 require_once "db.php";

$id = $_POST['id'];
$date_sched = $_POST['date_sched'];
echo("<script>console.log('PHP: " . $id . "');</script>");

// $sqlQuery = "SELECT p.*,a.date_sched,a.id as id from `patient_list` p inner join `appointments` a on p.id = '$id'   order by unix_timestamp(a.date_sched) desc ";

//     $result = mysqli_query($conn, $sqlQuery);
//     $eventArray = array();
//     while ($row = mysqli_fetch_assoc($result)) {
//         $id = $row['id'];
//     }

$sqlUpdate = "UPDATE appointments SET date_sched='" . $date_sched . "' WHERE id=" . $id;
$conn->query($sqlUpdate);

?>