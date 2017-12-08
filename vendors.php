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
		
		<tr>
';

$checkVendor = $MySQLi->query("SELECT * FROM vendors");
if($checkVendor->num_rows > 0){
    while ($r = $checkVendor->fetch_array(MYSQLI_ASSOC)) {
        $vendorName = $r["bznz_name"];
        echo "<td align='center'>$vendorName</td>";
        $boothID = $r["booth_ID"];
        echo "<td align='center'>$boothID</td>";
        $vendorDescription = $r["description"];
        echo "<td align='center'>$vendorDescription</td>";
        $vendorEmail = $r["bznz_email"];
        echo "<td align='center'>$vendorEmail</td>";
        $vendorPhone = $r["bznz_phone"];
        echo "<td align='center'>$vendorPhone</td>";
        $vendorURL = $r["bznz_url"];
        echo "<td align='center'>$vendorURL</td>";

    }
}



echo'        
        
		</table>
    
	</div>';

echo "<div align='center' style='margin: 30px;'><img id='map' src='Images/Venue%20Map.jpg' style='max-width: 800px;'></div>";

require_once("footer.php");
?>