<?php

/*Redirects, logic, calculations, etc go here*/

require_once("header.php");

echo '
    <!--About Section-->
    <div id="about" class="container-fluid">
        <h2>About the Event</h2>
        <h4>Join us for the Inaugural Black Feather Festival on Saturday, December 16, 2018!</h4>
        <p>The Black Feather Festival is the newest art festival here on the Gulf Coast. Featuring works from local artists, great food, activities for the kids, and more, the Black Feather Festival is sure to be fun for the whole family! Admission is free. All proceeds from sponsorships and generous donations will be donated to local charities. Be sure to come join in on the fun on December 16th. You do not want to miss the Inaugural Black Feather Festival!</p>
    </div>
    
    <!--Sponsors Section-->
    <div id="sponsors" class="container-fluid bg-fade">
        <h2>Thanks to our sponsors!</h2>
        <h4>Without our generous sponsors, this event would not be possible. We would like to say a special thank you to our Platinum sponsors for this year.</h4>
';

$checkSponsor = $MySQLi->query("
                                      SELECT 
                                        user_ID,
                                        AES_DECRYPT(sponsorship_level, '$aesKey') as sponsorship_level,
                                        AES_DECRYPT(spons_name, '$aesKey') as spons_name,
                                        AES_DECRYPT(spons_phone, '$aesKey') as spons_phone,
                                        AES_DECRYPT(spons_email, '$aesKey') as spons_email 
                                      FROM sponsors WHERE sponsorship_level = AES_ENCRYPT('platinum', '$aesKey')");
if($checkSponsor->num_rows > 0){
    while ($r = $checkSponsor->fetch_array(MYSQLI_ASSOC)) {
        $sponsorName = stripslashes($r["spons_name"]);
        echo "<span style='font-weight: bold;'>&#8226; $sponsorName</span>";
    }
}

echo'
    </div>
    
    <!--Contact Section-->
    <div id="contact" class="container-fluid">
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
