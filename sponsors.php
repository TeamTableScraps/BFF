<?php
require_once("header.php");

echo'

<div id="sponsors" class="container-fluid bg-fade">        
		<h2>Platinum Sponsors</h2>
        
		<table class="defaultbg fullwidth">
        
		<tr>
            
			<th class="info_table">Name</th>
            
			<th class="info_table">Email</th>
            
			<th class="info_table">Phone Number</th>
        
		</tr>

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
        $sponsorName = $r["spons_name"];
        echo "<tr><td align='center' class=\"info_table\">$sponsorName</td>";
        $sponsorEmail = $r["spons_email"];
        echo "<td align='center' class=\"info_table\">$sponsorEmail</td>";
        $sponsorPhone = $r["spons_phone"];
        echo "<td align='center' class=\"info_table\">$sponsorPhone</td></tr>";

    }
}

echo'	</tr>
        
		</table>
    
	</div>
';

echo'

<div id="sponsors" class="container-fluid bg-fade">
        
		<h2>Gold Sponsors</h2>
        
		<table class="defaultbg fullwidth">
        
		<tr>
            
			<th class="info_table">Name</th>
            
			<th class="info_table">Email</th>
            
			<th class="info_table">Phone Number</th>
        
		</tr>
';

$checkSponsor = $MySQLi->query("
                                      SELECT 
                                        user_ID,
                                        AES_DECRYPT(sponsorship_level, '$aesKey') as sponsorship_level,
                                        AES_DECRYPT(spons_name, '$aesKey') as spons_name,
                                        AES_DECRYPT(spons_phone, '$aesKey') as spons_phone,
                                        AES_DECRYPT(spons_email, '$aesKey') as spons_email 
                                      FROM sponsors WHERE sponsorship_level = AES_ENCRYPT('gold', '$aesKey')");
if($checkSponsor->num_rows > 0){
    while ($r = $checkSponsor->fetch_array(MYSQLI_ASSOC)) {
        $sponsorName = $r["spons_name"];
        echo "<tr><td align='center' class=\"info_table\">$sponsorName</td>";
        $sponsorEmail = $r["spons_email"];
        echo "<td align='center' class=\"info_table\">$sponsorEmail</td>";
        $sponsorPhone = $r["spons_phone"];
        echo "<td align='center' class=\"info_table\">$sponsorPhone</td></tr>";

    }
}


echo'	</tr>
        
		</table>
    
	</div>
';

echo'

<div id="sponsors" class="container-fluid bg-fade">        
		<h2>Silver Sponsors</h2>
        
		<table class="defaultbg fullwidth">
        
		<tr>
            
			<th class="info_table">Name</th>
            
			<th class="info_table">Email</th>
            
			<th class="info_table">Phone Number</th>
        
		</tr>
';

$checkSponsor = $MySQLi->query("
                                      SELECT 
                                        user_ID,
                                        AES_DECRYPT(sponsorship_level, '$aesKey') as sponsorship_level,
                                        AES_DECRYPT(spons_name, '$aesKey') as spons_name,
                                        AES_DECRYPT(spons_phone, '$aesKey') as spons_phone,
                                        AES_DECRYPT(spons_email, '$aesKey') as spons_email 
                                      FROM sponsors WHERE sponsorship_level = AES_ENCRYPT('silver', '$aesKey')");
if($checkSponsor->num_rows > 0){
    while ($r = $checkSponsor->fetch_array(MYSQLI_ASSOC)) {
        $sponsorName = $r["spons_name"];
        echo "<tr><td align='center' class=\"info_table\">$sponsorName</td>";
        $sponsorEmail = $r["spons_email"];
        echo "<td align='center' class=\"info_table\">$sponsorEmail</td>";
        $sponsorPhone = $r["spons_phone"];
        echo "<td align='center' class=\"info_table\">$sponsorPhone</td></tr>";

    }
}

echo'	</tr>
        
		</table>
    
	</div>
';

echo'

<div id="sponsors" class="container-fluid bg-fade">        
		<h2>Bronze Sponsors</h2>
        
		<table class="defaultbg fullwidth">
        
		<tr>
            
			<th class="info_table">Name</th>
            
			<th class="info_table">Email</th>
            
			<th class="info_table">Phone Number</th>
        
		</tr>
';

$checkSponsor = $MySQLi->query("
                                      SELECT 
                                        user_ID,
                                        AES_DECRYPT(sponsorship_level, '$aesKey') as sponsorship_level,
                                        AES_DECRYPT(spons_name, '$aesKey') as spons_name,
                                        AES_DECRYPT(spons_phone, '$aesKey') as spons_phone,
                                        AES_DECRYPT(spons_email, '$aesKey') as spons_email 
                                      FROM sponsors WHERE sponsorship_level = AES_ENCRYPT('bronze', '$aesKey')");
if($checkSponsor->num_rows > 0){
    while ($r = $checkSponsor->fetch_array(MYSQLI_ASSOC)) {
        $sponsorName = $r["spons_name"];
        echo "<tr><td align='center' class=\"info_table\">$sponsorName</td>";
        $sponsorEmail = $r["spons_email"];
        echo "<td align='center' class=\"info_table\">$sponsorEmail</td>";
        $sponsorPhone = $r["spons_phone"];
        echo "<td align='center' class=\"info_table\">$sponsorPhone</td></tr>";

    }
}

echo'	</tr>
        
		</table>
    
	</div>
';

require_once("footer.php");
?>