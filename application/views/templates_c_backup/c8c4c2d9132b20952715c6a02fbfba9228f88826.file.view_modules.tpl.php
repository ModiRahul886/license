<?php /* Smarty version Smarty-3.1.11, created on 2023-09-06 00:40:28
         compiled from "application/views/templates/admin/modules/view_modules.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1124113162647dddea83ba50-96815761%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8c4c2d9132b20952715c6a02fbfba9228f88826' => 
    array (
      0 => 'application/views/templates/admin/modules/view_modules.tpl',
      1 => 1693935624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1124113162647dddea83ba50-96815761',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_647dddea853bb5_08979888',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_647dddea853bb5_08979888')) {function content_647dddea853bb5_08979888($_smarty_tpl) {?>
<form name="frmlist" id="frmlist" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
modules/action_update" method="post">
	<input type="hidden" name="action" id="action">

	<div class="rightside">
    <div class="page-head breadpad">
        <ol class="breadcrumb">
            <li>You are here:</li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
home">Dashboard</a></li>
            <li class="active">Manage Modules</li>    
        </ol>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-title">
                        <h3>Manage Modules</h3>
                    </div>
                    <div class="box-body">
                    	<?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
					    <div class="span12">
					        <div class="alert alert-info">
					            <?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

					        </div>
					    </div>
					    <?php }?>
					    <div class="pull-right">
						<?php if ($_smarty_tpl->tpl_vars['data']->value['happyhour_admin_info']['eRole']=='Subadmin'){?>
                            <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tActive'])){?>
                                <button type="submit" id="btn-active" class="btn btn-successbtn btn-primary btnuser makebtn" onclick="check_all();" >Make Active</button>
                            <?php }?>
                            <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tInactive'])){?>
                                <button type="submit" id="btn-inactive" class="btn btn-primary btnuser inctivebtn">Make Inactive</button>
                            <?php }?>
                            <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tAdd'])){?>
                                <button type="button" id="btn-add" onclick="addme('<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
modules/create');"  class="btn btn-primary btnuser newadbtn"> Add New</button>
                            <?php }?>
                            <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tDelete'])){?>
                                <button type="submit" id="btn-delete" class="btn btn-primary btnuser addbtn">Delete</button>
                            <?php }?>
                        <?php }else{ ?>
							<button type="submit" id="btn-active" class="btn btn-successbtn btn-primary btnuser makebtn" onclick="check_all();" >Make Active</button>
							<button type="submit" id="btn-inactive" class="btn btn-primary btnuser inctivebtn">Make Inactive</button>
							<button type="button" id="btn-add" onclick="addme('<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
modules/create');"  class="btn btn-primary btnuser newadbtn"> Add New</button>
							<button type="submit" id="btn-delete" class="btn btn-primary btnuser addbtn">Delete</button>
						<?php }?>
						</div>

						<div style='clear:both;'></div>

						<table id="barlist" class="table table-bordered table-striped">
							<thead>
								<tr class="headings">
									<th><center><input type="checkbox" id="check_all" name="check_all" value="1"></center></th>
									<th>Modules</th>
									<th>Module Name</th>
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
								<?php if (count($_smarty_tpl->tpl_vars['data']->value['module_detail'])>0){?>
									<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['module_detail']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
												<input type="checkbox" name="iId[]" id="iId" class="tableflat" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['module_detail'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['imodulesId'];?>
"/>
											</td>
											<td><?php echo $_smarty_tpl->tpl_vars['data']->value['module_detail'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['modules'];?>
</td>
											<td><?php echo $_smarty_tpl->tpl_vars['data']->value['module_detail'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['modulesname'];?>
</td>
											<td><?php echo $_smarty_tpl->tpl_vars['data']->value['module_detail'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
											<?php if ($_smarty_tpl->tpl_vars['data']->value['happyhour_admin_info']['eRole']=='Subadmin'){?>
                                    			<?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tUpdate'])){?>
												<td align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
modules/update/<?php echo $_smarty_tpl->tpl_vars['data']->value['module_detail'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['imodulesId'];?>
" style="cursor:pointer;"><i class="fa fa-edit edtcolr"></i></a></td>
												<?php }?>
                                    		<?php }else{ ?>
                                    			<td align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
modules/update/<?php echo $_smarty_tpl->tpl_vars['data']->value['module_detail'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['imodulesId'];?>
" style="cursor:pointer;"><i class="fa fa-edit edtcolr"></i></a></td>
                                    		<?php }?>

										</tr>
									<?php endfor; endif; ?>
								<?php }else{ ?>
									<tr>
										<td colspan="5">No Records Found</td>
									</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<script type="text/javascript">

	function returnme()
	{
	    window.location.href = base_url+'modules';
	}

	var _update = "<?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tUpdate'])){?>done<?php }elseif($_smarty_tpl->tpl_vars['data']->value['happyhour_admin_info']['eRole']=='Admin'){?>adminlist<?php }else{ ?>notdone<?php }?>";
    if(_update == 'done'){
		$('#barlist').dataTable( {
	        "aoColumns": [
	        { "bSortable": false },
	        null,
	        null,
	        null,
	        { "bSortable": false }
	        ]
	    });
    }else if(_update == 'adminlist'){
    	$('#barlist').dataTable( {
	        "aoColumns": [
	        { "bSortable": false },
	        null,
	        null,
	        null,
	        { "bSortable": false }
	        ]
	    });
    }else{
    	$('#barlist').dataTable( {
	        "aoColumns": [
	        { "bSortable": false },
	        null,
	        null,
	        null,
	        null
	        ]
	    });
    }

    function callExportMerchants(){
        var newexporturl = "<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
modules/exportToExcel";
        window.location.href = newexporturl;return false;
    } 
</script>
<?php }} ?>