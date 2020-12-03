<?php
session_start();
// start session to handle permission and access tokens

include_once('../functions/configurato.php');

// we dont want to see any error when we publish this app
error_reporting(0);


	// time out check for admins
if(!isset($_SESSION['StudentID']) || (time() - $_SESSION['LAST_ACTIVITY'] > $timeouting))
  {
$_SESSION['SLEEP']=$_SESSION['StudentID'];
	REDIRECT('../?SLEEP=true&staff=wrong');

  exit;
}

	// check if the user session is set here
	// if any of the session is dead, take the user to the sleep page at login sleep=true
	if(!isset($_SESSION['StudentUserName'])  ) {
		//echo 'session broken';
		REDIRECT('../home?SLEEP=true');

		exit;
	}

