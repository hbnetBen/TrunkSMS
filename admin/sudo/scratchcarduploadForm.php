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
header("location: ../");
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

<?php

echo "<h3>Upload Recharge Pins</h3>";
echo "File content Format: Pin, serial, Units per line.<br/>";
echo "File Type: Text/CSV, Text/Plain e.g *.csv, *.txt.";
echo "<div class = \"loginExt\"";

print "<form name=\"form2\" method=\"post\" action=\"./Reacharge_process_upload.php\"
enctype=\"multipart/form-data\">";
			print "<table align = \"center\">";
			print "<tr>";
			print "<td>Upload:</td><td><input name=\"scratchcard_filename\" type=\"file\" id=\"upload\"></td>";
			echo "</tr>";
echo "<tr><td></td>";
echo "<td><input type = \"submit\" name = \"uploadscratchcard\" value=\"upload\"></td></tr>";

print "</table></form></div>";	

?>
<div id="footer"><?php include("../../includes/footer.php") ?></div>
</body>
</html>
