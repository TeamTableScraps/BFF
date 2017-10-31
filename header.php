<?php
    require_once('authenticate.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <!-- metadata is info about your page -->
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <meta name='author' content='Adrian, Mike, Courtney'/>
    <meta name='description' content='Black Feather Festival website'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' href='style.css'/>

    <!-- SCRIPTS -->
    <script type="text/javascript" src="scripts.js"></script>
</head>
<body>
<div id='pagewrap'>
    <div id='navHeaderWrap'>
        <?php require_once('navbar.php'); ?>
    </div>
    <div id='pageheader'>
            <div id="logowrap">
                <img id="logo" src="images/BFF_logo.png" border="0">
            </div>
    </div>
    <div class="clear"></div>
    <div id="content">
