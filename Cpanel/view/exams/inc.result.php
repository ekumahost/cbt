<section class="card" id="QuetionForm" style="">
            <header class="card-header">
                Results
            </header>
            <div class="card-block">
			<div class="table-responsive">





	<table width="100%" class="table table-striped table-bordered table-hover" id="table">
							<thead>
							<tr>
								<th width="5%" class="table-checkbox order">sn</th>
								<th width="30%">
									 Student								</th>
								<th width="24%">Attempted</th>
								<th width="12%"><span title="Scored when you clicked Grade Report"> Marked score</span></th>
								<th width="12%"><span title="Auto calculated from students answer choice">Computed Score</span></th>
								<th width="12%">grade</th>
								<th width="12%">position</th>
								<th width="17%">
									 Action								</th>
							</tr>
							</thead>
							<tbody>

						<?php
						$pushanswers = "SELECT * FROM `cbt_subscription` WHERE `exam` = '$id'";
						$ans = $pdo->prepare($pushanswers);
                        $ans->execute();

						while($lista = $ans->fetch(PDO::FETCH_ASSOC)){
						       $listqia = $lista['id'];
						        $ansStudent = $lista['student'];

                            $student =$tool->dbstr('studentbio_lname','studentbio',"studentbio_id = '$ansStudent'").' ';
                            $student .=$tool->dbstr('studentbio_fname','studentbio',"studentbio_id = '$ansStudent'") .'(';
                            $student .=$tool->dbstr('studentbio_internalid','studentbio',"studentbio_id = '$ansStudent'") . ') [';
                            $student .=$tool->dbstr('std_bio_mobile','studentbio',"studentbio_id = '$ansStudent'") . ']';

                            $studentReg =$tool->dbstr('studentbio_internalid','studentbio',"studentbio_id = '$ansStudent'");


$CountAttempted= $tool->MyCount("SELECT COUNT(answer) AS num FROM `$answers_table` WHERE `student`='$ansStudent' AND `exam` = '$id'");
// update subscription with this
$CountCorrectAnswer= $tool->MyCount("SELECT COUNT(answer) AS num FROM `$answers_table` a JOIN `$question_table` b ON `a`.`answer`= `b`.`ar` WHERE `a`.`student` ='$ansStudent' AND `a`.`exam` = '$id' AND `a`.`question_id` =`b`.`id`");



						?>
						<tr class="odd gradeX">
								<td><?php echo $sn;?></td>
								<td> <p><?php echo $student;?></p>							    </td>
								<td class="center"><?php echo $CountAttempted;?></td>
								<td class="center"><?php echo $lista['score'];?></td>
								<td class="center"><?php echo $CountCorrectAnswer;?></td>
						        <td class="center"><?php echo $tool->GetScoreColor($CountCorrectAnswer, $coutQ);?></td>
						        <td class="center"> <?php echo $tool->ordinal($lista['position']);?></td>
					          <td>
						<!--  <a href="#"><b><span class="btn btn-primary">Transcript Card</span></b></a> -->															</td>
							</tr>

						<?php }?>
							</tbody>
							</table>
			  </div>
						 </div><br><br><br>
        </section>
