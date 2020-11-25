<?php 
include_once('../config/SESSION_MANAGER.php');
//error_reporting(0);
// this page is accessed via http request, so use linking directly
include_once('ENCODER.php');
	$valid = new Helen();
		$action = new Helen();

	$allcount = new DBCount();
	// brut force checker
	$valid->brutecheck();

 if(isset($_POST['SubjectAPI'])){
extract($_POST);
// $subject
// $grade
//$action->ResetForm('SubjectAPI');
$countinside= $tool->MyCount("SELECT COUNT(subject) AS num FROM `cbt_subjects` WHERE `subject`='$subject' AND `grade`='$grade' ");
// validate form
if(empty($subject) || empty($grade) ){
$action->AlertFormError(Emptyform);
}elseif($countinside>0){
	$action->AlertFormError("Problem: it seems like this course is already added for the level selected");

}else{
$code = time();
	  $question_tablei = '_new_question_'.$code;
	  $answer_tablei = '_new_answer_'.$code;

$question_table = "CREATE TABLE `$question_tablei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` int(11) NOT NULL,
  `cbt_exam` int(11) NOT NULL,
  `question` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `ar` enum('a','b','c','d','e') NOT NULL,
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `e` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";	  
	
$answer_table = "CREATE TABLE `$answer_tablei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
   `student` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(1) NOT NULL,
  `submit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";	  
			  
$mainquery = "INSERT INTO cbt_subjects(`subject`, `question_table`, `answer_table`, `grade`) VALUES('$subject','$question_tablei','$answer_tablei','$grade')";

try {  
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->beginTransaction();
 
  $MySubject= $pdo->prepare($mainquery);
$MyTable1= $pdo->prepare($question_table);
$MyTable2= $pdo->prepare($answer_table);
  
  $MySubject->execute();
    $MyTable1->execute();
       $MyTable2->execute();
$pdo->commit();// if any query fail, throws error
  $action->AlertFormSuccess(" Course Added");


} catch (Exception $e) {
  $pdo->rollBack();
  $action->AlertFormError(QueriesFail . $e->getMessage());
   //$action->ButtonShow('creater');
}

	
	
}
	
	
exit;	 
 }
