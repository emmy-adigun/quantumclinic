<?php 
    require_once "../db.php";

    $eventId = $_POST['eventId'];
    $endDate = $_POST['endDate'];

    $queryString = "UPDATE random_schedule SET end = '{$endDate}' WHERE id = '{$eventId}' ";
    $result = mysqli_query($conn, $queryString);
    
    // echo $result;

    header('Content-Type: application/json');
    
    echo json_encode($result);
    // $resultArray = $qry->fetch_assoc();

    // $newArray = [];
    // while($row = $resultArray):
    //     $newArray.push($row);
    // endwhile;

    // header('Content-Type: application/json');
    
    // echo json_encode($qry);
?>