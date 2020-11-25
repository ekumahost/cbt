<?php  define('CTitler', 'Home');// anywhere


?>

<header class="page-content-header">
			<div class="container-fluid">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<p><center><small class="text-muted">Hey, <?php echo $Staff_name;?></small>(&raquo;<?php echo $Staff_email;?>)</center>
						
						
						
							<span title="current session and term" style="float:right" class="btn btn-rounded"><?php echo $CurrentYearName;?> || <?php echo $CurrentTerm;?></span></p>
						</div>
					</div>
				</div>
			</div>
		</header><!--.page-content-header-->


<div class="row">
 <?php include('widget_a.php');?>    

	   <?php include('widget_b.php');?>    
</div><!--.row-
	<link rel="stylesheet" href="../CORDOVA/cloud/cloud.css"/>
		<div class="sky" title="no open auction">
    <div class="moon"></div>
    <div class="clouds_one"></div>
    <div class="clouds_two"></div>
    <div class="clouds_three"></div>
  </div>->
		