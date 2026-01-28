<script type="text/javascript" src="{$data.base_url}assets/admin/tinymce/js/tinymce/tinymce.min.js"></script>
<div class="rightside">
    <div class="page-head breadpad">
        <ol class="breadcrumb">
            <li>You are here:</li>
            <li><a href="{$data.admin_url}home">Dashboard</a></li>
            <li><a href="{$data.admin_url}emailtemplate">View Email Template</a></li>
            <li class="active">{if $data.action eq 'update'}Update{else}Add{/if} Email Template</li>
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
                        <h3>{if $data.action eq 'update'}Update{else}Add{/if} Email Template</h3>
                    </div>
                    <div class="box-body">
						<form role="form" id="frmemailtemplate" action="{$data.admin_url}emailtemplate/{$data.action}" method="post" enctype="multipart/form-data">
							{if $data.action eq 'update'}
							<input type="hidden" name="iEmailTemplateId" value="{$data.all_emailtemplate.iEmailTemplateId}">
							{/if}
							<div class="form-group">
								<label>Email Title<sup><span style="color:#CC2131">*</span></sup></label>
								<input type="text" class="form-control" id="vEmailTitle" name="vEmailTitle" value="{$data.all_emailtemplate.vEmailTitle}">
							</div>

							<div class="form-group">
								<label>Email Code<sup><span style="color:#CC2131">*</span></sup></label>
								<input type="text" class="form-control" id="vEmailCode" name="vEmailCode" value="{$data.all_emailtemplate.vEmailCode}">
							</div>

							<div class="form-group">
								<label>From Name<sup><span style="color:#CC2131">*</span></sup></label>
								<input type="text" class="form-control" id="vFromName" name="vFromName" value="{$data.all_emailtemplate.vFromName}">
							</div>

					
							<div class="form-group">
								<label>From Email<sup><span style="color:#CC2131">*</span></sup></label>
								<input type="text" class="form-control" id="vFromEmail" name="vFromEmail" value="{$data.all_emailtemplate.vFromEmail}">
							</div>
							

							<div class="form-group">
								<label>Email Subject<sup><span style="color:#CC2131">*</span></sup> </label>
								<input type="text" class="form-control" id="vEmailSubject" name="vEmailSubject" value="{$data.all_emailtemplate.vEmailSubject}">
							</div>

							<div class="form-group">
								<label>Email Message</label>
								<textarea class="form-control" id="tEmailMessage" name="tEmailMessage" cols="10" rows="10">{$data.all_emailtemplate.tEmailMessage}</textarea>
							</div>


							<div class="form-group">
								<label>Email Footer<sup><span style="color:#CC2131">*</span></sup> </label>
								<input type="text" class="form-control" id="vEmailFooter" name="vEmailFooter" value="{$data.all_emailtemplate.vEmailFooter}">
							</div>
							
							<div class="form-group">
								<label>Send Type<sup><span style="color:#CC2131">*</span></sup> </label>
								<select class="form-control" name="eSendType" id="eSendType">
									<option value="" >-- Select Send Type--</option>
									{section name=i loop =$eSendTypes}
									<option value="{$eSendTypes[i]}" {if $eSendTypes[i] eq $data.all_emailtemplate.eSendType} selected {/if} >{$eSendTypes[i]}</option>
									{/section}
								</select>
							</div>
							
							<!-- {if $data.action eq 'update'}
							<div class="form-group">
								<label>Status<sup><span style="color:#CC2131">*</span></sup></label>
								<select class="form-control" name="eStatus" id="eStatus" >
									<option value="">-- Select Status --</option>
									{section name=i loop=$eStatuses}
									<option {if $eStatuses[i] eq $data.all_emailtemplate.eStatus}selected="selected"{/if}value="{$eStatuses[i]}">{$eStatuses[i]}</option>
									{/section}
								</select>
							</div>
							{/if}
							 -->
							{if $data.action eq 'create'}
							<button type="submit" id="btn-save" class="btn btn-primary" onclick="validate();">Save</button>
							{else}
								<button type="submit" id="btn-save" class="btn btn-primary" onclick="validate();">Save Change</button>
							{/if}
							<button type="button" class="btn btn-primary" onclick="returnme();">Cancel</button>
							<span  id="loader" style="float: left;padding-right:15px;display: block;"></span>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{literal}
<script type="text/javascript">

	$(document).ready(function () {
		$('#frmemailtemplate').bootstrapValidator({
		message: 'This value is not valid',
		icon: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			vEmailTitle: {
				validators: {
					notEmpty: { message: 'Email Title is required and can\'t be empty' },
					 
				}
			},
			vEmailCode: {
				validators: {
					notEmpty: { message: 'Email Code is required and can\'t be empty' },
					 
				}
			},
			vFromEmail: {
				validators: {
					notEmpty: {
						message: 'Email address is required and can\'t be empty'
					},
					emailAddress: {
						message: 'The input is not a valid email address'
					}
				}
			},
			vFromName: {
				validators: {
					notEmpty: {
						message: 'FromName is required and can\'t be empty'
					},
					 
				}  
			},
			vEmailFooter: {
				validators: {
					notEmpty: {
						message: 'Email Footer is required and can\'t be empty'
					},
					 
				}  
			},
			vEmailSubject: {
				validators: {
					notEmpty: {
						message: 'Email Subject is required and can\'t be empty'
					},
					 
				}  
			},
			eSendType: {
				validators: {
					notEmpty: {
						message: 'Send Type is required and can\'t be empty'
					},
					 
				}  
			},
			eStatus: {
				validators: {
					notEmpty: {
						message: 'Status is required and can\'t be empty'
					}
				}
			}
		}
	});
});
	function returnme()
	{
		window.location.href = base_url+'emailtemplate';
	}
	tinymce.init({
        selector: "#tEmailMessage",
        height: "250",
        plugins: [ "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | print  media | forecolor backcolor | link | preview | code",
        toolbar2: " ",
        image_advtab: true,
        templates: [{title: 'Test template 1', content: 'Test 1'},{title: 'Test template 2', content: 'Test 2'}]
    });
</script>
{/literal}