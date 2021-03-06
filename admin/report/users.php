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
if (!isset ($_SESSION)) session_start();

if(isset($_SESSION['root']) && $_SESSION['root'] == "admin"){
  	
}else{
header("location: ../");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>TrunkSMS Root's user management</title>

<script src="./src/min.rico.js" type="text/javascript"></script>
<link href="./src/css/min.rico.css" type="text/css" rel="stylesheet" />
<link href="./src/css/grayedout.css" type="text/css" rel="stylesheet" />
<link href="./client/css/demo.css" type="text/css" rel="stylesheet" />

<?php
require "applib.php";
require "./plugins/php/ricoLiveGridForms.php";
?>


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
background: url(../../images/header_back.jpg) left repeat-x;
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

div.ricoLG_cell {
  white-space:nowrap;
}

</style>
</head>


<body>
<div id = "header">Welcome <?php echo $_SESSION['username'] ?>!</div>
<div id="topsection">
<div class="innertube">
<img src = "../../images/logo2.gif";
<img src = "../../images/yourworld.gif">
</div>

</div><!-- end of topsection -->
<center>
<div style = "font-size: 25px;">Sudoers Accounts</div>
<a href = "#" onClick="window.open('../md5gen.php', 'dict_win', 'width=650, height=400, resizable=yes,scrollbars=yes');; return false;" title = "Click me to Encrypt your Password" style = "font-size: 11px;">Encrypt your password **MANDATORY**</a>

<?php

if (OpenGridForm("", "TRUNKroot")) {
  if ($oForm->action == "table") {
    DisplayTable();
  }
  else {
    DefineFields();
  }
} else {
  echo 'open failed';
}
CloseApp();

function DisplayTable() {
  DefineFields();
  //echo "<p><textarea id='shippers_debugmsgs' rows='5' cols='80' style='font-size:smaller;'></textarea>";
}

function DefineFields() {
  global $oForm,$oDB;

  $oForm->AddEntryFieldW("username", "Username", "B", "",50);
  $oForm->AddEntryFieldW("password", "Password", "B", "", 150);
  $oForm->ConfirmDeleteColumn();
  $oForm->SortAsc();
  //$oForm->AddEntryFieldW("Phone", "Phone Number", "B", "", 150);

  $oForm->DisplayPage();
}


?>
</center>
<div id="footer"><?php include("../../includes/footer.php") ?></div>
</body>
</html>
