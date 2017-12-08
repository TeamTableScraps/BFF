<?php
require_once('colorbox_header.php');

//Get and set all post variables
foreach ($_POST as $k => $v) {
    $$k = mysqli_real_escape_string($MySQLi, trim($v));
}
unset($k, $v);

//Redirect if user opens this in an unintended way !!!CHANGE URL BELOW!!!
echo "
<script>
    if(!document.getElementById('colorbox')){
        window.location = 'account.php';
    }
</script>
";

//Squash errors
if(!isset($_POST['toSubmit'])){
    $_POST['toSubmit'] = 'false';
}
$errorMsg = '';

if(!isset($spons_phone)){
    $spons_phone = '';
}
if(!isset($spons_email)){
    $spons_email = '';
}
if(!isset($spons_name)){
    $spons_name = '';
}
if(!isset($sponsorship_level)){
    $sponsorship_level = '';
}

//If the form was already submitted
if ($_POST['toSubmit'] == 'true'){
    //  Check for blank fields
    if (trim($sponsorship_level) == ''){
        $errorMsg .= '&#8226; Sponsorship Level<br />';
    }
    if (trim($spons_name) == ''){
        $errorMsg .= '&#8226; Sponsor Name<br />';
    }
    if (trim($spons_phone) == ''){
        $errorMsg .= '&#8226; Sponsor Phone Number<br />';
    }
    if (trim($spons_email) == ''){
        $errorMsg .= '&#8226; Sponsor Email<br />';
    }
    if (strlen($bznz_phone) != 12){
        $altError .= 'Invalid phone number<br/>';
    }
    if (!filter_var($spons_email, FILTER_VALIDATE_EMAIL)){
        $altError .= 'Invalid email<br />';
    }

    //RUN ERROR CHECK QUERIES HERE

    if ($errorMsg == '') {
        //!!! CODE IF THERE ARE NO ERRORS !!!
        $sponsorship_level = $MySQLi->escape_string($sponsorship_level);
        $spons_email = $MySQLi->escape_string($spons_email);
        $spons_name = $MySQLi->escape_string($spons_name);
        $spons_phone = $MySQLi->escape_string($spons_phone);

        $currentUserID = $user->userID;
        $insert_query = $MySQLi->query("
          INSERT INTO sponsors(user_ID, sponsorship_level, spons_name, spons_phone, spons_email)
          VALUES (AES_ENCRYPT('$currentUserID', '$sponsorship_level', '$spons_name', '$spons_phone', '$spons_email')");

        echo "<script>$.colorbox.close();</script>";
    }
}

echo "
    <form action='sponsorRegistration.php' name='register_form' method='post' class='popupForm'>
    <input type='hidden' name='toSubmit' value='true'/>
    <table class='padded' align='center'>
        <tr class='addr_header_row'><td colspan='2' align='center' class='addr_header noTopPadding'>Register</td></tr>
        <tr><td colspan='2' class='addr_label'>&nbsp;</td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Sponsorship Level</td></tr>
        <tr><td colspan='2' align='center'><select name='sponsorship_level' required>\";
            <option value='bronze'>Bronze</option>
            <option value='silver'>Silver</option>
            <option value='gold'>Gold</option>
            <option value='platinum'>Platinum</option>
        </select></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Sponsor Name</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='text' name='spons_name'/></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Sponsor Phone</td></tr>
        <tr><td colspan='2'><input class='input_modern phoneInput' type='text' name='spons_phone'/></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Sponsor Email</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='text' name='spons_email'/></td></tr>

        <tr><td colspan=2><input type='submit' value='Register' class='button_modern varPadding'/></td></tr>
";

if ($errorMsg != '') {
    echo "<tr><td colspan='2' align='center' class='error'>$errorMsg</td></tr>";
}

echo "
    </table>
    </form>
";