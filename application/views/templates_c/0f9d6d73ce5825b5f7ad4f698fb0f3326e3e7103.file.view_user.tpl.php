<?php /* Smarty version Smarty-3.1.11, created on 2026-01-26 23:10:35
         compiled from "E:\xampp\htdocs\license\application\views\templates\admin\user\view_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2022771397697791fb202c52-53501038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f9d6d73ce5825b5f7ad4f698fb0f3326e3e7103' => 
    array (
      0 => 'E:\\xampp\\htdocs\\license\\application\\views\\templates\\admin\\user\\view_user.tpl',
      1 => 1642866203,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2022771397697791fb202c52-53501038',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_697791fb28e9c9_11448539',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_697791fb28e9c9_11448539')) {function content_697791fb28e9c9_11448539($_smarty_tpl) {?><form name="frmlist" id="frmlist" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
user/action_update" method="post">
    <input type="hidden" name="action" id="action">

<div class="rightside">
	<div class="page-head breadpad">
		<ol class="breadcrumb">
            <li>You are here:</li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
home">Dashboard</a></li>
            <li class="active">View Users</li>    
        </ol>
	</div>

	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-title">
                        <h3>Manage User</h3>
                    </div>
                    <div class="box-body">
                    	<?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
                            <div class="span12">
                                <div class="alert alert-info">
                                    <?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

                                </div>
                            </div>
                        <?php }?>
                        
                        <!--
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['happyhour_admin_info']['eRole']=='Subadmin'){?>
                            <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tExportUsers'])){?>
                                <a class="btn btn-primary btnuser newadbtn" href="#" onclick='callExportUsers();'>Export Users</a>
                            <?php }?>
                        <?php }else{ ?>
                            <a class="btn btn-primary btnuser newadbtn" href="#" onclick='callExportUsers();'>Export Users</a>
                        <?php }?>
                        -->

                        <div class="pull-right">
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['happyhour_admin_info']['eRole']=='Subadmin'){?>
                            <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tActive'])){?>
                                <button type="submit" id="btn-active" class="btn btn-primary btnuser makebtn" onclick="check_all();" >Make Active</button>
                            <?php }?>
                            <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tInactive'])){?>
                                <button type="submit" id="btn-inactive" class="btn btn-primary btnuser inctivebtn">Make Inactive</button>
                            <?php }?>
                            <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tAdd'])){?>
                                <button type="button" id="btn-add" onclick="addme('<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
user/create');"  class="btn btn-primary btnuser newadbtn"> Add New</button>
                            <?php }?>
                            <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tDelete'])){?>
                                <button type="submit" id="btn-delete" class="btn btn-primary btnuser addbtn">Delete</button>
                            <?php }?>
                        <?php }else{ ?>
	                        <button type="submit" id="btn-active" class="btn btn-primary btnuser makebtn" onclick="check_all();" >Make Active</button>
	                        <button type="submit" id="btn-inactive" class="btn btn-primary btnuser inctivebtn">Make Inactive</button>
	                        <button type="button" id="btn-add" onclick="addme('<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
user/create');"  class="btn btn-primary btnuser newadbtn"> Add New</button>
	                        <button type="submit" id="btn-delete" class="btn btn-primary btnuser addbtn">Delete</button>
                        <?php }?>
                        </div>
	                    <div style='clear:both;'></div>
	                    <table id="userlisting" class="table table-bordered table-striped">
                            <thead>
                                <tr class="headings">
                                    <th><center><input type="checkbox" id="check_all" name="check_all" value="1"></center></th>
                                    <th>Name</th>
                                    <th>Email ID</th>
                                    <th>Role</th>
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
                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['userlist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                    <input type="checkbox" name="iId[]" id="iId" class="tableflat" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['userlist'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iUserId'];?>
"/>
                                </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['userlist'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['userlist'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vLastName'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['userlist'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vEmail'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['userlist'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eRole'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['userlist'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
                                    <?php if ($_smarty_tpl->tpl_vars['data']->value['happyhour_admin_info']['eRole']=='Subadmin'){?>
                                        <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tUpdate'])){?>
                                            <td align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
user/update/<?php echo $_smarty_tpl->tpl_vars['data']->value['userlist'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iUserId'];?>
" style="cursor:pointer;"><i class="fa fa-edit edtcolr"></i></a></td>
                                        <?php }?>
                                    <?php }else{ ?>
                                        <td align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
user/update/<?php echo $_smarty_tpl->tpl_vars['data']->value['userlist'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iUserId'];?>
" style="cursor:pointer;"><i class="fa fa-edit edtcolr"></i></a></td>
                                    <?php }?>
                                </tr>
                                <?php endfor; endif; ?>
                                
                            </tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

</form>

<script type="text/javascript">
    function addme(url)
	{
		window.location.href=url;
	}
    var _update = "<?php if (in_array($_smarty_tpl->tpl_vars['data']->value['checkmoduleid'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tUpdate'])){?>done<?php }elseif($_smarty_tpl->tpl_vars['data']->value['happyhour_admin_info']['eRole']=='Admin'){?>adminlist<?php }else{ ?>notdone<?php }?>";
    if(_update == 'done'){
       	$('#userlisting').dataTable( {
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
        $('#userlisting').dataTable( {
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
         $('#userlisting').dataTable( {
            "aoColumns": [
            { "bSortable": false },
            null,
            null,
            null,
            null
            ]
        });
    }

    function callExportUsers(){
        var newexporturl = "<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
user/exportToExcel";
        window.location.href = newexporturl;return false;
    }
</script>
<?php }} ?>