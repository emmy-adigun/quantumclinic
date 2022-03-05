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
    padding-top:0 !important;
}
</style>
<div class="container-fluid">
    <form id="comment_form"  class="py-2">
    <div class="row" id="comment">
        <div class="col-6" id="frm-field">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
            <input type="hidden" name="patient_id" value="<?php echo isset($id) ? $id : '' ?>">
        <div>
                <div class="form-group">
                    <label for="comments" class="control-label">Comments</label>
                    <textarea class="form-control" name="comments" id ="comments" required></textarea>
                </div>
        
        </div>
        <div class="form-group d-flex justify-content-end w-100 form-group">
            <button class="btn-primary btn">Submit</button>
            <button class="btn-light btn ml-2" type="button" data-dismiss="modal">Back</button>
        </div>

        <div id="comment_logs">
    	Loading comments...
    <div>
        </form>
    </div>
</div>
<script>
$(function(){
    $('#comment_form').submit(function(e){
        e.preventDefault();
            var _this = $(this)
			 //$('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_comments",
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


