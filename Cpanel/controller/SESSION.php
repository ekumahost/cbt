<?php
session_start();
// start session to handle permission and access tokens

include_once('../functions/configurato.php');

// we dont want to see any error when we publish this app
error_reporting(0);

// Permission checking for admins
	if(($_SESSION['UserType'] != 'A')){
		//echo "you are no core admmin, do redirect to logout page";
		REDIRECT('../404_not_found');
		exit;
	}
	
	// time out check for admins
if(!isset($_SESSION['StaffID']) || (time() - $_SESSION['LAST_ACTIVITY'] > $timeouting)) 
  {
$_SESSION['SLEEP']=$_SESSION['StaffID'];
	REDIRECT('../admin?SLEEP=true&staff=wrong');


  exit;		
}
	
	// check if the user session is set here
	// if any of the session is dead, take the user to the sleep page at login sleep=true
	if(!isset($_SESSION['UserName'])  ) {
		//echo 'session broken';
		REDIRECT('../admin?SLEEP=true');
	
		exit;
	}
