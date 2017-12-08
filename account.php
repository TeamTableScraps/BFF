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
        $boothID = $r["booth_ID"];
    }
    $registeredVendor = true;
}
else{
    $registeredVendor = false;
}

$checkSponsor = $MySQLi->query("
                                      SELECT 
                                        user_ID,
                                        AES_DECRYPT(sponsorship_level, '$aesKey') as sponsorship_level,
                                        AES_DECRYPT(spons_name, '$aesKey') as spons_name,
                                        AES_DECRYPT(spons_phone, '$aesKey') as spons_phone,
                                        AES_DECRYPT(spons_email, '$aesKey') as spons_email 
                                      FROM sponsors WHERE user_ID = {$user->userID}");
if($checkSponsor->num_rows > 0){
    while ($r = $checkSponsor->fetch_array(MYSQLI_ASSOC)) {
        $sponsorship_level = $r["sponsorship_level"];
        $spons_name = $r["spons_name"];
        $spons_phone = $r["spons_phone"];
        $spons_email = $r["spons_email"];
    }
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
                <tr class='addr_header_row'><td colspan='2' align='center' class='addr_header'>VENDOR INFORMATION</td></tr>
                
                <tr><td colspan='2' align='center' class='addr_label' style='font-weight: bold;'>".stripslashes($vendorName)." (".stripslashes($vendorPhone).")</td></tr>
                
                <script>
                    $(document).ready(function (){
                        $('.textOnly').colorbox({html:'".stripslashes($vendorDescription)."'});
                    });
                </script>
                <tr><td colspan='2' align='center' class='addr_label'><a href='#' class='textOnly'>Vendor Description</a></td></tr>

                <tr>
                    <td class='addr_label'>Vendor Email:</td>
                    <td class='addr_label'>".stripslashes($vendorEmail)."</td>
                </tr>
                <tr>
                    <td class='addr_label'>Vendor Website:</td>
                    <td class='addr_label'>".stripslashes($vendorURL)."</td>
                </tr>
                                
                ".($boothID?
                    '<tr>
                        <td class=\'addr_label\'>Booth Number:</td>
                        <td class=\'addr_label\'>'.$boothID.'</td>
                    </tr>'
                    :'<tr><td colspan=\'2\' align=\'center\' class=\'addr_label\' style="font-weight: bold; color: red;">You have not registered for a vendor booth</td></tr>')."
                
                
                <tr>
                    <td class='addr_button_cell1' colspan='2'>
                        <form method='post' action='editVendor.php' class='popupForm'>
                        <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='Edit Vendor Information'/>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td class='addr_button_cell2' colspan='2'>
                        <form method='post' action='vendorBoothRegistration.php' class='popupForm'>
                        <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='".($boothID?'Change Booth':'Register A Booth')."'/>
                        </form>
                    </td>
                </tr>
            </table>
        </td>
    ";
}

if($registeredSponsor){
    echo"
        <td class='addr_table_td'>
            <table class='addr_table_inner'>
                <tr class='addr_header_row'>
                    <td colspan='2' align='center' class='addr_header'>SPONSOR INFORMATION</td>
                </tr>
                <tr><td colspan='2' align='center' class='addr_label' style='font-weight: bold;'>".strtoupper($sponsorship_level)." SPONSOR</td></tr>
                <tr>
                    <td class='addr_label'>Sponsor Name:</td>
                    <td class='addr_label'>".$spons_name."</td>
                </tr>
                <tr>
                    <td class='addr_label'>Sponsor Email:</td>
                    <td class='addr_label'>".$spons_email."</td>
                </tr>
                <tr>
                    <td class='addr_label'>Sponsor Phone:</td>
                    <td class='addr_label'>".$spons_phone."</td>
                </tr>
                <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
                <tr>
                    <td class='addr_button_cell1' colspan='2'>
                        <form method='post' action='editSponsor.php' class='popupForm'>
                        <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='Edit Sponsor Information'/>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td class='addr_button_cell2' colspan='2'>
                        <form method='post' action='editSponsor.php?TODO' class='popupForm'>
                        <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='Revoke Sponsorship'/>
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
                    <td colspan='2' align='center' class='addr_header'>REGISTER AS A SPONSOR</td>
                </tr>
                <tr><td colspan='2' align='center' class='addr_label'>You have not registered as a sponsor.</td></tr>
                <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
                <tr><td colspan='2' align='center' class='addr_label'>Become a sponsor today to keep</td></tr>
                <tr><td colspan='2' align='center' class='addr_label'>the Black Feather Festival amazing!</td></tr>
                <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
                <tr><td colspan='2' align='center' class='addr_label addr_button_cell1' style='height:55px;'>&nbsp;</td></tr>
                <tr>
                    <td class='addr_button_cell2' colspan='2'>
                        <form method='post' action='sponsorRegistration.php' class='popupForm'>
                        <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='Become a Sponsor'/>
                        </form>
                    </td>
                </tr>
            </table>
        </td>
    ";
}




echo"
    </tr>
    </table>
";

require_once('footer.php');

?>