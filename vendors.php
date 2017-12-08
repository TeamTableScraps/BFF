<?php
require_once("header.php");

foreach ($_POST as $k => $v) {
    $$k = mysqli_real_escape_string($MySQLi, trim($v));
}
unset($k, $v);

if(!isset($_POST['toSubmit'])){
    $_POST['toSubmit'] = 'false';
}
$errorMsg = '';

$checkVendor = $MySQLi->query("SELECT * FROM vendors");
if($checkVendor->num_rows > 0){
    while ($r = $checkVendor->fetch_array(MYSQLI_ASSOC)) {
        $vendorName = $r["bznz_name"];
        $vendorEmail = $r["bznz_email"];
        $vendorPhone = $r["bznz_phone"];
        $vendorURL = $r["bznz_url"];
        $vendorDescription = $r["description"];
        $boothID = $r["booth_ID"];
    }
}

echo '
    
	<div id="vendors" class="container-fluid bg-fade">
        
		<h2>Registered Vendors</h2>
        
		<table class="defaultbg fullwidth">
        
		<tr>
            
			<th class="info_table" align="center">Name</th>
			
			<th class="info_table" align="center">Booth</th>
			
			<th class="info_table" align="center">Description</th>
            
			<th class="info_table" align="center">Email</th>
            
			<th class="info_table" align="center">Phone Number</th>
			
			<th class="info_table" align="center">Website</th>
        
		</tr>
';

$checkVendor = $MySQLi->query("SELECT * FROM vendors");
if($checkVendor->num_rows > 0){
    while ($r = $checkVendor->fetch_array(MYSQLI_ASSOC)) {

        $vendorName = stripslashes($r["bznz_name"]);
        echo "<tr><td align='center' class=\"info_table\">$vendorName</td>";
        $boothID = $r["booth_ID"];
        if($boothID != 0){
            echo "<td align='center' class=\"info_table\">$boothID</td>";
        }
        else{
            echo "<td align='center' class=\"info_table\">No booth</td>";
        }
        $vendorDescription = stripslashes($r["description"]);
        echo "<td align='center' class=\"info_table\">$vendorDescription</td>";
        $vendorEmail = stripslashes($r["bznz_email"]);
        echo "<td align='center' class=\"info_table\">$vendorEmail</td>";
        $vendorPhone = stripslashes($r["bznz_phone"]);
        echo "<td align='center' class=\"info_table\">$vendorPhone</td>";
        $vendorURL = stripslashes($r["bznz_url"]);
        echo "<td align='center' class=\"info_table\">$vendorURL</td></tr>";
    }
}



echo'        
        
		</table>
    
	</div>';

echo "<div align='center' style='margin: 30px;'><img id='map' src='Images/Venue%20Map.jpg' style='max-width: 800px;'></div>";

require_once("footer.php");
?>