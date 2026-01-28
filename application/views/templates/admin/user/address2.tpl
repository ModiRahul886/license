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
            <li class="active">Update Address</li>      
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
							<li><a href="{$data.admin_url}user/booking_invoice/{$iUserId}" >Order History & Invoices</a></li>

							<li><a href="{$data.admin_url}user/address1/{$iUserId}" >Shipping Address</a></li>
							<li class="active"><a href="{$data.admin_url}user/address2/{$iUserId}" >Billing Address</a></li>

						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab1">
								<form role="form" id="frmuser" action="{$data.admin_url}user/{$data.action}" method="post" enctype="multipart/form-data">
									<input type="hidden" name="iUserId" id="iUserId" value='{$iUserId}'>

									<div class="form-group">
										<label>Address1<sup><span style="color:#CC2131">*</span></sup></label>
										<input type="text" class="form-control" id="vAddress1" name="vAddress1" value="{$data.address_detail.vAddress1}">
									</div>

									<div class="form-group">
										<label>Address2<sup><span style="color:#CC2131">*</span></sup></label>
										<input type="text" class="form-control" id="vAddress2" name="vAddress2" value="{$data.address_detail.vAddress2}">
									</div>

									<div class="form-group">
										<label>Address3<sup><span style="color:#CC2131">*</span></sup></label>
										<input type="text" class="form-control" id="vAddress3" name="vAddress3" value="{$data.address_detail.vAddress3}">
									</div>

									<div class="form-group">
										<label>Country<sup><span style="color:#CC2131">*</span></sup> </label>
										<select class="form-control" name="iCountryId" id="iCountryId" data-id="{$data.admin_url}user/get_state">
											<option value="">-- Select Country --</option>
											{section name=i loop=$data.country_detail}
											<option {if $data.address_detail.iCountryId eq $data.country_detail[i]['iCountryId']}selected="selected"{/if} value="{$data.country_detail[i]['iCountryId']}">{$data.country_detail[i]['vCountry']}</option>
											{/section}
										</select>
									</div>

									<div class="form-group">
										<label>Sate<sup><span style="color:#CC2131">*</span></sup></label>
										<select class="form-control" name="iStateId" id="iStateId" data-id="{$data.address_detail.iStateId}">
											<option value="">-- Select State --</option>
											
										</select>
									</div>

									<div class="form-group">
										<label>City<sup><span style="color:#CC2131">*</span></sup> </label>
										<input type="text" class="form-control" id="iCity" name="iCity" value="{$data.address_detail.iCity}">
									</div>

									<div class="form-group">
										<label>Postal Code </label>
										<input type="text" class="form-control" id="vPostalcode" name="vPostalcode" value="{$data.address_detail.vPostalcode}">
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
		$('#dBirthDate').datepicker(); 

        $('#dBirthDate').datepicker().on('changeDate', function(ev){
            $(this).datepicker('hide');           
        }); 	
        
	    $('#frmuser').bootstrapValidator({
	        message: 'This value is not valid',
	        icon: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {
	            vAddress1: {
	                validators: {
	                    notEmpty: { message: 'Address1 is required and can\'t be empty' },
	                     
	                }
	            },
	            iCountryId: {
	                validators: {
	                    notEmpty: { message: 'Country is required and can\'t be empty' },
	                     
	                }
	            },
	            iStateId: {
	                validators: {
	                    notEmpty: { message: 'State is required and can\'t be empty' },
	                     
	                }
	            },
	            iCity: {
	                validators: {
	                    notEmpty: { message: 'City is required and can\'t be empty' },
	                     
	                }
	            },
	            vPostalcode: {
	                validators: {
	                    notEmpty: { message: 'Postalcode is required and can\'t be empty' },
	                     
	                }
	            }
	        }
	    });
    });
	function returnme()
	{
	    window.location.href = base_url+'user';
	}

	$("#iCountryId").on('change',function(){
		$("#iStateId").html('');
		var iCountryId = $(this).val();
		var url = $(this).attr("data-id")+'?id='+iCountryId;		
		$.ajax({
		  	url: url,
		  	type: 'POST',
		  	success: function(value){
		    	var appenddata= "";
                    var jsonData = JSON.parse(value);
					$("#iStateId").append("<option value = ''>-- Select State --</option>");
                    for (var i = 0; i < jsonData.length; i++) {
                        appenddata += "<option value = '" + jsonData[i].iStateId + " '>" + jsonData[i].vState + " </option>";
                    }
                    $("#iStateId").append(appenddata);
		  	}
		});
		

	});

	$(document).ready( function() {
	    $('.genre_squareimage_iphone :file').on('fileselect', function(event, numFiles, label) {
	        var input = $(this).parents('.input-group').find(':text'),
	            log = numFiles > 1 ? numFiles + ' files selected' : label;
	        	
	        if( input.length ) {
	            input.val(log);
	        } else {
	        	input.val(log);
	        }
	        
	    });

	    var country_id = $('#iCountryId').val();
	    var url = $('#iCountryId').attr("data-id")+'?id='+country_id;
	    var state = $('#iStateId').attr("data-id");
	    if(country_id !=''){
	    	$.ajax({
		  	url: url,
		  	type: 'POST',
		  	success: function(value){
		    	var appenddata= "";
                    var jsonData = JSON.parse(value);
                    for (var i = 0; i < jsonData.length; i++) {
                    	if(state === jsonData[i].iStateId)
                    	{
                        	appenddata += "<option selected value = '" + jsonData[i].iStateId + " '>" + jsonData[i].vState + " </option>";
                    	} else {
                        	appenddata += "<option value = '" + jsonData[i].iStateId + " '>" + jsonData[i].vState + " </option>";
                    	}
                    }
                    $("#iStateId").append(appenddata);
		  	}
		});	
	    }
	});
</script>
{/literal}