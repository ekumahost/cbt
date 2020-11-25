<?php  define('CTitler', 'Exam Result');

$paper_id = $tool->DecodeToken($_GET['token']);
$pulls = $pdo->prepare("SELECT * FROM `cbt_exams` WHERE `id`='$paper_id'");
$pulls->execute();
$exam = $pulls->fetch(PDO::FETCH_ASSOC);
$subject= $exam['subject'];
$total_question= $exam['total_question'];
// WORKING WITH THE TIME --->
$duration= $exam['duration'];
$exam_end_time=$tool->dbstr($col="exam_end_time",$table="cbt_subscription",$_sql="`student` = '$StudentID' AND `exam`='$paper_id'");
$exam_start_time=$tool->dbstr($col="exam_start_time",$table="cbt_subscription",$_sql="`student` = '$StudentID' AND `exam`='$paper_id'");
$type= $exam['type'];
 $cbt_subject=$tool->dbstr($col="subject",$table="cbt_subjects",$_sql="`id` = '$subject'");
 $cbt_subject_name=$tool->dbstr($col="grade_subject_desc",$table="grade_subjects",$_sql="`grade_subject_id` = '$cbt_subject'");
 $type=$tool->dbstr($col="name",$table="cbt_exams_type",$_sql="`id` = '$type'");
 $cbt_question_table=$tool->dbstr($col="question_table",$table="cbt_subjects",$_sql="`id` = '$subject'");
 $cbt_answer_table=$tool->dbstr($col="answer_table",$table="cbt_subjects",$_sql="`id` = '$subject'");

 $tool->Warn("You submitted your Paper! WE HAVE NOT COMPUTED YOUR RESULT YET, PLEASE CHECK BACK LATER.");
