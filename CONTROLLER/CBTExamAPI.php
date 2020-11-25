<?php 
include_once('../config/SESSION_MANAGER.php');
//error_reporting(0);
// this page is accessed via http request, so use linking directly
include_once('ENCODER.php');
	$valid = new Helen();
	$allcount = new DBCount();
	// brut force checker
	$valid->brutecheck();


	if(isset($_GET['ChangeExamStatus'])){
		/// changing exam status
		extract($_POST);
		//$exam_id
		
		if(empty($astatus)){
			echo '<font color="red">Hmm!</font>';
		}elseif($astatus==1 && $Qcountr<1){
		echo '<font color="red">Error: we cannot start this exam question is not complete yet!</font>';
	}else{
	 $Tool = $pdo->prepare("UPDATE `cbt_exams` SET `status`='$astatus' WHERE `id`='$exam_id'");
  $Tool->execute();
if($Tool->rowCount()>0){// counting the affected rows
//$valid->Success("Status Updated");
			echo '<font color="green">Status Updated!</font>';
	
}else{
//$valid->Error("Error: no change made");
			echo '<font color="red">Error: no change to make!</font>';

}

		}
exit;
	}
	

if(isset($_POST['AddCBTExam'])){
extract($_POST);

$countit = $valid->MyCount("SELECT COUNT(name) AS num FROM `cbt_exams` WHERE name = '$name' AND type = '$type' AND subject = '$subject' AND grade='grade' AND year='$year' AND term='$term' "); 
if(empty($duration) || empty($name) || empty($total) || empty($date) || empty($type) || empty($subject)){
$valid->Error("please complete the form");	
}elseif($countit>0){
$valid->Error("Exam with the same parameter already created: if you think am wrong check manage Exam or change the title to force creating");	
}elseif($duration<0 || $total<0){
$valid->Error("Duration or total question is invalid");	
}elseif($total>499){
$valid->Error("Total question is beyond 500, we do not support that yet?");	
}else{

$name=$valid->secureStr($name);
$duration=$valid->secureStr($duration);
$total=$valid->secureStr($total);
$date=$valid->secureStr($date);

$sql = "INSERT INTO cbt_exams(`name`, `type`, `subject`, `total_question`, `staff`, `duration`, `date`, `grade`, `year`, `term`) VALUES(:name, '$type', '$subject', :total, '$staff', :duration, '$date', '$grade', '$year', '$term')";
 
 $Tool = $pdo->prepare($sql);
 $Tool->bindValue(':name', $name, PDO::PARAM_STR);
  $Tool->bindValue(':total', $total, PDO::PARAM_INT);
 $Tool->bindValue(':duration', $duration, PDO::PARAM_INT);

 $Tool->execute();
 $cbtcode = $pdo->lastInsertId();
if($Tool->rowCount()>0){// counting the affected rows
$valid->Success("CBT Exam Created, now go add questions click to add questions");
	echo '<a href="?Tera=Exams&Model=ControlExam&token='.$tool->EncoderToken($cbtcode).'">Set Questions </a>';
$tool->ResetForm('AddCBT');

}else{
	echo "Error, we have a problem";
	exit;
}
}
///


}