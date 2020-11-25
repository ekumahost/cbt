<?php 
include_once('../config/SESSION_MANAGER.php');
//error_reporting(0);
// this page is accessed via http request, so use linking directly
include_once('ENCODER.php');
	$valid = new Helen();
	$allcount = new DBCount();
	// brut force checker
	$valid->brutecheck();
$paper_id = $_SESSION['Ongoing'];//$tool->DecodeToken($_GET['token']);
$url = '?Tera=ExamResult&token='.$tool->EncoderToken($paper_id);
/////////////////////////////////////////////
$pulls = $pdo->prepare("SELECT * FROM `cbt_exams` WHERE `id`='$paper_id'");
$pulls->execute();
$exam = $pulls->fetch(PDO::FETCH_ASSOC);
$subject= $exam['subject'];
$total_question= $exam['total_question'];

$type= $exam['type'];
 $cbt_subject=$tool->dbstr($col="subject",$table="cbt_subjects",$_sql="`id` = '$subject'");
 $cbt_subject_name=$tool->dbstr($col="grade_subject_desc",$table="grade_subjects",$_sql="`grade_subject_id` = '$cbt_subject'");
 $type=$tool->dbstr($col="name",$table="cbt_exams_type",$_sql="`id` = '$type'");
 
 $cbt_question_table=$tool->dbstr($col="question_table",$table="cbt_subjects",$_sql="`id` = '$subject'");
 $cbt_answer_table=$tool->dbstr($col="answer_table",$table="cbt_subjects",$_sql="`id` = '$subject'");//

 
 if(isset($_GET['SubmitFinalPaper'])){
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
	$tool->PAGEREDIRECT('?Tera=ExamResult&token=');// not working

	echo "Error, we have a problem";
	exit;
}

exit;	 
 }

//////////////////////////////////////////////

// submit the user answer here 

/*
$sql = "UPDATE `$cbt_answer_table` SET `answer`='$answer' WHERE `student`='$StudentID' AND `exam`='$paper_id' AND question_id='$Qid'";
 $Tool = $pdo->prepare($sql);
 $Tool->execute();
if($Tool->rowCount()>0){// counting the affected rows
// do nothing
}else{
	echo "Error, we have a problem";
	exit;
}
 // check if the user have answerd the question
  $answered = $tool->MYCount("SELECT COUNT(answer) AS num FROM `$cbt_answer_table` WHERE `student`='$StudentID' AND `exam`='$paper_id' AND `question_id`='$Qid' AND `answer` !=''");
  */
if(isset($_POST['LoadSubmitForm'])){
	  $answered = $tool->MYCount("SELECT COUNT(answer) AS num FROM `$cbt_answer_table` WHERE `student`='$StudentID' AND `exam`='$paper_id' AND `answer` !=''");

?>

<div class="row" id="LoadSubmitFormPOST" style="display:">
<div class="col-md-6">
<font color="brown">Your paper will be collected when your time elapse anyway.</font>

</div>
<div class="col-md-6">
	<div class="box-shadow-outer">
	<div class="about-logo box-shadow-block box-shadow-5 text-center">
<h2><a href="#"><i class="fa fa-laptop color"></i> Submit Paper</a> <small>wait!</small></h2>
You have answered a total of <b><?php echo $answered;?> </b> questions out of <b><?php echo $total_question;?> </b><br>
<font color="brown">Are you sure you want to submit now?</font>

<button id="cancelSubmit" type="" class="btn btn-white">Please Cancel</button>
<button id="submitFinal" type="" class="btn btn-green">Yes Submit now!</button>


<script type="text/javascript">
$("#submitFinal").click(function(){
		 $.get("../CONTROLLER/SubmitAnswerPaper.php?SubmitFinalPaper=true", function(data, status){
       // alert("Data: " + data + "\nStatus: " + status);
    });
	// den redirect him out
	//window.location = "?Tera=ExamResult&token='<?php $tool->EncodeToken($paper_id)?>";
	<?php 
	echo 'window.location = "'.$url.'"';?>
});

</script>


<script type="text/javascript">
$("#cancelSubmit").click(function(){
$("#LoadSubmitFormPOST").slideUp(5000);
});

</script>

 </div>
</div>
</div>
					
</div>	<?php }?>