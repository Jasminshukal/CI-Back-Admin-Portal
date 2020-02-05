<div class="portlet light bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-key font-blue-sharp"></i>
			<span class="caption-subject font-blue-sharp bold uppercase">Change Password</span>
		</div>
	</div>
	
	<div class="portlet-body form">
		<form method="POST" class="form-horizontal" id = "frm_change_password" >
			<?php if( isset($msg_error) ) { ?>
				<div class="alert alert-danger alert-dismissable">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				    <strong> <?=$msg_error?> </strong>
				</div>
				<br>
			<?php } ?>

			<?php if( isset($msg_success) ) { ?>
				<div class="alert alert-success alert-dismissable">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				    <strong> <?=$msg_success?> </strong>
				</div>
				<br>
			<?php }
			//print_r($this->session->userdata());
			?>


			<div class="form-group">
				<label class="col-lg-2 control-label">Current Password</label>
                <div class="col-lg-10">
					<input class="form-control" type="password" name="old_password" placeholder="Current Password" id = "old_password" data-msg-required ="Enter Current Password" >
                </div>
			</div>
			
			<div class="form-group">
				<label class="col-lg-2 control-label">New Password</label>
                <div class="col-lg-10">
					<input class="form-control" type="password" name="new_password" placeholder="New Password" id="new_password" data-msg-required ="Enter New Password" >
                </div>
			</div>
			
			<div class="form-group">
				<label class="col-lg-2 control-label">Confirm New Password</label>
                	<div class="col-lg-10">
						<input class="form-control" type="password" name="new_conf_password" placeholder="Confirm New Password" id= "new_conf_password" data-msg-required ="Enter New Confirm Password" data-msg-equalTo = "Password does not match the new password" >
                    </div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<input class="btn <?=$this->settings['success_color'];?>" type="submit" name="change_pwd" value="Change Password" />
				</div>	
			</div>
	</div><!-- panel body -->
</div>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function()
{

    $("#frm_change_password").validate({
        rules: {
            old_password: {
                required: true
            },
            new_password: {
                required: true
            },
            new_conf_password: {
                required: true,
                equalTo: "#new_password"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});
</script>
