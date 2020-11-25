<?php 
require_once('controller/SESSION.php');
require_once('../config/DENY.php');
require_once('../CONTROLLER/ENCODER.php');
define('PTitle', 'Admin CBT'); // page title // use module
define('CTitle','Home');// Context title // used as default for all pages
?>
<!DOCTYPE html>
<html>
<head lang="en">
 <?php require_once('view/meta.php');?>
</head>
<body class="with-side-menu-compact">
 <?php require_once('view/header.php');?>
<div class="mobile-menu-left-overlay"></div>
 <?php require_once('view/leftbar.php');?>

<div class="page-content">
    <div class="container-fluid">
	<div class="box-typical box-typical-padding">
    
 <?php 
 require_once('PAGER.php');?>
	
	
	</div><!--.page-padding-->
    </div><!--.container-fluid-->
	</div><!--.page-content-->

<?php require_once('view/footer.php');
require_once('controller/TITLE_HANDLER.php');

?>

</body>
</html>
