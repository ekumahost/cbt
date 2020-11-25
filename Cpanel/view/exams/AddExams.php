<?php 
/*
***********************************************************************************
Developed by Okokoh Benjamin: may 2016
Director at Hypertera
Comment: please if you add anything, comment clearly there what logic you are doing
************************************************************************************/

$tool->RenderHelp(ur,HelpTitle,"if you did not see your level add cbt course add it in configuration");
if(isset($_POST['AddExam'])){

if(empty($_POST['grade']) || empty($_POST['year']) || empty($_POST['term'])){
	// do nothing
			$tool->Error("make a selection first");

}else{
	if($CurrentTerm > $_POST['term'] && CurrentYear ==$_POST['year'] ){
	$tool->Error("you want to set for past semester?");
	
	}elseif(CurrentYear >$_POST['year']){
	$tool->Error("you want to set for past year? let the student go back in time?");

	}else{
	
	
	
$_SESSION['cbtGrade'] = $_POST['grade'];
$_SESSION['cbtYear'] = $_POST['year'];
$_SESSION['cbtTerm'] = $_POST['term'];
// redirect him to the real page
$tool->PAGEREDIRECT('?Tera=Exams&Model=AddCBT');
	}

}
	
	
	
}


?>

	                                    <!-- BEGIN FORM-->  
										<form action="#" id="AddExam" class="horizontal-form" method="post" >
										<input type="hidden" name="AddExam" value="yes">

											<div class="form-body">
												<h3 class="form-section">Create CBT EXAM</h3>
												
												<div class="row">
														
														<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Level</label>
													
												<select class="form-control select3me" name="grade">
												<option value="">--Select level--</option>
												     <?php 
                                                      $Get_names = new publicans();
                                                      $Get_names->LoopOptions($tablename='grades',$rowid='grades_id',$columname='grades_desc');
									       ?>
											</select></div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Session</label>
													
												<select class="form-control select3me" name="year">
												<option value="">Select session</option>
												     <?php 
                                                      $Get_names = new publicans();
                                                      $Get_names->LoopOptions($tablename='school_years',$rowid='school_years_id',$columname='school_years_desc');
									       ?>
											</select></div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Semester</label>
													
												<select class="form-control select3me" name="term">
												<option value="">--Select semester--</option>
												     <?php 
                                                      $Get_names = new publicans();
                                                      $Get_names->LoopOptions($tablename='grade_terms',$rowid='grade_terms_id',$columname='grade_terms_desc');
									       ?>
											</select></div>
													</div>
													
													
												
													
												
													</div>
												</div>
											<div class="form-actions right"> <span class="catstatus"> </span>
												<a href="Exams?Model=Manage"><button type="button" class="btn default">Cancel</button></a>
												<button type="submit" class="btn blue"><i class="fa fa-check"></i>Continue</button>
											</div>
										</form>
										<hr><!-- END FORM-->
	


							
										