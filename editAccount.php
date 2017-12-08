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

//If the form was already submitted
if ($_POST['toSubmit'] == 'true'){
    //  Check for blank fields
    if ($fname == ''){
        $errorMsg .= '&#8226; First Name ';
    }
    if ($lname == ''){
        $errorMsg .= '&#8226; Last Name ';
    }
    if ($email == ''){
        $errorMsg .= '&#8226; Email Address ';
    }
    if ($phone == ''){
        $errorMsg .= '&#8226; Phone Number ';
    }
    if (strlen($phone) != 12){
        $altError .= 'Invalid phone number<br/>';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $altError .= 'Invalid email<br />';
    }

    if ($errorMsg == '') {
        //Prevent injection
        $fname = $MySQLi->escape_string($fname);
        $lname = $MySQLi->escape_string($lname);
        $email = $MySQLi->escape_string($email);
        $phone = $MySQLi->escape_string($phone);

        $updateQuery = $MySQLi->query("
          UPDATE users
          SET
              first_name = aes_encrypt('$fname','$aesKey'),
              last_name = aes_encrypt('$lname','$aesKey'),
              email = aes_encrypt('$email','$aesKey'),
              phone = aes_encrypt('$phone','$aesKey')
          WHERE user_ID = ".$user->userID."
        ") or die(mysqli_error($MySQLi));

        echo "<script>$.colorbox.close();</script>";
    }
}

$getUserInfo = $MySQLi->query("
    SELECT 
        AES_DECRYPT(first_name, '$aesKey') as first_name, 
        AES_DECRYPT(last_name, '$aesKey') as last_name, 
        AES_DECRYPT(email, '$aesKey') as email,
        AES_DECRYPT(phone, '$aesKey') as phone 
    FROM users WHERE user_ID = ".$user->userID
);
if($getUserInfo != false){
    if ($getUserInfo->num_rows > 0) {
        while($r = $getUserInfo->fetch_array()){
            $fname = $r['first_name'];
            $lname = $r['last_name'];
            $email = $r['email'];
            $phone = $r['phone'];
        }
    }
}

if(!isset($fname)){
    $fname = '';
}
if(!isset($lname)){
    $lname = '';
}
if(!isset($email)){
    $email = '';
}
if(!isset($phone)){
    $phone = '';
}
if(!isset($altError)){
    $altError = '';
}
if(!isset($errorMsg)){
    $errorMsg = '';
}

echo "
    <form action='editAccount.php' name='editAccountForm' method='post' class='popupForm'>
    <input type='hidden' name='toSubmit' value='true'/>
    <table class='padded' align='center'>
        <tr class='addr_header_row'><td colspan='2' align='center' class='addr_header noTopPadding'>Edit Account</td></tr>
        <tr><td colspan='2' class='addr_label'>&nbsp;</td></tr>
    
        <tr><td colspan='2' class='addr_label noPadding'>First Name</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='text' name='fname' value='$fname'/></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Last Name</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='text' name='lname' value='$lname'/></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Email</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='text' name='email' value='$email'/></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Phone Number</td></tr>
        <tr><td colspan='2'><input class='input_modern phoneInput' type='text' name='phone' value='$phone'/></td></tr>

        <tr><td colspan=2><input type='submit' value='Submit' class='button_modern varPadding'/></td></tr>
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
