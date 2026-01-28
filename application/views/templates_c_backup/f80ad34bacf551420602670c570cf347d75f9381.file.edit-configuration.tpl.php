<?php /* Smarty version Smarty-3.1.11, created on 2023-04-21 23:27:19
         compiled from "application/views/templates/admin/configuration/edit-configuration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:896480976442b9675f16d6-00928403%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f80ad34bacf551420602670c570cf347d75f9381' => 
    array (
      0 => 'application/views/templates/admin/configuration/edit-configuration.tpl',
      1 => 1448107578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '896480976442b9675f16d6-00928403',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'db_config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_6442b96761aff2_68129236',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6442b96761aff2_68129236')) {function content_6442b96761aff2_68129236($_smarty_tpl) {?><div class="rightside">
	<div class="page-head breadpad">
	<!-- <h1>User</h1> -->
		<ol class="breadcrumb">
			<li>You are here:</li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
home">Dashboard</a></li>
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
						<?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
							<div class="span12">
								<div class="alert alert-info">
									<?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

								</div>
							</div>
						<?php }?>	
						<div style='clear:both;'></div>
						<form  id="frmcategory" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
configuration/update" method="post" enctype="multipart/form-data" role="form">
							<input type="hidden" name="data[iSettingId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['configurations']['iSettingId'];?>
">
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['db_config']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<div class="form-group">
								<label>
									<span><?php if ($_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Fb Appsec'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Fb Appid'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Facebook Link'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Pinterest Link'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Twitter Link'){?><?php echo '';?>
<?php }else{ ?><?php }?></span> <?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription;?>

								</label>
								<?php if ($_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Admin Email Id'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Mail Footer'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Company Name'){?>
									<input type="text"  id="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
" name="Data[<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
]" class="span2 form-control" value="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vValue;?>
" title="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription;?>
"/>
								
								<?php }elseif($_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Site Name'){?>
									<input type="text"  id="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
" name="Data[<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
]" class="span2 form-control" value="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vValue;?>
" title="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription;?>
" disabled="disable;" />
									
								<?php }elseif($_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Site Url'){?>
									<input type="text"  id="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
" name="Data[<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
]" class="span2 form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['Site_Url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription;?>
" disabled="disable;" />
									
								<?php }elseif($_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Fb Appsec'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Fb Appid'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Facebook Link'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Pinterest Link'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Twitter Link'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Instagram link'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Twitter App Id'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Twitter Secret Key'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Instagram (Client Secret)'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Instagram (Client Id)'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Payment Error message'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='PayPal API User Name'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Paypal API Password'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Paypal API Signature'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Payment Success message'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='1 Month Vendor Subscription Price'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='3 Month Vendor Subscription Price'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='6 Month Vendor Subscription Price'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='12 Month Vendor Subscription Price'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Vendor Success Message'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Owner Paypal Email Account'||$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Site Owner Commission (%)'){?>
									<input type="text"  id="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
" name="Data[<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
]" class="span2 form-control" value="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vValue;?>
"  title="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription;?>
"/>
									
								<?php }elseif($_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Footer About Us'){?>
									<textarea class="span2 form-control" id="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
" name="Data[<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
]" title="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription;?>
" ><?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vValue;?>
</textarea>
								
								<?php }elseif($_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription=='Transaction Mode'){?>
										<select class="input-large" name="Data[<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
]" id="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
"  title="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription;?>
" class="span2 form-control">
											<option value="Yes"<?php if ($_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vValue=='Yes'){?>selected="selected"<?php }?>>Yes</option>
											<option value="No"<?php if ($_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vValue=='No'){?>selected="selected"<?php }?>>No</option>
										</select>
										<div style="clear:both;color:#FF0000;font-size:12px;padding-left:50px;">[ Yes for Live, No for Testing ]</div>
												
								<?php }else{ ?>
									<input type="text"  id="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
" name="Data[<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
]" class="span2 form-control" value="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vValue;?>
" title="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription;?>
"/>
								
								<?php }?>

							</div>
							<?php endfor; endif; ?>
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
<?php }} ?>