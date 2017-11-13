<?php

require_once('colorbox_header.php');

//Get and set all post variables
foreach ($_POST as $k => $v) {
    $$k = mysqli_real_escape_string($MySQLi, trim($v));
}
unset($k, $v);

//Initializations
$loginForm = '';
$errorMsg = '';

//If the form was already submitted
if (isset($_POST['toSubmit']) && $_POST['toSubmit'] == 'true') {
    $noEmail = false;
    $noPassword = false;

    if (trim($loginEmail) == ''){
        $noEmail = true;
    }
    if (trim($loginPassword) == ''){
        $noPassword = true;
    }

    if(!$user->valid){
        $errorMsg .= 'Invalid Login';
    }

    if($errorMsg == ''){
        echo "<script>window.location = 'index.php';</script>";/*TODO: Change this?*/
    }
}

//Redirect if user already logged in.
if($user->valid){
    echo "<script>window.location = 'index.php';</script>";
}
else { //Otherwise, display login form
    $loginForm .= "
        <form action='login.php' name='login_form' method='post' class='popupForm'>
        <input type='hidden' name='toSubmit' value='true'/>
        <table class='padded' align='center'>
            <tr class='addr_header_row'><td colspan='2' align='center' class='addr_header noTopPadding'>Login</td></tr>
    ";
    if ($errorMsg != '') {
        $loginForm .= "<tr><td colspan='2' align='center' class='error'>$errorMsg</td></tr>";
    } else {
        $loginForm .= "<tr><td colspan='2' class='addr_label'>&nbsp;</td></tr>";
    }

    $loginForm .= "
       
            <tr><td colspan='2'><input class='input_modern' type='text' name='loginEmail' value='' placeholder='Email'></td></tr>
            
            <tr><td colspan='2'><input class='input_modern' type='password' name='loginPassword' placeholder='Password'></td></tr>
            
            <tr><td colspan='2'><input type='submit' value='Log In' class='button_modern varPadding'/></td></tr>
    
            <tr>
                <td style='padding-left:0px; padding-top:12px;' class='addr_label'><a href='register.php' class='popup'>Register Now</a></td>
                <td style='padding-right: 0px; padding-top:12px;' class='addr_label rightAlign'><a href='forgot.php' class='popup'>Forgot Password?</a></td>
            </tr>
        </table>
        </form>
    ";

    echo $loginForm;
}