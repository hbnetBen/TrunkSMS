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
	
	if(isset($phoneNo, $_GET['contactID'])){
	$contactID = (int) $_GET['contactID'];
	$sql = "SELECT * FROM TRUNKphoneBook WHERE phoneNo = '$phoneNo'AND id = '$contactID' ";
	$result = @mysql_query($sql);
	$num = 0;
	$num = @mysql_num_rows($result);
		if($num == 0){
		echo "<div id = \"failure\">";
		echo "Contact does not exist";
		echo "</div> <!-- end failure -->";
		echo "<div  class = \"back\"><a style = \"text-decoration: none;\" href = \"./\" onClick = \"getContactForm();return false;\">Add to PhoneBook</a></div>";	
		}else{
			$rows = @mysql_fetch_array($result);
			echo "<table><tr><td><img src = \"./images/trunkons/category.png\"></td><td><h2>Edit Contact</h2></td></tr></table>";
			echo "<div class = \"login\">";
			echo "<form name = \"editContactForm\" action = \"./\" method = \"post\" onSubmit = \"EditContactBr(); return false;\">";
			echo "<table>";
			echo "<tr>";
			echo "<td>Name:</td><td><input type = \"text\"  value = \"{$rows['name']}\" name = \"contactName\" class = \"textboxex\"></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>Phone Number:</td><td><input type = \"text\" value = \"{$rows['number']}\" name = \"phoneNo\" class = \"textboxex\"></td>";
			echo "<tr>";
			echo "<td></td><td><input type = \"hidden\" value = \"{$rows['id']}\" name = \"id\"></td>";
			$id = $rows['id']; //we use this to delete the contact
			echo "</tr>";
			echo "<tr>";
			echo "<td>Category</td><td><select name = \"category\">";
			//get other categories
			$sql = "SELECT * FROM TRUNKphoneBookCat WHERE phoneNo = '$phoneNo' AND category != '{$rows['category']}' ";
			$result = @mysql_query($sql);
			$num = 0;
			$num = @mysql_num_rows($result);
				if($num == 0){
				//echo "<option>No category</option>";
				}else{
					while($rows = @mysql_fetch_array($result)){
					echo "<option>{$rows['category']}</option>";		
					}//endwhile	
				}
			echo "</select>";
			echo "<a href = \"\" onClick = \"getaddCatForm(); return false;\" >Add</a>";			
			echo "<td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td></td><td><input type = \"submit\" name = \"addContact\" value = \"Edit\"></td>";
			echo "</tr>";
			echo "</table>";
			echo "</form>";
			echo "</div>";
			echo "<div class = \"delete\"><a href = \"\" onClick = \"deleteContact($id); return false;\">Delete this Contact</a></div>";
		}	
		
	
	}else{
	echo "<div id = \"failure\">";
		echo "Cannot Edit Contact. Contact us for surport";
		echo "</div> <!-- end failure -->";
		echo "<div  class = \"back\"><a style = \"text-decoration: none;\" href = \"./\" onClick = \"getContactForm();return false;\">Add to PhoneBook</a></div>";
	}
	
}else{
echo "<div id = \"failure\">";
	echo "Your session has expired. click <a href = \"./\">here</a> ";
	echo "</div> <!-- end failure -->";
	echo "<div  class = \"back\"><a style = \"text-decoration: none;\" href = \"./\"  onClick = \"getSMSForm(); return false;\">back</a></div>";
}
