<?php

session_set_cookie_params(0, '/');
if (!isset($_SESSION)) {
    session_start();
}

/**Create a new user from session variables**/
if(isset($_SESSION['loginEmail'])){
    $loginUser = $_SESSION['loginEmail'];
}else{
    if (isset($_POST['loginEmail'])) {
        $_SESSION['loginEmail'] = $_POST['loginEmail'];
        $loginUser = $_SESSION['loginEmail'];
    } else if (isset($_COOKIE['loginEmail'])) {
        $_SESSION['loginEmail'] = $_COOKIE['loginEmail'];
        $loginUser = $_SESSION['loginEmail'];
    } else {
        $loginUser = "";
    }
}

if(isset($_SESSION['loginPassword'])) {
    $loginPass = $_SESSION['loginPassword'];
} else {
    if (isset($_POST['loginPassword'])) {
        $_SESSION['loginPassword'] = encryptString($_POST['loginPassword']);
        $loginPass = $_SESSION['loginPassword'];
    } else if (isset($_COOKIE['loginPassword'])) {
        $_SESSION['loginPassword'] = $_COOKIE['loginPassword'];
        $loginPass = $_SESSION['loginPassword'];
    } else {
        $loginPass = "";
    }
}

if ((isset($_POST['logout']) && $_POST['logout'] == true)) {
    session_destroy();
    unset($_SESSION['loginEmail']);
    unset($_SESSION['loginPassword']);
    unset($_SESSION);
    $loginUser = "";
    $loginPass = "";
    //remove cookies
    if (isset($_COOKIE['loginEmail']) && isset($_COOKIE['loginPassword'])) {
        setcookie('loginEmail', '', time() - 36000, '/');
        setcookie('loginPassword', '', time() - 36000, '/');
    }
}

$user = new User($loginUser, $loginPass);

if (!$user->valid && (!isset($_POST['logout']))) {
    if(isset($_SESSION)){
        unset($_SESSION['loginEmail']);
        unset($_SESSION['loginPassword']);
    }
}

unset($loginUser);
unset($loginPass);