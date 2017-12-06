<?php
require_once("header.php");

echo "<img id='map' src='Images/Venue%20Map.jpg'>";

echo '
    
	<div id="vendors" class="container-fluid">
        
		<h2>Registered Vendors</h2>
        
		<table class="defaultbg fullwidth">
        
		<tr>
            
			<th class="info_table">Name</th>
            
			<th class="info_table">Vendor Type</th>
            
			<th class="info_table">Number of Year Participating</th>
            
			<th class="info_table">Email</th>
            
			<th class="info_table">Phone Number</th>
        
		</tr>    
';

$vendorQuery = "
    SELECT
        user_ID,
        booth_ID,
        years_active,
        vendor_type
    FROM vendors
";
$vendorName = "ERROR";
$vendors = $MySQLi->query($vendorQuery);

if($vendors != false){
    if ($vendors->num_rows > 0) {
        while($r = $vendors->fetch_array()){
            $userQuery = "
              SELECT 
                AES_DECRYPT(first_name, '$aesKey') as first_name, 
                AES_DECRYPT(last_name, '$aesKey') as last_name, 
                AES_DECRYPT(email, '$aesKey') as email,
                AES_DECRYPT(phone, '$aesKey') as phone 
              FROM users WHERE user_ID = '".$r['user_ID']."' LIMIT 1";
            $userResult = $MySQLi->query($userQuery);
            if($userResult != false){
                if ($userResult->num_rows > 0) {
                    while($u = $userResult->fetch_array()){
                        $vendorName = $u['first_name']." ".$u['last_name'];
                        $vendorPhone = $u['phone'];
                        $vendorEmail = $u['email'];
                    }
                }
            }
            else{
                die("Query error");
            }

            echo "
                <tr>
                    <td class=\"info_table\">".$vendorName."</td>
                    <td class=\"info_table\">".$r['vendor_type']."</td>
                    <td class=\"info_table\">".$r['years_active']."</td>
                    <td class=\"info_table\">$vendorEmail</td>
                    <td class=\"info_table\">$vendorPhone</td>
                </tr>
            ";
        }
    }
}else{
    die("Query error");
}

echo'        
        
		</table>
    
	</div>';

require_once("footer.php");
?>