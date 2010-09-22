<?php
if (!isset ($_SESSION)) session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>TrunkSMS root Panel</title>

<script src="../../src/min.rico.js" type="text/javascript"></script>
<link href="../../src/css/min.rico.css" type="text/css" rel="stylesheet" />
<link href="../../src/css/greenHdg.css" type="text/css" rel="stylesheet" />
<link href="../client/css/demo.css" type="text/css" rel="stylesheet" />
<?php
require "applib.php";

OpenDB();
$sqltext="select phoneNo,email, SMSunits, org, activated, emailCode, phoneCode, address, how, AccountNo from TRUNKregistration";
CloseApp();
$_SESSION['ex3']=$sqltext;
require "chklang2.php";
?>
<script type='text/javascript'>
var ex3,buffer;

Rico.onLoad( function() {
  // filterUI='t' --> text box
  // filterUI='s' --> select list
  var grid_options = {
    frozenColumns:    3,
    canFilterDefault: false,  // turn off filter menu items
    FilterLocation:   -1,     // put filter on a new header row
    saveColumnInfo: {width:true, filter:true, sort:true},
    columnSpecs:  [{filterUI:'t',width:150},{filterUI:'t',width:150},,
                   {filterUI:'t',width:100}, {filterUI:'s',width:100},
                   ,,]
  };
  buffer=new Rico.Buffer.AjaxSQL('ricoXMLquery.php', {TimeOut:<?php print array_shift(session_get_cookie_params())/60 ?>});
  ex3=new Rico.LiveGrid ('ex3', buffer, grid_options);
  ex3.menu=new Rico.GridMenu();
});
</script>

<style type="text/css">
input, select { font-weight:normal;font-size:8pt;}
tr.ex3_hdg2 div.ricoLG_cell { 
  height:     1.4em;   /* the text boxes require a little more height than normal */
  text-align: left;
  background-color: #deeecd;
}
.ricoLG_cell {
  white-space: nowrap;
}
</style>
</head>


<body>
<p class="ricoBookmark">
<a id='ex3_filterLink' href="#"></a>
<span id="ex3_bookmark">&nbsp;</span></p>
<table id="ex3" class="ricoLiveGrid" cellspacing="0" cellpadding="0">
<thead>
  <tr id='ex3_main'>
	  <th class='ricoFrozen'>Phone Number</th>
	  <th>Email</th>
	  <th>SMS units</th>
	  <th>Organization/Name
	  
	  <th>Activated</th>
	  <th>Email Code</th>
	  <th>Phone Code</th>
	  <th>Address</th>
	  <th>How</th>
	  <th>Account No</th>
	  
  </tr>
</thead>
</table>

</body>
</html>

