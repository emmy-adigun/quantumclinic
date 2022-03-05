<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<style>
#selectAll{
	top:0
}</style>
<form id="darsbaord" action='#' method="post" class="py-2">
<div class="card card-outline card-primary">
	
		<h3 class="card-title">List of Service</h3>
		
	<div class="card-body">
	<div class="container-fluid">
		


<select type="text" class="custom-select" id="namelist" name="service" required  style="width: auto;"  onchange="this.form.submit()">
<option value =""> Select Service</option>
<?php
 $qry2 = $conn->query("SELECT * FROM `service` ");
     foreach($qry2->fetch_all(MYSQLI_ASSOC) as $row){
        $ID = $row['ID'];
        $name = $row['service_name'];
?>
 

 <option   value='<?php echo $ID ?>'><?php echo $name ?></option>
                <?php
     				}
                ?>

         </select>
		
			<table class="table table-bordered table-stripped" id="indi-list">
				<colgroup>
					<col width="5%">
					<col width="20%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center"></th>
						<th>Sunday</th>
						<th>Monday</th>
						<th>Tuesday</th>
						<th>Wednesday</th>
						<th>Thursday</th>
						<th>Friday</th>
						<th>Saturday</th>
					</tr>

				</thead>
				<tbody>


					<?php 
					
if(isset($_POST['service'])){  
    $service = $_POST['service'];
	$qry = $conn->query("SELECT  * FROM `schedule_settings` where service_id = '$service'");
}else{
    $qry = $conn->query("SELECT  * FROM `schedule_settings` ");
}

						
						while($row = $qry->fetch_assoc()):
							
					?>
					
						<tr>
							
							<td class="text-center"><?php echo $row['start_time'] ?></td>
						<?php
					
						if($row['start_time'] == '8:00'){
							?>
								<td style="background-color:#0000FF">Executive Float</td>
							<?php
						} 	if($row['start_time'] == '8:30'){
							?>
							
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
						
					}
						?>

<?php
						if($row['start_time'] == '8:00'){
							?>
								<td style="background-color:#0000FF">Executive Float</td>
							<?php
						}	if($row['start_time'] == '8:30'){
							?>
									<td style="background-color:#0000FF">Executive Float</td>
						<?php
						
					}
						?>


<?php
							if($row['start_time'] == '8:00'){
								?>
									<td style="background-color:#0000FF">Executive Float</td>
								<?php
							}	if($row['start_time'] == '8:30'){
							?>
									<td style="background-color:#0000FF">Executive Float</td>
						<?php
						
					}
						?>



<?php
					
					if($row['start_time'] == '8:00'){
						?>
							<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	if($row['start_time'] == '8:30'){
							?>
									<td style="background-color:#0000FF">Executive Float</td>
						<?php
						
					}
						?>


<?php
						
						if($row['start_time'] == '8:00'){
							?>
								<td style="background-color:#0000FF">Executive Float</td>
							<?php
						}	if($row['start_time'] == '8:30'){
							?>
									<td style="background-color:#0000FF">Executive Float</td>
						<?php
						
					}
						?>

<?php
						
						if($row['start_time'] == '8:00'){
							?>
								<td style="background-color:#0000FF">Executive Float</td>
							<?php
						}	if($row['start_time'] == '8:30'){
							?>
									<td style="background-color:#0000FF">Executive Float</td>
						<?php
						
					}
						?>

<?php
					
					if($row['start_time'] == '8:00'){
						?>
							<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	if($row['start_time'] == '8:30'){
							?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
						
					}
						?>



<?php
					
					if($row['start_time'] == '9:00'){
						?>
						<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>
<?php
					
					if($row['start_time'] == '9:00'){
						?>
						<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '9:00'){
						?>
						<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '9:00'){
						?>
						<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '9:00'){
						?>
						<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '9:00'){
						?>
						<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '9:00'){
						?>
						<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '9:30'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '9:30'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '9:30'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '9:30'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '9:30'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '9:30'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '9:30'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '10:00'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

						
<?php
					
					if($row['start_time'] == '10:00'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '10:00'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '10:00'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '10:00'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '10:00'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '10:00'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '10:30'){
						?>
						<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '10:30'){
						?>
						<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '10:30'){
						?>
						<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '10:30'){
						?>
						<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '10:30'){
						?>
						<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '10:30'){
						?>
						<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '10:30'){
						?>
						<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>
						
						<?php
					
					if($row['start_time'] == '11:00'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '11:00'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
							<?php
					
					if($row['start_time'] == '11:00'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
							<?php
					
					if($row['start_time'] == '11:00'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
							<?php
					
					if($row['start_time'] == '11:00'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
							<?php
					
					if($row['start_time'] == '11:00'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
							<?php
					
					if($row['start_time'] == '11:00'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '11:30'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
				<?php
					
					if($row['start_time'] == '11:30'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						
						<?php
					
					if($row['start_time'] == '11:30'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '11:30'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '11:30'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '11:30'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '11:30'){
						?>
						<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '12:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>



<?php
					
					if($row['start_time'] == '12:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '12:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '12:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '12:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '12:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>


<?php
					
					if($row['start_time'] == '12:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '12:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '12:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '12:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '12:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '12:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '12:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '12:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '13:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>


						<?php
					
					if($row['start_time'] == '13:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '13:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '13:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '13:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '13:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '13:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						
						<?php
					
					if($row['start_time'] == '13:30'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>
							<?php
					
					if($row['start_time'] == '13:30'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '13:30'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '13:30'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '13:30'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '13:30'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '13:30'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '14:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
<?php
					
					if($row['start_time'] == '14:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '14:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '14:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '14:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '14:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '14:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>


<?php
					
					if($row['start_time'] == '14:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '14:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '14:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '14:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '14:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '14:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '14:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>


<?php
					
					if($row['start_time'] == '15:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '15:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '15:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '15:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '15:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '15:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '15:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>



<?php
					
					if($row['start_time'] == '15:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '15:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>


<?php
					
					if($row['start_time'] == '15:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>


<?php
					
					if($row['start_time'] == '15:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>


<?php
					
					if($row['start_time'] == '15:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>


<?php
					
					if($row['start_time'] == '15:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>


<?php
					
					if($row['start_time'] == '15:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>



<?php
					
					if($row['start_time'] == '16:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '16:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '16:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '16:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '16:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '16:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '16:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>


<?php
					
					if($row['start_time'] == '16:30'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>


<?php
					
					if($row['start_time'] == '16:30'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '16:30'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '16:30'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '16:30'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '16:30'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '16:30'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '17:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '17:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '17:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '17:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '17:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '17:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '17:00'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '17:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '17:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '17:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '17:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '17:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '17:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>
						<?php
					
					if($row['start_time'] == '17:30'){
						?>
								<td style="background-color:#0000FF">Executive Float</td>
						<?php
					}	
						?>

<?php
					
					if($row['start_time'] == '18:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>


<?php
					
					if($row['start_time'] == '18:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>


<?php
					
					if($row['start_time'] == '18:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>


<?php
					
					if($row['start_time'] == '18:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>


<?php
					
					if($row['start_time'] == '18:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>


<?php
					
					if($row['start_time'] == '18:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>


<?php
					
					if($row['start_time'] == '18:00'){
						?>
							<td style="background-color:#B7FFBF">Clean</td>
						<?php
					}	
						?>

					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
				</form>
