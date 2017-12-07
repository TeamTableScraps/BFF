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

$originalBooth = 0;
$boothQuery = $MySQLi->query("
    SELECT booth_ID FROM vendors
    WHERE user_ID = ".$user->userID."
");
if($boothQuery != false){
    if ($boothQuery->num_rows > 0) {
        while($r = $boothQuery->fetch_array()){
            $originalBooth = $r['booth_ID'];
        }
    }
}

//If the form was already submitted
if (isset($_POST['toSubmit']) && $_POST['toSubmit'] == 'true') {
    $errorMsg = '';
    $altError = '';
    $booth_id = $_POST['booth_ID'];

    if (trim($booth_id) == '') {
        $errorMsg .= '&#8226; Booth ID ';
    }

    if($errorMsg == '' && $altError == ''){
        //Prevent injection
        $booth_id = $MySQLi->escape_string($booth_id);
        $currentUserID = $user->userID;
        //echo "<script>console.log('$booth_id');</script>";
        $setVendorQuery = $MySQLi->query("
          UPDATE vendors
          SET `booth_ID` = $booth_id
          WHERE `user_ID` = $currentUserID");
        $setBoothsQuery = $MySQLi->query("
          UPDATE booths
          SET `is_available` = 0
          WHERE `booth_ID` = $booth_id");
        if($originalBooth > 0){
            $makeAvailable = $MySQLi->query("
                UPDATE booths
                SET is_available = 1
                WHERE booth_ID = ".$originalBooth."
            ");
        }

        if(!$setBoothsQuery || !$setVendorQuery){
            $altError = "Query failed.";
        }
        elseif ($setVendorQuery->num_rows < 1 || $setBoothsQuery->num_rows < 1){
            $altError = "Query stil failed.";
        }
        echo "<script>$.colorbox.close();</script>";
    }
}

if(!isset($booth_id)){
    $booth_id = '';
}
if(!isset($altError)){
    $altError = '';
}
if(!isset($errorMsg)){
    $errorMsg = '';
}

$booths = $MySQLi->query(
    "
            SELECT booth_ID
            FROM booths
            WHERE is_available = 1
            ORDER BY booth_ID
            ;");

############
# FRONTEND #
############
echo "
    <form action='vendorBoothRegistration.php' name='register_form' method='post' class='popupForm'>
    <input type='hidden' name='toSubmit' value='true'/>
    <table class='padded' align='center'>
        <tr class='addr_header_row'><td colspan='2' align='center' class='addr_header noTopPadding'>Register</td></tr>
        <tr><td colspan='2' class='addr_label'>&nbsp;</td></tr>
        <tr><td colspan='2' class='addr_label noPadding'>Booth ID</td></tr>
        <tr><td colspan='2'><select name='booth_ID' required>";
while ($row = $booths->fetch_assoc()) {
    var_dump($row);
    $x = $row["booth_ID"];
    $strx = strval($x);
    echo "<option value=$x>$strx</option>";
}
echo "
        </select></td></tr>
        <tr><td colspan='2'><input type='submit' value='Register' class='button_modern varPadding'/></td></tr>";

if ($errorMsg != '' || $altError != '') {
    if($altError != ''){
        echo "<tr><td colspan='2' align='center' class='error'>$altError</td></tr>";
    }
    else{
        echo "<tr><td colspan='2' align='center' class='error'>Please enter the following fields:</br>$errorMsg</td></tr>";
    }
}

echo"    
    </table>
    </form>
";