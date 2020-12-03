<?php
include_once('../config/SESSION_MANAGER.php');
error_reporting(0);
// this page is accessed via http request, so use linking directly
include_once('ENCODER.php');
$valid = new Helen();
$allcount = new DBCount();
// brut force checker
$valid->brutecheck();


function validDNS($email)
{
    $domain_name = substr(strrchr($email, "@"), 1);
    $host = rtrim($domain_name, '.') . '.';
    $MXresult = checkdnsrr($host, 'MX');
    if (!$MXresult) {
        return false;
    }else{return true;}
}


// process login form here
if(isset($_POST['email'])){
// user submited reg form so lets valdate iterator_apply
//$lang = new Language();
    extract($_POST);// collect data from submitted html form from /register.php
//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.

    //Retrieve the field values from our login form.
    $p_username = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $p_passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $p_username=$valid->secureStr($p_username);
    $p_passwordAttempt= $valid->secureStr($p_passwordAttempt);
    $p_first_name=$valid->secureStr($_POST['first_name']);
    $p_last_name=$valid->secureStr($_POST['last_name']);
    $p_phone=$valid->secureStr($_POST['phone']);


   if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['last_name'])){
       $valid->Warn('Please complete all form');
       exit;
   }

    if( strlen($_POST['password']) < 4 ){
        $valid->Warn('password is too short, at least 4 char');
        exit;
    }


    if($_POST['password'] !== $_POST['password2'] ){
        $valid->Warn('Passwords did not match');
        exit;
    }

    // validate email address..
    if(!validDNS($_POST['email'])){
        $valid->Warn('Email address seems to be invalid');
        exit;
}



    try{
        $sqle = "SELECT * FROM web_students WHERE email = :p_username";

        $stmte = $pdo->prepare($sqle);
        //Bind value.
        // excaped with quotes added, lets remove the single quote then| we know its single quote
        $p_username = trim($pdo->quote($p_username), "'");

        $stmte->bindValue(':p_username', $p_username);
        //Execute.
        $stmte->execute();
        //Fetch row.
        $usere = $stmte->fetch(PDO::FETCH_ASSOC);
    }catch (Exception $e) {
        // design this well to make sense
        die(ServeError('Registration Refused'.
            // conmment out in launch
            $e->getMessage()
        ));
    }

    //If $row is FALSE.
    if($usere ===false){
        //Could not find a user with that p_username!
        // $valid->unsetTrial();
 //$validp_passworde = $valid->SoftPasswordEncrypt($p_passwordAttempt);
        // register the user..

// register student login profile..

        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();


            $StudentBio = $pdo->prepare("INSERT INTO `studentbio` (studentbio_internalid,studentbio_lname,studentbio_fname,admit,	std_bio_mobile) VALUES(:studentbio_internalid, :studentbio_lname, :studentbio_fname, :admit, :std_bio_mobile)");
            // bind value
            $StudentBio->bindValue(':studentbio_internalid', $p_username, PDO::PARAM_STR);
            $StudentBio->bindValue(':studentbio_lname', $p_last_name, PDO::PARAM_STR);
            $StudentBio->bindValue(':studentbio_fname', $p_first_name, PDO::PARAM_STR);
            $StudentBio->bindValue(':admit', 1, PDO::PARAM_INT);
            $StudentBio->bindValue(':std_bio_mobile', $p_phone, PDO::PARAM_STR);
            $StudentBio->execute();
             $$StudentBioID = $pdo->lastInsertId();


            // student login table
            $StudentLogin = $pdo->prepare("INSERT INTO `web_students` (stdbio_id,email,user_n,pass,status) VALUES(:stdbio_id, :email, :user_n, :pass, :status)");
            // bind value
            $StudentLogin->bindValue(':stdbio_id', $StudentBioID, PDO::PARAM_INT);
            $StudentLogin->bindValue(':email', $p_username, PDO::PARAM_STR);
            $StudentLogin->bindValue(':user_n', $p_username, PDO::PARAM_STR);
            $StudentLogin->bindValue(':pass', $valid->SoftPasswordEncrypt($p_passwordAttempt), PDO::PARAM_STR);
            $StudentLogin->bindValue(':status', 1, PDO::PARAM_INT);
            $StudentLogin->execute();
            $StudentWebID = $pdo->lastInsertId();


            // student grade year..
            $StudentGrade = $pdo->prepare("INSERT INTO `student_grade_year` (student_grade_year_student,student_grade_year_year,student_grade_year_grade) VALUES(:student_grade_year_student, :student_grade_year_year, :student_grade_year_grade)");
            // bind value
            $StudentGrade->bindValue(':student_grade_year_student', $StudentWebID, PDO::PARAM_INT);
            $StudentGrade->bindValue(':student_grade_year_year', 1, PDO::PARAM_INT);
            $StudentGrade->bindValue(':student_grade_year_grade', 1, PDO::PARAM_INT);
            $StudentGrade->execute();


            $pdo->commit();// if any query fail, throws error
            $valid->AlertFormSuccess("Registration complete, please login");


        } catch (Exception $e) {
            $pdo->rollBack();
            $valid->AlertFormError(QueriesFail . $e->getMessage());
          //  $valid->AlertFormError('Something is wring, try again later.');
            //$action->ButtonShow('creater');
        }


    } else{
        //User account found. email already exist
        $valid->Warn('Email already registered');
    }

}
