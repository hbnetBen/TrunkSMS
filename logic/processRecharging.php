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
	@mysql_select_db(DB,$conn) or die ("Skywalkers Nig: Cannot Select Database Please Try Again later");
	
	if(isset($_POST['submit'], $_POST['pincode'], $_POST['serialno'])){
	$serialno = addslashes(trim($_POST['serialno']));
	$pincode = addslashes(trim($_POST['pincode']));
	
		if(strlen($pincode) == 0 || strlen($pincode) > 255 || strlen($serialno) > 255 || strlen($serialno) == 0 ){
		echo "<div class=\"ui-widget\">";
echo "<div class=\"ui-state-error ui-corner-all\" style=\"padding: 0 .7em;  margin-top: 20px; \">";
				echo "<p><span class=\"ui-icon ui-icon-alert\" style=\"float: left; margin-right: .3em;\"></span>"; 
				echo "<strong>Alert:</strong> Please check the entries and fill them properly.</p>";
					echo "<div  class = \"back\"><a style = \"text-decoration: none;\" href = \"./\" onClick = \"getPaymentType(); return false\">back</a></div>";
echo "</div></div>";

/*
		echo "<div id = \"failure\">";
	echo "Please check the entries and fill them properly.";
	echo "</div> <!-- end failure -->";
	echo "<div  class = \"back\"><a style = \"text-decoration: none;\" href = \"./\" onClick = \"getPaymentType(); return false\">back</a></div>";*/
		
		}else{
		$sql = "SELECT * FROM TRUNKrecharging WHERE serialNo = '$serialno' AND pincode = '$pincode' AND used != 1 ";
		$result = @mysql_query($sql);
		$num = 0;
		$num = @mysql_num_rows($result);
		
		
			if($num == 1){ //we should credit his account
			$result = @mysql_fetch_array($result);
			$units = $result['units'];
			
			$sql = "SELECT SMSunits FROM TRUNKregistration WHERE phoneNo = '$phoneNo' ";
			
			$result = @mysql_query($sql);
			$result = @mysql_fetch_array($result);
			
			$oldunit = $result['SMSunits'];
			
			
			$newUnits = $oldunit + $units;
			
			$sql = "UPDATE TRUNKrecharging SET `used` = '1', `phone` = '$phoneNo', `date` = NOW() WHERE `serialNo` = '$serialno' ";
			
			$result = @mysql_query($sql);
			
			$sql = "UPDATE TRUNKregistration SET `SMSunits` = '$newUnits' WHERE `phoneNo` = '$phoneNo' ";
			$result2 = @mysql_query($sql);
			
				if($result && $result2){ //both parties went successfuly
				
				$_SESSION['balance'] = $newUnits;
				
				echo "<div class=\"ui-widget\">";
				echo "<div class=\"ui-state-highlight ui-corner-all\" style=\"margin-top: 20px; padding: 0 .7em;\">"; 
				echo "<p><span class=\"ui-icon ui-icon-info\" style=\"float: left; margin-right: .3em;\"></span>";
				echo "Transaction Completed Successfuly. Your new SMS balance is " . $newUnits . " Unit(s). Thanks for Recharging.</p>";
				echo "<div  class = \"back\"><a style = \"text-decoration: none;\" href = \"./\"  onClick = \"getSMSForm(); return false;\">back</a></div>";
				echo "</div></div>";
				/*
				echo "<div id = \"success\">";
				echo "Transaction Completed Successfuly. Your new SMS balance is " . $newUnits . " Unit(s). Thanks for Recharging";
				echo "</div> <!-- end success -->";
				echo "<div  class = \"back\"><a style = \"text-decoration: none;\" href = \"./\"  onClick = \"getSMSForm(); return false;\">back</a></div>";*/
				
				}else{
				
				echo "<div class=\"ui-widget\">";
echo "<div class=\"ui-state-error ui-corner-all\" style=\"padding: 0 .7em; margin-top: 20px; \">";
				echo "<p><span class=\"ui-icon ui-icon-alert\" style=\"float: left; margin-right: .3em;\"></span>"; 
				echo "<strong>Alert:</strong> There was a problem processing your Transaction.</p>";
				echo "<div  class = \"back\"><a style = \"text-decoration: none;\" href = \"./\" onClick = \"getPaymentType(); return false\">back</a></div>";	
				echo "</div></div>";
				/*
				echo "<div id = \"failure\">";
				echo "There was a problem processing your Transaction";
				echo "</div> <!-- end failure -->";
				echo "<div  class = \"back\"><a style = \"text-decoration: none;\" href = \"./\" onClick = \"getPaymentType(); return false\">back</a></div>";	
				*/
				}
			
			
			}else{
			echo "<div class=\"ui-widget\">";
echo "<div class=\"ui-state-error ui-corner-all\" style=\"padding: 0 .7em; margin-top: 20px; \">";
				echo "<p><span class=\"ui-icon ui-icon-alert\" style=\"float: left; margin-right: .3em;\"></span>"; 
				echo "<strong>Alert:</strong> The Provided Pin Code or Serial No. does not Exists.</p>";
				echo "<div  class = \"back\"><a style = \"text-decoration: none;\" href = \"./\" onClick = \"getPaymentType(); return false\">back</a></div>";	
				echo "</div></div>";
				
				/*
			echo "<div id = \"failure\">";
			echo "The Provided Pin Code or Serial No. does not Exists.";
			echo "</div> <!-- end failure -->";
			echo "<div  class = \"back\"><a style = \"text-decoration: none;\" href = \"./\" onClick = \"getPaymentType(); return false\">back</a></div>";*/
			
			}
		
		
		
		
		}
	
	
	
	}else{
	echo "<div id = \"failure\">";
	echo "Unauthorized access!";
	echo "</div> <!-- end failure -->";
	echo "<div  class = \"back\"><a style = \"text-decoration: none;\" href = \"./\" onClick = \"getPaymentType(); return false\">back</a></div>";
	}
}else{

echo "<div class=\"ui-widget\">";
echo "<div class=\"ui-state-error ui-corner-all\" style=\"padding: 0 .7em;  margin-top: 20px; \">";
				echo "<p><span class=\"ui-icon ui-icon-alert\" style=\"float: left; margin-right: .3em;\"></span>"; 
				echo "<strong>Alert:</strong> Another user with the username {$_SESSION['name']} is in already. click <a href = \"./\">here</a></p>";
				echo "<div  class = \"back\"><a style = \"text-decoration: none;\" href = \"./\" onClick = \"getSMSForm(); return false;\">back</a></div>";	
echo "</div></div>";

/*
echo "<div id = \"failure\">";
	echo "Another user with the username {$_SESSION['name']} is in already. click <a href = \"./\">here</a> ";
	echo "</div> <!-- end failure -->";
	echo "<div  class = \"back\"><a style = \"text-decoration: none;\" href = \"./\"  onClick = \"getSMSForm(); return false;\">back</a></div>";
	*/
}

function showerror(){
echo "<div class=\"ui-widget\">";
echo "<div class=\"ui-state-error ui-corner-all\" style=\"padding: 0 .7em; margin-top: 20px; \">";
				echo "<p><span class=\"ui-icon ui-icon-alert\" style=\"float: left; margin-right: .3em;\"></span>"; 
				echo "<strong>Alert:</strong> Please check the entries and fill them properly.</p>";
				echo "<div  class = \"back\"><a style = \"text-decoration: none;\" href = \"./\" onClick = \"getPaymentType(); return false\">back</a></div>";
				echo "</div></div>";
				/*
echo "<div id = \"failure\">";
	echo "Please check the entries and fill them properly.";
	echo "</div> <!-- end failure -->";
	echo "<div  class = \"back\"><a style = \"text-decoration: none;\" href = \"./\" onClick = \"getPaymentType(); return false\">back</a></div>";*/
}
?>
