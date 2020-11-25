<section class="card" id="QuetionForm" style="">
            <header class="card-header">
                Students/Exam performance report  |||

<form action="#" id="ExportResult" class="horizontal-form" method="post">
										<input type="hidden" name="Exam_id" value="<?php echo $id ;?>"/>
										<input type="hidden" name="ExportResult" value="1"/>
										<input type="hidden" name="question_table" value="<?php echo $question_table;?>"/>
										<input type="hidden" name="answers_table" value="<?php echo $answers_table;?>"/>
										<input type="hidden" name="coutQ" value="<?php echo $coutQ;?>"/>

									
									
									<button type="submit" class="btn btn-primary">Export Result</button>
											</form>		

			
			<br>
			<form action="#" id="SynchroniseResult" class="horizontal-form" method="post">
										<input type="hidden" name="Exam_id" value="<?php echo $id ;?>"/>
										<input type="hidden" name="SynchroniseResult" value="1"/>
										<input type="hidden" name="question_table" value="<?php echo $question_table;?>"/>
										<input type="hidden" name="answers_table" value="<?php echo $answers_table;?>"/>
										<input type="hidden" name="coutQ" value="<?php echo $coutQ;?>"/>

									
									
									<button type="submit" class="btn btn-primary" title="Subit them online">Synchronise Result</button>
											</form>

            </header>
            <div class="card-block">
		<span class="exporting"> </span>
<br>
<!--performance Reports -->


</div><br>
        </section>
		
		<script type="text/javascript">
 	              $('#ExportResult').submit(function() {
	      //$('#creater').hide();
		$(".exporting").html('chil, lets do our work! <img src="../CORDOVA/img/c_loader_gr.gif" />');
		$.post("../CONTROLLER/ExportResultAPI.php?GradeResult=", $("#ExportResult").serialize(), function(response) {
			$('.exporting').html(response);
		}); 
      return false;
    });
	  </script>
	  
	  <script type="text/javascript">
 	              $('#SynchroniseResult').submit(function() {
		$(".exporting").html('chil, lets do our work! <img src="../CORDOVA/img/c_loader_gr.gif" />');
		$.post("../CONTROLLER/SyncResultAPI.php?GradeResult=", $("#SynchroniseResult").serialize(), function(response) {
			$('.exporting').html(response);
		}); 
      return false;
    });
	  </script>
							