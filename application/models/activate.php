<?php

$users = new Application_Model_Users();

if(isset($_GET['emailID']) && !empty($_GET['emailID'])){
	// Verify data
	$emailID = mysql_escape_string($_GET['emailID']); // Set email variable
	$search = mysql_query("SELECT emailID, roll FROM users WHERE emailID='".$emailID."' AND roll='0'") or die(mysql_error());
    $match  = mysql_num_rows($search);

   if($match > 0){
	// We have a match, activate the account
mysql_query("UPDATE users SET roll='1' WHERE emailID='".$emailID."' AND active='0'") or die(mysql_error());
echo 'Your account has been activated, you can now login';

}else{
	echo " No match -> invalid url or account has already been activated.";
}
else
{
	echo "invalid operation!";
}

