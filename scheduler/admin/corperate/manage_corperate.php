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
                    <input type="text" class="form-control" name="name" value="<?php echo isset($name ) ? $name  : '' ?>" required>
                </div>
            

                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo isset($email) ? $email: '' ?>"  required>
                </div>


                <div class="form-group">
                    <label for="address" class="control-label">Address</label>
                    <input type="address" class="form-control" name="address" value="<?php echo isset($address) ?  $address  : '' ?>"  required>
                </div>


                <div class="form-group">
                    <label for="price" class="control-label">Price</label>
                    <input type="price" class="form-control" name="price" value="<?php echo isset($price) ? $price : '' ?>"  required>
                </div>


                <div class="form-group">
                    <label for="code" class="control-label">Code</label>
                    <input type="code" class="form-control" name="code" value="<?php echo isset( $code) ?  $code : '' ?>"  required>
                </div>
                <div class="form-group">
                    <label for="staff" class="control-label">Staff</label>
                    <input type="staff" class="form-control" name="staff" value="<?php echo isset($staff) ? $staff: '' ?>"  required>
                </div>

                <div class="form-group">
                    <label for="service" class="control-label">Service</label>
                    <select name="service" id="status" class="custom custom-select">
                    <!-- <option value="0"<?php echo isset($status) && $status == "0" ? "selected": "" ?>>Massage</option>
                    <option value="1"<?php echo isset($status) && $status == "1" ? "selected": "" ?>>Float</option>
                    <option value="2"<?php echo isset($status) && $status == "2" ? "selected": "" ?>>Yoga</option> -->

                     <option >Massage</option>
                    <option >Float</option>
                    <option >Yoga</option> 

                </select>
                </div>

               
              
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
				url:_base_url_+"classes/Master.php?f=save_corperate",
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


