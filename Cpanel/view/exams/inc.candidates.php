<section class="card" id="QuetionForm" style="">
            <header class="card-header">
                View Candidates
            </header>
            <div class="card-block">
			




						<div class="table-responsive">

	<table width="100%" class="table table-striped table-bordered table-hover" id="table">
							<thead>
							<tr>
								<th width="2%" class="table-checkbox order">ID</th>
								<th width="37%">
									 Student								</th>
								<th width="10%">started</th>
								<th width="9%">stopped</th>
								<th width="9%">Submited</th>
								<th width="14%">
									 Status								</th>
							</tr>
							</thead>
							<tbody>
							
						<?php
						//echo date("Y-m-d h:i:sa");
						$pushcat = "SELECT * FROM `cbt_subscription` WHERE `exam` = '$id'";
						$stmt = $pdo->prepare($pushcat);
                        $stmt->execute();
						
                        while($list = $stmt->fetch(PDO::FETCH_ASSOC)){
						$sub_id = $list['id'];
						$student = $list['student'];
						$exam_start_time = $list['exam_start_time'];
						$exam_end_time = $list['exam_end_time'];
						$submit_paper_time = $list['submit_paper_time'];
			                  $exam_start_time = date("Y-m-d h:i:sa", $exam_start_time);
			       			$exam_end_time = date("Y-m-d h:i:sa", $exam_end_time);
			                  $submit_paper_time = date("Y-m-d h:i:sa", $submit_paper_time);

						
						$studentname =$tool->dbstr('studentbio_lname','studentbio',"studentbio_id = '$student'").' ';
			       		$studentname .=$tool->dbstr('studentbio_fname','studentbio',"studentbio_id = '$student'");

			
if($list['status']==1){
$status = '<span class="label label-primary">Subscribed</span>';
}elseif($list['status']==0){
	$status = '<span class="label label-default">Pending</span>';
}elseif($list['status']==2){
	$status = '<span class="label label-success">Submited Paper</span>';	
}else{
	$status = '<span class="label label-danger">unknown</span>';	
	
	
}
	
						
						?>	
						<tr class="odd gradeX">
								<td><?php echo $sub_id;?></td>
								<td> <p><?php echo $studentname;?></p>							    </td>
								<td class="center"><?php echo $exam_start_time;?></td>
								<td class="center"><?php echo $exam_end_time;?></td>
						        <td class="center"><?php echo $submit_paper_time;?></td>
					          <td>	
															
												
								<?php echo  $status;?>
					<br /></td>
							</tr>
							
						<?php }?>
							</tbody>
							</table>
			  </div>   
										










            </div><br><br><br>
        </section>