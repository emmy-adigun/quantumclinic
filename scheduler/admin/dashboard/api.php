<?php 
    require_once "../db.php";

    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $roomId = $_POST['roomId'];

    $queryString = "SELECT ra.*, ro.service_id, se.service_name, pa.name from `random_schedule` ra inner join `room` ro on ra.room_id = ro.ID left outer join `service` se on ro.service_id = se.ID left outer join `patient_list` pa on ra.user_id = pa.id where ra.room_id ='" .$roomId. "' and cast(ra.start as date) between '".$startDate."' and '".$endDate."'";
    $qry = $conn->query($queryString);
    $result = $qry->fetch_all(MYSQLI_ASSOC);

    // $resultArray = $qry->fetch_assoc();

    // $newArray = [];

    // while($row = $resultArray):
    //     $newArray.push($row);
    // endwhile;

    header('Content-Type: application/json');
    
    echo json_encode($result);
?>