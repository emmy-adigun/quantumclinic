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
		
		<!--<div class="card-tools">-->
		<!--	<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>-->
		<!--</div>-->
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
					<col width="15%">
					<col width="15%">
				
				</colgroup>
				<thead>
					<tr>
						
						<th class="text-center">#</th>
						<th class="text-center">Name</th>
						<th class="text-center">Phone Number</th>
						<th class="text-center">Email</th>
						<th class="text-center">clinician</th>
						<th class="text-center">Service</th>
						<!--<th class="text-center">Service</th>-->
						
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT p.*,a.date_sched,a.id as aid from `patient_list` p inner join `appointments` a on p.id = a.patient_id  order by unix_timestamp(a.date_sched) desc ");
						while($row = $qry->fetch_assoc()):
					?>
					<a  href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">
					
						<tr>
							
							<td class="text-center"><?php echo $i++; ?></td>
							
							<!-- <td><a class="createcomments" href="https://quantum-site.000webhostapp.com/scheduler/admin/appointments/comment_index.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></td> -->
							<td><a class="createcomments" href="https://quantum-site.000webhostapp.com/scheduler/admin/appointments/comment_index.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></td>
							<td><?php echo date("M d,Y h:i A",strtotime($row['date_sched'])) ?></td>
							<td class="text-center">
							<?php echo $row['service_length'] ?>
							</td>
							<td class="text-center">
							<?php echo $row['price'] ?>
							</td>
							<!--<td class="text-center">-->
							<!--<?php echo $row['service'] ?>-->
							<!--</td>-->
							
							<!--<td class="text-center">-->
							
							<!--</td>-->

							<td align="center">
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item view_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"> View</a>
									<div class="divider"></div>
									<a class="dropdown-item edit_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"> Edit</a>

								<a class="dropdown-item " href="appointments/deleteappointment.php?id=<?php echo $row['id']?>"> Delete</a>
				                  </div>

							</td>
						
						</tr>
						</a>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>

</script>