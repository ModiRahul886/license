<div class="rightside">
	<div class="page-head breadpad">
	<!-- <h1>User</h1> -->
		<ol class="breadcrumb">
			<li>You are here:</li>
			<li><a href="{$data.admin_url}home">Dashboard</a></li>
			<li class="active">Edit Settings</li>    
		</ol>
	</div>
	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-title">
						<h3>Configurations</h3>
					</div><!-- /.box-title -->	
					<div class="box-body">
						{if $data.message neq ''}
							<div class="span12">
								<div class="alert alert-info">
									{$data.message}
								</div>
							</div>
						{/if}	
						<div style='clear:both;'></div>
						<form  id="frmcategory" action="{$data.admin_url}configuration/update" method="post" enctype="multipart/form-data" role="form">
							<input type="hidden" name="data[iSettingId]" value="{$data.configurations.iSettingId}">
							{section name=i loop=$db_config}
							<div class="form-group">
								<label>
									<span>{if  $db_config[i]->tDescription eq 'Fb Appsec' || $db_config[i]->tDescription eq 'Fb Appid'||$db_config[i]->tDescription eq 'Facebook Link' || $db_config[i]->tDescription eq 'Pinterest Link' || $db_config[i]->tDescription eq 'Twitter Link'}{''}{else}{/if}</span> {$db_config[i]->tDescription}
								</label>
								{if $db_config[i]->tDescription eq 'Admin Email Id'||$db_config[i]->tDescription eq 'Mail Footer' ||$db_config[i]->tDescription eq 'Company Name'}
									<input type="text"  id="{$db_config[i]->vName}" name="Data[{$db_config[i]->vName}]" class="span2 form-control" value="{$db_config[i]->vValue}" title="{$db_config[i]->tDescription}"/>
								
								{else if $db_config[i]->tDescription eq 'Site Name'}
									<input type="text"  id="{$db_config[i]->vName}" name="Data[{$db_config[i]->vName}]" class="span2 form-control" value="{$db_config[i]->vValue}" title="{$db_config[i]->tDescription}" disabled="disable;" />
									
								{else if $db_config[i]->tDescription eq 'Site Url'}
									<input type="text"  id="{$db_config[i]->vName}" name="Data[{$db_config[i]->vName}]" class="span2 form-control" value="{$data.Site_Url}" title="{$db_config[i]->tDescription}" disabled="disable;" />
									
								{else if $db_config[i]->tDescription eq 'Fb Appsec' || $db_config[i]->tDescription eq 'Fb Appid'||$db_config[i]->tDescription eq 'Facebook Link' || $db_config[i]->tDescription eq 'Pinterest Link' || $db_config[i]->tDescription eq 'Twitter Link' || $db_config[i]->tDescription eq 'Instagram link' || $db_config[i]->tDescription eq 'Twitter App Id' || $db_config[i]->tDescription eq 'Twitter Secret Key' || $db_config[i]->tDescription eq 'Instagram (Client Secret)' || $db_config[i]->tDescription eq 'Instagram (Client Id)' ||$db_config[i]->tDescription eq 'Payment Error message' || $db_config[i]->tDescription eq 'PayPal API User Name' || $db_config[i]->tDescription eq 'Paypal API Password' || $db_config[i]->tDescription eq 'Paypal API Signature' || $db_config[i]->tDescription eq 'Payment Success message' || $db_config[i]->tDescription eq '1 Month Vendor Subscription Price' || $db_config[i]->tDescription eq '3 Month Vendor Subscription Price' || $db_config[i]->tDescription eq '6 Month Vendor Subscription Price' || $db_config[i]->tDescription eq '12 Month Vendor Subscription Price' || $db_config[i]->tDescription eq 'Vendor Success Message'||$db_config[i]->tDescription eq 'Owner Paypal Email Account'||$db_config[i]->tDescription eq 'Site Owner Commission (%)' }
									<input type="text"  id="{$db_config[i]->vName}" name="Data[{$db_config[i]->vName}]" class="span2 form-control" value="{$db_config[i]->vValue}"  title="{$db_config[i]->tDescription}"/>
									
								{else if $db_config[i]->tDescription eq 'Footer About Us'}
									<textarea class="span2 form-control" id="{$db_config[i]->vName}" name="Data[{$db_config[i]->vName}]" title="{$db_config[i]->tDescription}" >{$db_config[i]->vValue}</textarea>
								
								{else if $db_config[i]->tDescription eq 'Transaction Mode'}
										<select class="input-large" name="Data[{$db_config[i]->vName}]" id="{$db_config[i]->vName}"  title="{$db_config[i]->tDescription}" class="span2 form-control">
											<option value="Yes"{if $db_config[i]->vValue eq 'Yes'}selected="selected"{/if}>Yes</option>
											<option value="No"{if $db_config[i]->vValue eq 'No'}selected="selected"{/if}>No</option>
										</select>
										<div style="clear:both;color:#FF0000;font-size:12px;padding-left:50px;">[ Yes for Live, No for Testing ]</div>
												
								{else}
									<input type="text"  id="{$db_config[i]->vName}" name="Data[{$db_config[i]->vName}]" class="span2 form-control" value="{$db_config[i]->vValue}" title="{$db_config[i]->tDescription}"/>
								
								{/if}

							</div>
							{/section}
							<div class="form-group">
								<button type="submit" id="btn-save" class="btn btn-primary" >Edit Configurations</button>
								<button type="button" class="btn btn-primary" onclick="returnme();">Cancel</button>
							</div>
						</form>				
					</div>
				</div>	
			</div>
		</div>
	</div>	
</div>	

{literal}
<script type="text/javascript">
	function returnme()
	{
		window.location.href = base_url;
	}

	$(document).ready(function (){

		$("#frmcategory").bootstrapValidator({
			message: 'This value is not valid',
	        icon: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {
	            'Data[EMAIL_ADMIN]': {
	                validators: {
	                    notEmpty: {
	                        message: 'Admin Email Id is required and can\'t be empty'
	                    },
	                    emailAddress: {
	                        message: 'The input is not a valid email address'
	                    }, 
	                }
	            }
	        }
		});
	});

</script>
{/literal}