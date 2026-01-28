<?php /* Smarty version Smarty-3.1.11, created on 2023-05-24 12:53:33
         compiled from "application/views/templates/admin/forgotpassword.tpl" */ ?>
<?php /*%%SmartyHeaderCode:420146454646da65dec2e17-57775817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41c0855be3bdbbc698b5213b80411adb25ab9422' => 
    array (
      0 => 'application/views/templates/admin/forgotpassword.tpl',
      1 => 1641840248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '420146454646da65dec2e17-57775817',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_646da65e0528f0_08035427',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_646da65e0528f0_08035427')) {function content_646da65e0528f0_08035427($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
animate/animate.min.css" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
iCheck/all.css" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
style.css" />
    
        <title> ::: PieFoo :::</title>
        
        <!-- Vidalta stylesheets -->

    </head>
    <body class="login fixed">
        <div class="wrapper animated flipInY">
            <div class="logo"><img src='<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
piefoo-logo.jpg' alt="PieFoo" class='logorad'></div>
            <div class="box">
                <div class="header clearfix">
                    <div class="pull-left"><i class="fa fa-unlock"></i> Forgot Password</div>
                    <div class="pull-right"><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
admin/authentication"><i class="fa fa-times"></i></a></div>
                </div>
                <form id="forgotform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
admin/authentication/forgotpassword">
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
                        <div class="alert alert-warning no-radius no-margin padding-sm"><i class="fa fa-info-circle"></i> <?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>
</div>
                    <?php }?>
                    <div class="box-body padding-md">
                        <div class="form-group">
                            <input type="text" name="vEmail" id="vEmail" class="form-control" placeholder="Email ID"/>
                        </div>
                     <!--    <div class="form-group">                            
                            <select class="form-control" name='eRole' id='eRole'>
                                <option value=''>--- Select your role ---</option>
                                <option value='Admin'>Admin</option>
                                <option value='Brand'>Brand</option>
                                <option value='Super Admin'>Super Admin</option>
                            </select>
                        </div> -->
                        <div class="box-footer">                                                               
                            <button type="submit" class="btn btn-success btn-block frgbtnsub" onclick="validate();">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </body>
</html><?php }} ?>