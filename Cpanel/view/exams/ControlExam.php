<hr>
<?php 
 define('CTitler', "Manage exam");

define('Title', 'Exams'); 
$tool= new Helen();
$exam_id = $tool->DecodeToken($_GET['token']);
?>
<a href="?Tera=Exams&Model=Manage">back </a>
<br>

<center><span id="pulltitle"> </span></center>										
											
											
											
											<br><br>

		<?php if(isset($_GET['Action']) && $_GET['Action'] =='AddQuestion'){
							include('AddQuestion.php');
							}else{?>			
											
              
								
											<div class="table-responsive">
	<table width="100%" class="table table-striped table-bordered table-hover" id="">
							<thead>
							<tr>
								<th width="6%" class="table-checkbox order">sn</th>
								<th width="13%">
									 Title								</th>
								<th width="11%">Level</th>
								<th width="17%">Course</th>
								<th width="17%">Examiner</th>
								<th width="17%">duration</th>
								<th width="17%">Questions</th>
								<th width="17%">Session</th>
								<th width="17%">Status</th>
								<th width="14%">
									 Action								</th>
							</tr>
							</thead>
							<tbody>
							
						<?php
						$pushcat = "SELECT * FROM `cbt_exams` WHERE `id`='$exam_id'";
						$stmt = $pdo->prepare($pushcat);
                        $stmt->execute();
                        $list = $stmt->fetch(PDO::FETCH_ASSOC);
						$id = $list['id'];
						$cbt_subject_id = $list['subject'];
						$grade = $list['grade'];
						$staff = $list['staff'];
						$type = $list['type'];
						$year = $list['year'];
						
						$year=$tool->dbstr('school_years_desc','school_years',"school_years_id = '$year'");
						$type=$tool->dbstr('name','cbt_exams_type',"id = '$type'");
						$staff=$tool->dbstr('staff_fname','staff',"staff_id = '$staff'").' ';
						$staff .=$tool->dbstr('staff_lname','staff',"staff_id = '$staff'");
						
						$subject_id =$tool->dbstr('subject','cbt_subjects',"id = '$cbt_subject_id'"); // get the subject id from the cbt subject tabke

						
						// count how many question available 
						$question_table=$tool->dbstr('question_table','cbt_subjects',"id = '$cbt_subject_id'");
                        $coutQ = $tool->MyCount("SELECT COUNT(question) AS num FROM `$question_table` WHERE `cbt_exam` = '$id'");
						
						$answers_table=$tool->dbstr('answer_table','cbt_subjects',"id = '$cbt_subject_id'");

						
						
						if($coutQ<$list['total_question']){
						$Qdesc = '<span class="label label-warning">Incomplete</span> ';
						$Qcountr = 0;
						}elseif($coutQ==$list['total_question']){
						$Qdesc = '<span class="label label-success">Complete</span>';
                           $Qcountr	=1;					
                         }else{
						$Qdesc = '<span class="label label-danger">Invalid, disable dis exam </span>';	
                             $Qcountr = 0;
						 }
						
						
if($list['status']==0){
$status = '<span class="label label-primary">Up Coming</span>';						
}elseif($list['status']==1){
$status = '<span class="label label-success">On Going</span>';
}elseif($list['status']==2){
$status = '<span class="label label-default">Completed</span>';
}else{
	$status = '<span class="label label-danger">Suspended</span>';

}
		

						
if($list['graded']==0){
$graded = '<span class="label label-default" title="if result is ungraded, no student or staff can view the score positions say 1st 2nd etc">ungraded</span>';						
}elseif($list['graded']==1){
$graded = '<span class="label label-success">graded</span>';
}else{$graded = '<span class="label label-danger">unknown</span>';
}
					
					
					
					
             $subject_name=$tool->dbstr('grade_subject_desc','grade_subjects',"grade_subject_id = '$subject_id'");
			  $gradename=$tool->dbstr('grades_desc','grades',"grades_id = '$grade'");
						  $gradedomain=$tool->dbstr('grades_domain','grades',"grades_id = '$grade'");
						  $gradedomain=$tool->dbstr('school_names','tbl_grade_domains',"id = '$gradedomain'");

						
						// $attrcount= $tool->MYCount("SELECT COUNT(name) AS num from attribute_sets WHERE category = $id");


						
						?>	
						
						
						<script type="text/javascript">
 $('#pulltitle').html('<?php echo $list['name'];?>');

</script>
						<tr class="odd gradeX">
								<td><?php echo $id;?></td>
								<td> <p>title: <?php echo $list['name'];?></p>
							    <p>date: <?php echo $list['date'];?> </p></td>
								<td><p><?php echo $gradename;?> [<?php echo $gradedomain;?>]</p>							    </td>
							    <td class="center"><p>name: <?php echo $subject_name;?></p>
						        <p>type: <?php echo $type;?> </p></td>
						        <td class="center"><?php echo $staff;?></td>
						        <td class="center"><?php echo $list['duration'];?> mins</td>
						        <td class="center"><b><?php echo $coutQ;?></b> of <b><?php echo $list['total_question'];?></b> added<br>
								<?php echo $Qdesc;?>
								
								</td>
						        <td class="center"><p>session: <?php echo $year;?> </p>
					            <p>semester: <?php echo $list['term'];?> </p></td>
					          <td class="center"> <?php echo  $status;?><br><br>
							  <?php echo  $graded;?><br><br>
 					<a title="Edit status" href="#"><b><span data-toggle="modal" data-target="#ExamModal<?php echo $id;?>" class="label label-primary"> <i class="fa fa-edit"></i></span></b></a>

							  </td>
								<td>	
															
								<form action="#" id="GradeResult" class="horizontal-form" method="post">
										<input type="hidden" name="Exam_id" value="<?php echo $id ;?>"/>
										<input type="hidden" name="GradeResult" value="1"/>
										<input type="hidden" name="question_table" value="<?php echo $question_table;?>"/>
										<input type="hidden" name="answers_table" value="<?php echo $answers_table;?>"/>

									
									
									<button type="submit" class="btn btn-primary">Grade Result</button>
									<span class="grading"> </span>
															 
															 
															 
											</form>				 
															 
															 
															 
															 <?php require('MyExamStatus.php');?>

															</td>
							
							
							
							</tr>
							
							</tbody>
							</table> </div>  
							
									<script type="text/javascript">
 	              $('#GradeResult').submit(function() {
	      //$('#creater').hide();
		$(".grading").html('<img src="../CORDOVA/img/c_loader_gr.gif" />');
		$.post("../CONTROLLER/GradeResultAPI.php?GradeResult=", $("#GradeResult").serialize(), function(response) {
			$('.grading').html(response);
		}); 
      return false;
    });
	  </script>
							
							
							
							
							
							
							
							
							
							
							
							
							
<section class="tabs-section">
				<div class="tabs-section-nav tabs-section-nav-icons">
					<div class="tbl">
						<ul class="nav" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" href="#question" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<i class="glyphicon glyphicon-list-alt"></i>
										QUESTIONS
									</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#addquestion" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<span class="font-icon font-icon-edit"></span>
										Add Questions
									</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#upload" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<i class="font-icon glyphicon glyphicon-paperclip"></i>
										Upload Questions
									</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#perfomance" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<i class="font-icon font-icon-zigzag"></i>
										Perfomance/Report
									</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#candidate" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<i class="font-icon font-icon-users"></i>
										Candidates
									</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#result" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<i class="font-icon font-icon-mail"></i>
										Result
									</span>
								</a>
							</li>
						</ul>
					</div>
				</div><!--.tabs-section-nav-->

				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="question">
					<?php include('inc.questions.php');?></div><!--.tab-pane-->
					<div role="tabpanel" class="tab-pane fade" id="addquestion"><?php include('inc.add.questions.php');?></div><!--.tab-pane-->
					<div role="tabpanel" class="tab-pane fade" id="upload"><?php include('inc.upload.php');?></div><!--.tab-pane-->
					<div role="tabpanel" class="tab-pane fade" id="perfomance"><?php include('inc.perfomance.php');?></div><!--.tab-pane-->
					<div role="tabpanel" class="tab-pane fade" id="candidate"><?php include('inc.candidates.php');?></div><!--.tab-pane-->
					<div role="tabpanel" class="tab-pane fade" id="result"><?php include('inc.result.php');?></div><!--.tab-pane-->
				</div><!--.tab-content-->
			</section><!--.tabs-section-->

				<?php } ?>
					<br><br>