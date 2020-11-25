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


$exam_end_time=$tool->dbstr($col="exam_end_time",$table="cbt_subscription",$_sql="`student` = '$StudentID' AND `exam`='$paper_id'");
$exam_start_time=$tool->dbstr($col="exam_start_time",$table="cbt_subscription",$_sql="`student` = '$StudentID' AND `exam`='$paper_id'");

$type= $exam['type'];
 $cbt_subject=$tool->dbstr($col="subject",$table="cbt_subjects",$_sql="`id` = '$subject'");
 $cbt_subject_name=$tool->dbstr($col="grade_subject_desc",$table="grade_subjects",$_sql="`grade_subject_id` = '$cbt_subject'");
 $type=$tool->dbstr($col="name",$table="cbt_exams_type",$_sql="`id` = '$type'");
 
 $cbt_question_table=$tool->dbstr($col="question_table",$table="cbt_subjects",$_sql="`id` = '$subject'");
 $cbt_answer_table=$tool->dbstr($col="answer_table",$table="cbt_subjects",$_sql="`id` = '$subject'");//


//////////////////////////////////////////////

$answer = '0';
if(isset($_POST['SubmitMyAnswer'])){
extract($_POST);
// submit the user answer here 
$sql = "UPDATE `$cbt_answer_table` SET `answer`='$answer' WHERE `student`='$StudentID' AND `exam`='$paper_id' AND question_id='$Qid'";
 $Tool = $pdo->prepare($sql);
 $Tool->execute();
if($Tool->rowCount()>0){// counting the affected rows
// do nothing
}else{
	echo "Error, we have a problem";
	exit;
}
}

// we php to see if his time is timed outer



$now = time();
$time_left = $exam_end_time - $now; // we have a time in microseconds that cn be used to see in minutes
if($time_left<0){
$time_left = 0;// we dont need a negative value
}
if($now>$exam_end_time){
	// exam timed out = true
	// use the get function to submit the answer and redirect
	//$tool->JSGet('../CONTROLLER/SubmitAnswerPaper.php?SubmitFinalPaper=true');
// we can also run the php function here directly 
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
	$tool->PAGEREDIRECT('?Tera=ExamResult&token=');// not working
echo "Error, we have a problem";
	exit;
}

exit;	 
////////////------>
	
$tool->PAGEREDIRECT($url);
	
}






// we try to load the next question now
set_session("Qnumber",$_REQUEST['nextQ']);
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


?>

<div class="row" id="questions" style="display: <?php if(!isset($_GET['LoadQuestion'])){echo 'none';}?>">
<div class="col-md-6">
	<div class="box-shadow-outer">
	<div class="about-logo box-shadow-block box-shadow-5 text-center">
<h2><a href="#"><i class="fa fa-laptop color"></i> QUESTION</a> <small><?php echo $type;?></small></h2>
 
<?php echo html_entity_decode($myquestion);?>


<br><br>
 &nbsp;<button id="prevButton" type="button" class="btn btn-color">Prev</button>
 &nbsp; <button id="nextButton" type="button" class="btn btn-color">Next</button>
	

<script type="text/javascript">
$("#nextButton").click(function(){
$("#questions").slideUp(5000);
 $("#LoadQ").load("../CONTROLLER/SubmitAnswerAPI.php?LoadQuestion=true&qn=<?php echo $Qnumber;?>&nextQ=<?php if($Qnumber<$total_question){echo $Qnumber+1;}else{echo 1;}?>");
 $('#questions').slideDown(5000);
});

$("#prevButton").click(function(){
$("#questions").slideUp(5000);
 $("#LoadQ").load("../CONTROLLER/SubmitAnswerAPI.php?LoadQuestion=true&qn=<?php echo $Qnumber;?>&nextQ=<?php if($Qnumber==1){echo $total_question;}else{echo $Qnumber-1;}?>");
 $('#questions').slideDown(5000);
});
</script>
 </div>
</div>
</div>
					
<div class="col-md-6">

<div class="box-shadow-outer">
	

<div class="about-logo box-shadow-block box-shadow-5">
<h3><a href="#"><i class="fa fa-laptop color"></i> <?php echo $cbt_subject_name;?></a> <small><?php echo $exam['name'];?> [<?php echo $mysatus;?>]</small> </h3>
    <h4>Question <span class=""><?php echo $_SESSION['Qnumber'];?>  of <?php echo $total_question;?></span><i> ||| <span style="color:rebeccapurple">Start: <b><?php echo date("h:i:a", $exam_start_time);?> </b> End: <b><?php echo date("h:i:a", $exam_end_time);?> </b> </span>   </i></h4>
			
<input type="hidden" name="nextQ" value="<?php if($Qnumber<$total_question){echo $Qnumber+1;}else{echo 1;}?>">
<input type="hidden" name="Qid" value="<?php echo $Qid;?>">
<input type="hidden" name="SubmitMyAnswer" value="<?php echo $Qid;?>">

	
	<div class="table-responsive">
<table class="table table-striped">

<?php if(!empty($Qa)){?>
<tr><td>A <input type="radio" <?php if($alpha=='a'){echo 'checked';}?> value="a" name="answer"> </td><td><?php echo $Qa;?></td></tr>
<?php }?>								

<?php if(!empty($Qb)){?>
<tr><td>B <input type="radio" value="b" <?php if($alpha=='b'){echo 'checked';}?> name="answer"> </td><td><?php echo $Qb;?></td></tr>
<?php }?>


<?php if(!empty($Qc)){?>
<tr><td>C <input type="radio" value="c" <?php if($alpha=='c'){echo 'checked';}?> name="answer"> </td><td><?php echo $Qc;?></td></tr>
<?php }?>


<?php if(!empty($Qd)){?>
<tr><td>D <input type="radio" value="d" <?php if($alpha=='d'){echo 'checked';}?> name="answer"> </td><td><?php echo $Qd;?></td></tr>
<?php }?>


<?php if(!empty($Qe)){?>
<tr><td>E <input type="radio" value="e" <?php if($alpha=='e'){echo 'checked';}?> name="answer"> </td><td><?php echo $Qe;?></td></tr>
<?php }?>
						
</table>
							</div>
							
							
</div>
</div>
</div>		
</div>	