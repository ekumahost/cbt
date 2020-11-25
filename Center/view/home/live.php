<?php  define('CTitler', 'Home');// anywhere?>

		
					<?php //echo StudentID;?>
					<b>Welcome <?php echo $Student.' ('.StudentUserName.')';?>
					Your class is <?php echo $StudentClass;?></b>
					
					<div class="block-heading-two text-center">
						<h3><span> Available Papers</span></h3>
						<?php 
						
						//echo $CurrentTerm;
						 $countExam = $tool->MyCount("SELECT COUNT(subject) AS num FROM `cbt_exams` WHERE `grade`='$student_grade_year_grade' AND year='$CurrentYear' AND `term`='$CurrentTerm' AND `status`='$examstatus'");
						if($countExam>0){
							$tool->Success("We found $countExam CBT for you.");
						}else{
						$tool->Error("We found 0 CBT for you. That hurts!");

							
						}
						?>
						
					</div>	
					<div class=" table-responsive">
											<table width="100%" class="table table-bordered">
												<!-- Table Header -->
												<thead>
													<tr>
														<th width="3%">#</th>
														<th width="23%">title</th>
														<th width="11%">Course</th>
														<th width="13%">Type</th>
														<th width="12%">duration</th>
														<th width="15%">Examiner</th>
														<th width="11%">Status</th>
														<th width="12%">Action</th>
													</tr>
												</thead>
												<tbody>
												<?php	
												$stmt = $pdo->prepare("SELECT * FROM `cbt_exams` WHERE `grade`='$student_grade_year_grade' AND year='$CurrentYear' AND `term`='$CurrentTerm' AND `status`='$examstatus'");
                                                
												$stmt->execute();
												$sn = 0;
                                                while($exam = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                $sn = $sn+1;
                                                $subject= $exam['subject'];
                                                 $staff= $exam['staff'];
                                                 $type= $exam['type'];
                                                // $status= $exam['status'];
                                $cbt_subject=$tool->dbstr($col="subject",$table="cbt_subjects",$_sql="`id` = '$subject'");
                                $cbt_subject_name=$tool->dbstr($col="grade_subject_desc",$table="grade_subjects",$_sql="`grade_subject_id` = '$cbt_subject'");
                                $staff_name=$tool->dbstr($col="staff_fname",$table="staff",$_sql="`staff_id` = '$staff'");
                                $type=$tool->dbstr($col="name",$table="cbt_exams_type",$_sql="`id` = '$type'");

								
								
if($exam['status']==0){
$status = '<span class="label label-primary">Up Coming</span>';						
}elseif($exam['status']==1){
$status = '<span class="label label-success">On Going</span>';
}elseif($exam['status']==2){
$status = '<span class="label label-default">Completed</span>';
}else{
	$status = '<span class="label label-danger">Suspended</span>';

}

 ?>
													
													
													
													
													<tr>
														<td><?php echo $sn;?></td>
														<td><?php echo $exam['name'];?></td>
														<td><?php echo $cbt_subject_name;?></td>
														<td><?php echo $type;?> </td>
														<td><?php echo $exam['duration'];?> mins</td>
														<td><?php echo $staff_name;?></td>
														<td><?php echo $status;?></td>
														<td>
															<div class="btn-group btn-group-xs">
															<?php if($examstatus!=1){
																echo 'no action required';
															}else{?>
									<a href="?Tera=Paper&token=<?php $tool->EncodeToken($exam['id']);?>" class="btn btn-lg btn-blue"><i class="fa fa-book"></i> &nbsp; Take Exam</a>
															<?php }?>
															</div>														</td>
													</tr>
													
												<?php }?>
													
													
												</tbody>
											</table>
</div>
										