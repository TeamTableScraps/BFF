<?php
require_once('includes/includer.php');

$sponsorQuery = "
    SELECT
        user_ID,
        sponsorship_level,
        years_active
    FROM sponsors
";

$sponsors = $MySQLi->query($sponsorQuery);

$i = 1;
if($sponsors != false){
    if ($sponsors->num_rows > 0) {
        while($r = $sponsors->fetch_array()){
            $userQuery = "SELECT AES_DECRYPT(first_name, '$aesKey') as first_name, AES_DECRYPT(last_name, '$aesKey') as last_name FROM users WHERE user_ID = '".$r['user_ID']."' LIMIT 1";
            $user = $MySQLi->query($userQuery);
            while($u = $user->fetch_array()){
                $sponsorName = $u['first_name']." ".$u['last_name'];
            }
            echo "Sponsor ".$i.": ".$sponsorName."<br/>";
            $i++;
        }
    }
}else{
    die("Query error");
}