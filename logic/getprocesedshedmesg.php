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
if(strlen($_SESSION['phoneNo']) > 0){
require_once "../includes/trunk_config.php";
$phoneNo = $_SESSION['phoneNo']; //session variable
	$conn =@mysql_connect(HOST,USER,PASS) or die("Skywalkers Nig: Cannot Connect To the Database Server");
	mysql_select_db(DB,$conn) or die ("Skywalkers Nig: Cannot Select Database Please Try Again later");
	//$phoneNo make sure session exist
	if(1){
	$num = 0;
	$num2 = 0;
	
	$sql = "SELECT * FROM TRUNKsheduleMultiple WHERE phoneNo = '$phoneNo' AND sent = 1";
	$sql2 = "SELECT * FROM TRUNKsheduleSingle WHERE phoneNo = '$phoneNo' AND sent = 1";
	$result = @mysql_query($sql);
	$result2 = @mysql_query($sql2);
	$num = @mysql_num_rows($result);
	$num2 = @mysql_num_rows($result2);

		
		if($num != 0 || $num2 != 0 ){
		
		while($row = mysql_fetch_array($result)){
		$she_mesg .= $row['statusMessages'];		
		}
		
		while($row2 = mysql_fetch_array($result2)){
		$she_mesg .= $row2['statusMessages'];		
		}
		
		//$sql = "DELETE FROM TRUNKsheduleMultiple WHERE phoneNo = '$phoneNo' AND sent = 1";
		$sql = "DELETE FROM TRUNKsheduleMultiple WHERE `TRUNKsheduleMultiple`.`phoneNo` = '$phoneNo' AND sent =1";
		$sql2 = "DELETE FROM TRUNKsheduleSingle WHERE phoneNo = '$phoneNo' AND sent = 1";
		mysql_query($sql);
		mysql_query($sql2);
		
		
				echo "<div class=\"ui-widget\">";
				echo "<div class=\"ui-widget-content ui-corner-all\" style=\"margin-top: 20px; padding: 0 .7em;\">"; 
				echo "<p><span class=\"ui-icon ui-icon-info\" style=\"float: left; margin-right: .3em;\"></span>";
				echo "<h4><strong>Sheduled SMS Notification</strong></h4>" . $she_mesg . "</p>";
				echo "</div></div>";
			
		}	
	
	
	}else{
	echo "<div class=\"ui-widget\">";
echo "<div class=\"ui-state-error ui-corner-all\" style=\"padding: 0 .7em;  margin-top: 20px; \">";
				echo "<p><span class=\"ui-icon ui-icon-alert\" style=\"float: left; margin-right: .3em;\"></span>"; 
				echo "<strong>Alert:</strong> Oops! is either your session has espired or you did not click the delete link.</p>";
				echo "<div  class = \"back\"><a style = \"text-decoration: none;\" href = \"./\"  onClick = \"getSMSForm(); return false;\">back</a></div>";
echo "</div></div>";	
	}
}else{
echo "<div class=\"ui-widget\">";
echo "<div class=\"ui-state-error ui-corner-all\" style=\"padding: 0 .7em;  margin-top: 20px; \">";
				echo "<p><span class=\"ui-icon ui-icon-alert\" style=\"float: left; margin-right: .3em;\"></span>"; 
				echo "<strong>Alert:</strong> Your session has expired. click <a href = \"./\">here</a></p>";
					echo "<div  class = \"back\"><a style = \"text-decoration: none;\" href = \"./\"   onClick = \"getSMSForm(); return false;\">back</a></div>";

echo "</div></div>";
}
	?>
