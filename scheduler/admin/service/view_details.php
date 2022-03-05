<?php
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
   


      $qry2 = $conn->query("SELECT * FROM `service` where id = '{$_GET['id']}'");
     foreach($qry2->fetch_all(MYSQLI_ASSOC) as $row){
        $ID = $row['ID'];
        $type = $row['type'];
        $service = $row['service_name'];
        $name = $row['service_name'];
        $price = $row['amount'];
        $serviceLength = $row['service_length'];
      //  $room = $row['room_id'];


 }
}
?>
<style>
#uni_modal .modal-content>.modal-footer{
    display:none;
}
#uni_modal .modal-body{
    padding-bottom:0 !important;
}
</style>
<div class="container-fluid">
    <p><b>Type:</b> <?php echo $type  ?></p>
    <p><b>Service:</b> <?php echo  $service  ?></p>
    <p><b>Service Length:</b> <?php $serviceLength  ?></p>
    <p><b>Price:</b> <?php echo $price ?></p>
  
    <p><b></b>
      
    </p>
</div>
<div class="modal-footer border-0">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
