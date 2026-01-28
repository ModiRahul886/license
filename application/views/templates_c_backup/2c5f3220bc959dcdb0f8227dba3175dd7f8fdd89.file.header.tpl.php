<?php /* Smarty version Smarty-3.1.11, created on 2023-04-21 23:27:10
         compiled from "application/views/templates/admin/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18332959756442b95e2de760-57631203%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c5f3220bc959dcdb0f8227dba3175dd7f8fdd89' => 
    array (
      0 => 'application/views/templates/admin/header.tpl',
      1 => 1681804874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18332959756442b95e2de760-57631203',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_6442b95e2e1fe4_43701852',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6442b95e2e1fe4_43701852')) {function content_6442b95e2e1fe4_43701852($_smarty_tpl) {?><header>
    <nav class="navbar navbar-static-top">
        <div class="navbar">
            <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
home" class="in-logo innerlogopart"> <img src='<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
' class='headerlogoimgsize' alt="License" height="70px;" width="210px;"></img></a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown widget-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span><?php echo $_smarty_tpl->tpl_vars['data']->value['admindetail']['vFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['admindetail']['vLastName'];?>
 <i class="fa fa-caret-down"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="footer">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
authentication/logout"><i class="fa fa-power-off"></i>Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header><?php }} ?>