<?php /* Smarty version Smarty-3.1.11, created on 2026-01-27 00:15:25
         compiled from "E:\xampp\htdocs\license\application\views\templates\admin\admin-template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1707888189697791ec38ed64-80736326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5cec970403a3be93624f9c2c8c7976356b9d757f' => 
    array (
      0 => 'E:\\xampp\\htdocs\\license\\application\\views\\templates\\admin\\admin-template.tpl',
      1 => 1769447523,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1707888189697791ec38ed64-80736326',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_697791ec3c9a36_75214664',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_697791ec3c9a36_75214664')) {function content_697791ec3c9a36_75214664($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <title> ::: LICENSE ::: </title>
    <!-- Bootstrap -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_base_url'];?>
assets/admin/image/favicon.ico">
    

    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
gritter/jquery.gritter.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
bootstrap-tagsinput/bootstrap-tagsinput.css?v=1" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
jquery-jvectormap/jquery-jvectormap-1.2.2.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
animate/animate.min.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
iCheck/all.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
style.css?v=<?php echo time();?>
" />

    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
bootstrapValidator/bootstrapValidator.min.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
datatables/dataTables.bootstrap.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"  />
    <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
magnific-popup.min.css" rel="stylesheet">

    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/jquery/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/jquery-ui/jquery-ui-1.10.4.min.js" type="text/javascript"></script>
    
    <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
dataTables.bootstrap.css" rel="stylesheet" media="screen">

    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>    
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
datepicker/datepicker.css" />
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/datepicker/datepicker.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
fileinput.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
common.js"></script>
    <script type="text/javascript">
        var base_image = '<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_image_path'];?>
';
        var base_url = '<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
';
    </script>       
</head>

<body class="fixed">
    <?php echo $_smarty_tpl->getSubTemplate ("admin/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <div class="wrapper">
        <?php echo $_smarty_tpl->getSubTemplate ("admin/left_sidemenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['data']->value['tpl_name'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>

    <!-- Bootstrap -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/gritter/jquery.gritter.min.js" type="text/javascript"></script>
    
    
    <!-- Interface -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/jquery-countTo/jquery.countTo.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/nicescroll/jquery.nicescroll.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/pace/pace.min.js" type="text/javascript"></script>
    
    <!-- Forms -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
custom.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/bootstrapValidator/bootstrapValidator.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
commonvalidation.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
jquery.magnific-popup.min.js"></script>   
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
magnify-pop-app.js"></script>
    <!-- Modal -->
    <div class="modal fade" id="ModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning"></i> Error</h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-defaultmodal modalcancelbtn" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html><?php }} ?>