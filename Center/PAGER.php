<?php 
// switch page based on Get Tera
 
if(isset($_GET['Tera'])){
	// we are ready to switch
	
	switch($_GET['Tera']){
		case 'Home':
require_once('view/home/index.php');
break;

	case 'Paper':
require_once('view/paper/index.php');
break;

	case 'ExamDASHBOARD':
require_once('view/paper/ExamDASHBOARD.php');
break;

case 'ExamResult':
require_once('view/paper/ExamResult.php');
break;

case 'Configuration':
require_once('view/configuration/index.php');
break;

case 'SLEEP':
//require_once('view/roles/index.php');
$_SESSION['SLEEP']=$_SESSION['StaffID'];
	REDIRECT('../?SLEEP=true');

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
							It is looking like you are playing around with our url, that is a crime, your account will soon be blocked.
															            <img class="hidden-md-down" src="../CORDOVA/static/sorry.png" alt="">

							<div class="alert-btns">
							<a href="?Tera=Home"><button type="button" class="btn btn-rounded">I am Sorry!</button></a>
								<button type="button" class="btn btn-rounded">You are wrong, I did not!</button>
							</div>
						</div>';
}
