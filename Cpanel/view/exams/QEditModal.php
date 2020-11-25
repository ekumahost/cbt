		   <div class="modal fade"
					 id="QEditModal<?php echo $listqid;?>"
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
								 <h4 class="modal-title" id="stModalLabel"> Edit question number <?php echo $sn;?> <i> </i></h4> 
							</div>
							
							
						<form action="#" class="" id="QEdit<?php echo $listqid;?>" method="post">
						<input type="hidden" name="QuestionTable" value="<?php echo $question_table;?>"/>
										<input type="hidden" name="Exam_id" value="<?php echo $id ;?>"/>
										<input type="hidden" name="Question_ID" value="<?php echo $listqid;?>"/>
                           				<input type="hidden" name="Exam_status" value="<?php echo $list['status'];?>"/>

						   
						   <div class="modal-body">
								
								
							
							
							<section class="card" id="QuetionForm" style="">
            <header class="card-header">
                Edit Questions
            </header>
															<div class="row">

<div class="col-md-6">
														<div class="summernote-theme-1">
															<label class="control-label">Question(you can add image here)</label>
															<textarea id="textarea" cols="30" rows="5" name="QuestionDesc" class="summernote"><?php echo $question;?></textarea>
															</div>
													</div>    

	
		<script>
				$(document).ready(function() {
					$('.summernote').summernote();
					//$( "#datepicker" ).datepicker();
				});
			</script>													

<div class="col-md-6">
<br>


<div class="input-group">
<div class="input-group-addon">A</div>
<input class="form-control" type="text" name="a" value="<?php echo html_entity_decode($a);?>" placeholder="option A --tick here if answer -->"> </input>
<div class="input-group-addon"><input type="radio" <?php if($ar=='a'){echo 'checked';}?> name="ar" value="a"> </input> </div>
</div>


<div class="input-group">
<div class="input-group-addon">B</div>
<input class="form-control" type="text" name="b" value="<?php echo $b;?>" placeholder="option B"> </input>
<div class="input-group-addon"><input type="radio" <?php if($ar=='b'){echo 'checked';}?> name="ar" value="b"> </input> </div>
</div>


<div class="input-group">
<div class="input-group-addon">C</div>
<input class="form-control" type="text" name="c" value="<?php echo $c;?>" placeholder="option C"> </input>
<div class="input-group-addon"><input type="radio" <?php if($ar=='c'){echo 'checked';}?> name="ar" value="c"> </input> </div>
</div>


<div class="input-group">
<div class="input-group-addon">D</div>
<input class="form-control" type="text" name="d" value="<?php echo $d;?>" placeholder="option D"> </input>
<div class="input-group-addon"><input type="radio" name="ar" <?php if($ar=='d'){echo 'checked';}?> value="d"> </input> </div>
</div>

<div class="input-group">
<div class="input-group-addon">E</div>
<input class="form-control" type="text" name="e" value="<?php echo $e;?>" placeholder="option E"> </input>
<div class="input-group-addon"><input type="radio" name="ar" <?php if($ar=='e'){echo 'checked';}?> value="e"> </input> </div>
</div>

</div>

																																																
</div>
</section>		
								
		</div>
							<div class="modal-footer">
							      <span class="pross<?php echo $listqid;?>">...</span>
								<button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-rounded btn-primary">Save changes</button>
							</div>
							</form>
							<hr>
							
							
							
							
							 <script type="text/javascript">
 	              $('#QEdit<?php echo $listqid;?>').submit(function() {
	      
		$(".pross<?php echo $listqid;?>").html('<img src="../CORDOVA/img/c_loader_gr.gif" />');
		$.post("../CONTROLLER/QEditAPI.php?QEdit=<?php echo $listqid;?>", $("#QEdit<?php echo $listqid;?>").serialize(), function(response) {
			$('.pross<?php echo $listqid;?>').html(response);
		}); 
      return false;
    });
	  </script>
							
							
							
						</div>
					</div>
				</div><!--.modal-->
							   
							  