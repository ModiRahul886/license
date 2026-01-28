<style type="text/css">
	.numbermobi{
		background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
	    border: 0 none;
	    float: right;
	    margin: 8px 49px 0;
	    width: 83%;
	    padding: none;

	}
	.mobi_country{
		background: #ffffff none repeat scroll 0 0;
	    border: 1px solid #D8DDE5;
	    float: left;
	    height: 35px;
	    padding: 0 2%;
	    width: 100%;
	}
	.codenumber{
		float: left;
	    padding: 12px 0 0;
	    text-align: left;
	    width: 5%;
	    border-right: 1px solid #D8DDE5;
	}
</style>

<div class="rightside">
    <div class="page-head breadpad">
        <ol class="breadcrumb">
            <li>You are here:</li>
            <li><a href="{$data.admin_url}home">Dashboard</a></li>
            <li><a href="{$data.admin_url}user">View Users</a></li>  
            <li class="active">License Assign</li>
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
                        <h3>Manage User</h3>
                    </div>

                    <div class="box-body">
                    	<ul class="nav nav-tabs">
							<li><a href="{$data.admin_url}user/update/{$iUserId}">Edit User</a></li>
							<li class="active"><a href="{$data.admin_url}user/licenseassign/{$iUserId}">License Assign</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab1">
								<form role="form" id="frmuser" action="{$data.admin_url}user/{$data.action}" method="post" enctype="multipart/form-data">
									<input type="hidden" name="iUserId" id="iUserId" value='{$iUserId}'>

									<div class="form-group">
										<label>License Key<sup><span style="color:#CC2131">*</span></sup> </label>
										<select class="form-control" name="ilicenseId" id="ilicenseId">
											<option value="">-- Select License Key --</option>
											{section name=i loop=$data.allLicense}
											<option {if $data.address_detail.ilicenseId eq $data.allLicense[i]['ilicenseId']}selected="selected"{/if} value="{$data.allLicense[i]['ilicenseId']}">{$data.allLicense[i]['license_key']}</option>
											{/section}
										</select>
									</div>

									<button type="submit" id="btn-save" class="btn btn-primary" onclick="validate();">Save Change</button>
									<button type="button" class="btn btn-primary" onclick="returnme();">Cancel</button>
									<span  id="loader" style="float: left;padding-right:15px;display: block;"></span>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{literal}
<script type="text/javascript">
var iUserId = "{/literal}{$iUserId}{literal}";

	$(document).ready(function () {
		$('#frmuser').bootstrapValidator({
	        message: 'This value is not valid',
	        icon: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {
	            ilicenseId: {
	                validators: {
	                    notEmpty: { message: 'License Key is required and can\'t be empty' },
	                     
	                }
	            }
	        }
	    });
    });
	function returnme()
	{
	    window.location.href = base_url+'user';
	}
</script>
{/literal}