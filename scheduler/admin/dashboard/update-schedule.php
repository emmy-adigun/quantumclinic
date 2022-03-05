<?php 
    require_once "../db.php";

    $selectedUserId = $_POST['userId'];
    $selectedEvent = $_POST['selectedEvent'];

    $queryString = "UPDATE random_schedule SET user_id= '{$selectedUserId}' WHERE id = '{$selectedEvent}' ";
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