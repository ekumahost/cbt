<?php
//define('siteurl','http://cbt.ugarsoft.com/');
define('siteurl','http://localhost/cbt');
define('image_lead','http://localhost/cbt');
//define('image_lead','http://cbt.ugarsoft.com/');

define('adminlogin','admin');
define('sitename', 'NIGERIA SCHOOL');
define('siteabv', 'fedsdtten');
define('sitefullname', 'Computer Based Test');
define('email', 'cbt@ugarsoft.com');
define('phone', '08066424512');

define('OKOKOH', 'uncleBen2016');// password salting variable
$Okokoh = OKOKOH;
$portalurl =siteurl;
define('ResetPassword','HyperBen');// md5($email.ResetPassword)

define('year', date('Y'));
define('copyright', '&copy; '.date('Y').' CBT Systems');
define('avater','../CORDOVA/img/avatar-2-64.png');
define('htnlogo','../CORDOVA/img/avatar-2-64.png');// htn logo small like the one above
define('api', '_new');

///////////////////////////////////////ADMINS URL
define('adminurl','Cpanel/?Tera=Home');// Core admin
define('studenturl','Center/?Tera=Home');// Core admin

// landing pages
define('siteabout', 'CBT portal');



function PAGEREDIRECT($url){
// use js to redirect pages, dont run into php header set issue
echo '<script type="text/javascript">
<!--
window.location = "'.$url.'"
//-->
</script>';
}

 function ServeError($str){


	 return '<div class="alert alert-danger alert-icon alert-close alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">�</span>
							</button>
							<i class="font-icon font-icon-warning"></i>'.$str.'</div>';

	}

