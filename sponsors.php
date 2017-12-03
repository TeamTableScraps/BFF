<?php
require_once("header.php");

echo'

<div id="sponsors" class="container-fluid bg-fade">
        
		<h2>Registered Sponsors</h2>
        
		<table class="defaultbg fullwidth">
        
		<tr>
            
			<th class="info_table">Name</th>
            
			<th class="info_table">Sponsorship Level</th>
            
			<th class="info_table">Number of Year Participating</th>
            
			<th class="info_table">Email</th>
            
			<th class="info_table">Phone Number</th>
        
		</tr>
        
		<tr>

';

$sponsorQuery = "
    SELECT
        user_ID,
        AES_DECRYPT(sponsorship_level, '$aesKey') as sponsorship_level,
        years_active
    FROM sponsors
";
$sponsorName = "ERROR";
$sponsors = $MySQLi->query($sponsorQuery);

if($sponsors != false){
    if ($sponsors->num_rows > 0) {
        while($r = $sponsors->fetch_array()){
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
                        $sponsorName = $u['first_name']." ".$u['last_name'];
                        $sponsorPhone = $u['phone'];
                        $sponsorEmail = $u['email'];
                    }
                }
            }
            else{
                die("Query error");
            }

            echo "
                <tr>
                    <td class=\"info_table\">".$sponsorName."</td>
                    <td class=\"info_table\">".$r['sponsorship_level']."</td>
                    <td class=\"info_table\">".$r['years_active']."</td>
                    <td class=\"info_table\">$sponsorEmail</td>
                    <td class=\"info_table\">$sponsorPhone</td>
                </tr>
            ";
        }
    }
}else{
    die("Query error");
}

echo'	</tr>
        
		</table>
    
	</div>
';

require_once("footer.php");
?>