<?php if(!defined('JSKing')){require_once('404.php');}else{require_once('config/catch.php');} ?>

<?php 
// this does not handle when the user enters a folder
if(!defined('JSKing')){
	//echo 'you are in catch';
	require_once('SETTINGS.php');
// hehe he is accessiong that page directly, throw him out
// please use js redirect	
PAGEREDIRECT(siteurl.'?rootaccess=true');
exit;
}
?>