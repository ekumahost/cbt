<?php

include_once('../config/SESSION_MANAGER.php');
error_reporting(0);

// this page is accessed via http request, so use linking directly
include_once('ENCODER.php');
	$valid = new Helen();
	$allcount = new DBCount();
	// brut force checker
	$valid->brutecheck();

// process login form here
if(isset($_POST['username'])){
// user submited reg form so lets valdate iterator_apply
//$lang = new Language();
extract($_POST);// collect data from submitted html form from /register.php
//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.

    //Retrieve the field values from our login form.
    $p_username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $p_passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

	$p_username=$valid->secureStr($p_username);
	$p_passwordAttempt= $valid->secureStr($p_passwordAttempt);

    //Retrieve the user account information for the given p_username.

	try{
 // pick and admin user
 $sql = "SELECT * FROM web_students WHERE user_n = :p_username AND `status` = 1";
  $sqle = "SELECT * FROM web_students WHERE email = :p_username AND `status` = 1";


  $stmt = $pdo->prepare($sql);
     $stmte = $pdo->prepare($sqle);
    //Bind value.

	      // excaped with quotes added, lets remove the single quote then| we know its single quote
	$p_username = trim($pdo->quote($p_username), "'");

    $stmt->bindValue(':p_username', $p_username);
     $stmte->bindValue(':p_username', $p_username);
    //Execute.
    $stmt->execute();
      $stmte->execute();
    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
     $usere = $stmte->fetch(PDO::FETCH_ASSOC);
 }catch (Exception $e) {
	 // design this well to make sense
  die(ServeError('Login Refused'.
  // conmment out in launch
  $e->getMessage()
  ));
}

 //If $row is FALSE.
    if(($user === false) AND ($usere ===false)){
        //Could not find a user with that p_username!
$valid->Error(Wrong_pass);
 			  // $valid->unsetTrial();

 $valid->setTrial();

/*
// but it might be that the account is not active or suspended, lets tell him what to do
 if($core_active=$user['core_active']!==1){
	 echo 'you are not allowed to login';
 }
*/

//echo 'wrong user';
    } else{
        //User account found. Check to see if the given p_password matches the
        //p_password hash that we stored in our users table.

        //Compare the p_passwords.
        $validp_password = $valid->SoftPasswordDecrypt($password=$p_passwordAttempt, $hash=$user['pass']);
        $validp_passworde = $valid->SoftPasswordDecrypt($password=$p_passwordAttempt, $hash=$usere['pass']);
 // $validp_password = md5($user['web_users_password']);//$valid->PasswordDecrypt($password=$p_passwordAttempt, $hash=$user['web_users_password']);
      //  $validp_passworde = md5($usere['web_users_password']); //$valid->PasswordDecrypt($password=$p_passwordAttempt, $hash=$usere['web_users_password']);






        //If $validp_password is TRUE, the login has been successful.
        if(($validp_password==true) OR ($validp_passworde==true)){


		   $user_id= !empty($user['id']) ? trim($user['id']) : $usere['id'];
		   $web_users_username= !empty($user['user_n']) ? trim($user['user_n']) : $usere['user_n'];

			  // set a session for user id, store a unique session id in the database, always check against it when verifying session
			  set_session("StudentID", $user_id);

			  set_session("StudentUserName", $web_users_username);
			  set_session("LAST_ACTIVITY", time()); // to auto log him out at iddle


			 set_session("CurrentYear", $valid->dbstr($col="current_year",$table="tbl_config",$_sql="`id` = '1'"));
			 set_session("CurrentTerm", $valid->dbstr($col="grade_terms_id",$table="grade_terms",$_sql="`current` = '1'"));




			        $redirurl=studenturl;

				   $valid->Success(LogonSuccessExam);
			   $valid->unsetTrial();

						 $valid->PAGEREDIRECT($redirurl);



        } else{
$valid->Warn(Wrong_pass);
 $valid->setTrial();
 //echo $user['pass'].'-';
// echo $p_passwordAttempt;
 			   //$valid->unsetTrial();


        }
    }

}
