{include file='header.tpl'}
<!-- Aboutus -->
        <div class="aboutus">
        	<div class="abtuswidth">
                <div class="abtuscontent">
                    <img src="{$data.front_image}abtus.png" alt="" />&nbsp; <span class="abtusheading"> About Us </span><br/>
                    <span class="abtusheading2">
                        we are Providing World Wide 
     Table Booking Service.
                    </span><br /><br />
                    <span class="abtusheading3">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                    </span><br /><br /><br />
                    <button class="btnloadmore">LOAD MORE</button>
                </div>
                <div  class="mobileimg">
                    <!--<img src="{$data.front_image}mobile.png" class="mobileimg" alt="" />-->
                </div>
             </div>
        </div>
        
        
        <!-- Services -->
        <div class="services">
        	<div class="svcdiv">
            	<span class="whatucan">What you can do with Happy Hours. you can do Book Table.</span>
                	<div class="middlediv">
                    	<a href="#"><div class="svc_cat barpub">
                        	<div class=" svcimg"></div>
                            <div class="downtxt">Search Bars & Pubs</div>
                        </div></a>
                        <a href="#"><div class="svc_cat reservedtable">
                        	<div class=" svcimg"></div>
                            <div class="downtxt">Reserved Table</div>
                        </div></a>
                        <a href="#"><div class="svc_cat getdirection">
                        	<div class=" svcimg"></div>
                            <div class="downtxt">Get Directions</div>
                        </div></a>
                        <a href="#"><div class="svc_cat distance">
                        	<div class=" svcimg"></div>
                            <div class="downtxt">Distance</div>
                        </div></a>
                        <a href="#"><div class="svc_cat rating">
                        	<div class=" svcimg"></div>
                            <div class="downtxt">Ratings</div>
                        </div></a>
                    </div>
                <button class="linebtn">See all the Features</button>
            </div>
        </div>
        
        
        
        <!-- video -->
        <div class="video">
        	<div class="onesentence">
            	<img src="{$data.front_image}play_old.png" class="playbtn" alt="" /> Check this video to know more about this app
            </div>
            <div class="video_img">
            	<img src="{$data.front_image}video.png" alt=""  />
            </div>
        </div>
        
        
        <!-- Customer -->
        <div class="customer">  
        	<div class="custwidth">
                <div class="customersay">What our customers say ?</div><br />
                
                <span class="italic"> 
                    <div class="testioneslide">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make </p>
                    <div class="testipostname"><span style="font-weight:600"> JOHN DOE </span>/ Some profession</div>
                    </div>
                    
                    <div class="testioneslide">
                    <p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make Lorem Ipsum is</p> 
                    <div class="testipostname"><span style="font-weight:600"> JOHNY DEPP </span>/ Some profession</div>
                    </div>
                    
                    <div class="testioneslide">
                    <p>printing and typesetting industry Lorem Ipsum is simply dummy text of the . Lorem Ipsum has been it to make the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>  
                    <div class="testipostname"><span style="font-weight:600"> LISELY MANN </span>/ Some profession</div>
                    </div>
                    
                </span>
            </div>
        </div>
        
        
        <!-- ContactUs-->
        <div class="contactform">
        	<div class="contactus">
            	Contact Us
            </div>
            <div class="belowcntc">
        		Feel Free to Contact Us For Your Any Queries
        	</div>
            <div class="rightdiv">
            	<div class="rightsubdiv">
                	<div class="rightheading">SOCIALIZED WITH US</div>
                    <div class="socialicon">
                    	<a href="#"><div class="tt socialnew"></div></a>
                        <a href="#"><div class="pinterest socialnew"></div></a>
                        <a href="#"><div class="in socialnew"></div></a>
                        <a href="#"><div class="fb socialnew"></div></a>
                        <a href="#"><div class="google socialnew"></div></a>
                    </div>
                    <div class="rightpara">
                    	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                    </div>
                    <div class="rightaddress">
                    	<ul>
                        <li>267 Banbury road, Sumertown</li>
						<li>Oxford, United kingdom, OX27HT</li>
						<li>United kingdom</li>
						<li>Phone: 01851133270</li>
						<li>Fax:01851133270</li>
						<li>E-mail: info@happyhours.com</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="leftdiv">
            	<div class="rightsubdiv">
                	<div class="rightheading">SEND A MESSAGE</div>
                    <form role="form" id="frmadmin" method="post" action="{$data.base_url}home/contact_us" enctype="multipart/form-data">
                        <div>
                            <input type="text" id="vFirstName" name="vFirstName" placeholder="Your First Name" class="txtfield" onkeydown="Javascript: if (event.keyCode==13) check_user_email();" />
                            <span id="valfirstname" style="display:none;" class="validationfrm loginmsg">Please Enter First Name.</span>
                            <input type="text" id="vLastName" name="vLastName" placeholder="Your Last Name" class="txtfield" onkeydown="Javascript: if (event.keyCode==13) check_user_email();" />
                            <span id="vallastname" style="display:none;" class="validationfrm loginmsg">Please Enter Last Name.</span>
                            <input type="text" id="vEmail" name="vEmail" placeholder="Your E-mail" class="txtfield" onkeydown="Javascript: if (event.keyCode==13) check_user_email();" />
                            <span id="valemail" style="display:none;" class="validationfrm loginmsg">Please Enter an Email ID.</span>
                            <input type="text" id="iMobileNo" name="iMobileNo" placeholder="Phone Number" class="txtfield" onkeydown="Javascript: if (event.keyCode==13) check_user_email();" />
                            <span id="valmobile" style="display:none;" class="validationfrm loginmsg">Please Enter Mobile Number.</span>
                            <textarea id="tMassage" name="tMassage" class="txtareafield" placeholder="Type your message....." onkeydown="Javascript: if (event.keyCode==13) check_user_email();"></textarea>
                            <span id="valmessage" style="display:none;" class="validationfrm loginmsg">Please Enter Message.</span>
                    	</div>
                        <div>
                            <button id="contactSubmit" type="submit" class="sendform" >SEND MESSAGE </button>
                        	
                        </div>
                    </form>
                </div>
            </div>
        </div>
