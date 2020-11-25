<?php
define('configuration', true);
DEFINE ('_VALID', 1);
DEFINE ('_LANG', 'en');
$timeouting = 90000;// seconds log inactive user out

$SMTP_SERVER = 'ifihear.ipage.com';
$SMTP_USER = 'smtp@ifihear.com';
$SMTP_PASSWORD = 'mypassword';
$SMTP_FROM_NAME = 'Ekumahost SF';
$SMTP_FROM_EMAIL = 'schoolapp@ekumahost.com';
$SMTP_REPLY_TO = 'schoolapp@ekumahost.com';

$staff_image_path = 'http://localhost/CLOUDSCHOOL/uploads/staff_profiles/images/';//WARNING: don't you dare change this, unless you change where it was used at ajaxify/profile_avatar.php	

// admin password
$pass_length_min = 6;
$pass_length_max = 20; // effect this in web student db validation
$user_length_min = 3;// username lenght
$user_length_max = 15;
define('merit', "Merit");// session set as 1 during admission, this must be merit
define('supplementary', "Shopping");//2
//		to add suplimentary second choice add in db then add in includo/admission/viewall.php BECAUSE MERIT AND SUPPLIMENTARY IS ASUMED TO BE 2 ONLY, THIRD TYPE SHOULD NOT BE ADDED UNLESS CODED IN ADMISSION.PHP

define('api_','new_');// table prefix to be used for creating tables

function REDIRECT($url){
// use js to redirect pages, dont run into php header set issue
echo '<script type="text/javascript">
<!--
window.location = "'.$url.'"
//-->
</script>';
}	
