<?php
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry2 = $conn->query("SELECT * FROM `room` where id = '{$_GET['id']}'");
    foreach($qry2->fetch_all(MYSQLI_ASSOC) as $row){
       $ID = $row['ID'];
       $name = $row['name'];
       $description = $row['description'];

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
    <p><b>Name:</b> <?php echo  $name  ?></p>
    <p><b>Description:</b> <?php echo $description ?></p>

</div>
<div class="modal-footer border-0">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
