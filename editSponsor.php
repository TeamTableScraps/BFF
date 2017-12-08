<?php
require_once('colorbox_header.php');

//Get and set all post variables
foreach ($_POST as $k => $v) {
    $$k = mysqli_real_escape_string($MySQLi, trim($v));
}
unset($k, $v);

//Redirect if user opens this in an unintended way
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
$altError = '';

if(!isset($spons_phone)){
    $spons_phone = '';
}
if(!isset($spons_email)){
    $spons_email = '';
}
if(!isset($spons_name)){
    $spons_name = '';
}

//If the form was already submitted
if ($_POST['toSubmit'] == 'true'){
    //  Check for blank fields
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

    if ($errorMsg == '') {
        $updateSponsor = $MySQLi->query("
            UPDATE sponsors SET
              spons_name = AES_ENCRYPT('$spons_name','$aesKey'), 
              spons_phone = AES_ENCRYPT('$spons_phone','$aesKey'), 
              spons_email = AES_ENCRYPT('$spons_email','$aesKey')
            WHERE user_ID = ".$user->userID."
        ");

        echo "<script>$.colorbox.close();</script>";
    }
}

echo "
    <form action='editSponsor.php' name='editSponsorForm' method='post' class='popupForm'>
    <input type='hidden' name='toSubmit' value='true'/>
    <table class='padded' align='center'>
        <tr class='addr_header_row'><td colspan='2' align='center' class='addr_header noTopPadding'>Update</td></tr>
        <tr><td colspan='2' class='addr_label'>&nbsp;</td></tr>
        <tr><td colspan='2' class='addr_label'></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Sponsor Name</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='text' name='spons_name'/></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Sponsor Phone</td></tr>
        <tr><td colspan='2'><input class='input_modern phoneInput' type='text' name='spons_phone'/></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Sponsor Email</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='text' name='spons_email'/></td></tr>

        <tr><td colspan=2><input type='submit' value='Register' class='button_modern varPadding'/></td></tr>
";

if ($errorMsg != '' || $altError != '') {
    if($altError != ''){
        echo "<tr><td colspan='2' align='center' class='error'>$altError</td></tr>";
    }
    else{
        echo "<tr><td colspan='2' align='center' class='error'>Please enter the following fields:</br>$errorMsg</td></tr>";
    }
}

echo "
    </table>
    </form>
";