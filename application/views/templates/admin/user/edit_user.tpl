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
            <li class="active">Update User</li>      
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
							<li class="active"><a href="#tab1" data-toggle="tab">Edit User</a></li>
							<li><a href="{$data.admin_url}user/licenseassign/{$iUserId}" >User's License</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab1">
								<form role="form" id="frmuser" action="{$data.admin_url}user/{$data.action}" method="post" enctype="multipart/form-data">
									<input type="hidden" name="iUserId" id="iUserId" value='{$iUserId}'>
									<input type="hidden" id="db_admin_email" value='{$data.user_detail.vEmail}'>

									<div class="form-group">
										<label>First Name<sup><span style="color:#CC2131">*</span></sup></label>
										<input type="text" class="form-control" id="vFirstName" name="vFirstName" value="{$data.user_detail.vFirstName}">
									</div>

									<div class="form-group">
										<label>Last Name<sup><span style="color:#CC2131">*</span></sup></label>
										<input type="text" class="form-control" id="vLastName" name="vLastName" value="{$data.user_detail.vLastName}">
									</div>

									<div class="form-group">
										<label>Email ID<sup><span style="color:#CC2131">*</span></sup></label>
										<input type="text" class="form-control" id="vEmail" name="vEmail" value="{$data.user_detail.vEmail}">
									</div>

									{if $data.action eq 'create'}
										<div class="form-group">
											<label>Password<sup><span style="color:#CC2131">*</span></sup></label>
											<input type="password" class="form-control" id="vPassword" name="vPassword" value="{$data.user_detail.vPassword}">
										</div>
									{/if}

									<div class="form-group">
										<label>Mobile No<sup><span style="color:#CC2131">*</span></sup> </label>
										<input type="text" class="form-control" id="iMobileNo" name="iMobileNo" value="{$data.user_detail.iMobileNo}" onkeypress="return checkprise(event);" maxlength="10">
									</div>


									<div class="form-group">
										<label>Date Of Birth </label>
										<input type="text" class="form-control" id="dBirthDate" name="dBirthDate" value="{$data.user_detail.dBirthDate}">
									</div>

									<div class="form-group">
										<label>Gender<sup><span style="color:#CC2131">*</span></sup> </label>
										<select class="form-control" name="eGender" id="eGender" >
											<option value="">-- Select Gender --</option>
											{section name=i loop=$eGender}
											<option {if $eGender[i] eq $data.user_detail['eGender']}selected="selected"{/if}value="{$eGender[i]}">{$eGender[i]}</option>
											{/section}
										</select>
									</div>

									<div class="form-group">
										<label>Role<sup><span style="color:#CC2131">*</span></sup></label>
										<select class="form-control" name="eRole" id="eRole" >
											<option value="">-- Select eRole --</option>
											{section name=i loop=$eRole}
											<option {if $eRole[i] eq $data.user_detail['eRole']}selected="selected"{/if}value="{$eRole[i]}">{$eRole[i]}</option>
											{/section}
										</select>
									</div>

									{if $data.user_detail.vProfilePicture eq ''}
										<div class="form-group">
											<label>Profile Image</label>
											<div class="input-group ">
												<input type="text" class="form-control" value="{$data.user_detail.vProfilePicture}">                  
												<span class="input-group-btn">
												    <span class="btn btn-primary btn-file genre_squareimage_iphone">
												        Browse <input id="vProfilePicture" type="file" accept="image/x-png, image/gif, image/jpeg" name="vProfilePicture" >
												    </span>
												</span>
											</div>
										</div>

									{else}
										<div class="form-group">
			                                <label>Profile Image</label>
			                                <div class="fileupload fileupload-new" data-provides="fileupload">
			                                    <div class="fileupload-new" style="height: 300px;width:300px;">
			                                    <a href="#myModal" class="btn bottom-buffer" data-toggle="modal">
			                                    	<img src="{$data.user_detail.vProfilePicture}" alt="" class="thumbnail"/>
			                                    </a>
			                                    </div>
			                                    <div>
			                                    {if $data.user_detail.imagetype eq 'withouturl' }
			                                        <a href="{$data.base_url}admin/user/deleteimage/{$iUserId}/{$data.user_detail.image_name}/vProfilePicture" class="btn btn-danger" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
			                                    {else}
			                                    	<a href="{$data.base_url}admin/user/deletewithurlimage/{$iUserId}/vProfilePicture" class="btn btn-danger" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
			                                   	{/if}
			                                        
		                                        <a href="#myModal" class="btn bottom-buffer btn-info" data-toggle="modal">
		                                            View
		                                        </a>
			                                    </div>
			                                </div>                                    
			                            </div>
										{/if}


									{if $data.action eq 'update'}
										<div class="form-group">
											<label>Status<sup><span style="color:#CC2131">*</span></sup></label>
											<select class="form-control" name="eStatus" id="eStatus" >
												<option value="">-- Select Status --</option>
												{section name=i loop=$eStatuses}
												<option {if $eStatuses[i] eq $data.user_detail['eStatus']}selected="selected"{/if}value="{$eStatuses[i]}">{$eStatuses[i]}</option>
												{/section}
											</select>
										</div>
									{/if}
									
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
	</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{$data.user_detail.vFirstName} {$data.user_detail.vLastName} </h4>
            </div>
            <div class="modal-body row">
                <div class="col-md-12 img-modal">
                {if $data.user_detail.imagetype eq 'withouturl'}
                    <img src="{$data.user_detail.vProfilePicture}" alt="" controls style="align:center;height:400px;width:550px;"/>
                {else} 
                	<img src="{$data.user_detail.vProfilePicture}" style="align:center;height:400px;width:550px;">
                {/if}
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
	            vFirstName: {
	                validators: {
	                    notEmpty: { message: 'First Name is required and can\'t be empty' },
	                     
	                }
	            },
	            vLastName: {
	                validators: {
	                    notEmpty: { message: 'Last Name is required and can\'t be empty' },
	                     
	                }
	            },
	            vEmail: {
	                validators: {
	                    notEmpty: {
	                        message: 'Email Id is required and can\'t be empty'
	                    },
	                    emailAddress: {
	                        message: 'The input is not a valid email address'
	                    },
	                    remote: {
	                        url: '{/literal}{$data.admin_url}{literal}user/checkEmailExist/'+iUserId,
	                        data: function(validator) {
	                            return {
	                                vEmail: validator.getFieldElements('vEmail').val()
	                            };
	                        },
	                        message: 'Email is Already Exist'
	                    } 
	                }
	            },
	            vPassword: {
	                validators: {
	                    notEmpty: {
	                        message: 'Password is required and can\'t be empty'
	                    },
	                     
	                }  
	            },
	            iMobileNo: {
	                validators: {
	                    notEmpty: {
	                        message: 'Mobile Number is required and can\'t be empty'
	                    },
	                     
	                }  
	            },
	            /*dBirthDate: {
	                validators: {
	                    notEmpty: {
	                        message: 'Birth date is required and can\'t be empty'
	                    },
	                     
	                }  
	            },*/
	            eGender: {
	                validators: {
	                    notEmpty: {
	                        message: 'Gender is required and can\'t be empty'
	                    },
	                     
	                }  
	            },
	            eRole: {
	                validators: {
	                    notEmpty: {
	                        message: 'Role Type is required and can\'t be empty'
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
	    window.location.href = base_url+'user';
	}

	$(document).on('change', '.genre_squareimage_iphone :file', function() {
		var _URL = window.URL || window.webkitURL;
		var file, img;
    	if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {
        		var input = $('.genre_squareimage_iphone :file'),
		        numFiles = input.get(0).files ? input.get(0).files.length : 1,
		        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		      	input.trigger('fileselect', [numFiles, label]);   	
            };
            img.onerror = function() {
                $(".modal-body").html( "<p>not a valid file: "+ file.type+"</p>" );
                $("#ModalForm").modal('show');
                return false;
            };
            img.src = _URL.createObjectURL(file);
        }   	
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
	});
</script>
{/literal}