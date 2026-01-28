<script src="{$data.admin_js_path}myprofile.js"></script>
<div class="row-fluid">
    <div class="navbar">
        <div class="navbar-inner">
            {$data.breadcrumb}
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">My Profile</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="save_myprofile" action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="data[iAdminId]" value="{$data.user.iAdminId}">
					<input type="hidden" id="vProfileImage1" name="vProfileImage1" value="{$data.user.vProfileImage}">
					<input type="hidden" id="db_user_email" name="db_user_email" value="{$data.user.vEmail}">
					<fieldset>
					<legend>Edit My Profile</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">First Name<sup><span style="color:#CC2131">*</span></sup></label>
							<div class="controls">
								<input type="text" class="span3" id="vFirstName" name="data[vFirstName]" value="{$data.user.vFirstName}">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="typeahead">Last Name<sup><span style="color:#CC2131">*</span></sup></label>
							<div class="controls">
								<input type="text" class="span3" id="vLastName" name="data[vLastName]" value="{$data.user.vLastName}">
							</div>
						</div>
					
						<div class="control-group">
							<label class="control-label" for="typeahead">Email ID<sup><span style="color:#CC2131">*</span></sup></label>
							<div class="controls">
								<input type="text" class="span3" id="vEmail" name="data[vEmail]" value="{$data.user.vEmail}">
							</div>
						</div>
						<div class="control-group">
						    <label class="control-label">Status</label>
							<div class="controls">
							    <select class="input-large" name="data[eStatus]">
							       {section name=i loop =$eStatuses}
									<option value="{$eStatuses[i]}" {if $eStatuses[i] eq $data.user.eStatus} selected {/if} >{$eStatuses[i]}</option>
								    {/section}
							    </select>
							</div>
						</div>
						<div class="form-actions">
							<button type="button" id="btn-save" class="btn bottom-buffer" onclick="return check_user_email();">Save Change</button>
							<button type="button" class="btn bottom-buffer" onclick="returnme();">Cancel</button>
                        </div>
                    </fieldset>
		</form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModalpostvi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Profile Image</h4>
			</div>
			<div class="modal-body">
				<img src="{$data.base_upload}user/{$data.user.iAdminId}/{$data.user.vProfileImage}" />
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="myModaldelpostvi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Delete</h4>
			</div>
			<div class="modal-body">
				Are you sure to delete the Icon?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn bottom-buffer" data-dismiss="modal">No</button>
                <!--<a href="{$data.admin_url}user/deleteicon?id={$data.user.iAdminId}" class=""><button type="button" class="btn bottom-buffer" data-dismiss="modal">Yes</button></a>-->
		 <a style="float:right;" href="{$data.admin_url}myprofile/deleteicon?id={$data.user.iAdminId}" class="btn bottom-buffer">Yes</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
{literal}
<script>
$(":file").filestyle({icon: false});
</script>
{/literal}