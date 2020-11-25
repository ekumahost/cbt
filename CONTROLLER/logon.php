<?php 
include_once('../config/SESSION_MANAGER.php');
//error_reporting(0);
// we change all UserID index to StaffID
// this page is accessed via http request, so use linking directly
include_once('ENCODER.php');
	$valid = new Helen();
	$allcount = new DBCount();
	// brut force checker
	$valid->brutecheck();




include_once("../home/adminlogin_admin.php");
exit;

// WE CAN CONVERT THESE TO COMPLETE LOGON SWITCHERS
if(isset($_SESSION['EKUMA']) AND $_SESSION['EKUMA']>3){//
// jonsing and extremly confusing url routing system, dont even temper with them
		include_once("../home/adminlogin_admin.php");
	}else{
			require('../home/adminlogin_staff.php');
	
		
	}

if(isset($_POST['adminLogin'])){
// he is clicking on the admin login activate button	
	if(isset($_SESSION['EKUMA']) AND $_SESSION['EKUMA']>3){// he has clicked seven times
		echo '<img src="CORDOVA/static/local.png" width="20" height="20" title="You are now an Examiner"> </img>';
		exit;
	}else{}
	
	//echo 'got it';
	//unset($_SESSION['EKUMA']);
	//exit;
	if(!isset($_SESSION['EKUMA'])){
		
	$_SESSION['EKUMA']=1;
	}else{
	$_SESSION['EKUMA'] = $_SESSION['EKUMA']+1;
		exit;
	}
		
	
	exit;
}

