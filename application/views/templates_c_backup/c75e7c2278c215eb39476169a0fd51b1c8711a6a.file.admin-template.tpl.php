<?php /* Smarty version Smarty-3.1.11, created on 2023-04-21 23:27:10
         compiled from "application/views/templates/admin/admin-template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18234234936442b95e2c5234-31869589%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c75e7c2278c215eb39476169a0fd51b1c8711a6a' => 
    array (
      0 => 'application/views/templates/admin/admin-template.tpl',
      1 => 1681811798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18234234936442b95e2c5234-31869589',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_6442b95e2dd079_72912815',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6442b95e2dd079_72912815')) {function content_6442b95e2dd079_72912815($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <title> ::: LICENSE ::: </title>
    <!-- Bootstrap -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_base_url'];?>
assets/admin/image/favicon.ico">
    

    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
gritter/jquery.gritter.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
bootstrap-tagsinput/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
jquery-jvectormap/jquery-jvectormap-1.2.2.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
animate/animate.min.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
iCheck/all.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
style.css" />

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