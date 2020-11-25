<?php 
$pulls = $pdo->prepare("SELECT * FROM `cbt_exams` WHERE `id`='$paper_id'");
$pulls->execute();
$exam = $pulls->fetch(PDO::FETCH_ASSOC);
$subject= $exam['subject'];
$total_question= $exam['total_question'];
$url = '?Tera=ExamResult&token='.$tool->EncoderToken($paper_id);
// WORKING WITH THE TIME --->
$duration= $exam['duration'];
$exam_end_time=$tool->dbstr($col="exam_end_time",$table="cbt_subscription",$_sql="`student` = '$StudentID' AND `exam`='$paper_id'");
$exam_start_time=$tool->dbstr($col="exam_start_time",$table="cbt_subscription",$_sql="`student` = '$StudentID' AND `exam`='$paper_id'");
$now = time();
//$exam_end_time - $exam_start_time = $duration
//$time_spent = $exam_end_time - $duration;
// duration = endtime - start time
// time left = endtime - now // we cont this one down
$time_left = $exam_end_time - $now; // we have a time in microseconds that cn be used to see in minutes
if($time_left<0){
	$time_left = 0;// we dont need a negative value
}
//$time_left = 65*60;
if($now>$exam_end_time){
	// exam timed out = true
//$url = '?Tera=ExamResult&token='.$tool->EncoderToken($paper_id);
// use the get rewuest to submit the paper, then, redirect to result
//$tool->JSGet('../CONTROLLER/SubmitAnswerPaper.php?SubmitFinalPaper=true');
//////---------->
 $nownow = time();
$sql = "UPDATE `cbt_subscription` SET `status`='2', `online`='0', `submit_paper_time` = '$nownow' WHERE `student`='$StudentID' AND `exam`='$paper_id'";
 $Tool = $pdo->prepare($sql);
 $Tool->execute();
if($Tool->rowCount()>0){// counting the affected rows
// redirect to result page
unset($_SESSION['Ongoing']);
$tool->PAGEREDIRECT('?Tera=ExamResult&token='.$tool->EncoderToken($paper_id));// not working
}else{
	unset($_SESSION['Ongoing']);
$tool->PAGEREDIRECT('?Tera=ExamResult&token='.$tool->EncoderToken($paper_id));// not working
echo "Error, we have a problem";
	exit;
}
exit;	 
////////////------>

$tool->PAGEREDIRECT($url);
}
///////////////////////////////////----->
$type= $exam['type'];
 $cbt_subject=$tool->dbstr($col="subject",$table="cbt_subjects",$_sql="`id` = '$subject'");
 $cbt_subject_name=$tool->dbstr($col="grade_subject_desc",$table="grade_subjects",$_sql="`grade_subject_id` = '$cbt_subject'");
 $type=$tool->dbstr($col="name",$table="cbt_exams_type",$_sql="`id` = '$type'");
 
 $cbt_question_table=$tool->dbstr($col="question_table",$table="cbt_subjects",$_sql="`id` = '$subject'");
 $cbt_answer_table=$tool->dbstr($col="answer_table",$table="cbt_subjects",$_sql="`id` = '$subject'");

$Qnumber = 1;
 $Qnumber = $_SESSION['Qnumber']; // question number that is applicable to load

  $Qid=$tool->dbstr($col="id",$table=$cbt_question_table,$_sql="`sn` = '$Qnumber' AND `cbt_exam`='$paper_id'");
  $myquestion=$tool->dbstr($col="question",$table=$cbt_question_table,$_sql="`sn` = '$Qnumber' AND `cbt_exam`='$paper_id'");
  $Qstatus=$tool->dbstr($col="status",$table=$cbt_question_table,$_sql="`sn` = '$Qnumber' AND `cbt_exam`='$paper_id'");
  $Qa=$tool->dbstr($col="a",$table=$cbt_question_table,$_sql="`sn` = '$Qnumber' AND `cbt_exam`='$paper_id'");
  $Qb=$tool->dbstr($col="b",$table=$cbt_question_table,$_sql="`sn` = '$Qnumber' AND `cbt_exam`='$paper_id'");
  $Qc=$tool->dbstr($col="c",$table=$cbt_question_table,$_sql="`sn` = '$Qnumber' AND `cbt_exam`='$paper_id'");
  $Qd=$tool->dbstr($col="d",$table=$cbt_question_table,$_sql="`sn` = '$Qnumber' AND `cbt_exam`='$paper_id'");
  $Qe=$tool->dbstr($col="e",$table=$cbt_question_table,$_sql="`sn` = '$Qnumber' AND `cbt_exam`='$paper_id'");
  $Qar=$tool->dbstr($col="ar",$table=$cbt_question_table,$_sql="`sn` = '$Qnumber' AND `cbt_exam`='$paper_id'");

  
  // check if the user have answerd the question
  $answered = $tool->MYCount("SELECT COUNT(answer) AS num FROM `$cbt_answer_table` WHERE `student`='$StudentID' AND `exam`='$paper_id' AND `question_id`='$Qid' AND `answer` !=''");
  if($answered>0){
	  $mysatus = '<font color="red">answered</font>';
		  $alpha = $tool->dbstr($col="answer",$table=$cbt_answer_table,$_sql="`student`='$StudentID' AND `exam`='$paper_id' AND `question_id`='$Qid'");
 }else{ $mysatus = '';
 $alpha = null;
 }
  
  
 				
								if($exam['status']==1){
	 $status = 'Active';
 }elseif($exam['status']==2){
	$status = 'Completed';

 }else{
	$status = 'Inactive';

 }