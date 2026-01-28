<style type="text/css">
	.setmargin{
		margin-bottom: 15px;
	}
</style>
<div class="rightside">
	<div class="page-head breadpad">
		<ol class="breadcrumb">
			<li>You are here:</li>
			<li><a href="{$data.admin_url}home">Dashboard</a></li>
			<li><a href="{$data.admin_url}modules">Manage Modules</a></li>  
			<li class="active">{if $data.action eq 'update'}Update{else}Add{/if} Modules</li>      
		</ol>
	</div>

	{if $data.message neq ''}
	<div class="span12">
		<div class="alert alert-info">
			{$data.message}
		</div>
	</div>
	{/if}

	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-title">
						<h3>Add Modules</h3>
					</div>
					<div class="box-body">
						{if $data.action eq 'update'}
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab">Edit Modules</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab1">
						{/if}
								<form role="form" id="frmbar" action="{$data.admin_url}modules/{$data.action}" method="post" enctype="multipart/form-data">
									{if $data.action eq 'update'}
										<input type="hidden" name="imodulesId" value='{$data.modules_detail.imodulesId}'>
									{/if}
									
									<div class="form-group">
										<label class="control-label" for="first-name">Modules Name<sup><span style="color:#CC2131">*</span></sup></label>
										<input type="text" class="form-control" id="modulesname" name="modulesname" value="{$data.modules_detail.modulesname}">
									</div>

									<div class="form-group">
										<label class="control-label" for="first-name">Modules<sup><span style="color:#CC2131">*</span></sup></label>
										<input type="text" class="form-control" id="modules" name="modules" value="{$data.modules_detail.modules}">
									</div>

									<div class="form-group">
										<label>Status<sup><span style="color:#CC2131">*</span></sup></label>
										<select class="form-control" name="eStatus" id="eStatus" >
											<option value="">-- Select Status --</option>
											<option value="Active" {if $data.modules_detail['eStatus'] eq 'Active'}selected{/if}>Active</option>
											<option value="Inactive" {if $data.modules_detail['eStatus'] eq 'Inactive'}selected{/if}>Inactive</option>
										</select>
									</div>

									{if $data.action eq 'create'}
									<button type="submit" id="btn-save" class="btn btn-primary">Save</button>
									{else}
										<button type="submit" id="btn-save" class="btn btn-primary">Save Change</button>
									{/if}
									<button type="button" class="btn btn-primary" onclick="returnme();">Cancel</button>
									<span  id="loader" style="float: left;padding-right:15px;display: block;"></span>
								</form>
						{if $data.action eq 'update'}	
							</div>
						</div>
						{/if}			
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{literal}
<script type="text/javascript">
var action='';
	
	function returnme()
	{
		window.location.href = base_url+'modules';
	}
	$(document).ready(function() {

		$('#frmbar').bootstrapValidator({
			message: 'This value is not valid',
			icon: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				modules: {
					validators: {
						notEmpty: { message: 'Modules is required and can\'t be empty' },
						 
					}
				},modulesname: {
					validators: {
						notEmpty: { message: 'Modules Name is required and can\'t be empty' },
						 
					}
				},
				eStatus: {
					validators: {
						notEmpty: {  message: 'Status is required and can\'t be empty'}
					}
				},	
			}
		});
	});

</script>
{/literal}