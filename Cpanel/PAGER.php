<?php
// switch page based on Get Tera

if(isset($_GET['Tera'])){
	// we are ready to switch

	switch($_GET['Tera']){
		case 'Home':
require_once('view/home/index.php');
break;

case 'Configuration':
require_once('view/configuration/index.php');
break;

case 'Exams':
require_once('view/exams/index.php');
break;


case 'Users':
require_once('view/users/index.php');
break;
case 'Calendar':
require_once('view/calendar/index.php');
break;


case 'Sales':
require_once('view/sales/index.php');
break;





	case 'Profile':
require_once('view/profile/index.php');
break;

case 'SLEEP':
//require_once('view/roles/index.php');
$_SESSION['SLEEP']=$_SESSION['StaffID'];
	REDIRECT('../admin?SLEEP=true');

break;


default:
require_once('view/home/404.php');


}






}else{
// the niger is now playing with our url just warn him
	echo '<div class="alert alert-danger alert-no-border alert-close alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<i class="font-icon font-icon-inline font-icon-warning"></i>
							<strong>We are running into a problem</strong><br>
							It is looking like the function is not enabled yet, you can try again later
															            <img class="hidden-md-down" src="../CORDOVA/static/sorry.png" alt="">

							<div class="alert-btns">
							<a href="?Tera=Home"><button type="button" class="btn btn-rounded">I am Sorry!</button></a>
								<button type="button" class="btn btn-rounded">Tell this to admin</button>
							</div>
						</div>';
}

