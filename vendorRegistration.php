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

//If the form was already submitted
if (isset($_POST['toSubmit']) && $_POST['toSubmit'] == 'true') {
    $errorMsg = '';
    $altError = '';

    if (trim($vname) == '') {
        $errorMsg .= '&#8226; Vendor name ';
    }
    if (trim($phone) == '') {
        $errorMsg .= '&#8226; Phone Number ';
    }
    if (trim($email) == '') {
        $errorMsg .= '&#8226; Email ';
    }
    if (trim($url) == '') {
        $errorMsg .= '&#8226; Website ';
    }
    if (trim($description) == '') {
        $errorMsg .= '&#8226; Description ';
    }
    //TODO?

    if($errorMsg == '' && $altError == ''){
        //Prevent injection
        $email = $MySQLi->escape_string($email);
        //TODO
    }
}

if(!isset($vname)){
    $vname = '';
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
    TODO
";
