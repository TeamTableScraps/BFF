<?php
require_once('colorbox_header.php');
###########
# BACKEND #
###########

//Get and set all post variables
foreach ($_POST as $k => $v) {
    $$k = mysqli_real_escape_string($MySQLi, trim($v));
}
unset($k, $v);

if(!isset($bznz_name)){
    $bznz_name = '';
}
if(!isset($bznz_email)){
    $bznz_email = '';
}
if(!isset($bznz_phone)){
    $bznz_phone = '';
}
if(!isset($bznz_url)){
    $bznz_url = '';
}
if(!isset($description)){
    $description = '';
}
if(!isset($altError)){
    $altError = '';
}
if(!isset($errorMsg)){
    $errorMsg = '';
}

//If the form was already submitted
if (isset($_POST['toSubmit']) && $_POST['toSubmit'] == 'true') {
    $errorMsg = '';
    $altError = '';

    if (trim($bznz_name) == '') {
        $errorMsg .= '&#8226; Business Name ';
    }
    if (trim($bznz_phone) == '') {
        $errorMsg .= '&#8226; Business Phone Number ';
    }
    if (trim($bznz_url) == '') {
        $errorMsg .= '&#8226; Business URL ';
    }
    if (trim($bznz_email) == '') {
        $errorMsg .= '&#8226; Business Email ';
    }
    /*if (trim($description) == '') {
        $errorMsg .= '&#8226; Description ';
    }*/
    if (!preg_match("/^[0-9]{10}$/", $bznz_phone)){
        $errorMsg .= 'Invalid phone number<br />';
    }
    if (!filter_var($bznz_email, FILTER_VALIDATE_EMAIL)){
        $errorMsg .= 'Invalid email<br />';
    }

    if($errorMsg == '' && $altError == ''){
        //Prevent injection
        $bznz_email = $MySQLi->escape_string($bznz_email);
        $bznz_name = $MySQLi->escape_string($bznz_name);
        $bznz_phone = $MySQLi->escape_string($bznz_phone);
        $bznz_url = $MySQLi->escape_string($bznz_url);
        $description = $MySQLi->escape_string($description);

        $currentUserID = $user->userID;
        $addQuery = $MySQLi->query("
          INSERT INTO vendors(user_ID, booth_ID, bznz_name, bznz_phone, bznz_url, bznz_email, description) 
          VALUES ($user->userID,0,'$bznz_name','$bznz_phone','$bznz_url','$bznz_email','$description')
        ");

        if(!$addQuery){
            $altError = "Query failed.";
        }
        elseif ($addQuery->num_rows < 1){
            $altError = "Query failed.";
        }
        echo "<script>$.colorbox.close();</script>";
    }
}

############
# FRONTEND #
############
echo "
    <form action='vendorRegistration.php' name='register_form' method='post' class='popupForm'>
    <input type='hidden' name='toSubmit' value='true'/>
    <table class='padded' align='center'>
        <tr class='addr_header_row'><td colspan='2' align='center' class='addr_header noTopPadding'>Register</td></tr>
        <tr><td colspan='2' class='addr_label'>&nbsp;</td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Business Name</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='text' name='bznz_name' value='$bznz_name'></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Business Phone Number</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='text' name='bznz_phone' value='$bznz_phone'></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Business URL</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='text' name='bznz_url' value='$bznz_url'></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Business Email</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='text' name='bznz_email' value='$bznz_email'></td></tr>
        
        <tr><td colspan='2' class='addr_label noPadding'>Description</td></tr>
        <tr><td colspan='2'><input class='input_modern' type='text' name='description' value='$description'></td></tr>
        
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