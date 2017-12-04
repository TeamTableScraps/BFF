<?php

echo '
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navBar">
            <ul class="nav navbar-nav">
                <li><a href="index.php#about">About</a></li>
                <li><a href="index.php#contact">Contact Us</a></li>
                <li><a href="vendors.php">Vendors</a></li>
                <li><a href="sponsors.php">Sponsors</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
';
if($user->valid){
    echo '
        <li><a href="account.php"><span class="glyphicon glyphicon-user"></span>My Account</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>Log Out</a></li>
    ';
}
else{
    echo '
        <li><a href="register.php" class="popup"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
        <li><a href="login.php" class="popup"><span class="glyphicon glyphicon-user"></span>Login</a></li>
    ';
}
echo '
            </ul>
        </div>
    </div>
</nav>
';

?>