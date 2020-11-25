<?php 
/*
***********************************************************************************
Developed by Okokoh Benjamin: may 2016
Director at Hypertera
Comment: please if you add anything, comment clearly there what logic you are doing
************************************************************************************/

$tool->RenderHelp(ur,HelpTitle,"if you did not see your subject add cbt subject for it in configuration. Please do not add 1 million questions. Duration of two hours means 120 (mins)");
if(!isset($_SESSION['cbtGrade']) || !isset($_SESSION['cbtYear']) || !isset($_SESSION['cbtTerm'])){
$tool->PAGEREDIRECT('?Tera=Exams&Model=AddExams');
	exit;
}
$grade = $_SESSION['cbtGrade'];
$year = $_SESSION['cbtYear'];

$cbtGrade = $tool->dbstr('grades_desc','grades',"grades_id = '$grade'");
$cbtYear = $tool->dbstr('school_years_desc','school_years',"school_years_id = '$year'");

?>

	                                  




									  <!-- BEGIN FORM-->  
										<form action="#" id="AddCBT" class="horizontal-form" method="post" >
										<input type="hidden" name="AddCBTExam" value="yes">
										<input type="hidden" name="grade" value="<?php echo $_SESSION['cbtGrade'];?>">
										<input type="hidden" name="year" value="<?php echo $_SESSION['cbtYear'];?>">
										<input type="hidden" name="term" value="<?php echo $_SESSION['cbtTerm'];?>">
										<input type="hidden" name="staff" value="<?php echo $_SESSION['StaffID'];?>">

											<div class="form-body">
												<h3 class="form-section">Create CBT EXAM: <?php echo $cbtGrade;?> || <?php echo $cbtYear;?> || Semester: <?php echo $_SESSION['cbtTerm'];?>  <small> <a href="?Tera=Exams&Model=AddExams">change </a> </small></h3>
												
												<div class="row">
														
														
															<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Title</label>
															<input type="text" id="name" class="form-control" name="name" placeholder="eg: Niger Falls Exam">
															
														</div>
													</div>
													
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Total Question</label>
															<input type="number" id="total" class="form-control" name="total" placeholder="eg 50">
															
														</div>
													</div>
													
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Duration in minutes</label>
															<input type="number" id="duration" class="form-control" name="duration" placeholder="eg 50">
															
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Exam date</label>
															<input type="date" id="" class="form-control" name="date" placeholder="">
															
														</div>
													</div>
													
													
													
														<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Type</label>
													
												<select class="form-control select3me" name="type">
												<option value="">--Select type--</option>
												     <?php 
                                                      $Get_names = new publicans();
                                                      $Get_names->LoopOptions($tablename='cbt_exams_type',$rowid='id',$columname='name');
									       ?>
                                                    <option disabled value="">Essay</option>
                                                    <option disabled value="">Oral exams</option>
                                                    <option disabled value="">Open-book and take-home exams</option>
                                                    <option disabled value="">Problem or case-based exams</option>

											</select>

                                                        </div>
													</div>
												
												<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Course (only the one added to CBT)</label>
													
												<select class="form-control select3me" name="subject">
												<option value="">--Select course--</option>
												     <?php 
                           $loopmyoptions = "SELECT * FROM `cbt_subjects` WHERE `grade`='$grade' ORDER BY id";
	$terminaltool = $pdo->prepare($loopmyoptions);
                $terminaltool->execute();
                        while($optionlist = $terminaltool->fetch(PDO::FETCH_ASSOC)){
                $subject_code =  $optionlist['subject'];
				 $subject = $tool->dbstr('grade_subject_desc','grade_subjects',"grade_subject_id = '$subject_code'");
			echo '<option name="'.$subject.'" id="'.$optionlist['id'].'" value="'.$optionlist['id'].'">'.$subject.'</option>';
						}   ?>
											</select></div>
													</div>	
														
											</div>
												</div>
											<div class="form-actions right"> <span class="catstatus"> </span>
												<a href="Exams?Model=Manage"><button type="button" class="btn default">Cancel</button></a>
												<button type="submit" class="btn blue"><i class="fa fa-check"></i>Create Exam</button>
											</div>
										</form>
										<hr><!-- END FORM-->
	


				<script type="text/javascript">
 	              $('#AddCBT').submit(function() {
		$(".catstatus").html(' <img src="../CORDOVA/img/c_loader_gr.gif" />');
		$.post("../CONTROLLER/CBTExamAPI.php?CBTExamApi=", $("#AddCBT").serialize(), function(response) {
			$('.catstatus').html(response);
		}); 
      return false;
    });
	  </script>				
										