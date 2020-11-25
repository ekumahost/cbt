<?php 
require_once('controller/SESSION.php');
require_once('../config/DENY.php');
require_once('../CONTROLLER/ENCODER.php');
define('PTitle', 'Student (exam hall)'); // page title // use module
define('CTitle','Home');// Context title // used as default for all pages
?>

<!DOCTYPE html>
<html>
	<head>
<?php include('view/meta.php');?>
	</head>
	<body>
	
		<!-- Outer Starts -->
		<div class="outer">
			
			<!-- Top bar starts -->
			<div class="top-bar">
		<?php include('view/meta_cap.php');?>
</div><!-- Top bar ends -->
	<!-- Header two Starts -->
			<div class="header-2">
					<?php include('view/header.php');?>
</div>
<!-- Header two ends -->
<!-- Main content starts -->
<div class="main-block">
				
				<!-- Revolution slider full width starts -->
<!-- Revolution slider full width ends -->
<div class="container">
		

<div class="row">
						
			
		

 <?php 
 require_once('PAGER.php');?>
		
			
			
			
			
			
			</div>
							

					

		
</div>
				
	
				<div class="container">
				
					<div class="block-heading-two text-center">
						<h3><span> stats</span></h3>
					</div>	
					<!-- Client One Starts -->
					<br />
																<?php include('view/stats.php');?>

					
					<br />
					
				
					
				</div>
			</div>
			
			<!-- Main content ends -->
			
			<!-- Foot Starts -->
		

																					<?php include('view/footer_leg.php');?>

		</div>
		
		<!-- Outer Ends -->		
		
		<!-- Scroll to top -->
		<span class="totop"><a href="#"><i class="fa fa-angle-up bg-color"></i></a></span>
																							<?php include('view/footer_meta.php');?>

																								<?php include('view/footer_js.php');?>

		
	</body>	
</html>









<?php 
require_once('controller/TITLE_HANDLER.php');

?>