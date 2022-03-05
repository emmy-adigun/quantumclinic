<?php 
    require_once "../db.php";

    // SET GLOBAL sql_mode = '';

    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $roomId = $_POST['roomId'];

    $queryString = "INSERT INTO `random_schedule` set start = '{$startDate}', end = '{$endDate}', room_id = '{$roomId}'";
    // $qry = $conn->query($queryString);
    // $result = $qry->fetch_assoc();
    $result = mysqli_query($conn, $queryString);
    
    // echo $result;

    header('Content-Type: application/json');
    
    echo json_encode($result);
?>