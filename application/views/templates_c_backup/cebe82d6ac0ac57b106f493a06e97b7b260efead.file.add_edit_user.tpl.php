<?php /* Smarty version Smarty-3.1.11, created on 2023-04-21 23:50:20
         compiled from "application/views/templates/admin/user/add_edit_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19795934826442becc8800b9-06785911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cebe82d6ac0ac57b106f493a06e97b7b260efead' => 
    array (
      0 => 'application/views/templates/admin/user/add_edit_user.tpl',
      1 => 1642860127,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19795934826442becc8800b9-06785911',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'iUserId' => 0,
    'eGender' => 0,
    'eRole' => 0,
    'eStatuses' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_6442becc89a944_69082068',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6442becc89a944_69082068')) {function content_6442becc89a944_69082068($_smarty_tpl) {?><style type="text/css">
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
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
home">Dashboard</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
user">View Users</a></li>  
            <li class="active"><?php if ($_smarty_tpl->tpl_vars['data']->value['action']=='update'){?>Update<?php }else{ ?>Add<?php }?> User</li>      
        </ol>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
    <div class="span12">
        <div class="alert alert-info">
            <?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

        </div>
    </div>
    <?php }?>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-title">
                        <h3>Manage User</h3>
                    </div>
                    <div class="box-body">

						<form role="form" id="frmuser" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
user/<?php echo $_smarty_tpl->tpl_vars['data']->value['action'];?>
" method="post" enctype="multipart/form-data">
							<?php if ($_smarty_tpl->tpl_vars['data']->value['action']=='update'){?>
								<input type="hidden" name="iUserId" id="iUserId" value='<?php echo $_smarty_tpl->tpl_vars['iUserId']->value;?>
'>
							<?php }?>
							<input type="hidden" id="db_admin_email" value='<?php echo $_smarty_tpl->tpl_vars['data']->value['user_detail']['vEmail'];?>
'>

							<div class="form-group">
								<label>First Name<sup><span style="color:#CC2131">*</span></sup></label>
								<input type="text" class="form-control" id="vFirstName" name="vFirstName" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_detail']['vFirstName'];?>
">
							</div>

							<div class="form-group">
								<label>Last Name<sup><span style="color:#CC2131">*</span></sup></label>
								<input type="text" class="form-control" id="vLastName" name="vLastName" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_detail']['vLastName'];?>
">
							</div>

							<div class="form-group">
								<label>Email ID<sup><span style="color:#CC2131">*</span></sup></label>
								<input type="text" class="form-control" id="vEmail" name="vEmail" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_detail']['vEmail'];?>
">
							</div>

							<?php if ($_smarty_tpl->tpl_vars['data']->value['action']=='create'){?>
								<div class="form-group">
									<label>Password<sup><span style="color:#CC2131">*</span></sup></label>
									<input type="password" class="form-control" id="vPassword" name="vPassword" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_detail']['vPassword'];?>
">
								</div>
							<?php }?>

							<div class="form-group">
								<label>Mobile No<sup><span style="color:#CC2131">*</span></sup> </label>
								<input type="text" class="form-control" id="iMobileNo" name="iMobileNo" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_detail']['iMobileNo'];?>
" onkeypress="return checkprise(event);" maxlength="10">
							</div>

							<div class="form-group">
								<label>Date Of Birth </label>
								<input type="text" class="form-control" id="dBirthDate" name="dBirthDate" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_detail']['dBirthDate'];?>
">
							</div>

							<div class="form-group">
								<label>Gender<sup><span style="color:#CC2131">*</span></sup> </label>
								<select class="form-control" name="eGender" id="eGender" >
									<option value="">-- Select Gender --</option>
									<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['eGender']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
									<option <?php if ($_smarty_tpl->tpl_vars['eGender']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]==$_smarty_tpl->tpl_vars['data']->value['user_detail']['eGender']){?>selected="selected"<?php }?>value="<?php echo $_smarty_tpl->tpl_vars['eGender']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
"><?php echo $_smarty_tpl->tpl_vars['eGender']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</option>
									<?php endfor; endif; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Role<sup><span style="color:#CC2131">*</span></sup></label>
								<select class="form-control" name="eRole" id="eRole" >
									<option value="">-- Select eRole --</option>
									<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['eRole']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
									<option <?php if ($_smarty_tpl->tpl_vars['eRole']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]==$_smarty_tpl->tpl_vars['data']->value['user_detail']['eRole']){?>selected="selected"<?php }?>value="<?php echo $_smarty_tpl->tpl_vars['eRole']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
"><?php echo $_smarty_tpl->tpl_vars['eRole']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</option>
									<?php endfor; endif; ?>
								</select>
							</div>

							<?php if ($_smarty_tpl->tpl_vars['data']->value['user_detail']['vProfilePicture']==''){?>
								<div class="form-group">
									<label>Profile Image</label>
									<div class="input-group ">
										<input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_detail']['vProfilePicture'];?>
">                  
										<span class="input-group-btn">
										    <span class="btn btn-primary btn-file genre_squareimage_iphone">
										        Browse <input id="vProfilePicture" type="file" accept="image/x-png, image/gif, image/jpeg" name="vProfilePicture" >
										    </span>
										</span>
									</div>
								</div>

							<?php }else{ ?>
								<div class="form-group">
	                                <label>Profile Image</label>
	                                <div class="fileupload fileupload-new" data-provides="fileupload">
	                                    <div class="fileupload-new" style="height: 300px;width:300px;">
	                                    <a href="#myModal" class="btn bottom-buffer" data-toggle="modal">
	                                        <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
uploads/user/<?php echo $_smarty_tpl->tpl_vars['iUserId']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['user_detail']['vProfilePicture'];?>
" alt="" class="thumbnail"/>
	                                    </a>
	                                    </div>
	                                    <div>
	                                        <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
admin/user/deleteimage/<?php echo $_smarty_tpl->tpl_vars['iUserId']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['user_detail']['vProfilePicture'];?>
/vProfilePicture" class="btn btn-danger" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
	                                        <a href="#myModal" class="btn bottom-buffer btn-info" data-toggle="modal">
	                                            View
	                                        </a>
	                                    </div>
	                                </div>                                    
	                            </div>
								<?php }?>


							<?php if ($_smarty_tpl->tpl_vars['data']->value['action']=='update'){?>
								<div class="form-group">
									<label>Status<sup><span style="color:#CC2131">*</span></sup></label>
									<select class="form-control" name="eStatus" id="eStatus" >
										<option value="">-- Select Status --</option>
										<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['eStatuses']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
										<option <?php if ($_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]==$_smarty_tpl->tpl_vars['data']->value['user_detail']['eStatus']){?>selected="selected"<?php }?>value="<?php echo $_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
"><?php echo $_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</option>
										<?php endfor; endif; ?>
									</select>
								</div>
							<?php }?>
							
							<?php if ($_smarty_tpl->tpl_vars['data']->value['action']=='create'){?>
							<button type="submit" id="btn-save" class="btn btn-primary" onclick="validate();">Save</button>
							<?php }else{ ?>
								<button type="submit" id="btn-save" class="btn btn-primary" onclick="validate();">Save Change</button>
							<?php }?>
							<button type="button" class="btn btn-primary" onclick="returnme();">Cancel</button>
							<span  id="loader" style="float: left;padding-right:15px;display: block;"></span>
						</form>
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
                <h4 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['data']->value['user_detail']['vProfilePicture'];?>
</h4>
            </div>
            <div class="modal-body row">
                <div class="col-md-12 img-modal">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
uploads/user/<?php echo $_smarty_tpl->tpl_vars['iUserId']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['user_detail']['vProfilePicture'];?>
" alt="" controls style="align:center;width:100%;"/>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
var iUserId = "<?php echo $_smarty_tpl->tpl_vars['iUserId']->value;?>
";
	//alert(new Date());
	$('#dBirthDate').datepicker().on('changeDate', function(ev){
        $('#dBirthDate').datepicker('hide');           
    }); 
	$(document).ready(function () {
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
	                        url: '<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
user/checkEmailExist/'+iUserId,
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

	function checkprise(evt)
	{
	    var charCode = (evt.which) ? evt.which : event.keyCode
	         if (charCode > 31 && (charCode < 48 || charCode > 57))
	            return false;
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
<?php }} ?>