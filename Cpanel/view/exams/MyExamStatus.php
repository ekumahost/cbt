		   <div class="modal fade"
					 id="ExamModal<?php echo $id;?>"
					 tabindex="-1"
					 role="dialog"
					 aria-labelledby="stModalLabel"
					 aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
									<i class="font-icon-close-2"></i>
								</button>
								 <h4 class="modal-title" id="stModalLabel"> <?php echo $list['name'];?>, <?php echo $subject_name;?> || <?php echo $gradename;?> [<?php echo $gradedomain;?>] <i> </i></h4> 
							</div>
							
							
						<form action="#" class="" id="ExamStatus<?php echo $id;?>" method="post">
						<input type="hidden" value="1" name="changeExamtatus"> </input>
						<input type="hidden" value="<?php echo $id;?>" name="exam_id"> </input>
						<input type="hidden" value="<?php echo $Qcountr;?>" name="Qcountr"> </input>

						
							<div class="modal-body">
								<center>
								<div class="row">
								Change Exam Status
								
								<div class="form-group row">
						<label for="exampleSelect" class="col-sm-2 form-control-label">Change Status</label>
						<div class="col-sm-10">
							<select id="exampleSelect" name="astatus" class="form-control">
								<option value="">select status</option>
								<option value="1">Start Exam</option>
								<option value="2">Stop Exam</option>
								<option value="3">Suspend Exam</option>
								<option value="0">Pause Exam</option>


							</select>
						</div>
					</div>
								
								
								
								
						</div><!--.row-->
						
                             Stop Exam: students can no longer take exam. Pause: it will be marked as up coming exam. Start : student can now start taking the exam

						
								
								
							</center>
								
							</div>
							<div class="modal-footer">
							      <span class="pross<?php echo $id;?>">...</span>
								<button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-rounded btn-primary">Save changes</button>
							</div>
							</form>
							<hr>
							
							
							
							
							 <script type="text/javascript">
 	              $('#ExamStatus<?php echo $id;?>').submit(function() {
	      
		$(".pross<?php echo $id;?>").html('<img src="../CORDOVA/img/c_loader_gr.gif" />');
		$.post("../CONTROLLER/CBTExamAPI.php?ChangeExamStatus=<?php echo $id;?>", $("#ExamStatus<?php echo $id;?>").serialize(), function(response) {
			$('.pross<?php echo $id;?>').html(response);
		}); 
      return false;
    });
	  </script>
							
							
							
						</div>
					</div>
				</div><!--.modal-->
							   
							  