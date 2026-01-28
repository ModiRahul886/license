<?php /* Smarty version Smarty-3.1.11, created on 2026-01-26 23:10:28
         compiled from "E:\xampp\htdocs\license\application\views\templates\admin\admin_management\view_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:596957009697791f45594c5-96914109%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '499ac574231caf9de55cd29ae4e7ca7df03da32c' => 
    array (
      0 => 'E:\\xampp\\htdocs\\license\\application\\views\\templates\\admin\\admin_management\\view_admin.tpl',
      1 => 1684601135,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '596957009697791f45594c5-96914109',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_697791f45a2071_04038649',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_697791f45a2071_04038649')) {function content_697791f45a2071_04038649($_smarty_tpl) {?><form name="frmlist" id="frmlist" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
admin_management/action_update" method="post">
    <input type="hidden" name="action" id="action">

<div class="rightside">
    <div class="page-head breadpad">
        <ol class="breadcrumb">
            <li>You are here:</li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
home">Dashboard</a></li>
            <li class="active">Administrator</li>    
        </ol>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-title">
                        <h3>Admin Management</h3>
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
                            <button type="submit" id="btn-active" class="btn btn-primary btnuser makebtn" onclick="check_all();" >Make Active</button>
                            <button type="submit" id="btn-inactive" class="btn btn-primary btnuser inctivebtn">Make Inactive</button>
                            <!--<button type="button" id="btn-add" onclick="addme('<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
admin_management/create');"  class="btn btn-primary btnuser newadbtn"> Add New</button>-->
                            <!--<button type="submit" id="btn-delete" class="btn btn-primary btnuser">Delete</button>-->
                        </div>
                        <div style='clear:both;'></div>
                        <table id="adminlisting" class="table table-bordered table-striped">
                            <thead>
                                <tr class="headings">
                                    <th><center><input type="checkbox" id="check_all" name="check_all" value="1"></center></th>
                                    <th>Name</th>
                                    <th>Email ID</th>
                                    <th>User Type</th>
                                    <th>Status</th>
                                    <th class=" no-link last"><center>Edit</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['adminlist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                    <?php if ($_smarty_tpl->tpl_vars['data']->value['adminlist'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAdminId']!=1){?>
                                        <input type="checkbox" name="iId[]" id="iId" class="tableflat" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['adminlist'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAdminId'];?>
"/>
                                    <?php }?>
                                </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['adminlist'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['adminlist'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vLastName'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['adminlist'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vEmail'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['adminlist'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eRole'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['adminlist'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
                                    <td align="center">
                                        <?php if ($_smarty_tpl->tpl_vars['data']->value['adminlist'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAdminId']==1){?>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
admin_management/update/<?php echo $_smarty_tpl->tpl_vars['data']->value['adminlist'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAdminId'];?>
" style="cursor:pointer;"><i class="fa fa-edit edtcolr"></i></a>
                                        <?php }?>
                                </td>
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
    $('#adminlisting').dataTable( {
        "aoColumns": [
        { "bSortable": false },
        null,
        null,
        null,
        null,
        { "bSortable": false }
        ]
    }); 
</script>
<?php }} ?>