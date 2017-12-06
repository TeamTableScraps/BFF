<?php 

require_once('header.php');

if(!$user->valid){
    header("Location: index.php");
}

$checkVendor = $MySQLi->query("SELECT * FROM vendors WHERE user_ID = {$user->userID}");
if($checkVendor->num_rows > 0){
    while ($r = $checkVendor->fetch_array(MYSQLI_ASSOC)) {
        $vendorName = $r["bznz_name"];
        $vendorEmail = $r["bznz_email"];
        $vendorPhone = $r["bznz_phone"];
        $vendorURL = $r["bznz_url"];
        $vendorDescription = $r["description"];
    }
    $registeredVendor = true;
}
else{
    $registeredVendor = false;
}

$checkSponsor = $MySQLi->query("SELECT * FROM sponsors WHERE user_ID = {$user->userID}");
if($checkSponsor->num_rows > 0){
    $registeredSponsor = true;
}
else{
    $registeredSponsor = false;
}

echo "
    <table class='addr_table' align='center'>
    <tr valign='top'>
";



echo"
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
                    <form action='editAccount.php' method='post' class='popupForm'>
                    <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='Edit Account'/>
                    </form>
                </td>
            </tr>
            <tr>
			    <td class='addr_button_cell2' colspan='2'>
			        <form method='post' action='changePassword.php' class='popupForm'>
                    <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='Change Password'/>
                    </form>
                </td>
			</tr>
        </table>
    </td>
";

if(!$registeredVendor){
    echo"
        <td class='addr_table_td'>
            <table class='addr_table_inner'>
                <tr class='addr_header_row'>
                    <td colspan='2' align='center' class='addr_header'>REGISTER AS A VENDOR</td>
                </tr>
                <tr><td colspan='2' align='center' class='addr_label'>You have not registered for a vendor booth</td></tr>
                <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
                <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
                <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
                <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
                <tr>
                    <td class='addr_button_cell1' colspan='2'>
                        <form method='post' action='vendorRegistration.php' class='popupForm'>
                        <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='Register as Vendor'/>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td class='addr_button_cell2' colspan='2'>
                        <form method='post' action='vendors.php#map' class=''>
                        <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='View Venue Map'/>
                        </form>
                    </td>
                </tr>
            </table>
        </td>
    ";
}
else{
    echo"
        <td class='addr_table_td'>
            <table class='addr_table_inner'>
                <tr class='addr_header_row'>
                    <td colspan='2' align='center' class='addr_header'>VENDOR INFORMATION</td>
                </tr>
                <tr>
                    <td class='addr_label'>Vendor Name:</td>
                    <td class='addr_label'>{$vendorName}</td>
                </tr>
                <tr>
                    <td class='addr_label'>Vendor Phone:</td>
                    <td class='addr_label'>{$vendorPhone}</td>
                </tr><tr>
                    <td class='addr_label'>Vendor Email:</td>
                    <td class='addr_label'>{$vendorEmail}</td>
                </tr><tr>
                    <td class='addr_label'>Vendor Website:</td>
                    <td class='addr_label'>{$vendorURL}</td>
                </tr>
                <script>
                    $(document).ready(function (){
                        $('.textOnly').colorbox({html:'{$vendorDescription}'});
                    });</script>
                <tr><td colspan='2' align='center' class='addr_label'><a href='#' class='textOnly'>Vendor Description</a></td></tr>
                <tr>
                    <td class='addr_button_cell1' colspan='2'>
                        <form method='post' action='editVendor.php' class='popupForm'>
                        <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='Edit Vendor Information'/>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td class='addr_button_cell2' colspan='2'>
                        <form method='post' action='registerBooth.php' class='popupForm'>
                        <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='Register A Booth'/>
                        </form>
                    </td>
                </tr>
            </table>
        </td>
    ";
}

echo"    
    <td class='addr_table_td'>
        <table class='addr_table_inner'>
            <tr class='addr_header_row'>
                <td colspan='2' align='center' class='addr_header'>REGISTER AS A SPONSOR</td>
            </tr>
            <tr>
                <td class='addr_label'>Sponsorship Level:</td>
                <td class='addr_label'></td>
            </tr>
            <tr>
                <td class='addr_label'>Years participated:</td>
                <td class='addr_label'></td>
            </tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
            <tr>
			    <td class='addr_button_cell1' colspan='2'>
			        <form method='post' action='TODO.php' class='popupForm'>
                    <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='Register as Sponsor'/>
                    </form>
                </td>
			</tr>
            <tr>
			    <td class='addr_button_cell2' colspan='2'>
			        <form method='post' action='sponsors.php' class=''>
                    <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='Make Sponsorship'/>
                    </form>
                </td>
			</tr>
        </table>
    </td>
";


echo"
    </tr>
    </table>
";

require_once('footer.php');

?>