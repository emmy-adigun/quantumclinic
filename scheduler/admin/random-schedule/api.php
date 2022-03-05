<?php 
    require_once "../db.php";

    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $roomName = $_POST['roomName'];

    $queryString = "SELECT ra.*, ro.name from `random_schedule` ra inner join `room` ro on ra.room_id = ro.id where ro.name ='" .$roomName. "' and cast(ra.start as date) between '".$startDate."' and '".$endDate."'";
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