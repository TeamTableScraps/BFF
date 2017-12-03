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
                    <form action='TODO.php' method='post' class='popupForm'>
                    <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='Edit Account'/>
                    </form>
                </td>
            </tr>
            <tr>
			    <td class='addr_button_cell2' colspan='2'>
			        <form method='post' action='TODO.php' class='popupForm'>
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
            <tr>
                <td class='addr_label'>Vendor Name:</td>
                <td class='addr_label'></td>
            </tr>
            <tr>
                <td class='addr_label'>Vendor Email:</td>
                <td class='addr_label'></td>
            </tr>
            <tr>
                <td class='addr_label'>Vendor Phone:</td>
                <td class='addr_label'></td>
            </tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
            <tr><td colspan='2' align='center' class='addr_label'>&nbsp;</td></tr>
            <tr>
			    <td class='addr_button_cell1' colspan='2'>
			        <form method='post' action='TODO.php' class='popupForm'>
                    <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='Register as Vendor'/>
                    </form>
                </td>
			</tr>
            <tr>
			    <td class='addr_button_cell2' colspan='2'>
			        <form method='post' action='vendors.php' class=''>
                    <input style='padding: 0px 0px;' class='button_modern varPadding' type='submit' name='submit' value='Reserve Booth'/>
                    </form>
                </td>
			</tr>
        </table>
    </td>
    
    
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
    
    
    </tr>
    </table>
";

require_once('footer.php');

?>