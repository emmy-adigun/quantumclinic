<?php 
    require_once "../db.php";

    $userName = $_POST['userName'];

    $queryString = "SELECT * from `patient_list` us where us.name like'" .'%'.$userName.'%'. "'";
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