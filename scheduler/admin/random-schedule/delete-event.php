<?php 
    require_once "../db.php";

    // SET GLOBAL sql_mode = '';

    $startDate = $_POST['startDate'];
    $roomId = $_POST['roomId'];

    $queryString = "DELETE FROM random_schedule WHERE start = '{$startDate}' AND room_id = '{$roomId}'";
    // $qry = $conn->query($queryString);
    // $result = $qry->fetch_assoc();
    $result = mysqli_query($conn, $queryString);
    
    // echo $result;

    header('Content-Type: application/json');
    
    echo json_encode($result);
?>