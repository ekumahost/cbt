<?php 
include_once('../config/SESSION_MANAGER.php');
//error_reporting(0);
// this page is accessed via http request, so use linking directly
include_once('ENCODER.php');
	$valid = new Helen();
	$allcount = new DBCount();
	// brut force checker
	$valid->brutecheck();

 if(isset($_POST['GradeResult'])){
	 extract($_POST);


// check the cbt status
$examstatus=$tool->dbstr('status','cbt_exams',"id = '$Exam_id'");
if($examstatus<2){
	$valid->Error('This exam is not completed yet');
	exit;
}elseif($examstatus==2){
// exam is completed so we keep silent
}else{
$valid->Error('Only Completed exam can be graded');
	exit;	
}

// GET THE STUDENT SCORE
 try{
	  //   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// we dont need this: already in connect.php
    // bigin transaction
  //$pdo->beginTransaction();	

						$pushanswers = "SELECT * FROM `cbt_subscription` WHERE `exam` = '$Exam_id'";
						$ans = $pdo->prepare($pushanswers);
                        $ans->execute();
						
						while($lista = $ans->fetch(PDO::FETCH_ASSOC)){
						$ansStudent = $lista['student'];
						
// update subscription with this
$CountCorrectAnswer= $tool->MyCount("SELECT COUNT(answer) AS num FROM `$answers_table` a JOIN `$question_table` b ON `a`.`answer`= `b`.`ar` WHERE `a`.`student` ='$ansStudent' AND `a`.`exam` = '$Exam_id' AND `a`.`question_id` =`b`.`id`");
					
					$makeGrade = "UPDATE `cbt_subscription` SET `score`= '$CountCorrectAnswer' WHERE `student`='$ansStudent'";
                              $mg = $pdo->prepare($makeGrade);
                             $mg->execute();
                               if($mg->rowCount()>0){
								   //we do nothing
								   } }

	 }catch (Exception $e) {
		   $valid->Error('We could not get the students scores, please try again later');
  echo "Failed: " . $e->getMessage();
  exit; // if the action fail we cannot go to the next one
}

// COMPUTE FIRST TO LAST POSITION 
 try{
	     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// we dont need this: already in connect.php
    // bigin transaction
  $pdo->beginTransaction();
	// Make the first second and third postion things
$pushpost = "SELECT * FROM `cbt_subscription` WHERE `exam`='$Exam_id' GROUP BY `score` ORDER BY `score` DESC";
						$ss = $pdo->prepare($pushpost);
                        $ss->execute();
						$posi =0;
						$suc = 0;
						while($po = $ss->fetch(PDO::FETCH_ASSOC)){
							$posi = $posi+1;
			                $mscore=$po['score'];
							$makeposition = "UPDATE `cbt_subscription` SET `position`= '$posi' WHERE `score`='$mscore'";
                              $mm = $pdo->prepare($makeposition);
                             $mm->execute();
                               if($mm->rowCount()>0){
								   $suc=$suc+1;}
								   }
						// mark as graded 
						$Toolera = $pdo->prepare("UPDATE `cbt_exams` SET `graded` = '1' WHERE `id`='$Exam_id'"); 
	                    $Toolera->execute();
						
						
						 $pdo->commit();
						if($suc>0){
						 $valid->Success('in Grading!');
						}else{
						$valid->Error('in Grading, it seems it was done already?!');
	                    }
						echo '<a href="">Verify</a>';
	 }catch (Exception $e) {
		   $pdo->rollBack();
  echo "Failed: " . $e->getMessage();
}

 }