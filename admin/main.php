<?php
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
session_start();

if(isset($_SESSION['root']) && $_SESSION['root'] == "admin"){
  	
}else{
header("location: ./");
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>TrunkSMS Root Panel</title>

<style type="text/css">
input, select { font-weight:normal;font-size:8pt;}

body{
font-family: Trebuchet MS, Tahoma, Verdana, Arial, sans-serif;
margin:0;
background: #f6f6f6;
padding:0;
}

#topsection{
height: 50px;
background: url(../images/header_back.jpg) left repeat-x;
font-size: 30px;
}

#topsection h1{
margin: 0;
padding-top: 15px;
}

#header{
font-size:12px;
padding-right: 10px;
border-right: none;
border-top: none;
border-left: none;	
text-align: right;
margin-bottom: 3px;
margin-top: 3px;
}

#footer{
clear: left;
margin-top: 5px;
text-align: center;
font-size: 11px;
color: #9d9f13;
text-align: center;
}

</style>
</head>


<body>
<div id = "header">Welcome <?php echo $_SESSION['username'] ?>! | <a href = "signout.php">sign out</a></div>
<div id="topsection">
<div class="innertube">
<img src = "../images/logo2.gif";
<img src = "../images/yourworld.gif">
</div>

</div><!-- end of topsection -->

<center>
<h1>Welcome <?php echo $_SESSION['username'] ?>!</h1>
<form method = "post" action = "<?php echo $_SERVER['PHP_SELF'] ?>">
<table cellspacing = "20">
<tr>
<td><a href = "report/scratchcard.php">Scratch Card Details</a></td>
<td><a href = "report/general.php">Customer Details</a></td>
</tr>

<tr>
<td><a href = "sudo/credit.php">Credit Custormer Acct.</a></td>
<td><a href = "sudo/scratchcarduploadForm.php">Upload Scratch Card</a></td>
</tr>

<tr>
<td><a href = "report/users.php">Users/Password</a></td>
<td><a href = "report/Logstatus.php">Sent SMS Log</a></td>
</tr>

</table>
</form>
</center>
<br/>
<div id="footer"><?php include("../includes/footer.php") ?></div>
</body>
</html>
