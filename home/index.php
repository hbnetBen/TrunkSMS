<?php
setcookie('web','www.TrunkSMS.com',time( ) + 60*60*60);
?>
<!--
/* Have you got Christ?
 * TrunkSMS GPL project www.trunksms.com.
 * 
 * @author  Daser Solomon Sunday songofsongs2k5@gmail.com,  daser@trunksms.com
 * @version 0.1
 * @License
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Library General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor Boston, MA 02110-1301,  USA
 */
 -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="./images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />

<link rel="stylesheet" media="all" type="text/css" href="./css/menu_style.css" />
<title>TrunkSMS - A platform to send Bulk SMS to Nigerian Mobile Networks.</title>
<META name="description" content = "TrunkSMS lets you Send Bulk SMS to all Mobile Networks in Nigeria in one Click">
<META name="keywords" content = "TrunkSMS, Send Bulk SMS,  send free SMS, Cheap SMS, affordable SMS, website that you can send free sms, Nigeria, MTN Nigeria, Zain, Glo Nigeria">

	
		<script type = "text/javascript" src ="./presentation/jqueryaddition.js"></script>

		<script type = "text/javascript" src ="./presentation/ajaxReq.js"></script>
		<script type = "text/javascript" src = "./presentation/homepage.js"></script>		<link rel="stylesheet" type="text/css" href="./css/common.css">
		<link rel="stylesheet" type="text/css" href="./css/home.css">

	<link type="text/css" href="./jquery/css/ui-lightness/jquery-ui-1.8.custom.css" rel="stylesheet" />
	<script type="text/javascript" src="./jquery/development-bundle/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="./jquery/development-bundle/ui/jquery.ui.core.js"></script>
	<script type="text/javascript" src="./jquery/development-bundle/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="./jquery/development-bundle/ui/jquery.ui.position.js"></script>
	<script type="text/javascript" src="./jquery/development-bundle/ui/jquery.ui.dialog.js"></script>
	<script type="text/javascript" src="./jquery/development-bundle/ui/jquery.ui.progressbar.js"></script>
	
<style type="text/css">

body{
font-family: Trebuchet MS, Tahoma, Verdana, Arial, sans-serif;
margin:0;
background: #f6f6f6;
padding:0;
}


#formin{
margin-top: 0px;
background: url(./images/bgc2.gif) left top repeat-x;
border-bottom:1px solid #c3d9ff;
border-left:1px solid #d0e1ce;	
border-right:1px solid #c3d9ff;	
width: auto;
padding: 15px 15px;
}


b{font-size: 110%;}

#topsection{
height: 50px;
background: url(./images/header_back.jpg) left repeat-x;
font-size: 30px;
}

#topsection h1{
margin: 0;
padding-top: 15px;
}

#contentwrapper{
float: left;
width: 100%;
}

#contentcolumn{
margin: 0 30% 0 30%;
}

#leftcolumn{
float: left;
width: 30%;
margin-left: -100%;
}

#rightcolumn{
float: left;
width: 30%;
margin-left: -30%;
}

.innertube{
margin: 10px;
margin-top: 0;
}
</style>
<script type = "text/javascript">
function notify(){
document.getElementById("loading").innerHTML = "";
document.getElementById("Tbody").style.visibility = "";

<?php

if(strlen($_COOKIE['web']) == 0 || empty($_COOKIE['web'])){
echo "var x = 1;\n";
}else{
echo "var x = 0;\n";
}

?>
if(x == 1)alert("Welcome, Use Firefox, Google Chrome, Opera for Best view");

}

</script>


<script type="text/javascript">
var _gaq=_gaq||[];_gaq.push(["_setAccount","UA-17805253-1"]);_gaq.push(["_trackPageview"]);(function(){var b=document.createElement("script");b.type="text/javascript";b.async=true;b.src=("https:"==document.location.protocol?"https://ssl":"http://www")+".google-analytics.com/ga.js";var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(b,a)})();
</script>

</head>
<body onLoad = "notify();">

<div id = "loading" style = "font-size: 40px; color: #336633;">Loading, Please Wait..

<div class="ui-widget">
			<div class="ui-state-default ui-corner-all " style="margin-top: 20px; padding: 2px; font-size: 13px; color: #336633;"> 
			
Please wait while TrunkSMS gets loaded. Slow network connection? Click <a href = "./slow/">here</a> for a design with less funtionality.

<p>TrunkSMS is designed for Mozila Firefox, Google Chrome, Opera and diverse FOSS browsers.</p>
 </div><!-- ui-state -->
 
 </div><!-- ui-widget -->


</div>

<div id = "Tbody" style = "visibility: hidden;">

<div id = "header">Welcome Guest!</div>

<div id = "pre_main_body">
<div id="maincontainer">

