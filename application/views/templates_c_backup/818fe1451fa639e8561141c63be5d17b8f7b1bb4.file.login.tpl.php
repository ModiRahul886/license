<?php /* Smarty version Smarty-3.1.11, created on 2023-04-23 00:54:15
         compiled from "application/views/templates/admin/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121142630964441f47264190-22703680%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '818fe1451fa639e8561141c63be5d17b8f7b1bb4' => 
    array (
      0 => 'application/views/templates/admin/login.tpl',
      1 => 1681807918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121142630964441f47264190-22703680',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_64441f472a4b19_16103128',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64441f472a4b19_16103128')) {function content_64441f472a4b19_16103128($_smarty_tpl) {?><!DOCTYPE html>
<html class="no-js">
    <head>
        <title> ::: <?php echo $_smarty_tpl->tpl_vars['data']->value['SITE_NAME'];?>
 ::: </title>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_base_url'];?>
assets/admin/image/favicon.ico">
        <!-- Bootstrap -->
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

        
        <script type="text/javascript">

        function randomImage(){
                var base_image = "<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
assets/admin/image/"; 
                var images = [
                   base_image+"infographics-main1.jpg",
                ];
                var size = images.length;
                var x = Math.floor(size * Math.random());
                console.log(x);
                var element = document.getElementsByClassName('login');
                console.log(element);
                element[0].style["background-image"] = "url("+ images[x] + ")";
            }

            document.addEventListener("DOMContentLoaded", randomImage);

        </script>
        
        <style>
            .home-intro {
                background-size: cover !important;
                height: 100%;
                color: $white;
            }
            body, html{
                height: 100%;
            }
            #login{
                background-size: 100% auto;
                background-repeat: no-repeat;
                overflow-y:hidden;
            }
        </style>
    </head>
    <body class="login fixed login home-intro" id="login" >

        <div class="wrapper animated flipInY">
            <div class="logo"><img src='<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
' height="70px" width="210px" alt="License" ></div>
            <div class="box">
                <div class="header clearfix">
                    <div class="pull-left"><i class="fa fa-sign-in"></i> Log In</div>
                    <div class="pull-right"><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
authentication/forgotpassword"><i class="fa fa-times"></i></a></div>
                </div>
                <form id="loginform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
authentication">
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
                        <div class="alert alert-warning no-radius no-margin padding-sm"><i class="fa fa-info-circle"></i> <?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>
</div>
                    <?php }?>
                    <div class="box-body padding-md">
                        <div class="form-group">
                            <input type="text" name="vEmail" id="vEmail" class="form-control loginpage" placeholder="Email ID" onkeydown="Javascript: if (event.keyCode==13) check_user_email();"/>
                            <span id="valemail" style="display:none;" class="validationfrm">Please Enter Email ID.</span>
                        </div>
                        <div class="form-group">
                            <input type="password" name="vPassword" id="vPassword" class="form-control loginpage" placeholder="Password" onkeydown="Javascript: if (event.keyCode==13) check_user_email();"/>
                            <span id="valpwd" style="display:none;" class="validationfrm">Please Enter Password.</span>
                        </div>
                        
                        <div class="box-footer">                                                               
                            <button type="submit" class="btn btn-success btn-block signinbtn">Sign In</button>
                            <br>
                            <a href='<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
authentication/forgotpassword'>
                            <button type="button" class="btn btn-success btn-block forgbtn">Forgot Password?</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/jquery/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/jquery-ui/jquery-ui-1.10.4.min.js" type="text/javascript"></script>
		
		<!-- Bootstrap -->
        <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/bootstrap/bootstrap.min.js" type="text/javascript"></script>
		
		<!-- Interface -->
        <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/pace/pace.min.js" type="text/javascript"></script>
		
		<!-- Forms -->
        <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
custom.js" type="text/javascript"></script>
		
		<!-- Inbox -->
        <script type="text/javascript">
		$(function() {
			//iCheck
			$("input[type='checkbox'], input[type='radio']").iCheck({
				checkboxClass: 'icheckbox_minimal',
				radioClass: 'iradio_minimal'
			});
			
			// box scroll
			$('.scroll').slimScroll({
				height: '600px'
			}); 
		});
		</script>
    </body>
</html><?php }} ?>