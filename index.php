<?php

/*Redirects, logic, calculations, etc go here*/

require_once("header.php");

echo '
    <!--About Section-->
    <div id="about" class="container-fluid">
        <h2>About the Event</h2>
        <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    
    <!--Vendors Section-->
    <div id="vendors" class="container-fluid bg-fade">
        <h2>Vendors</h2>
        <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    
    <!--Sponsors Section-->
    <div id="sponsors" class="container-fluid">
        <h2>Sponsors</h2>
        <h4>Thanks to our wonderful sponsors!</h4>
        <p>';

$sponsorQuery = "
    SELECT
        user_ID,
        AES_DECRYPT(sponsorship_level, '$aesKey') as sponsorship_level,
        years_active
    FROM sponsors
";
$sponsorName = "ERROR";
$sponsors = $MySQLi->query($sponsorQuery);

if($sponsors != false){
    if ($sponsors->num_rows > 0) {
        while($r = $sponsors->fetch_array()){
            $userQuery = "
              SELECT 
                AES_DECRYPT(first_name, '$aesKey') as first_name, 
                AES_DECRYPT(last_name, '$aesKey') as last_name, 
                AES_DECRYPT(email, '$aesKey') as email,
                AES_DECRYPT(phone, '$aesKey') as phone 
              FROM users WHERE user_ID = '".$r['user_ID']."' LIMIT 1";
            $userResult = $MySQLi->query($userQuery);
            if($userResult != false){
                if ($userResult->num_rows > 0) {
                    while($u = $userResult->fetch_array()){
                        $sponsorName = $u['first_name']." ".$u['last_name'];
                        $sponsorPhone = $u['phone'];
                        $sponsorEmail = $u['email'];
                    }
                }
            }
            else{
                die("Query error");
            }

            echo $sponsorName."<br/>";
        }
    }
}else{
    die("Query error");
}

echo'
        </p>
        <h4>Interested in becoming a sponsor?</h4>
';

if($user->valid){
    echo "<a href='account.php' class='blackfont'>Register on the account management page.</a>";
}
else{
    echo "<a href='login.php' class='popup blackfont'>Log in and register from the account management page.</a>";
}

echo'
    </div>
    
    <!--Contact Section-->
    <div id="contact" class="container-fluid bg-fade">
        <h2 class="text-center">Contact</h2>
        <div class="row">
            <div class="col-sm-5">
                <p>Contact us for more information about the event.</p>
                <p><span class="glyphicon glyphicon-map-marker"></span>Pensacola, FL</p>
                <p><span class="glyphicon glyphicon-phone"></span>850-555-5555</p>
                <p><span class="glyphicon glyphicon-envelope"></span>blackfeatherfestival@gmail.com</p>
            </div>
            <div class="col-sm-7">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                    </div>
                </div>
                <textarea class="form-control" id="comments" name="comments" placeholder="Comments" rows=6></textarea><br>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button class="btn btn-default pull-right" type="submit">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
';

require_once("footer.php");
?>
