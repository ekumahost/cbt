<hr>
<?php 
 define('CTitler', "View/Add CBT Courses");

define('Title', 'CBT Courses');
$tool= new Helen();
?>
<a href="?Tera=Configuration&Model=AddSubjects&Action=Subjects&token=G47883FGVFDFFG7889"><button id="" class="btn green">
											Add Courses <i class="fa fa-cup"></i>
											</button></a><br><br>

		

		<?php if(isset($_GET['Action']) && $_GET['Action'] =='AddSubjects'){
							include('AddSubjects.php');
							}else{?>			
											
													<div class="table-responsive">

	<table width="100%" class="table table-striped table-bordered table-hover" id="table">
							<thead>
							<tr>
								<th width="6%" class="table-checkbox">sn</th>
								<th width="13%">
									 Title								</th>
								<th width="11%">Level</th>
								<th width="17%">Status</th>
								<th width="14%">
									 Action								</th>
							</tr>
							</thead>
							<tbody>
							
						<?php
						$pushcat = "SELECT * FROM `cbt_subjects` ORDER BY `id`";
						$sn = 0;
						$stmt = $pdo->prepare($pushcat);
                        $stmt->execute();
                        while($list = $stmt->fetch(PDO::FETCH_ASSOC)){
	                    $sn = $sn + 1;
						$id = $list['id'];
						$subject = $list['subject'];
						$grade = $list['grade'];
						
						if($list['status']>0){
$status = 'Active';						}else{
$status = 'InActive';						}
						
					
             $subject=$tool->dbstr('grade_subject_desc','grade_subjects',"grade_subject_id = '$subject'");
			  $gradename=$tool->dbstr('grades_desc','grades',"grades_id = '$grade'");
						  $gradedomain=$tool->dbstr('grades_domain','grades',"grades_id = '$grade'");
						  $gradedomain=$tool->dbstr('school_names','tbl_grade_domains',"id = '$gradedomain'");

						
						// $attrcount= $tool->MYCount("SELECT COUNT(name) AS num from attribute_sets WHERE category = $id");


						
						?>	
						<tr class="odd gradeX">
								<td><?php echo $id;?></td>
								<td> <?php echo $subject;?></td>
								<td><p><?php echo $gradename;?> [<?php echo $gradedomain;?>]</p>							    </td>
							  <td class="center"> <?php echo  $status;?> 	</td>
								<td>	
															<a href="#" title="" class="btn btn-inline label label-danger">
															 <i class="fa fa-times"></i>															</a>
												
															<a href="#" title="" class="btn btn-xs blue">
															 <i class="fa fa-edit"></i>															</a>						  </td>
							</tr>
							  <?php } ?>
							</tbody>
							</table>
													</div>   <?php } ?>
					<br><br>