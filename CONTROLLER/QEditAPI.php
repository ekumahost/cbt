<?php 
include_once('../config/SESSION_MANAGER.php');
//error_reporting(0);
// this page is accessed via http request, so use linking directly
include_once('ENCODER.php');
	$valid = new Helen();
	$allcount = new DBCount();
	// brut force checker
	$valid->brutecheck();

 if(isset($_GET['QEdit'])){
	 extract($_POST);

 // we want to edit question

if(empty($QuestionDesc)){
$valid->Error("Wait: you cleared the question");	
	
}elseif(!isset($ar)){
$valid->Error("Wait: tick the correct answer at the right");	
}elseif(empty($a) || empty($b)){
	
$valid->Error("Wait: you must set at least two options: option A and B must be set first");	

// we want to know if the correct answer he choosed is not empty place
}elseif(($ar=='c' && empty($c)) || ($ar=='d' && empty($d)) || ($ar=='e' && empty($e)) ){
$valid->Error("Wait: your correct answer cannot be empty");	
}else{
//  we are ready to add the qustion now, lect get the last serial number	

$a = $valid->secureStr($a);
$b = $valid->secureStr($b);
$c = $valid->secureStr($c);
$d = $valid->secureStr($d);
$e = $valid->secureStr($e);
$ar = $valid->secureStr($ar);

$QuestionDesc = $valid->HTMLEncoder($QuestionDesc);

if(strlen($QuestionDesc)>50000){
$valid->Error("Out of Idea: the question is too big, if you added image, reduce the image size before upload");	
exit;
}

// we must be sure the exam is still up coming
if($Exam_status>0){
$valid->Error("Out of Idea: Question editing ended, this exam is already launched!");	
	
	exit;
}
// we now our $sn to be used as question serial number
$Tooler = $pdo->prepare("UPDATE `$QuestionTable` SET `question`= :question, `ar`= :ar, `a`= :a, `b`= :b, `c`= :c, `d`= :d, `e`= :a WHERE `id`='$Question_ID'");
 // bind value
  $Tooler->bindValue(':question', $QuestionDesc, PDO::PARAM_STR);
  $Tooler->bindValue(':ar', $ar, PDO::PARAM_STR);
  $Tooler->bindValue(':a', $a, PDO::PARAM_STR);
  $Tooler->bindValue(':b', $b, PDO::PARAM_STR);
  $Tooler->bindValue(':c', $c, PDO::PARAM_STR);
  $Tooler->bindValue(':d', $d, PDO::PARAM_STR);
  $Tooler->bindValue(':e', $e, PDO::PARAM_STR);
  $Tooler->execute();
 if($Tooler->rowCount()>0){// counting the affected rows
$valid->Success("Question Updated Succesfully");	

}else{
$valid->Error("Error: we have a problem here, try again later");	
}

// insert into db here 	
}
}