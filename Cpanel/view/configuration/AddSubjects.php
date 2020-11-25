<?php 
/*
***********************************************************************************
Developed by Okokoh Benjamin: may 2016
Director at Hypertera
Comment: please if you add anything, comment clearly there what logic you are doing
************************************************************************************/

$tool->RenderHelp(ur,HelpTitle,"if you did not see subject to select, add it in the main admin portal");
?>

	                                    <!-- BEGIN FORM-->  
										<form action="#" id="SubjectAPI" class="horizontal-form" method="post" >
										<input type="hidden" name="SubjectAPI" value="yes">

											<div class="form-body">
												<h3 class="form-section">Create CBT Courses</h3>
												
												<div class="row">
													
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Course</label>
													
												<select class="form-control select3me" name="subject">
												<option value="">---Select course--</option>
												     <?php 
                                                      
													  // initialize the public function
													  $Get_names = new publicans();
                                                      $Get_names->LoopOptions($tablename='grade_subjects',$rowid='grade_subject_id',$columname='grade_subject_desc');
									       ?>
											</select>
											
											
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Year of study</label>
													
												<select class="form-control select3me" name="grade">
												<option value="">Select level</option>
												     <?php 
                                                      
													  // initialize the public function
													  $Get_names = new publicans();
                                                      $Get_names->LoopOptions($tablename='grades',$rowid='grades_id',$columname='grades_desc');
									       ?>
											</select>
											
											
														</div>
													</div>
													</div>
												</div>
											<div class="form-actions right"> <span class="catstatus"> </span>
												<a href="?Tera=Configuration"><button type="button" class="btn default">Cancel</button></a>
												<button type="submit" class="btn blue"><i class="fa fa-check"></i> Add CBT Course</button>
											</div>
										</form>
										<hr><!-- END FORM-->
	

		
			<script type="text/javascript">
 	              $('#SubjectAPI').submit(function() {
		$(".catstatus").html(' <img src="../CORDOVA/img/c_loader_gr.gif" />');
		$.post("../CONTROLLER/SubjectAPI.php?SubjectAPI=", $("#SubjectAPI").serialize(), function(response) {
			$('.catstatus').html(response);
		}); 
      return false;
    });
	  </script>
							
										