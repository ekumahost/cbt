<hr>
<?php 
 define('CTitler', "View/Add Exams");

define('Title', 'Exams'); 
$tool= new Helen();
?>
<a href="?Tera=Exams&Model=AddExams&Action=AddExams&token=G47883FGVFDFFG7889"><button id="" class="btn green">
											Add Exams <i class="fa fa-cup"></i>
											</button></a><br><br>

		

		<?php if(isset($_GET['Action']) && $_GET['Action'] =='AddExams'){
							include('AddExams.php');
							}else{?>			
											
													<div class="table-responsive">

	<table width="100%" class="table table-striped table-bordered table-hover" id="table">
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
						$pushcat = "SELECT * FROM `cbt_exams`";
						$sn = 0;
						$stmt = $pdo->prepare($pushcat);
                        $stmt->execute();
                        while($list = $stmt->fetch(PDO::FETCH_ASSOC)){
	                    $sn = $sn + 1;
						$id = $list['id'];
						$cbt_subject_id = $list['subject'];
						$grade = $list['grade'];
						$staff = $list['staff'];
						$type = $list['type'];
						$year = $list['year'];
						
						
						$subject_id =$tool->dbstr('subject','cbt_subjects',"id = '$cbt_subject_id'"); // get the subject id from the cbt subject tabke
						$year=$tool->dbstr('school_years_desc','school_years',"school_years_id = '$year'");
						$type=$tool->dbstr('name','cbt_exams_type',"id = '$type'");
						$staff=$tool->dbstr('staff_fname','staff',"staff_id = '$staff'").' ';
						$staff .=$tool->dbstr('staff_lname','staff',"staff_id = '$staff'");

						
						// count how many question available 
						$question_table=$tool->dbstr('question_table','cbt_subjects',"id = '$cbt_subject_id'");
                        $coutQ = $tool->MyCount("SELECT COUNT(question) AS num FROM `$question_table` WHERE `cbt_exam` = '$id'");
						
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
						
					
					
					
					
             $subject_name=$tool->dbstr('grade_subject_desc','grade_subjects',"grade_subject_id = '$subject_id'");
			  $gradename=$tool->dbstr('grades_desc','grades',"grades_id = '$grade'");
						  $gradedomain=$tool->dbstr('grades_domain','grades',"grades_id = '$grade'");
						  $gradedomain=$tool->dbstr('school_names','tbl_grade_domains',"id = '$gradedomain'");

						
						// $attrcount= $tool->MYCount("SELECT COUNT(name) AS num from attribute_sets WHERE category = $id");


						
						?>	
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
					            <p>term: <?php echo $list['term'];?> </p></td>
					          <td class="center"> <?php echo  $status;?><br><br>
 					<a title="Edit status" href="#"><b><span data-toggle="modal" data-target="#ExamModal<?php echo $id;?>" class="label label-primary"> <i class="fa fa-edit"></i></span></b></a>

							  </td>
								<td>	
															
												
																<a href="?Tera=Exams&Model=ControlExam&token=<?php $tool->EncodeToken($id);?>"><b><span class="btn btn-primary">Manage</span></b></a>
															 <?php require('MyExamStatus.php');?>

															</td>
							
							
							
							</tr>
							  <?php } ?>
							</tbody>
							</table>
													</div>   <?php } ?>
					<br><br>