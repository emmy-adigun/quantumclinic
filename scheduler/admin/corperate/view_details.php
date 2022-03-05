<?php
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry2 = $conn->query("SELECT * FROM `corperate` where id = '{$_GET['id']}'");
    foreach($qry2->fetch_all(MYSQLI_ASSOC) as $row){
       $id= $row['ID'];
       $name = $row['name'];
       $email = $row['email'];
       $address = $row['address'];
       $price = $row['price'];
       $code = $row['code'];
       $staff = $row['staff'];
       $service = $row['service'];

      

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
    <p><b>Name:</b> <?php echo $name ?></p>
    <p><b> Email:</b> <?php echo $email ?></p>
    <p><b>Address:</b> <?php echo $address ?></p>
    <p><b>Price:</b> <?php echo $price ?></p>
    <p><b>Code:</b> <?php echo $code ?></p>
    <p><b>Staff:</b> <?php echo $staff ?></p>
    <p><b>Service:</b> <?php echo $service ?></p>

</div>
<div class="modal-footer border-0">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
