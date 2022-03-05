<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->

<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<?php
$qry = $conn->query("SELECT * FROM `schedule_settings`");
$meta = array_column($qry->fetch_all(MYSQLI_ASSOC),'meta_value','meta_field');
?>


<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<!-- <div class="card-header">
			<h5 class="card-title">Clinic Schedule Settings</h5>
		</div> -->
		<div class="card-body">
			<form action="" id="schedule_settings">
				<div id="msg" class="form-group"></div>
                <div class="row">
                <div class="col-lg-6">
                <div class="form-group">
                    <label for="" class="control-label">Weekly Schedule</label><br>
                    <div class="icheck-primary">
                        <input type="checkbox" id="checkboxPrimary1" name="day_schedule[]" value='Sunday'>
                        
                        <label for="checkboxPrimary1">
                            Sunday
                        </label>
                    </div>
                    <div class="icheck-primary">
                        <input type="checkbox" id="checkboxPrimary2" name="day_schedule[]" value='Monday'  >
                        <label for="checkboxPrimary2">
                            Monday
                        </label>
                    </div>
                    <div class="icheck-primary">
                        <input type="checkbox" id="checkboxPrimary3" name="day_schedule[]" value='Tuesday'>
                        <label for="checkboxPrimary3">
                            Tuesday
                        </label>
                    </div>
                    <div class="icheck-primary">
                        <input type="checkbox" id="checkboxPrimary4" name="day_schedule[]" value='Wednesday'>
                        <label for="checkboxPrimary4">
                            Wednesday
                        </label>
                    </div>
                    <div class="icheck-primary">
                        <input type="checkbox" id="checkboxPrimary5" name="day_schedule[]" value='Thursday' >
                        <label for="checkboxPrimary5">
                            Thursday
                        </label>
                    </div>
                    <div class="icheck-primary">
                        <input type="checkbox" id="checkboxPrimary6" name="day_schedule[]" value='Friday'>
                        <label for="checkboxPrimary6">
                            Friday
                        </label>
                    </div>
                    <div class="icheck-primary">
                        <input type="checkbox" id="checkboxPrimary7" name="day_schedule[]" value='Saturday'>
                        <label for="checkboxPrimary7">
                            Saturday
                        </label>
                    </div>
                </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="control-label">Room &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Service</label>
                            <div class="row row-cols-4">
                            <select name="room" id="room" class="form-control" onchange="FetchState(this.value)" style="width: auto;" required>
            <option value="">Select Room</option>
          <?php
          
          
          $query = "SELECT * FROM room Order by name";
          $result = $conn->query($query);
        
            if ($result->num_rows > 0 ) {
               while ($row = $result->fetch_assoc()) {
                echo '<option value='.$row['service_id'].'>'.$row['name'].'</option>';
               }
            }
          ?> 
          </select>

                    
             <span class="col-auto">&nbsp;</span>
                        
                          
          <select name="service" id="state" class="form-control" onchange="FetchCity(this.value)"  required>
            <option>Select Service</option>
          </select>
                       
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="" class="control-label">Start Time &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;End Time</label>
                            <div class="row row-cols-4">
                            <input type="time" class="form-control col" name="start_time" required>
                            <span class="col-auto">&nbsp;</span>
                        
                            <input type="time" class="form-control col" name="end_time"  required>
                        
                            
                        
                        </div>
                        
                    </div>
                    <label for="" class="control-label">Room Condition</label>
                    <select name="room_conditions" id="room_conditions" class="form-control"  style="width: 410px;" required>
            <option value="">Select Condition</option>
            <option value="Clean">Clean</option>
            <option value="Not Clean">Not Clean</option>
        </select>

        <label for="" class="control-label">Time</label>
        <input type="time" class="form-control col" name="schedule_time"  style="width: 410px;" required> 
                        
                </div>

                

                
              
                    
                    
                </div>

                <script type="text/javascript">
  function FetchState(id){
    $('#state').html('');
   // $('#city').html('<option>Select City</option>');
    $.ajax({
      type:'post',
      url:_base_url_+"classes/ajaxdata.php",
      data : { country_id : id},
      success : function(data){
         $('#state').html(data);
      }

    })
  }

  function FetchCity(id){ 
    $('#city').html('');
    $.ajax({
      type:'post',
      url:_base_url_+"classes/ajaxdata.php",
      data : { state_id : id},
      success : function(data){
         $('#city').html(data);
      }

    })
  }

  
