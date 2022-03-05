<?php 
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
  $id = $_GET['id'];
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
				<colgroup>
					<col width="5%">
					<col width="5%">
					<col width="20%">
				</colgroup>
				<!-- <thead>
					<tr>
						
						<th class="text-center">#</th>
						<th class="text-center">Comments</th>
						<th class="text-center">Date</th>
					</tr>
				</thead> -->
				<tbody>
					<?php 												
					$i = 1;
					$qry = $conn->query("SELECT *  FROM `comments` where patient_id = '$id'");
						while($row = $qry->fetch_assoc()):
					  
					?>
					
					
							<p> <img src="http://localhost/scheduler/uploads/1630598640_male.png" width="40" height="40" class="rounded-circle mr-3">
							<p ><?php echo $row['comments_text'] ?></p>
							<p><?php echo $row['date_time'] ?></p>
						
					<?php endwhile; ?>
				</tbody>
			
		</div>
  
</div>
<div class="modal-footer border-0">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
