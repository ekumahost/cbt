<?php
require_once('CONTROLLER/publicencoder.php');

$control = new Helen();

//session_destroy();
unset($_SESSION['StaffID']);
unset($_SESSION['AdminID']);

//Ongoing StartTime
unset($_SESSION['UserType']);
unset($_SESSION['UserName']);

unset($_SESSION['LAST_ACTIVITY']);

unset($_SESSION['TRIAL']);
unset($_SESSION['EKUMA']);
unset($_SESSION['SLEEP']);

// for the student
unset($_SESSION['StudentUserName']);
unset($_SESSION['CurrentYear']);
unset($_SESSION['CurrentTerm']);
unset($_SESSION['StudentID']);

  /* unset admission related sessions
 $_SESSION['mystudenthandle']; 
$_SESSION['department_id']; // department
$_SESSION['faculties_id']; // //faculty
$_SESSION['batch_id'];// admission batch
$_SESSION['admitform'];// 1== merit, 
  */
  
  $control->PAGEREDIRECT('home.cbt');//

  

//$pp=$_SESSION['UserId'];
?>