</script>
			</form>
		</div>
		<div class="card-footer">
			<div class="col-md-12">
				<div class="row">
					<button class="btn btn-sm btn-primary" form="schedule_settings">Save</button>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
                  
                 

				</div>
			</div>
		</div>

	</div>
</div>
<script>
	
	$(function(){
        $('#schedule_settings').submit(function(e){
            e.preventDefault()
            start_loader()
            $.ajax({
                url:_base_url_+"classes/Master.php?f=save_sched_settings",
                data: $(this).serialize(),
                method:"POST",
                dataType:"json",
                error:err=>{
                    console.log(err)
                    alert_toast("An error occured",'error');
                    end_loader()
                },
                success:function(resp){
                    if(!!resp.status && resp.status == 'success'){
                        location.reload()
                    }else if(!!resp.status && resp.status == 'success' && !!resp.msg){
                        var err_el = $('<div>')
                            err_el.addClass('alert alert-danger')
                            err_el.text(resp.msg)
                            $('#msg').hide().append(err_el).show('slow')
                            $("html, body").animate({ scrollTop: 0 }, "fast");
                            
                    }else{
                        console.log(resp)
                        alert_toast("An error occured",'error');
                    }
                    end_loader();
                }
            })
        })
    })
</script>

<script>
	var indiList;
	$(document).ready(function(){
		$('.view_data').click(function(){
			uni_modal("Schedule Details","schedule_settings/view_schedules.php")
		})
		
		$('#selectAll').change(function(){
			// if($(this).is(":checked") == true){
			// 	$('.invCheck').prop("checked",true)
			// }else{
			// 	$('.invCheck').prop("checked",false)
			// }
			var _this = $(this)
			count = indiList.api().rows().data().length
			for($i = 0 ; $i < count; $i++){
				var node = indiList.api().row($i).node()
				console.log($(node).find('.invCheck'))
				if(_this.is(":checked") == true){
					$(node).find('.invCheck').prop("checked",true)
					$('#selected_opt').show('slow')
				}else{
					$(node).find('.invCheck').prop("checked",false)
					$('#selected_opt').hide('slow')
				}
			}
		})
		
	})
	$(function(){
		indiList = $('#indi-list').dataTable({
			columnDefs:[{
				targets:[0,5],
				orderable:false
			}],
			order:[[1,'asc']],
		});
		// console.log(indiList)
		$(indiList.fnGetNodes()).find('.invCheck').change(function(){
			if($(this).is(":checked")==true){
				if($('#selected_opt').is(':visible') == false){
					$('#selected_opt').show('slow')
				}
				
			}else{
				if($(indiList.fnGetNodes()).find('.invCheck:checked').length <= 0){
					if($('#selected_opt').is(':visible') == true){
						$('#selected_opt').hide('slow')
					}
				}
			}
			if($(indiList.fnGetNodes()).find('.invCheck:checked').length == $(indiList.fnGetNodes()).find('.invCheck').length){
				$('#selectAll').prop('checked',true)
			}else if($(indiList.fnGetNodes()).find('.invCheck:checked').length <= 0){
				$('#selectAll').prop('checked',false)
			}else{
				$('#selectAll').prop('checked',false)
			}
		})

		$('#selected_go').click(function(){
			start_loader();
			var ids = [];
			$(indiList.fnGetNodes()).find('.invCheck:checked').each(function(){
				ids.push($(this).val())
			})
			var _action = $('#w_selected').val()
			$.ajax({
				url:_base_url_+'classes/Master.php?f=multiple_action',
				method:"POST",
				data:{ids:ids,_action:_action},
				dataType:'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.reload();
					}else if(resp.status == 'failed' && !!resp.msg){
						alert_toast(resp.msg,'error');
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})
	})
</script>