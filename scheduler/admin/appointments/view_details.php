<?php
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    

             $i = 1;
        $qry2 = $conn->query("SELECT p.*,a.date_sched,a.id as aid from `patient_list` p inner join `appointments` a on p.id = {$_GET['id']}  order by unix_timestamp(a.date_sched) desc ");
        
    foreach($qry2->fetch_all(MYSQLI_ASSOC) as $row){
     $id = $row['id'];
    $name = $row['name'];
       $email = $row['email'];
       $clinician = $row['clinician'];
       $address = $row['address'];
       $phonenumber = $row['phonenumber'];

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
    <p><b>Name:</b> <?php echo $name   ?></p>
    <p><b>Phone Number :</b> <?php echo $phonenumber ?></p>
    
    <p><b>Email :</b> <?php echo $email ?></p>
    <p><b>clinician:</b> <?php echo $clinician  ?></p>
  

</div>
<div class="modal-footer border-0">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
