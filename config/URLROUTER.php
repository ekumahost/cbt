<?php if(!defined('JSKing')){require_once('404.html');}else{require_once('config/catch.php');} ?>
<?php
if ($page_name=='') {
include ( 'home/LandingPage.php' );
	}elseif ($page_name=='home.cbt') {
include ( 'home/LandingPage.php');
	}elseif ($page_name=='register.cbt') {
    include ( 'home/RegisterPage.php');
}
	elseif ($page_name=='logout.cbt') {
include ( 'home/logout.php');
	}

	// defined in the settings.php
elseif ($page_name==adminlogin) {
			// user is trying to access login page, we can chack if session is set here and redirect him
include ( 'home/adminlogin.php');
	}elseif ($page_name=='PasswordControl') {
			// user is trying to access login page, we can chack if session is set here and redirect him
include ( 'home/passwordControl.php');
	}


	else if ($page_name!=$page_namer) {// the last is not the second
include 'LOCK.php';
	}else{

include '404.php';
	}
?>
