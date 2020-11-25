	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title> <?php echo sitename;?> ::. <?php echo CTitle;?> &raquo;<?php echo PTitle;?> &raquo; <?php echo sitefullname;?></title>

	<link href="../CORDOVA/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="../CORDOVA/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="../CORDOVA/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="../CORDOVA/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="../CORDOVA/img/favicon.png" rel="icon" type="image/png">
	<link href="../CORDOVA/img/favicon.ico" rel="shortcut icon">

	
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<script src="../CORDOVA/js/plugins.js"></script>
	
	
	<?php if(isset($_GET['Tera']) AND $_GET['Tera']=='Calendar'){?>
	<script src="../CORDOVA/js/lib/fullcalendar/fullcalendar.min.js"></script>
	<!--<script src="js/lib/fullcalendar/scheduler.min.js"></script>-->
	<script src="../CORDOVA/js/lib/fullcalendar/fullcalendar-init.js"></script>
	<link rel="stylesheet" href="../CORDOVA/css/lib/fullcalendar/fullcalendar.min.css">
<?php }?>

	<!-- <script type="text/javascript" src="../CORDOVA/js/timeout-dialog.js"></script>-->
	
	

	<!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
	<script src="../CORDOVA/js/app.js"></script>

	
	<!-- for create auction-->
	<script src="../CORDOVA/js/lib/summernote/summernote.min.js"></script>
	<link rel="stylesheet" href="../CORDOVA/css/lib/summernote/summernote.css"/>

	
	
    <link rel="stylesheet" href="../CORDOVA/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="../CORDOVA/css/main.css">
	
	<!--<link rel="stylesheet" href="../CORDOVA/css/timeout-dialog.css" type="text/css" media="screen, projection" />-->

	

	
		<!--All bellow renders datatable />-->

		<link rel="stylesheet" type="text/css" href="../CORDOVA/dtable/media/css/jquery.dataTables.css">
	<!--<script type="text/javascript" language="javascript" src="../CORDOVA/dtable/resources/jquery-1.11.2.min.js">
	</script> -->
	<script type="text/javascript" language="javascript" src="../CORDOVA/dtable/media/js/jquery.dataTables.js">
	</script>
	<script type="text/javascript" language="javascript" src="../CORDOVA/dtable/resources/syntax/shCore.js">
	</script>
	<script type="text/javascript" language="javascript" src="../CORDOVA/dtable/resources/demo.js">
	</script>
	<script type="text/javascript" language="javascript" class="init">
	
$(document).ready(function() {
	$('#table').DataTable( {
		"order": [[ 3, "desc" ]]
	} );
} );

	</script>

	<!-- moved from Addproduct.php -->
	 <!-- <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
