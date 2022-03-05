<?php 
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
   
    $qry2 = $conn->query("SELECT p.*,a.date_sched,a.id as aid from `patient_list` p inner join `appointments` a on p.id = '{$_GET['id']}'   order by unix_timestamp(a.date_sched) desc ");

    
    foreach($qry2->fetch_all(MYSQLI_ASSOC) as $row){
    $id = $row['aid'];
       $name = $row['name'];
       $servicelength = $row['service_length'];
       $price1 = $row['price'];
       $service = $row['service'];
       $email = $row['email'];
       $date_sched = $row['date_sched'];

      
    }
}
?>
<style>
#uni_modal .modal-content>.modal-footer{
    display:none;
}
#uni_modal .modal-body{
    padding-top:0 !important;
}
</style>
<div class="container-fluid">
    <form id="appointment_form" class="py-2">
    <div class="row" id="appointment">
        <div class="col-6" id="frm-field">
            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
            <input type="hidden" name="patient_id" value="<?php echo isset($id) ? $id : '' ?>">
                <div class="form-group">
                    <label for="name" class="control-label">Fullname</label>
                    <input type="text" class="form-control" name="name" value="<?php echo isset($name) ? $name : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo isset($email) ? $email : '' ?>"  required>
                </div>
               

                    <div class="form-group">
                    <label for="service" class="control-label">Service</label>
                    <select type="text" class="custom-select" id="namelist" name="service" required  onchange="updateinput(this)">
                    <option value ="" disabled selected>Select</option>
<?php
                    $qry2 = $conn->query("SELECT * FROM `service` ");
     foreach($qry2->fetch_all(MYSQLI_ASSOC) as $row){
        $ID = $row['ID'];
        $name = $row['service_name'];
        $price = $row['amount'];
        $serviceLength = $row['service_length'];
       // $schedule = $row['schedule'];


?>

                   
<option data-schedule = '<?php echo $schedule ?>' data-email='<?php echo $price ?>' data-name='<?php echo $serviceLength ?>' value='<?php echo $name ?>'><?php echo $name ?></option>
                
                <?php

                }
              ?>
         
        </select>

    </script>
                    
                </div>

                <script type="text/javascript">
			// function update() {
			// 	var select = document.getElementById('service');
			// 	var option = select.options[select.selectedIndex];
            // 	var values =document.getElementById('service_length').value = option.value;
            //     document.getElementById('price').value = option.value;
				
			// }

			// update();

            function updateinput(e) {
  var selectedOption = e.options[e.selectedIndex];
  document.getElementById('service_length').value = selectedOption.getAttribute('data-name');
  document.getElementById('price').value = selectedOption.getAttribute('data-email');
  document.getElementById('schedule').value = selectedOption.getAttribute('data-schedule');


}
		</script>
       
   
                <div class="form-group">
                    <label for="service_length" class="control-label">Service Length</label>
         
                    <input type="text" class="form-control" id="service_length" name="service_length" value="<?php echo isset($servicelength) ? $servicelength : '' ?>"  required>
       
                </div>

                
                <div class="form-group">
                    <label for="price" class="control-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="<?php echo isset($price1) ? $price1 : '' ?>"  required>
                </div>

            
        </div>
        <div class="col-6">
                
                <div class="form-group">
                    <label for="address" class="control-label">Address</label>
                    <textarea class="form-control" name="address" rows="3" required><?php echo isset($patient['address']) ? $patient['address'] : '' ?></textarea>
                </div>
          

            <div class="form-group">
                <label for="zipcode" class="control-label">Zip Code</label>
                <input class="form-control" name="zipcode"  required><?php echo isset($zipcode)? $zipcode : "" ?>
            </div>
            <div class="form-group">
                    <label for="organization" class="control-label">Organization</label>
                    <input type="text" class="form-control" name="organization" value="<?php echo isset($patient['organization']) ? $patient['organization'] : '' ?>"  required>
                </div>
                <div class="form-group">
                    <label for="gender" class="control-label">Gender</label>
                    <select type="text" class="custom-select" name="gender" required>
                    <option <?php echo isset($patient['gender']) && $patient['gender'] == "Male" ? "selected": "" ?>>Male</option>
                    <option <?php echo isset($patient['gender']) && $patient['gender'] == "Female" ? "selected": "" ?>>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dob" class="control-label">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" value="<?php echo isset($patient['dob']) ? $patient['dob'] : '' ?>"  required>
                </div>
         
            <!-- <div class="form-group">
                <label for="date_sched" class="control-label">Appointment</label>
                <input type="datetime-local" class="form-control" name="date_sched" value="<?php echo isset($date_sched)? date("Y-m-d\TH:i",strtotime($date_sched)) : "" ?>" required>
            </div> -->


    <!-- <div class="form-group">                
        <select type="datetime-local" class="custom-select" name="date_sched" required>
        <?php
        $qry2 = $conn->query("SELECT * FROM `schedule_settings` ");
         foreach($qry2->fetch_all(MYSQLI_ASSOC) as $row){
    
        $schedule = $row['schedule_time'];
            ?> 
            <option><?php echo isset($schedule)? date("Y-m-d\TH:i",strtotime($schedule)) : "" ?></option>
                    
            <?php
                }
            ?>
            </select>
    </div>   -->
            
            
        </div>
        <div class="form-group d-flex justify-content-end w-100 form-group">
            <button class="btn-primary btn">Submit</button>
            <button class="btn-light btn ml-2" type="button" data-dismiss="modal">Cancel</button>
        </div>
        </form>
    </div>
</div>
<script>
$(function(){
    $('#appointment_form').submit(function(e){
        e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_appointment",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
                       location.reload()
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").animate({ scrollTop: $('#uni_modal').offset().top }, "fast");
                    }else{
						alert_toast("An error occured",'error');
                        console.log("Oyisco"+resp)
					}
						end_loader();
				}
			})
    })
    $('#uni_modal').on('hidden.bs.modal', function (e) {
        if($('#appointment_form').length <= 0)
            location.reload()
    })
})
</script>


