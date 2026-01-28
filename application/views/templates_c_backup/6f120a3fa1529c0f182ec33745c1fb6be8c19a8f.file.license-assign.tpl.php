<?php /* Smarty version Smarty-3.1.11, created on 2023-04-21 23:54:53
         compiled from "application/views/templates/admin/user/license-assign.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3174505076442bfdd727c58-44177741%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f120a3fa1529c0f182ec33745c1fb6be8c19a8f' => 
    array (
      0 => 'application/views/templates/admin/user/license-assign.tpl',
      1 => 1682012479,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3174505076442bfdd727c58-44177741',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'iUserId' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_6442bfdd732438_30345172',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6442bfdd732438_30345172')) {function content_6442bfdd732438_30345172($_smarty_tpl) {?><style type="text/css">
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
            <li class="active">License Assign</li>
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
                    	<ul class="nav nav-tabs">
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
user/update/<?php echo $_smarty_tpl->tpl_vars['iUserId']->value;?>
">Edit User</a></li>
							<li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
user/licenseassign/<?php echo $_smarty_tpl->tpl_vars['iUserId']->value;?>
">License Assign</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab1">
								<form role="form" id="frmuser" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
user/<?php echo $_smarty_tpl->tpl_vars['data']->value['action'];?>
" method="post" enctype="multipart/form-data">
									<input type="hidden" name="iUserId" id="iUserId" value='<?php echo $_smarty_tpl->tpl_vars['iUserId']->value;?>
'>

									<div class="form-group">
										<label>License Key<sup><span style="color:#CC2131">*</span></sup> </label>
										<select class="form-control" name="ilicenseId" id="ilicenseId">
											<option value="">-- Select License Key --</option>
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['allLicense']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
											<option <?php if ($_smarty_tpl->tpl_vars['data']->value['address_detail']['ilicenseId']==$_smarty_tpl->tpl_vars['data']->value['allLicense'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['ilicenseId']){?>selected="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allLicense'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['ilicenseId'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['allLicense'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['license_key'];?>
</option>
											<?php endfor; endif; ?>
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

<script type="text/javascript">
var iUserId = "<?php echo $_smarty_tpl->tpl_vars['iUserId']->value;?>
";

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
<?php }} ?>