<?php 

include_once('../config/SESSION_MANAGER.php');
//error_reporting(0);

// this page is accessed via http request, so use linking directly
include_once('ENCODER.php');
	$valid = new Helen();
	$allcount = new DBCount();
	// brut force checker
	$valid->brutecheck();


if(isset($_POST['PaperForm'])){

extract($_POST);

//$paper_id
 $paperstatus = $tool->dbstr($col="status",$table="cbt_exams",$_sql="`id` = '$paper_id'");
 $duration = $tool->dbstr($col="duration",$table="cbt_exams",$_sql="`id` = '$paper_id'");
 $cbt_subject_id = $tool->dbstr($col="subject",$table="cbt_exams",$_sql="`id` = '$paper_id'");  
 $cbt_answer_table = $tool->dbstr($col="answer_table",$table="cbt_subjects",$_sql="`id` = '$cbt_subject_id'"); 
 $cbt_question_table = $tool->dbstr($col="question_table",$table="cbt_subjects",$_sql="`id` = '$cbt_subject_id'");  
 
$is_started = $tool->MYCount("SELECT COUNT(student) AS num FROM `$cbt_answer_table` WHERE `student`='$StudentID' AND `exam`='$paper_id'");
 $has_active_exam = $tool->MYCount("SELECT COUNT(exam) AS num FROM `cbt_subscription` WHERE `student`='$StudentID' AND `online`='1' AND `exam` !='$paper_id'");



 // are we checking the exam too: use second one
 //$has_submited = $tool->MYCount("SELECT COUNT(exam) AS num FROM `cbt_subscription` WHERE `student`='$StudentID' AND `status`='2'");
 $has_submited = $tool->MYCount("SELECT COUNT(exam) AS num FROM `cbt_subscription` WHERE `student`='$StudentID' AND `status`='2' AND `exam`='$paper_id'");

 
 if( $paperstatus !=1){
$tool->Error("Invalid Exam, already completed");
//see if the student have already stated exam session
}elseif($has_active_exam>0){ // see if the user have an active exam
$tool->Error("Invalid action, you have an active exam, please submit that paper first before you start another");

}elseif($has_submited>0){
$tool->Error("Invalid action, you have already submitted your paper");

}elseif($is_started>0){
$tool->Error("Invalid action, you already started this exam: you may continue the exam if you are not done");
// we can redirect him to start taking the exam here if his time is not ended
// check his ending time, 
// see if he is changed his ip,
// his ip changed and he is online then he computer has shut dowwn there is nothing we can do, let him use the same system

// link to continue exam if he is using the same computer
if(isset($_SESSION['Ongoing'])){
echo '<a href="?Tera=ExamDASHBOARD&question='.$tool->EncoderToken($paper_id).'#Dentals"> Continue Exam now </a>';
}else{
$tool->Error("its looking like you changed your system to another, that is not allowed! Sorry");
}



}else{
	
	 try {  
// populate the amswer table with empty value, select question number from question table: use transaction 
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// we dont need this: already in connect.php
    // bigin transaction
  $pdo->beginTransaction();
  // have ur query and  // prepare it
$Tooler = $pdo->prepare("INSERT INTO `$cbt_answer_table` (`question_id`,`student`,`exam`) SELECT `id`, '$StudentID' AS `a`, '$paper_id' AS `b` FROM `$cbt_question_table` WHERE `cbt_exam`='$paper_id'");
// update the student subscription

$now = time();
$end = $now + ($duration * 60);
//$nextWeek = time() + (7 * 24 * 60 * 60);
             // 7 days; 24 hours; 60 mins; 60 secs


// we may hanlde this subscription when student pay: but this exam is free so we do not deduct his money anyway
$Tooleb = $pdo->prepare("INSERT INTO `cbt_subscription`(exam,student,exam_start_time,exam_end_time,user_ip,online,status) VALUES('$paper_id','$StudentID','$now','$end','$user_ip','1','1')"); 

  $Tooler->execute(); 
  $Tooleb->execute(); 

  $pdo->commit();
    echo '&nbsp;&nbsp;&nbsp;Hurray!';
	// we are good here, lets prepare the student Exam Dashboard
	// set exam start time // set end time in after 20 mins
	set_session("Ongoing",$paper_id);
	set_session("Qnumber",1);// we want him to start from question number 1

	set_session("StartTime",$now);
	set_session("EndTime",$end);// irrelevant
$valid->PAGEREDIRECT('?Tera=ExamDASHBOARD&question='.$tool->EncoderToken($paper_id).'#Dentals');

	} catch (Exception $e) {
  $pdo->rollBack();
  echo "Failed: " . $e->getMessage();
}
	
	
}


   
}