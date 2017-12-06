<?php
require_once('colorbox_header.php');

//Get and set all post variables
foreach ($_POST as $k => $v) {
    $$k = mysqli_real_escape_string($MySQLi, trim($v));
}
unset($k, $v);

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

//If the form was already submitted
if ($_POST['toSubmit'] == 'true'){
    //  Check for blank fields
    if ($current_password == ''){
        $errorMsg .= 'You must enter your current password!<br />';
    }
    if ($new_pass1 == ''){
        $errorMsg .= 'You must enter a new password!<br />';
    }
    if ($new_pass1 != ''){
        if ($new_pass1 != $new_pass2){
            $errorMsg .= 'The new passwords do not match!<br />';
        }
    }

    $checkPass = $MySQLi->query("SELECT null FROM users WHERE user_ID = ". $user->userID ." AND password = AES_ENCRYPT('$current_password','$aesKey')");

    if ($checkPass->num_rows == 0)
        $errorMsg .= 'Your current password did not match the one on file!<br />';
    if ($errorMsg == '') {
        if ($new_pass1 != '') {
            $update = $MySQLi->query("UPDATE users SET password = AES_ENCRYPT('$new_pass1','$aesKey') WHERE user_ID = " . $user->userID);
        }
        $_SESSION['loginPassword'] = encryptString($new_pass1);

        echo "<script>$.colorbox.close();</script>";
    }
}

echo "
    <form action='changePassword.php' name='cpassForm' method='post' class='popupForm'>
    <input type='hidden' name='toSubmit' value='true'/>
    <table class='padded' align='center'>
        <tr class='addr_header_row'><td colspan='2' align='center' class='addr_header noTopPadding'>Change Password</td></tr>
        <tr><td colspan='2' class='addr_label'>&nbsp;</td></tr>
    
        <tr><td colspan='2' class='addr_label noPadding'>Current Password</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='password' name='current_password'/></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>New Password</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='password' name='new_pass1'/></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Confirm Password</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='password' name='new_pass2'/></td></tr>

        <tr><td colspan=2><input type='submit' value='Change Password' class='button_modern varPadding'/></td></tr>
";

if ($errorMsg != '') {
    echo "<tr><td colspan='2' align='center' class='error'>$errorMsg</td></tr>";
}

echo "
    </table>
    </form>
";
