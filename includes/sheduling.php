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

function epoch_sheduling($time,$date){


$month =  substr($date, 0,2);
$day =  substr($date, 3,2);
$year =  substr($date, 6,6);

$epoch = mktime(0,0,0,$month,$day,$year);

// Find the First monday on or after November 1, 2008
$times = strtotime($time, $epoch);

return $times;

}

function sheduleSMS($acctphoneno, $mesg, $smsname,$toNumber,$times){ //single
global $conn;

$sql = "INSERT INTO TRUNKsheduleSingle (`phoneNo`, `mesg`, `smsName`, `tophone`, `times`,`sent`) VALUES ('$acctphoneno', '$mesg', '$smsname', '$toNumber', '$times','0');";

$result = @mysql_query($sql);
//$_SESSION['message'] .= mysql_error();

if($result){
return 1;
}else{
return 0;
}

//return false;
//$_SESSION['message'] .= ;	


}//end sheduleSingleSMS


function sheduleSMS_Multiple($acctphoneno, $mesg, $smsname,$category,$times){ //multiple
global $conn;

$sql = "INSERT INTO TRUNKsheduleMultiple (`id`,`phoneNo`, `mesg`, `smsName`, `category`, `times`,`sent`) VALUES (NULL,'$acctphoneno', '$mesg', '$smsname', '$category', '$times','0');";

$result = @mysql_query($sql);
//$_SESSION['message'] .= mysql_error() . $sql;	
if($result){
return 1;
}else{
return 0;
}

//return false;
//$_SESSION['message'] .= ;	

}//end shedulesms
?>
