<!DOCTYPE html>
<html class="no-js">
    <head>
        <title> ::: {$data.SITE_NAME} ::: </title>
        <link rel="shortcut icon" type="image/x-icon" href="{$data.admin_base_url}assets/admin/image/favicon.ico">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{$data.admin_css_path}bootstrap.min.css" />
        <link rel="stylesheet" href="{$data.admin_css_path}font-awesome.min.css" />
        <link rel="stylesheet" href="{$data.admin_css_path}animate/animate.min.css" />
        <link rel="stylesheet" href="{$data.admin_css_path}iCheck/all.css" />
        <link rel="stylesheet" href="{$data.admin_css_path}style.css" />

        {literal}
        <script type="text/javascript">

        function randomImage(){
                var base_image = "{/literal}{$data.base_url}assets/admin/image/{literal}"; 
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
        {/literal}
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
            <div class="logo"><img src='{$data.base_image}' height="70px" width="210px" alt="License" ></div>
            <div class="box">
                <div class="header clearfix">
                    <div class="pull-left"><i class="fa fa-sign-in"></i> Log In</div>
                    <div class="pull-right"><a href="{$data.admin_url}authentication/forgotpassword"><i class="fa fa-times"></i></a></div>
                </div>
                <form id="loginform" method="post" action="{$data.admin_url}authentication">
                    {if $data.message neq ''}
                        <div class="alert alert-warning no-radius no-margin padding-sm"><i class="fa fa-info-circle"></i> {$data.message}</div>
                    {/if}
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
                            <a href='{$data.admin_url}authentication/forgotpassword'>
                            <button type="button" class="btn btn-success btn-block forgbtn">Forgot Password?</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script src="{$data.admin_js_path}plugins/jquery/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="{$data.admin_js_path}plugins/jquery-ui/jquery-ui-1.10.4.min.js" type="text/javascript"></script>
		
		<!-- Bootstrap -->
        <script src="{$data.admin_js_path}plugins/bootstrap/bootstrap.min.js" type="text/javascript"></script>
		
		<!-- Interface -->
        <script src="{$data.admin_js_path}plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="{$data.admin_js_path}plugins/pace/pace.min.js" type="text/javascript"></script>
		
		<!-- Forms -->
        <script src="{$data.admin_js_path}plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script src="{$data.admin_js_path}custom.js" type="text/javascript"></script>
		
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
</html>