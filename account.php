<?php 

require_once('header.php');

if(!$user->valid){
    header("Location: index.php");
}

echo "
    <table class='addr_table' align='center'>
    <tr valign='top'>
    
    
    <td class='addr_table_td'>
        <table class='addr_table_inner'>
            <tr class='addr_header_row'>
                <td colspan='2' align='center' class='addr_header'>Account Info</td>
            </tr>
            <tr>
                <td class='addr_label'>Name:</td>
                <td class='addr_label'>".$user->username()."</td>
            </tr>
            <tr>
                <td class='addr_label'>Email:</td>
                <td class='addr_label'>".$user->email."</td>
            </tr>
            <tr>
                <td class='addr_label'>Phone:</td>
                <td class='addr_label'>".$user->phone."</td>
            </tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
            <tr>
                <td class='addr_button_cell1' colspan='2'>
                    <form action='TODO.php' method='post' class='popup'>
                    <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='Edit Account'/>
                    </form>
                </td>
            </tr>
            <tr>
			    <td class='addr_button_cell2' colspan='2'>
			        <form method='post' action='TODO.php' class='popup'>
                    <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='Change Password'/>
                    </form>
                </td>
			</tr>
        </table>
    </td>



    <td class='addr_table_td'>
        <table class='addr_table_inner'>
            <tr class='addr_header_row'>
                <td colspan='2' align='center' class='addr_header'>REGISTER AS A VENDOR</td>
            </tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;TODO</td></tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
            <tr><td colspan='2' align='center' class='addr_label' style='height:55px;'>&nbsp;</td></tr>
            <tr><td colspan='2' align='center' class='addr_label' style='height:46px;'>&nbsp;</td></tr>
        </table>
    </td>
    
    
    <td class='addr_table_td'>
        <table class='addr_table_inner'>
            <tr class='addr_header_row'>
                <td colspan='2' align='center' class='addr_header'>REGISTER AS A SPONSOR</td>
            </tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;TODO</td></tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
            <tr><td colspan='2' align='center' class='addr_label' style='height:55px;'>&nbsp;</td></tr>
            <tr><td colspan='2' align='center' class='addr_label' style='height:46px;'>&nbsp;</td></tr>
        </table>
    </td>
    
    
    </tr>
    </table>
";



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
    
	</div>
    
    
	
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

require_once('footer.php');

?>