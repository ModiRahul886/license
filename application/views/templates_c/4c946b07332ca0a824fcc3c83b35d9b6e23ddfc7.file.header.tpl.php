<?php /* Smarty version Smarty-3.1.11, created on 2026-01-27 00:06:41
         compiled from "E:\xampp\htdocs\license\application\views\templates\admin\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:556378523697791ec3d7227-77947502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c946b07332ca0a824fcc3c83b35d9b6e23ddfc7' => 
    array (
      0 => 'E:\\xampp\\htdocs\\license\\application\\views\\templates\\admin\\header.tpl',
      1 => 1769446991,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '556378523697791ec3d7227-77947502',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_697791ec3dc141_12219247',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_697791ec3dc141_12219247')) {function content_697791ec3dc141_12219247($_smarty_tpl) {?><header>
    <nav class="navbar navbar-static-top">
        <div class="navbar">
            <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
home" class="in-logo innerlogopart"> <img src='<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
' class='headerlogoimgsize' alt="License"></a>
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