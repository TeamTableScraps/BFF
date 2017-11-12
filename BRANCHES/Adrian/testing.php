<?php
$encryptkey = "9DC97E2DF12D8";
$testf = "testf";
$testl= "testl";
$testem = "test@test.com";
$testpwd = "pwd";

$con = mysqli_connect("localhost","root","","blackfeatherfestival") or die("Some error occurred during connection " . mysqli_error($con));
$query = "";

function queryDatabaseNoReturn($con, $strQuery){

    mysqli_query($con, $strQuery);
}

function queryDataBase($con, $strQuery){
    return mysqli_query($con, $strQuery);
}

//$strSQL = "INSERT INTO blackfeatherfestival.users(first_name, last_name, email, password) VALUES('testf','testl','test@test.com','testpwd')";
//$strSQL = "SELECT * FROM blackfeatherfestival.users";
queryDatabase($con, "INSERT INTO blackfeatherfestival.test(test) VALUES(2)");
$query = queryDataBase($con,"SELECT * FROM blackfeatherfestival.test");
while($row = $query->fetch_assoc()) {
    echo $row["test"]. "\n";
}
mysqli_close($con);
