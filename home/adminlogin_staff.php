not allowed!<?php
// ADMINISTRATOR LOGIN PROCESSOR
// THIS FILE IS KINDER NOT USED

EXIT; // JSUT BE LOOKING AT HIM

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
 $sql = "SELECT * FROM web_users WHERE web_users_username = :p_username AND `web_users_type` ='B' AND `web_users_email_active`= '1' AND `core_active` = 1";
  $sqle = "SELECT * FROM web_users WHERE web_users_email = :p_username AND `web_users_type` ='B' AND `web_users_email_active`= '1' AND `core_active` = 1";
  

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
        $validp_password = $valid->PasswordDecrypt($password=$p_passwordAttempt, $hash=$user['web_users_password']);
        $validp_passworde = $valid->PasswordDecrypt($password=$p_passwordAttempt, $hash=$usere['web_users_password']);

        //If $validp_password is TRUE, the login has been successful.
        if(($validp_password==true) OR ($validp_passworde==true)){
           
		   // we now have a valid user to play with
		   
		   $user_type= !empty($user['web_users_type']) ? trim($user['web_users_type']) : $usere['web_users_type'];
		   	//$staff_id= !empty($user['auctioner_profile']) ? trim($user['auctioner_profile']) : $usere['auctioner_profile'];

		   $admin_id= !empty($user['web_users_id']) ? trim($user['web_users_id']) : $usere['web_users_id'];
		   $web_users_username= !empty($user['web_users_username']) ? trim($user['web_users_username']) : $usere['web_users_username'];
		   $user_location= !empty($user['web_user_terminal']) ? trim($user['web_user_terminal']) : $usere['web_user_terminal'];
           $location_name = $valid->dbstr($col="name",$table="book_terminal_location",$_sql="`id` = '$user_location'");// places like ABUJA, LAGOS etc
		    
			if(empty($location_name)){
			  $location_name = 'nigeria'; // this might cause trouble if not validated inside??
			  }
			  
		   
			  			  set_session("location", $location_name);  
			  			  set_session("terminal", $user_location);  

			  // set a session for user id, store a unique session id in the database, always check against it when verifying session 
			  set_session("AdminID", $admin_id);
			  set_session("StaffID", $admin_id);

			  set_session("UserName", $web_users_username);
			  set_session("LAST_ACTIVITY", time()); // to auto log him out at iddle

			 
		      set_session("UserType", $user_type);

			 $redirurl=bookersurl;
              
			  /*
			 switch($user_type){
				case 'A':
				$redirurl=adminurl;
                break;	
			case 'B':// for auctioners
				$redirurl=auctionerurl; // this case can never happen
                break;
				 default:
				 $redirurl=siteurl;
                 }*/

			 // update last login date in db without validation
                   
				   $valid->Success(LogonSuccess);
			   $valid->unsetTrial();
			   
						 $valid->PAGEREDIRECT($redirurl);		   
                             // please set the sessions below before redirecting
						 
						 

			 
            
        } else{
$valid->Warn(Wrong_pass);
 $valid->setTrial();
        }
    }
    
}