<div id="topsection">
<div class="innertube">
<?php
include("includes/logo.php");
?><img src = "./images/yourworld.gif">
</div>

</div><!-- end of topsection -->


<div id="contentwrapper">
<div id="contentcolumn">
<div class="innertube">

<div id="middle_panel">

<div id = "server_status">

<div class="ui-widget">
			<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> 
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<strong>Hey! </strong><?php include "./includes/advert_text.php"; ?></p>
			</div>

		</div>
</div><!-- end serverstatus -->

<div class="ui-widget">
			<div class="ui-state-default ui-corner-all " style="margin-top: 20px; padding: 2px; font-size: 13px; color: #336633;"> 
Have problem logging in? Slow network connection? Click <a href = "./slow/">here</a> for a design with less funtionality. <p>		
TrunkSMS is designed for Mozila firefox, google chrome, opera and diverse FOSS browsers.</p>
 </div><!-- ui-state -->
 
 </div><!-- ui-widget -->

    <div id = "signup_title"><table><tr><td><img src = "./images/trunkons/sign-up.png"></td><td><h2>SignUp</h2></td></tr></table></div>
    
    <div id = "signup">
    <form id = "formin" name = "form1" onSubmit = "submitForm(); return false;" action = "" method = "post">
<table>
<tr>
<td><label>*Organization/Name:</label></td><td><input type = "text" name="oname" class = "login_txtformat"/></td>
</tr> 

<tr>
<td></td><td></td>
</tr> 

<tr>
<td><label>*Phone No:</label></td><td><input type = "text" name="phone" class = "login_txtformat" autocomplete="off"/></td>
</tr> 

<tr>
<td></td><td></td>
</tr> 

<tr>
<td><label>*Address:</label></td><td><textarea name="address" class = "login_txtformat"/></textarea></td>
</tr> 

<tr>
<td></td><td></td>
</tr>


<tr>
<td><label>*Country:</label></td><td>

<select name = "country">
<?php
require_once "./includes/trunk_config.php";
	$conn =mysql_connect(HOST,USER,PASS) or die("Skywalkers Nig: Cannot Connect To the Database Server");
	mysql_select_db(DB,$conn) or die ("Skywalkers Nig: Cannot Select Database Please Try Again later");
	$sql = "SELECT * FROM TRUNKsuported";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if($num == 0){
	echo "<option>No country</option>";
	}else{
		while($rows = mysql_fetch_array($result)){
		echo "<option>{$rows['code']}</option>";
		}
	}
?>
</select>
</td>
</tr>

<tr>
<td></td><td></td>
</tr>

<tr>
<td><label>*Email Address:</label></td><td><input type = "text" name="email" class = "login_txtformat"/></td>
</tr>

<tr>
<td></td><td></td>
</tr>

<tr>
<td><label>*Password:</label></td><td><input type = "password" name="password" class = "login_txtformat"/></td>
</tr>

<tr>
<td></td><td></td>
</tr>

<tr>
<td><label>*Password:</label></td><td><input type = "password" name="password2" class = "login_txtformat"/></td>
</tr> 


<tr>
<td></td><td></td>
<tr>

<tr>
<td><!--<label>how did you find us?</label>--></td><td><input type = "hidden" name="how" class = "findus" value = "web"/></td>
</tr> 

<tr>
<td></td><td></td>
<tr>

<td></td><td><input type = "submit" name="submitReg" class="formsubmit" value="Register" style = "background:#fff url(./images/x.jpg) repeat-x top left; color: #FFFFFF; 
"/></td></tr> 
</tr>
<tr>
<td></td><td></td></tr> 
</table>
</form>
</div><!-- end signup-->
    </div><!-- end middle panel-->


</div><!-- end of innertube -->

</div><!-- end of contentcolum -->

</div><!-- end of contentwrapper -->


<div id="leftcolumn">
<div class="innertube">
<div id="left_panel" style = "">
 
