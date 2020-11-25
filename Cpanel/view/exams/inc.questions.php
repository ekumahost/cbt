<section class="card" id="QuetionForm" style="">
            <header class="card-header">
                View Questions
            </header>
            <div class="card-block">
			
<div class="table-responsive">

	<table width="100%" class="table table-striped table-bordered table-hover" id="table">
							<thead>
							<tr>
								<th width="2%" class="table-checkbox order">sn</th>
								<th width="5%">Action</th>
								<th width="42%">
									 QUESTION								</th>
								<th width="10%">A</th>
								<th width="9%">B</th>
								<th width="8%">C</th>
								<th width="8%">D</th>
								<th width="8%">E</th>
								<th width="8%">
									 Answer								</th>
							</tr>
							</thead>
							<tbody>
							
						<?php
						$pushcat = "SELECT * FROM `$question_table` WHERE `cbt_exam` = '$id'";
						$stmt = $pdo->prepare($pushcat);
                        $stmt->execute();
						function getAnswer($s,$as,$alpha){
                        if($alpha==$as){
							return '<b>'.$s.'</b>';
						}else{
							return $s;
						} }
						
						
                        while($listq = $stmt->fetch(PDO::FETCH_ASSOC)){
						$listqid = $listq['id'];
						$question = $listq['question'];
						$status = $listq['status'];
						$sn = $listq['sn'];
                        $ar = $listq['ar'];// answer
                   
				       
				        $a = getAnswer($listq['a'],$ar,'a');
				        $b = getAnswer($listq['b'],$ar,'b');
				        $c = getAnswer($listq['c'],$ar,'c');
				        $d = getAnswer($listq['d'],$ar,'d');
				        $e = getAnswer($listq['e'],$ar,'e');

										
if($listq['status']==1){
$status = '<span class="label label-success">Active</span>';
}else{
	$status = '<span class="label label-danger">Inactive</span>';

}
	
						
						?>	
						<tr class="eeven">
								<td><?php echo $sn;?></td>
								<td class="center">
									<?php //echo  $status;?>
 					<a title="Edit status" href="#"><b><span data-toggle="modal" data-target="#QEditModal<?php echo $listqid;?>" class="label label-primary"> <i class="fa fa-edit"></i></span></b></a>
								<?php include('QEditModal.php');?>
								
								</td>
								<td class="center"> <?php //echo html_entity_decode($question);// html_entity_decode(rtrim($question));?>
                                   <span id="your_id"> </span>
                                 <script>$('#your_id').html('<?php //echo $question;// html_entity_decode(rtrim($question));?>').text();</script>

					<?php echo $tool->HTMLDencoder($question);// html_entity_decode(rtrim($question));?>							    </td>
								<td class="center"> [A] <?php echo $a;?></td>
								<td class="center">[B] <?php echo $b;?></td>
						        <td class="center">[C] <?php echo $c;?></td>
						        <td class="center">[D] <?php echo $d;?></td>
						        <td class="center">[E] <?php echo $e;?></td>
					          <td>&nbsp;</td>
							</tr>
							
						<?php }?>
							</tbody>
							</table>
			  </div>   
										
 </div><br><br><br>
        </section>