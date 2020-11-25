<?php 
include_once('../config/SESSION_MANAGER.php');
//error_reporting(0);
// this page is accessed via http request, so use linking directly
include_once('ENCODER.php');
	$valid = new Helen();
	$allcount = new DBCount();
	// brut force checker
	$valid->brutecheck();

 if(isset($_POST['AddQuestion'])){
	 extract($_POST);

$exist = $valid->MyCount("SELECT COUNT(question) AS num FROM `$QuestionTable` WHERE `cbt_exam`='$Exam_id' AND `question`='$QuestionDesc' AND `a`='$a' AND `b`='$b' AND `c`='$c' AND `d`='$d' AND `e`='$e'");
$CountAddedQue = $valid->MyCount("SELECT COUNT(question) AS num FROM `$QuestionTable` WHERE `cbt_exam`='$Exam_id'");
if(empty($QuestionDesc)){
$valid->Error("Wait: you have not set any quetion");	
	
}elseif(!isset($ar)){
$valid->Error("Wait: tick the correct answer at the right");	
}elseif(empty($a) || empty($b)){
	
$valid->Error("Wait: you must set at least two options: option A and B must be set first");	

// we want to know if the correct answer he choosed is not empty place
}elseif(($ar=='c' && empty($c)) || ($ar=='d' && empty($d)) || ($ar=='e' && empty($e)) ){
$valid->Error("Wait: your correct answer cannot be empty");	
}elseif($exist>0){
$valid->Error("Out of Idea: This Question is already set before");	
}elseif($TotalQ==$CountAddedQue){
$valid->Error("Out of Idea: a total of $TotalQ questions are already added, you cannot add more");	
}else{
//  we are ready to add the qustion now, lect get the last serial number	
if($CountAddedQue<1){
// no question has been added so our first sn = 1
$sn = 1;		
}else{
// get the maximum serial number and add 1 to is
$MaxSN = $valid->GetMax("SELECT MAX(sn) AS num FROM `$QuestionTable` WHERE `cbt_exam`='$Exam_id'");
$sn = $MaxSN+1;	
}

$a = $valid->secureStr($a);
$b = $valid->secureStr($b);
$c = $valid->secureStr($c);
$d = $valid->secureStr($d);
$e = $valid->secureStr($e);
$ar = $valid->secureStr($ar);

// OUR TEXT colum lomit is 64k bytes
// mb_strlen   multibyte strln
// mb_strlen
$QuestionDesc = $valid->HTMLEncoder($QuestionDesc);

if(strlen($QuestionDesc)>50000){
$valid->Error("Out of Idea: the question is too big, if you added image, reduce the image size before upload");	
exit;
}

// we now our $sn to be used as question serial number
$Tooler = $pdo->prepare("INSERT INTO `$QuestionTable` (sn,cbt_exam,question,ar,a,b,c,d,e) VALUES(:sn, :cbt_exam, :question, :ar, :a, :b, :c, :d, :e)");
 // bind value
  $Tooler->bindValue(':sn', $sn, PDO::PARAM_INT);
  $Tooler->bindValue(':cbt_exam', $Exam_id, PDO::PARAM_INT);
  $Tooler->bindValue(':question', $QuestionDesc, PDO::PARAM_STR);
  $Tooler->bindValue(':ar', $ar, PDO::PARAM_STR);
  $Tooler->bindValue(':a', $a, PDO::PARAM_STR);
  $Tooler->bindValue(':b', $b, PDO::PARAM_STR);
  $Tooler->bindValue(':c', $c, PDO::PARAM_STR);
  $Tooler->bindValue(':d', $d, PDO::PARAM_STR);
  $Tooler->bindValue(':e', $e, PDO::PARAM_STR);
  $Tooler->execute();
 if($Tooler->rowCount()>0){// counting the affected rows
$valid->Success("Question Added Succesfully");	
$valid->ResetForm('AddQuestion');
// clear the text area
echo '<script>  $(this).closest("form").find("input[type=text], textarea").val(""); </script>';



}else{
$valid->Error("Error: we have a problem here, try again later");	
}

// insert into db here 	
}
}