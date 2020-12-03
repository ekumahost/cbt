<?php  define('CTitler', 'Paper');

$paper_id = $tool->DecodeToken($_GET['token']);

?>

<div class="block-heading-two text-center">
<h3><span> Computer Based Test</span></h3>
</div>
Welcome <b><?php echo $Student.' ('.StudentUserName.')';?></b>
    You can only take exams for <b><?php echo $StudentClass;?>.</b>



<?php
												$pulls = $pdo->prepare("SELECT * FROM `cbt_exams` WHERE `id`='$paper_id'");
                                                 $pulls->execute();
                                                 $exam = $pulls->fetch(PDO::FETCH_ASSOC);
												$title= $exam['name'];
												$duration= $exam['duration'];
												$total_question= $exam['total_question'];

												$subject= $exam['subject'];
                                                 $staff= $exam['staff'];
                                                 $type= $exam['type'];
												$grade= $exam['grade'];
                                $cbt_subject=$tool->dbstr($col="subject",$table="cbt_subjects",$_sql="`id` = '$subject'");
                                $cbt_subject_name=$tool->dbstr($col="grade_subject_desc",$table="grade_subjects",$_sql="`grade_subject_id` = '$cbt_subject'");
                                $staff_name=$tool->dbstr($col="staff_lname",$table="staff",$_sql="`staff_id` = '$staff'").' ';
                                $staff_name .=$tool->dbstr($col="staff_fname",$table="staff",$_sql="`staff_id` = '$staff'");

								$type=$tool->dbstr($col="name",$table="cbt_exams_type",$_sql="`id` = '$type'");
								$grade=$tool->dbstr($col="grades_desc",$table="grades",$_sql="`grades_id` = '$grade'");


	if($exam['status']==0){
$status = '<span class="label label-primary">Up Coming</span>';
}elseif($exam['status']==1){
$status = '<span class="label label-success">On Going</span>';
}elseif($exam['status']==2){
$status = '<span class="label label-default">Completed</span>';
}else{
	$status = '<span class="label label-danger">Suspended</span>';

}
// before we can launch the exam we must see if the user have permision to the exam
 ?>

	<div class="row" style="background-color: orange; border-radius: 15px 25px 25px 15px">
							<div class="col-md-6">
								<!-- Logo section -->
								<div class="about-logo">
									<!-- logo -->
									<h2><a href="#"><i class="fa fa-laptop color"></i> <?php echo $cbt_subject_name;?></a> <small><?php echo $title;?></small></h2>
                                        <p>Examiner: <?php echo $staff_name;?> </p>
									  <p>Exam Type: <?php echo $type;?> </p>
									  <p>Status: <?php echo $status;?> </p>
								        <p>Level: <?php echo $grade;?> </p>

                                      <p>my result:

                        <a href="?Tera=ExamResult&token=<?php $tool->EncodeToken($paper_id);?>" target="new"> View </a>

									  </p>
									</div>
							</div>
							<div class="col-md-6" style="background-color: thistle; padding: 10px; border-radius: 0 15px 15px 0">
								<div class="about-logo">
									<h3>Launch Exam <span class="color"><?php echo $duration;?> mins</span></h3>
								<i> you will meet <?php echo $total_question;?> questions </i>
								<div class="col-md-2 col-sm-4 col-xs-6">
									<!-- Counter content item -->
									<div class="counter-item">
										<i class="fa fa-clock green"></i>
										<span class="number-count" style="font-size: 35px; color: white;" data-from="0" data-to="<?php echo $duration;?>" data-speed="2000" data-refresh-interval="100"></span>
										<hr class="br-green" />
									</div>
								</div>

								</div>
								<br>
								 <br><br>


						<form id="PaperForm" method="post" class="form-horizontal" role="form">
                        <input type="hidden" name="paper_id" value="<?php echo $paper_id;?>"> </input>
                        <input type="hidden" name="PaperForm" value="<?php echo $paper_id;?>"> </input>

					<font color="red">Warning</font>: once you click "START Exam" your time starts to count.<br><br>
                    <?php if($exam['status']==1){?>
					<a href="#" class="btn btn-white">Cancel</a>  &nbsp; <button type="submit" class="btn btn-color">START EXAM</button><span class="result"> </span>
					<?php }else{echo '<font color="red">This exam cannot be started again</font>';}?>

							</form>
							</div>
						</div>
<script type="text/javascript">
    $('#PaperForm').submit(function() {
	        // validate form if empty
		$(".result").html('..just chill, lets prepare your clock! <img src="../CORDOVA/img/c_loader_gr.gif" />');
		$.post("../CONTROLLER/PaperAPI.php", $("#PaperForm").serialize(), function(response) {
			$('.result').html(response);
		});
      return false;
    });
  </script>
			<br>	<br><br>
