<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<style>
#selectAll{
	top:0
}
</style>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">List of Service</h3>
		<div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create Room</a>
		</div>
	</div>
	<div class="card-body">
	<div class="container-fluid">
	
			<!-- <div class="row" style="display:none" id="selected_opt">
				<div class="w-100 d-flex">
					<div class="col-2">
						<label for="" class="controllabel"> With Selected:</label>
					</div>
					<div class="col-3">
						<select id="w_selected" class="custom-select select" >
							<option value="pending">Mark as Pending</option>
							<option value="confirmed">Mark as Confirmed</option>
							<option value="cancelled">Mark as Cancelled</option>
							<option value="delete">Delete</option>
						</select>
					</div>
					<div class="col">
						<button class="btn btn-primary" type="button" id="selected_go">Go</button>
					</div>
				</div>
			</div> -->
			<table class="table table-bordered table-stripped" id="indi-list">
				<colgroup>
					<col width="5%">
					<col width="20%">
					<col width="20%">
				</colgroup>
				<thead>
					<tr>
						<td class="text-center"><div class="form-check">
								<input type="checkbox" class="form-check-input" id="selectAll">
							</div></td>
						<th class="text-center">#</th>
						<th>Name</th>
						<th>Description</th>
						<th>Service</th>
				
					</tr>


				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT id,name,description, service_id FROM `room` ");
						while($row = $qry->fetch_assoc()):
						$service = $row['service_id'];
						$idedit = $row['id'];

						$sched_query = $conn->query("SELECT service_name FROM `service` where ID = $service"); 	
						
					?>
					
						<tr>
							<td class="text-center">
							<div class="form-check">
								<input type="checkbox" class="form-check-input invCheck" value="<?php echo $row['id'] ?>">
							</div>
							</td>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo $row['name'] ?></td>
							<td><?php echo $row['description'] ?></td>
							<?php
							foreach($sched_query->fetch_all(MYSQLI_ASSOC) as $row){
								$serviceName= $row['service_name'];
							
							?>
							<td><?php echo $serviceName ?></td>
							<?php
							}
							?>
							<td align="center">
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item view_data" href="javascript:void(0)" data-id="<?php echo $idedit ?>"> View</a>
									<div class="divider"></div>
									<a class="dropdown-item edit_data" href="javascript:void(0)" data-id="<?php echo $idedit ?>"> Edit</a>
									<a class="dropdown-item " href="room/delete.php?id=<?php echo $idedit  ?>"> Delete</a>
				                  </div>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	var indiList;
	$(document).ready(function(){
		$('.view_data').click(function(){
			uni_modal("Room","room/view_details.php?id="+$(this).attr('data-id'))
		})
		$('#create_new').click(function(){
			uni_modal("Room Form","room/manage_room.php",'mid-large')
		})
		$('.edit_data').click(function(){
			uni_modal("Edit Room","room/manage_room.php?id="+$(this).attr('data-id'),'mid-large')
		})	
		
	})
	

	
</script>