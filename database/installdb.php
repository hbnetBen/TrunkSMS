<?php
/*
 * TrunkSMS GPL project www.trunksms.com.
 * 
 * @author  Daser Solomon Sunday songofsongs2k5@gmail.com
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
 
require_once "../includes/trunk_config.php";


$conn =@mysql_connect(HOST,USER,PASS) or die("Daser Solomon: Cannot Connect To the Database Server");
	
	$result = mysql_query("CREATE DATABASE IF NOT EXISTS " . DB . ";") or die(mysql_error());
	
	mysql_select_db(DB,$conn) or die (mysql_error() . "Daser Solomon: Cannot Select Database Please Try Again later");
	
	//$query = file_get_contents("trunktables.sql");
	
	$status = 0; //overal status of operation
	
	$result = mysql_query("CREATE TABLE IF NOT EXISTS TRUNKphoneBook (
  id int(255) NOT NULL AUTO_INCREMENT,
  phoneNo varchar(255) NOT NULL,
  number varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  category varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='phoneNo is the forign key while number is the new contact';") or die(mysql_error());

if($result){
	
	print "Successfuly created TRUNKphoneBook table for Trunksms.com<br/>";
	$status = 1;
	
}else{

print "Failure creating TRUNKphoneBook table for Trunksms.com <br/>";
$status = 0;
}

$result = mysql_query("CREATE TABLE IF NOT EXISTS TRUNKphoneBookCat (
  id int(255) NOT NULL AUTO_INCREMENT,
  phoneNo varchar(255) NOT NULL,
  category varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;") or die(mysql_error());
	
if($result){
	
	print "Successfuly created TRUNKphoneBookCat table for Trunksms.com<br/>";
	$status = 1;
}else{

print "Failure creating TRUNKphonebookcat table for Trunksms.com <br/>";
$status = 0;
}	
	
	
$result = mysql_query("CREATE TABLE IF NOT EXISTS TRUNKrecharging (
  serialNo varchar(255) NOT NULL,
  pincode varchar(255) NOT NULL,
  used int(255) NOT NULL,
  phone varchar(255) DEFAULT NULL,
  units int(255) NOT NULL,
  `date` date DEFAULT NULL,
  identifyer varchar(255) NOT NULL,
  PRIMARY KEY (serialNo)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;") or die(mysql_error());
	
if($result){
	
	print "Successfuly created TRUNKrecharging table for Trunksms.com<br/>";
	$status = 1;
}else{

print "Failure creating TRUNKrecharging table for Trunksms.com <br/>";
$status = 0;
}		
	
$result = mysql_query("CREATE TABLE IF NOT EXISTS `TRUNKregistration` (
  `phoneNo` varchar(255) NOT NULL,
  `org` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `activated` int(255) NOT NULL,
  `emailCode` varchar(255) NOT NULL,
  `phoneCode` varchar(255) NOT NULL,
  `countryCode` varchar(255) NOT NULL,
  `address` blob,
  `how` varchar(255) DEFAULT NULL,
  `AccountNo` varchar(255) DEFAULT NULL,
  `SMSunits` int(11) DEFAULT NULL,
  PRIMARY KEY (`phoneNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;") or die(mysql_error());
	
if($result){
	
	print "Successfuly created TRUNKregistration table for Trunksms.com <br/>";
	$status = 1;
}else{

print "Failure creating TRUNKregistration table for Trunksms.com <br/>";
$status = 0;

}	


$result = @mysql_query("INSERT INTO TRUNKregistration (phoneNo, org, password, email, activated, emailCode, phoneCode, countryCode, address, how, AccountNo, SMSunits) VALUES
('08077746115', 'Trunksms', 'yahweh', 'testing@trunksms.com', 1, 'TSMS9997591427', 'TSMS9662579224', '+234', 0x52756b75626120526f6164204a6f73, 'web', 'ACCT4562974233', 10);") or die(mysql_error());
	
if($result){
	
	print "Successfuly populate TRUNKregistration table for Trunksms.com <br/>";
	$status = 1;
	
}else{

print "Failure Populating TRUNKregistration table for Trunksms.com <br/>";
$status = 0;
}



$result = mysql_query("CREATE TABLE IF NOT EXISTS `TRUNKsent` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `org` varchar(255) NOT NULL,
  `phoneNo` varchar(255) NOT NULL,
  `toNum` varchar(255) DEFAULT NULL,
  `mesg` blob NOT NULL COMMENT 'SMSlog',
  `fromNa` varchar(255) DEFAULT NULL,
  `units` int(10) DEFAULT NULL,
  `statusMsg` blob,
  `date` date DEFAULT NULL,
  `sent` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;
") or die(mysql_error());
	
if($result){
	
	print "Successfuly created TRUNKsent table for Trunksms.com <br/>";
	$status = 1;
}else{

print "Failure creating TRUNKsent table for Trunksms.com <br/>";
$status = 0;

}

$result = mysql_query("CREATE TABLE IF NOT EXISTS TRUNKsheduleMultiple (
  id int(255) NOT NULL AUTO_INCREMENT,
  phoneNo varchar(255) NOT NULL,
  mesg blob NOT NULL,
  smsName varchar(255) NOT NULL,
  category varchar(255) NOT NULL,
  times varchar(255) NOT NULL,
  statusMessages blob,
  sent int(2) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18;") or die(mysql_error());
	
if($result){
	
	print "Successfuly created TRUNKshedulMultiple table for Trunksms.com <br/>";
	$status = 1;
	
}else{

print "Failure creating TRUNKshedulMultiple table for Trunksms.com <br/>";
$status = 0;

}

$result = mysql_query("CREATE TABLE IF NOT EXISTS TRUNKsheduleSingle (
  id int(255) NOT NULL AUTO_INCREMENT,
  phoneNo varchar(255) NOT NULL,
  mesg blob NOT NULL,
  smsName varchar(255) NOT NULL,
  tophone varchar(255) NOT NULL,
  times varchar(255) NOT NULL,
  statusMessages blob,
  sent int(2) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9;") or die(mysql_error());
	
if($result){
	
	print "Successfuly created TRUNKsheduleSingle table for Trunksms.com <br/>";
	$status = 1;
}else{

print "Failure creating TRUNKsheduleSingle table for Trunksms.com <br/>";
$status = 0;
}

$result = mysql_query("CREATE TABLE IF NOT EXISTS TRUNKsuported (
  code varchar(255) NOT NULL,
  country varchar(255) NOT NULL,
  PRIMARY KEY (code)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;") or die(mysql_error());
	
if($result){
	
	print "Successfuly created TRUNKsuported table for Trunksms.com <br/>";
	$status = 1;
}else{

print "Failure creating TRUNKsuported table for Trunksms.com <br/>";
$status = 0;
}

$result = @mysql_query("INSERT INTO TRUNKsuported (code, country) VALUES
('+234', 'Nigeria');") or die(mysql_error());
	
if($result){
	
	print "Successfuly populated TRUNKsuported table for Trunksms.com <br/>";
	$status = 1;
}else{

print "Failure populating TRUNKsuported table for Trunksms.com <br/>";
$status = 0;
}

$result = mysql_query("CREATE TABLE IF NOT EXISTS TRUNKtransactions (
  transactionID int(255) NOT NULL AUTO_INCREMENT,
  phoneNo varchar(255) NOT NULL,
  paymentType varchar(255) NOT NULL,
  amountPaid varchar(255) NOT NULL,
  day_of_Payment varchar(255) NOT NULL,
  month_of_Payment varchar(255) NOT NULL,
  year_of_Payment varchar(255) NOT NULL,
  time_of_Payment varchar(255) NOT NULL,
  PRIMARY KEY (transactionID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;") or die(mysql_error());
	
if($result){
	
	print "Successfuly created TRUNKtransactions table for Trunksms.com <br/>";
	$status = 1;
}else{

print "Failure creating TRUNKtransactions table for Trunksms.com <br/>";
$status = 0;
}



$result = mysql_query("CREATE TABLE IF NOT EXISTS `TRUNKroot` (
  username varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;") or die(mysql_error());


if($result){
	
	print "Successfuly created TRUNKroot table for Trunksms.com<br/>";
		$status = 1;
}else{
print "Failure creating TRUNKroot table for Trunksms.com <br/>";
$status = 0;
}

$result = mysql_query("INSERT INTO `TRUNKroot` (`username`, `password`) VALUES
('admin', '4dea89e9c3f92a158bed3d511e813dbb');") or die(mysql_error());

if($result){
	
	print "Successfuly inserted Username and Password for admin in TRUNKroot table for Trunksms.com<br/>";
		$status = 1;
}else{
print "Failure creating Username and password in TRUNKroot table for Trunksms.com <br/>";
$status = 0;
}



if($status == 1){
print "Overall status of operation: SUCESS<br/>";
}else{
print "Overall status of operation: FAILURE<br/>";
}
?>