<div class="ui-widget">
			<div class="ui-state-default ui-corner-all" style="margin-top: 20px; padding: 2px; font-size: 13px;"> 

 <table><tr><td><img src = "./images/trunkons/document-library.png"></td><td><div><h4>What is TrunkSMS?</h4></div></td></tr></table>
 <div style = "color: #336633;">
 <p>TrunkSMS is an application that Enables you to send SMS to Friends and Families in Nigeria.</p><p>You can schedule SMS for specified times.</p> <p>Send SMS to Many People at ones which is useful for Invitations of any sort, Businesses, Religous Bodies and organisational Use.</p><p>We provide SMS units in form of scratch cards usually:</p>
 <ul>
 <li>N100 = 20 Units</li>
 <li>N200 = 40 Units</li>
 <li>N500 = 100 Units</li>
 </ul>
 
 These are obtainable in Cyber Cafes within our coverage in Nigeria.<!-- Click <a style = "color: blue;" href = "#">here</a> to see the list of cyber cafes nearest to your location -->
 </div><!--end coloring-->
 
 <table><tr><td><img src = "./images/trunkons/special-offer.png"></td><td><div><h4>Supported Networks</h4></div></td></tr></table>
 
 <div style = "color: #336633;">
 <div id = "supported" style = "">
 TrunkSMS supports the Following Mobile Network and is subject to additions as our team is working hard to ensure that it covers all Nigerian Mobile Networks:
 
 <ul>
 <li>Etisalat</li>
 <li>Glo Nigeria</li>
 <li>MTN Nigeria</li>
 <li>Starcoms</li>
 <li>Zain Nigeria</li>
  
 
 </ul>
 </div><!-- end coloring green -->
 </div><!-- end supoted -->
 </div><!-- ui-state -->
 
 </div><!-- ui-widget -->
 

    </div><!-- end left_panel-->
    
</div><!-- end of innertube -->

</div><!-- end of leftcolum -->

<div id="rightcolumn">
<div class="innertube">

<div id="right_panel">
    <div id = "login_title" style = ""><table><tr><td><img src = "./images/trunkons/sign-in.png"></td><td><h2>Sign In</h2></td></tr></table></div>
    <div class = "login">
    <form action = "" method = "POST" name = "login" onSubmit = "authenticateUser(this); return false;">
    <table width = "100%">
    <tr>
    <td>Phone No:</td>
    <td><input type = "text" name = "username" class = "login_txtformat" autocomplete="off"></td>
    </tr>      
    <tr>
    <td>Password:</td>
    <td><input type = "password" name = "password" class = "login_txtformat"></td>
    </tr> 
    <tr>
    <td></td>
    <td><input type = "submit" name = "submit" value="Log In" style = "background:#fff url(./images/x.jpg) repeat-x top left; color: #FFFFFF; 
" ></td>
    </tr> 
    
    </table>
    </form>    
    </div><!-- end login-->
 
 
    
    <div id = "forgot" style = "margin-top: 5px; margin-left: 10px;">
    <table><tr><td><img src = "./images/trunkons/brainstorming.png"></td><td><h3>Forgot My Password</h3></td></tr></table>
    <form action = "" method = "post" name = "forgot" onSubmit = "submitForgot(); return false;">
    <table width = "100%">
    <tr>
    <td><input type = "text" name = "mynumber" class = "login_txtformat" value = "Your phone Number" onClick = "clearBox(this)"/></td><td><input type = "submit" name = "mailPass" value ="Email Password" style = "background:#fff url(./images/x.jpg) repeat-x top left; 
; color: #FFFFFF;"/> </td>
    <tr>
    </table>
    </form>
    </div><!-- end forgot-->
    
    <div id = "follo">
    </div><!--end follo-->
    <div id = "activate" style = "margin-top: 5px; margin-left: 30px;"><table><tr><td><img src = "./images/trunkons/check.png"></td><td><h3><a href = "" onClick = "getAcctAcctForm(); return false;"> Activate my Account</a></h3></td></tr></table>
    <div id = "activationForm" style = "margin-top: 5px; margin-left: 30px; color: blue;"><!-- activation form invoked with ajax--></div> <!-- end activationForm -->
    
    </div><!-- end activate-->
    <div id = "miniadv"><?php include "./includes/advert.php" ?></div>
    
    
    <div class="ui-widget">
			<div class="ui-state-default ui-corner-all " style="margin-top: 20px; padding: 2px; font-size: 13px; color: #336633;"> 
			
<div id = "address"><address>Contact us: Roxate Cyber Cafe @ 39 Dass Road, Yelwa Tudu, Bauchi State. or call  Victor: 08083349699 victornuhu@trunksms.com</address></div>
 </div><!-- ui-state -->
 
 </div><!-- ui-widget -->
 
    
    
    </div> <!-- end right panel-->
    
</div><!-- end of innertube -->
</div><!-- end of rightcolum -->


<div id = "hidendialogs">
<div id="dialog-message" title="TrunkSMS" style= "visibility: hidden;">
	<p>
		<span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
	</p>
	
	<div id = "upperMesg"></div>
	
		<p>
		<div id = "lowerMesg"></div>
		</p>
</div>

<div id = "progress" title = "TrunkSMS" style = "visibility: hidden;">
<div id = "progress_upperMesg"></div>

<div id="progressbar"></div>

</div><!-- end progress -->

</div><!--end hidden dialogs-->

</div><!-- end of maincontainer -->

<div id = "after_body">
<div id="footer"><?php include("./includes/footer.php") ?></div><!-- *DONT* REMOVE THIS -->
</div> <!-- end after_body -->


</div> <!-- end Tbody -->
</body>
</html>
