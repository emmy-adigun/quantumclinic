<?php 
    require_once "../db.php";

    // SET GLOBAL sql_mode = '';

    $events = $_POST['events'];
    // $events = explode (",", $events);
    $events = json_decode($events);
    $roomId = $_POST['roomId'];

    $eventsString = "";

    foreach($events as $singleEvent){
        $eventsString .= " ('$singleEvent->start', '$singleEvent->end', '$roomId'),";
    }

    $prepareString = "INSERT INTO `random_schedule` (start, end, room_id) VALUES" . "$eventsString";
    $queryString = substr_replace($prepareString, "", -1);
    // $queryString = "INSERT INTO `random_schedule` set date = '{$events[0]}', room_id = '{$roomId}'";

    // $qry = $conn->query($queryString);
    // $result = $qry->fetch_assoc();
    $result = mysqli_query($conn, $queryString);
    
    // echo $result;

    header('Content-Type: application/json');
    echo json_encode($result);
    
?>