<!-- //Main -->
<!-- Footer -->
{include file='footer.tpl'}
{literal}
<script type="text/javascript">

$(document).ready(function(){
    $('#contactSubmit').click(function(){
        var email=$("#vEmail").val().trim();   
        var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
        var validemail = emailRegex.test(email);
        var valid=0;

        if($("#vFirstName" ).val() ==''){
            $("#vFirstName" ).attr('class','txtfield inplogin loginwrap_error_text');
            $("#valfirstname").show();
            valid=1;
        }else{
            $("#vFirstName" ).attr('class','inplogin txtfield');
            $("#valfirstname").hide();
        }

        if($("#vLastName" ).val() ==''){
            $("#vLastName" ).attr('class','txtfield inplogin loginwrap_error_text');
            $("#vallastname").show();
            valid=1;
        }else{
            $("#vLastName" ).attr('class','inplogin txtfield');
            $("#vallastname").hide();
        }

        if($("#vEmail" ).val() ==''){
            $("#vEmail" ).attr('class','txtfield inplogin loginwrap_error_text');
            $("#valemail").show();
            valid=1;
        }
        else if(!validemail){
            $("#vEmail" ).attr('class','txtfield inplogin loginwrap_error_text');
            $("#valemail").show();
            $("#valemail").text("Please Insert a Valid Email ID");
            valid=1;
        }
        else{
            $("#vEmail" ).attr('class','inplogin txtfield');
            $("#valemail").hide();
        }

        if($("#iMobileNo" ).val() ==''){
            $("#iMobileNo" ).attr('class','txtfield inplogin loginwrap_error_text');
            $("#valmobile").show();
            valid=1;
        }else{
            $("#iMobileNo" ).attr('class','inplogin txtfield');
            $("#valmobile").hide();
        }

        if($("#tMassage" ).val() ==''){
            $("#tMassage" ).attr('class','txtareafield txtfield inplogin loginwrap_error_text');
            $("#valmessage").show();
            valid=1;
        }else{
            $("#tMassage" ).attr('class','txtareafield inplogin txtfield');
            $("#valmessage").hide();
        }


        
        if(valid == 0){
           return true;
        }else{
            return false;
        }
    });
});

</script>
{/literal}