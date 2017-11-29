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
                <td class='addr_label'>TODO</td>
            </tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
            <tr>
                <td class='addr_button_cell1' colspan='2'>
                    <form action='account_edit_pop.php' method='post' class='accountPop'>
                    <input type='hidden' name='social' value='true'/>
                    <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='Edit Account'/>
                    </form>
                </td>
            </tr>
            <tr>
			    <td class='addr_button_cell2' colspan='2'>
			        <form method='post' action='address_edit_pop.php' class='accountPop'>
			        <input type='hidden' name='address_id' value='0'>
                    <input type='hidden' name='address_type' value='none'>
                    <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='Add New Address'/>
                    </form>
                </td>
			</tr>
        </table>
    </td>



    <td class='addr_table_td'>
        <table class='addr_table_inner'>
            <tr class='addr_header_row'>
                <td colspan='2' align='center' class='addr_header'>TODO</td>
            </tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
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
                <td colspan='2' align='center' class='addr_header'>TODO</td>
            </tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
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
        
		<table class="defaultbg">
        
		<tr>
            
			<th class="info_table">Name</th>
            
			<th class="info_table">Vendor Type</th>
            
			<th class="info_table">Number of Year Participating</th>
            
			<th class="info_table">Email</th>
            
			<th class="info_table">Phone Number</th>
        
		</tr>    
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
            $userQuery = "SELECT AES_DECRYPT(first_name, '$aesKey') as first_name, AES_DECRYPT(last_name, '$aesKey') as last_name FROM users WHERE user_ID = '".$r['user_ID']."' LIMIT 1";
            $userResult = $MySQLi->query($userQuery);
            if($userResult != false){
                if ($userResult->num_rows > 0) {
                    while($u = $userResult->fetch_array()){
                        $sponsorName = $u['first_name']." ".$u['last_name'];
                    }
                }
            }
            else{
                die("Query error");
            }

            echo "
                <tr>
                    <td>".$sponsorName."</td>
                    <td>".$r['sponsorship_level']."</td>
                    <td>".$r['years_active']."</td>
                    <td>TODO</td>
                    <td>TODO</td>
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
        
		<table class="defaultbg">
        
		<tr>
            
			<th class="info_table">Name</th>
            
			<th class="info_table">Sponsorship Level</th>
            
			<th class="info_table">Number of Year Participating</th>
            
			<th class="info_table">Email</th>
            
			<th class="info_table">Phone Number</th>
        
		</tr>
        
		<tr>
            
			<!--Fill from database-->
        
		</tr>
        
		</table>
    
	</div>
';

require_once('footer.php');

?>