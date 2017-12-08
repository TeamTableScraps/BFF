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

$checkSponsor = $MySQLi->query("SELECT * FROM sponsors WHERE sponsorship_level = AES_ENCRYPT('platinum', 'BFF')");
if($checkSponsor->num_rows > 0){
    while ($r = $checkSponsor->fetch_array(MYSQLI_ASSOC)) {
        $sponsorName = $r["spons_name"];
        echo "<tr><td align='center'>$sponsorName</td>";
        $sponsorEmail = $r["spons_email"];
        echo "<td align='center'>$sponsorEmail</td>";
        $sponsorPhone = $r["spons_phone"];
        echo "<td align='center'>$sponsorPhone</td></tr>";

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

$checkSponsor = $MySQLi->query("SELECT * FROM sponsors WHERE sponsorship_level = AES_ENCRYPT('gold', 'BFF')");
if($checkSponsor->num_rows > 0){
    while ($r = $checkSponsor->fetch_array(MYSQLI_ASSOC)) {
        $sponsorName = $r["spons_name"];
        echo "<tr><td align='center'>$sponsorName</td>";
        $sponsorEmail = $r["spons_email"];
        echo "<td align='center'>$sponsorEmail</td>";
        $sponsorPhone = $r["spons_phone"];
        echo "<td align='center'>$sponsorPhone</td></tr>";

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

$checkSponsor = $MySQLi->query("SELECT * FROM sponsors WHERE sponsorship_level = AES_ENCRYPT('silver', 'BFF')");
if($checkSponsor->num_rows > 0){
    while ($r = $checkSponsor->fetch_array(MYSQLI_ASSOC)) {
        $sponsorName = $r["spons_name"];
        echo "<tr><td align='center'>$sponsorName</td>";
        $sponsorEmail = $r["spons_email"];
        echo "<td align='center'>$sponsorEmail</td>";
        $sponsorPhone = $r["spons_phone"];
        echo "<td align='center'>$sponsorPhone</td></tr>";

    }
}

echo'	</tr>
        
		</table>
    
	</div>
';

require_once("footer.php");
?>