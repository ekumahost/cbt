
										<form action="#" id="AddQuestion" class="horizontal-form" method="post">

										<input type="hidden" name="AddQuestion" value=""/>
										<input type="hidden" name="QuestionTable" value="<?php echo $question_table;?>"/>
										<input type="hidden" name="Exam_id" value="<?php echo $id ;?>"/>
										<input type="hidden" name="TotalQ" value="<?php echo $list['total_question'];?>"/>

										
										
										
<section class="card" id="QuetionForm" style="">
            <header class="card-header">
                Add Questions
            </header>
															<div class="row">

<div class="col-md-6">
														<div class="summernote-theme-1">
															<label class="control-label">Question(you can add image here)</label>
															<textarea id="textarea" cols="30" rows="5" name="QuestionDesc" class="summernote"></textarea>
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
<input class="form-control" type="text" name="a" placeholder="option A --tick here if answer -->"> </input>
<div class="input-group-addon"><input type="radio" name="ar" value="a"> </input> </div>
</div>


<div class="input-group">
<div class="input-group-addon">B</div>
<input class="form-control" type="text" name="b" placeholder="option B"> </input>
<div class="input-group-addon"><input type="radio" name="ar" value="b"> </input> </div>
</div>


<div class="input-group">
<div class="input-group-addon">C</div>
<input class="form-control" type="text" name="c" placeholder="option C"> </input>
<div class="input-group-addon"><input type="radio" name="ar" value="c"> </input> </div>
</div>


<div class="input-group">
<div class="input-group-addon">D</div>
<input class="form-control" type="text" name="d" placeholder="option D"> </input>
<div class="input-group-addon"><input type="radio" name="ar" value="d"> </input> </div>
</div>



<div class="input-group">
<div class="input-group-addon">E</div>
<input class="form-control" type="text" name="e" placeholder="option E"> </input>
<div class="input-group-addon"><input type="radio" name="ar" value="e"> </input> </div>
</div>

</div>

													
													
													
													
</div>


<div class="col-md-6"><div class="form-actions right"> 
	<span class="response"> </span>	
<button id="creater" type="submit" class="btn blue"><i class="fa fa-check"></i> Add Question</button>
		<p> &nbsp;</p>								
</div></div>
<br><br><br>
        </section>
		
		</form>
		
			<script type="text/javascript">
 	              $('#AddQuestion').submit(function() {
	      //$('#creater').hide();
		$(".response").html('<img src="../CORDOVA/img/c_loader_gr.gif" />');
		$.post("../CONTROLLER/AddQuestionAPI.php?AddQuestionAPI=", $("#AddQuestion").serialize(), function(response) {
			$('.response').html(response);
		}); 
      return false;
    });
	  </script>
		
								
						