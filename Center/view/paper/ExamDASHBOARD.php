<?php  define('CTitler', 'Exam DashBoard');
$paper_id = $_SESSION['Ongoing'];//$tool->DecodeToken($_GET['token']);
if(!isset($_SESSION['Ongoing'])){
$tool->PAGEREDIRECT('?Tera=Home');// not working
exit;
}
 include('inc.dashboard.head.php');
// before we can launch the exam we must see if the user have permision to the exam
 ?>
<h3><?php echo siteabv;?></h3>
<a id="Dentals"></a>



<script src="../MYCORDOVA/js/countdown/jquery.countdown.js"></script>
<div class="block-heading-two text-center">
<h1><i class="fa fa-clock-o green"></i> <span id="BenExamTime" class="color">00: 00 : 00</span></h1>
</div>	
<form id="SubmitAnswer" method="post" class="form-horizontal" role="form">
<?php  include('inc.dashboard.timer.php');?>
<!----- ////////////////////////// -->
<div id="LoadQ">
<div class="row" id="questions">
	<div class="col-md-6">
	<div class="box-shadow-outer">
	<div class="about-logo box-shadow-block box-shadow-5 text-center">
<h2><a href="#"><i class="fa fa-laptop color"></i> QUESTION</a> <small><?php echo $type;?></small></h2>
<?php echo html_entity_decode(htmlspecialchars_decode($myquestion));?>
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
<h4>Question <span class=""><?php echo $Qnumber;?>  of <?php echo $total_question;?></span><i> ||| <span style="color:rebeccapurple"> Start: <b><?php echo date("h:ia", $exam_start_time);?> </b> End: <b><?php echo date("h:ia", $exam_end_time);?>. </b></span></i></h4>
			
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
</div>
<!--- ///////////////////////////////// -->

<br>
<div class="row box-shadow-block box-shadow-6">					
<div class="col-md-6">


<?php for($i=1;$i<=$total_question;$i++){?>
<a href="#Dentals" id="questionN<?php echo $i;?>" class="btn btn-white"><?php echo $i;?> </a>
<script type="text/javascript">
$("#questionN<?php echo $i;?>").click(function(){
$("#questions").slideUp(5000);
 $("#LoadQ").load("../CONTROLLER/SubmitAnswerAPI.php?LoadQuestion=true&qn=<?php echo $i;?>&nextQ=<?php echo $i;?>");
 $('#questions').slideDown(5000);
});
</script>
<?php }?>
   <br><br> <img title="Digital Security watch is activated." src="https://openclipart.org/image/2400px/svg_to_png/170249/eco-systemedic-light--bulb-02.png" width="30" height="30" /> This exam is digitally secured!
</div>					
							
<div class="col-md-6">
	<input value="n" type="radio" name="answer"> cancel my choice
<center><button type="submit" class="btn btn-color">Submit Answer</button></center>
<span class="result"> </span>
</div>
</div>	
</form>
<?php  include('inc.dashboard.footer.php');?>


  <div id=""></div>
<br><br><br><br><br><br><br><br>		