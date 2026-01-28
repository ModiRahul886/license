<?php /* Smarty version Smarty-3.1.11, created on 2026-01-26 23:16:46
         compiled from "E:\xampp\htdocs\license\application\views\templates\admin\emailtemplate\view-emailtemplate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21325407866977936eb20806-82694034%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbce08efa2cd68f16e179a3f4b392399de820a93' => 
    array (
      0 => 'E:\\xampp\\htdocs\\license\\application\\views\\templates\\admin\\emailtemplate\\view-emailtemplate.tpl',
      1 => 1454008978,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21325407866977936eb20806-82694034',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_6977936ebbef34_06068377',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6977936ebbef34_06068377')) {function content_6977936ebbef34_06068377($_smarty_tpl) {?><div class="rightside">
	<div class="page-head breadpad">
		 <ol class="breadcrumb">
			<li>You are here:</li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
home">Dashboard</a></li>
			<li class="active">View Email Template</li>    
		</ol>
	</div>
	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<form name="frmlist" id="frmlist" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
emailtemplate/action_update" method="post">
						<input type="hidden" name="action" id="action">
						<div class="box-title">
							<h3>Email Templates</h3>
						</div><!-- /.box-title -->
						<div class="box-body">
							<?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
							<div class="span12">
								<div class="alert alert-info">
									<?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

								</div>
							</div>
							<?php }?>
							<div class="btnview">
							<?php if ($_smarty_tpl->tpl_vars['data']->value['happyhour_admin_info']['eRole']=='Subadmin'){?>
		                        <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tActive'])){?>
		                            <button type="submit" id="btn-active" class="btn btn-primary btnuser makebtn" onclick="check_all();" >Make Active</button>
		                        <?php }?>
		                        <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tInactive'])){?>
		                            <button type="submit" id="btn-inactive" class="btn btn-primary btnuser inctivebtn">Make Inactive</button>
		                        <?php }?>
		                        <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tAdd'])){?>
		                            <button type="button" id="btn-add" onclick="addme('<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
emailtemplate/create');"  class="btn btn-primary btnuser newadbtn"> Add New</button>
		                        <?php }?>
		                        <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tDelete'])){?>
		                            <button type="submit" id="btn-delete" class="btn btn-primary btnuser addbtn">Delete</button>
		                        <?php }?>
		                    <?php }else{ ?>
								<button type="submit" id="btn-active" class="btn btn-primary btnuser makebtn" onclick="check_all();" >Make Active</button>
								<button type="submit" id="btn-inactive" class="btn btn-primary btnuser inctivebtn">Make Inactive</button>
								<button type="button" id="btn-add" onclick="addme('<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
emailtemplate/create');"  class="btn btn-primary btnuser newadbtn"> Add New</button>
								<button type="submit" id="btn-delete" class="btn btn-primary btnuser addbtn">Delete</button>
							<?php }?>
							</div>
							<div style='clear:both;'></div>
							<table id="emailTemplateListing" class="table table-bordered table-striped">
								<thead>
									<tr class="headings">
										<th><center><input type="checkbox" id="check_all" name="check_all" value="1"></center></th>
										<th>Email ID Title</th>
										<th>From Email ID</th>
										<th>Email ID Code</th>
										<th>Status</th>
										<?php if ($_smarty_tpl->tpl_vars['data']->value['happyhour_admin_info']['eRole']=='Subadmin'){?>
	                                        <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tUpdate'])){?>
	                                            <th class=" no-link last"><center>Edit</center></th>
	                                        <?php }?>
	                                    <?php }else{ ?>
	                                        <th class=" no-link last"><center>Edit</center></th>
	                                    <?php }?>
									</tr>
								</thead>
								<tbody>
									<?php if (count($_smarty_tpl->tpl_vars['data']->value['all_emailtemplate'])>0){?>
									<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['all_emailtemplate']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
									<tr>
									<td align="center">
										<input type="checkbox" name="iId[]" id="iId" class="tableflat" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['all_emailtemplate'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iEmailTemplateId'];?>
"/>
									</td>
										<td><?php echo $_smarty_tpl->tpl_vars['data']->value['all_emailtemplate'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vEmailTitle'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['data']->value['all_emailtemplate'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vFromEmail'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['data']->value['all_emailtemplate'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vEmailCode'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['data']->value['all_emailtemplate'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
										<?php if ($_smarty_tpl->tpl_vars['data']->value['happyhour_admin_info']['eRole']=='Subadmin'){?>
                                    		<?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tUpdate'])){?>
												<td align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
emailtemplate/update/<?php echo $_smarty_tpl->tpl_vars['data']->value['all_emailtemplate'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iEmailTemplateId'];?>
" style="cursor:pointer;"><i class="fa fa-edit edtcolr"></i></a></td>
											<?php }?>
										<?php }else{ ?>
											<td align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
emailtemplate/update/<?php echo $_smarty_tpl->tpl_vars['data']->value['all_emailtemplate'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iEmailTemplateId'];?>
" style="cursor:pointer;"><i class="fa fa-edit edtcolr"></i></a></td>
										<?php }?>
									</tr>
									<?php endfor; endif; ?>
									<?php }else{ ?>
									<tr>
										<td colspan="6">No Records Found</td>
									</tr>
									<?php }?>
									
								</tbody>
							</table>
						</div>  
					</form>
				</div>  
			</div>  
		</div>
	</div>  
</div>

<script type="text/javascript">
	var _update = "<?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tUpdate'])){?>done<?php }elseif($_smarty_tpl->tpl_vars['data']->value['happyhour_admin_info']['eRole']=='Admin'){?>adminlist<?php }else{ ?>notdone<?php }?>";
    if(_update == 'done'){
       	$('#emailTemplateListing').dataTable( {
        "aoColumns": [
	        { "bSortable": false },
	        null,
	        null,
	        null,
	        null,
	        { "bSortable": false }
	        ]
	    });
    }else if(_update == 'adminlist'){
        $('#emailTemplateListing').dataTable( {
        "aoColumns": [
	        { "bSortable": false },
	        null,
	        null,
	        null,
	        null,
	        { "bSortable": false }
	        ]
	    });
    }else{
        $('#emailTemplateListing').dataTable( {
        "aoColumns": [
	        { "bSortable": false },
	        null,
	        null,
	        null,
	        null
	        ]
	    });
    }
		
</script>
<?php }} ?>