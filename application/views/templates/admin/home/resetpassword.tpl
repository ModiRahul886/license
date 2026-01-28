{include file='header.tpl'}
<main class="main" role="main">
    <header class="site-title color">
        <div class="wrap">
            <div class="container">
                <h1>Customer Sign In</h1>
                <nav role="navigation" class="breadcrumbs">
                    <ul>
                        <li><a href="{$data.base_url}" title="Home">Home</a></li>
                        <li>Customer Sign In</li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    {if $data.message neq ''}
    <div class="alert alert-info" id="flashMsg" style="width:100%;text-align:center;">
        {$data.message}
    </div>
    {/if}
    <div class="alert alert-info" id="message" style="display:none;">
    </div>
    <div class="wrap">
        <div class="row">
            <!--- Content -->
            <div class="content one-half modal">
                <!--Login-->
                <div class="box">
                    <form name="loginfrm" id="loginfrm" method="post" class="formular">
                        <div class="f-row">
                            <div class="full-width">
                                <label for="username">Email ID<sup><span style="color:red">*</span></sup></label>
                                <input type="text" id="vEmail" name="Data[vEmail]" placeholder="Email ID" onkeydown="Javascript: if (event.keyCode==13) check_user_email();"  {if $data['userInfo']['user'] neq ''} style="background:#FFF;"{/if}/>
                                <span id="valemail" style="display:none;" class="validationfrm loginmsg">Please Enter an Email ID.</span>
                            </div>
                        </div>
                        <div class="f-row">
                            <div class="full-width">
                                <label for="password">Password<sup><span style="color:red">*</span></sup></label>
                                <input type="password" id="vPassword" placeholder="Password" name="Data[vPassword]" id="vPassword" onkeydown="Javascript: if (event.keyCode==13) check_user_email();" {if $data['userInfo']['pass'] neq ''} style="background:#FFF;"{/if}/>
                                <span id="valpwd" style="display:none;" class="validationfrm loginmsg">Password Must be Filled Out.</span>
                            </div>
                        </div>
                        <div class="f-row">
                            <div class="full-width check">
                                <input type="checkbox" id="rememberMe" name="autologin" value="1"  {if $data['userInfo']['user'] neq ''} checked="true"{/if}/>
                                <label for="checkbox">Remember me</label>
                            </div>
                        </div>
                        <div class="f-row">
                            <div class="full-width">
                                <button type="button" class="btn color medium full" onclick="return check_user_email();">Sign In</button>
                                <!-- <input type="submit" value="Login" class="btn color medium full" /> -->
                            </div>
                        </div>
                        <p><a href="{$data.base_url}forgot-pass?dtl=index">Forgot password?</a></p>
                        <div class="or_row"><span>or</span></div>
                        <div class="sign_fb"><a onclick="return fblogin();" href="javascript:void(0);"><img alt="" src="{$data.front_image}sign-fb.png"  style="height:50px;"></a></div>
                    </form>
                </div>
                <!--//Login-->
            </div>
            <!--- //Content -->
        </div>
    </div>
</main>
<!-- Footer -->
{include file='footer.tpl'}
<!-- //Footer -->
<!--***************mid firt row End**************-->
{literal}
<script type="text/javascript">
var userEmail='{/literal}{$data['userInfo']['user']}{literal}';
var userPassWord='{/literal}{$data['userInfo']['pass']}{literal}';
$("#vEmail").val(userEmail);
$("#vPassword").val(userPassWord);

function check_user_email(){
    var email=$("#vEmail").val().trim();   
    var vPassword=$("#vPassword").val().trim();
    var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
    var validemail = emailRegex.test(email);
    var valid=0;
    var isRemember = $('#rememberMe').prop('checked');

    if($("#vEmail" ).val() ==''){
        $("#vEmail" ).attr('class','inplogin loginwrap_error_text');
        $("#valemail").show();
        valid=1;
    }
    else if(!validemail){
        $("#vEmail" ).attr('class','inplogin loginwrap_error_text');
        $("#valemail").show();
        $("#valemail").text("Please Insert a Valid Email ID");
        valid=1;
    }
    else{
        $("#vEmail" ).attr('class','inplogin');
        $("#valemail").hide();
    }
    if($("#vPassword" ).val() ==''){
        $("#vPassword" ).attr('class','inplogin loginwrap_error_text');
        $("#valpwd").show();
        valid=1;
    }
    else{
        $("#vPassword" ).attr('class','inplogin');
        $("#valpwd").hide();
    }
    if(valid == 0){
        if(isRemember==true){
            var url=base_url+'login?vEmail='+email+'&vPassword='+vPassword+'&isRemember=Yes';
        }else{
            var url=base_url+'login?vEmail='+email+'&vPassword='+vPassword+'&isRemember=No';
        }                
        $("#btndiv").html('<button type="button" class="login_btn"><img src="'+front_image+'ajax-loader.gif"></button>'); 
        $.post(url,function(data){  

            if ($.trim(data) =='driversuccess') {
                window.location=base_url+'dashboard';    
            }
            else if($.trim(data) =='clientsuccess') {
                window.location=base_url+'customer';    
            }
            else{
                $("#msgdiv").show();
                $("#message").show();
                if($.trim(data) =='Inactive')
                 {
                     $("#message").html('Your Account is currently Inactive! <br> Kindly contact our Administrator for more Information.');
                 }
                 else
                 {
                    $("#message").text('Sorry, it seems like Email ID or Password is wrong.');
                 }   
                $("#btndiv").html('<button type="button" class="login_btn" onclick="return check_user_email();">Log In</button>');
                $(function() {
                    setTimeout(function() { $("#message").fadeOut(1500); }, 5000)
                    setTimeout(function() { $("#msgdiv").fadeOut(1500); }, 5000)
                }); 
                return false;
            }
        });
    }
    else{
        return false;
    }
}

$(document).ready(function(){
    setTimeout(function() { $("#flashMsg").fadeOut(1500); }, 5000);
});

window.fbAsyncInit = function() {
    FB.init({
        appId: '{/literal}{$data.FB_APPID}{literal}',
        cookie: true,
        xfbml: true,
        oauth: true
   });      
};
(function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
 }(document));

function fblogin(){
    $("#sign_fb").html('<button type="button" class="button fb-expand"><img src="'+front_image+'ajax-loader.gif"></button>');
    FB.login(function(response){
     if (response.authResponse) {
        var url = base_url+"login/fbSignup";
        $.post(url, function(data){
            if($.trim(data) == 'Signin'){
                window.location=base_url+'customer';
            }
            else if ($.trim(data) == 'Success') {
                window.location=base_url+'customer';
            }else{
                window.location=base_url+'login'; 
            }
        });
     }
    },{scope: 'email,user_likes,publish_stream'});
}

</script>
{/literal}