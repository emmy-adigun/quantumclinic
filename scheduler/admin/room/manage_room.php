<?php 
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry2 = $conn->query("SELECT * FROM `room` where id = '{$_GET['id']}'");
    foreach($qry2->fetch_all(MYSQLI_ASSOC) as $row){
        $id = $row['ID'];
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
                    <label for="name" class="control-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo isset($name) ? $name: '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">Descripton</label>
                    <input type="description" class="form-control" name="description" value="<?php echo isset($description) ? $description : '' ?>"  required>
                </div>

                <div class="form-group">
                    <label for="description" class="control-label">Service</label>
                <select type="text" class="custom-select" id="service" name="service" required >
                    <option value ="" disabled selected>Select Service</option>
<?php
    
    $qry2 = $conn->query("SELECT * FROM `service` ");
     foreach($qry2->fetch_all(MYSQLI_ASSOC) as $row){
        $ID = $row['ID'];
        $name = $row['service_name'];
        $price = $row['amount'];
        $serviceLength = $row['service_length'];
      


?>

                   
<option  value='<?php echo $ID ?>'><?php echo $name ?></option>
                
                <?php


}


           ?>

                 
                    </select>

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
				url:_base_url_+"classes/Master.php?f=save_room",
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
                        console.log(resp)
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


