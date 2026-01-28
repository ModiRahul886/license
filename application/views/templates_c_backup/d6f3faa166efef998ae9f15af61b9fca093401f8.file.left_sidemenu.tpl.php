<?php /* Smarty version Smarty-3.1.11, created on 2023-06-05 20:01:25
         compiled from "application/views/templates/admin/left_sidemenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7847519736442b95e2e2a89-55765390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6f3faa166efef998ae9f15af61b9fca093401f8' => 
    array (
      0 => 'application/views/templates/admin/left_sidemenu.tpl',
      1 => 1685970075,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7847519736442b95e2e2a89-55765390',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_6442b95e304fa9_91607948',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6442b95e304fa9_91607948')) {function content_6442b95e304fa9_91607948($_smarty_tpl) {?><div class="leftside">
    <div class="sidebar">
        <ul class="sidebar-menu" style="padding-top:10px;">
        <?php if ($_smarty_tpl->tpl_vars['data']->value['license_admin_info']['eRole']=='Subadmin'){?>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['leftsidebar']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <?php if ($_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iParentId']=='0'){?>
                    <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iModuleId'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tListing'])){?>

                    <li <?php if ($_smarty_tpl->tpl_vars['data']->value['iParentId']==$_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iModuleId']){?>class="sub-nav active"<?php }?> <?php if ($_smarty_tpl->tpl_vars['data']->value['url']==$_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vPath']){?>class="active"<?php }?>  <?php if ($_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vPath']==''){?>class="sub-nav"<?php }?>>
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iParentId']=='0'){?>
                            <a <?php if ($_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vPath']!=''){?>href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vPath'];?>
"<?php }else{ ?>href="javascript:void(0);"<?php }?> id="path_<?php echo $_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iModuleId'];?>
">
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vModuleName']=='Dashboard'){?>
                            <i class="fa fa-home"></i>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vModuleName']=='Admin Management'){?>
                            <i class="fa fa-fw fa-user"></i>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vModuleName']=='Manage Users'){?>
                            <i class="fa fa-fw fa-users"></i>
                        <?php }?>
                        
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vModuleName']=='General Settings'){?>
                            <i class="fa fa-fw fa-cogs"></i>
                            <i class="fa fa-angle-right pull-right"></i>
                        <?php }?>
                        
                            <span><?php echo $_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vModuleName'];?>
</span>
                        </a>

                        <?php if (count($_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['submodule'])!=0){?>
                            <ul class="sub-menu">
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['j'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['submodule']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
                            <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['submodule'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iModuleId'],$_smarty_tpl->tpl_vars['data']->value['adminpermidetail']['tListing'])){?>
                                <li <?php if ($_smarty_tpl->tpl_vars['data']->value['url']==$_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['submodule'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vPath']){?>class="active"<?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['submodule'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vPath'];?>
">
                                    <?php if ($_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['submodule'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vModuleName']=='Owners'){?>
                                        <i class="fa fa-fw fa-bars"></i>
                                    <?php }?>
                                    
                                    <?php if ($_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['submodule'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vModuleName']=='Settings'){?>
                                        <i class="fa fa-fw fa-cog"></i>
                                    <?php }?>
                                    <?php echo $_smarty_tpl->tpl_vars['data']->value['leftsidebar'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['submodule'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vModuleName'];?>

                                </a>
                                </li>
                            <?php }?>
                            <?php endfor; endif; ?>
                            </ul>
                        <?php }?>
                    </li>
                    <?php }?>

                <?php }?>
            <?php endfor; endif; ?>

        <?php }else{ ?>
        <li class="<?php if ($_smarty_tpl->tpl_vars['data']->value['menuAction']=='Dashboard'){?>active<?php }?>">
                <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="<?php if ($_smarty_tpl->tpl_vars['data']->value['menuAction']=='Administrator'){?>active<?php }?>">
                <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
admin_management">
                    <i class="fa fa-fw fa-user"></i> <span>Admin Management</span>
                </a>
            </li>
            
            <li class="<?php if ($_smarty_tpl->tpl_vars['data']->value['menuAction']=='manageUser'){?>active<?php }?>">
                <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
user">
                    <i class="fa fa-fw fa-users"></i> <span>Manage Users</span>
                </a>
            </li>
            <li class="<?php if ($_smarty_tpl->tpl_vars['data']->value['menuAction']=='manageUser'){?>active<?php }?>">
                <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
license">
                    <i class="fa fa-fw fa-users"></i> <span>Manage License</span>
                </a>
            </li>
            <li class="<?php if ($_smarty_tpl->tpl_vars['data']->value['menuAction']=='manageUser'){?>active<?php }?>">
                <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
modules">
                    <i class="fa fa-fw fa-users"></i> <span>Manage Modules</span>
                </a>
            </li>
            
            <li class="sub-nav <?php if ($_smarty_tpl->tpl_vars['data']->value['menuAction']=='Statistic'||$_smarty_tpl->tpl_vars['data']->value['menuAction']=='Charts'||$_smarty_tpl->tpl_vars['data']->value['menuAction']=='Configuration'){?>active<?php }?>">
            
                <a href="#fakelink">
                    <i class="fa fa-fw fa-cogs"></i>
                    <i class="fa fa-angle-right pull-right"></i>
                    General Settings
                </a>
                <ul class="sub-menu" <?php if ($_smarty_tpl->tpl_vars['data']->value['menuAction']=='FaqCategory'||$_smarty_tpl->tpl_vars['data']->value['menuAction']=='Faq'||$_smarty_tpl->tpl_vars['data']->value['menuAction']=='emailTemplate'||$_smarty_tpl->tpl_vars['data']->value['menuAction']=='ContactUs'||$_smarty_tpl->tpl_vars['data']->value['menuAction']=='Configuration'||$_smarty_tpl->tpl_vars['data']->value['menuAction']=='Static'||$_smarty_tpl->tpl_vars['data']->value['menuAction']=='MobileImage'){?>style="display: block;"<?php }?>>

                    <li class="<?php if ($_smarty_tpl->tpl_vars['data']->value['menuAction']=='emailTemplate'){?>active<?php }?>">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
emailtemplate"><i class="fa fa-fw fa-clipboard"></i>
                        Email Templates</a>
                    </li>

                    <li class="<?php if ($_smarty_tpl->tpl_vars['data']->value['menuAction']=='Configuration'){?>active<?php }?>">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
configuration"><i class="fa fa-fw fa-cog"></i>
                        Settings</a>
                    </li>
                </ul>
            </li>
        <?php }?>

        </ul>
    </div>
</div><?php }} ?>