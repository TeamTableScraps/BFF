<?php
###########
# BACKEND #
###########
require_once('colorbox_header.php');

//Get and set all post variables
foreach ($_POST as $k => $v) {
    $$k = mysqli_real_escape_string($MySQLi, trim($v));
}
unset($k, $v);

//If the form was already submitted
if (isset($_POST['toSubmit']) && $_POST['toSubmit'] == 'true') {
    $errorMsg = '';
    $altError = '';

    if (trim($fname) == ''){
        $errorMsg .= '&#8226; First name ';
    }
    if (trim($lname) == ''){
        $errorMsg .= '&#8226; Last name ';
    }
    if (trim($phone) == ''){
        $errorMsg .= '&#8226; Phone Number ';
    }elseif (strlen($phone) != 12){
        $altError .= 'Invalid phone number<br/>';
    }
    if (trim($email) == ''){
        $errorMsg .= '&#8226; Email ';
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $altError .= 'Invalid email<br />';
    }
    if(trim($pass) == '' || trim($confirmPass) == ''){
        $errorMsg .= '&#8226; Password ';
    }
    if($pass != $confirmPass){
        $altError = 'The passwords did not match.';
    }



    $q = $MySQLi->query("select user_ID from users where aes_decrypt( email, '$aesKey' ) like '$email' limit 1") or die(mysqli_error($MySQLi));;
    if ($q->num_rows > 0) {
        $altError = "This email address is already registered.<br/>Please enter a different email address.";
    }

    if($errorMsg == '' && $altError == ''){
        //Prevent injection
        $email = $MySQLi->escape_string($email);
        $fname = $MySQLi->escape_string($fname);
        $lname = $MySQLi->escape_string($lname);
        $phone = $MySQLi->escape_string($phone);
        $pass = $MySQLi->escape_string($pass);

        //Double check that email doesn't already exist
        $checkQuery = "SELECT user_ID FROM users WHERE aes_decrypt( email, '$aesKey' ) LIKE '$email' limit 1";
        $check = $MySQLi->query($checkQuery);
        if ($check->num_rows == 0) {
            //Add user to the database
            $addQuery = "
              INSERT INTO users (first_name, last_name, email, password, phone) 
              VALUES(
                aes_encrypt('$fname','$aesKey'),
                aes_encrypt('$lname','$aesKey'),
                aes_encrypt('$email','$aesKey'),
                aes_encrypt('$pass','$aesKey'),
                aes_encrypt('$phone','$aesKey')
              )";
            $add = $MySQLi->query($addQuery);

            //Get the new userID
            $getUID = $MySQLi->query("
              SELECT userID 
              FROM customers 
              WHERE aes_decrypt( email, '$aesKey' ) LIKE '$email' 
              AND aes_decrypt(password,'$aesKey')='$pass' limit 1
            ");
            if ($getUID->num_rows > 0) {
                while ($r = $getUID->fetch_array(MYSQLI_ASSOC)) {
                    $userID = $r["user_ID"];
                }
            }

            //Update session user and password
            $_SESSION['loginPassword'] = encryptString($pass);
            $_SESSION['loginEmail'] = addslashes($email);
        }

        echo "<script>$.colorbox.close();</script>";
    }
}

if(!isset($fname)){
    $fname = '';
}
if(!isset($lname)){
    $lname = '';
}
if(!isset($phone)){
    $phone = '';
}
if(!isset($email)){
    $email = '';
}
if(!isset($errorMsg)){
    $errorMsg = '';
}
if(!isset($altError)){
    $altError = '';
}

############
# FRONTEND #
############
echo "
    <form action='register.php' name='register_form' method='post' class='popupForm'>
    <input type='hidden' name='toSubmit' value='true'/>
    <table class='padded' align='center'>
        <tr class='addr_header_row'><td colspan='2' align='center' class='addr_header noTopPadding'>Register</td></tr>
        <tr><td colspan='2' class='addr_label'>&nbsp;</td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>First Name</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='text' name='fname' value='$fname'></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Last Name</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='text' name='lname' value='$lname'></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Phone Number</td></tr>
        <tr><td colspan='2'><input class='input_modern phoneInput' type='text' name='phone' value='$phone'></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Email Address</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='text' name='email' value='$email'></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Password</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='password' name='pass'></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Confirm Password</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='password' name='confirmPass'></td></tr>
        
        <tr><td colspan='2'><input type='submit' value='Register' class='button_modern varPadding'/></td></tr>
";

if ($errorMsg != '' || $altError != '') {
    if($altError != ''){
        echo "<tr><td colspan='2' align='center' class='error'>$altError</td></tr>";
    }
    else{
        echo "<tr><td colspan='2' align='center' class='error'>Please enter the following fields:</br>$errorMsg</td></tr>";
    }
}

echo"    
    </table>
    </form>
";