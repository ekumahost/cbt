<?php 
require_once('CONTROLLER/publicencoder.php');
// TO LOGIN AS ADMIN CLICK ON EKUMA SEVEN TIMES 
// A SESSION WILL BE SET FOR ADMIN TO LOGIN AS ADMIN
// LOL BAD CODER
define('PTitle', 'ADMIN Login'); // page title
define('CTitle','administrator');// Context title
//$control = new Helen();
?>
<!DOCTYPE html>
<html>
<head lang="ru">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title> <?php echo sitename;?> ::. <?php echo CTitle;?> » <?php echo PTitle;?> » <?php echo sitefullname;?></title>

	<link href="CORDOVA/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="CORDOVA/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="CORDOVA/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="CORDOVA/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="CORDOVA/img/favicon.png" rel="icon" type="image/png">
	<link href="CORDOVA/img/favicon.ico" rel="shortcut icon">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<script src="CORDOVA/js/plugins.js"></script>
	<script src="CORDOVA/js/app.js"></script>

    <link rel="stylesheet" href="CORDOVA/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="CORDOVA/css/main.css">
</head>
<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">

                					<form action="#" class="sign-box" id="loginForm" method="post">

				<?php if(!isset($_SESSION['SLEEP'])){
						
						if(isset($_SESSION['StaffID'])){
						// user is even logged in, lets make him sleep anyway
						$control = new Helen();
						set_session("SLEEP", $_SESSION['StaffID']); 
                        $control->PAGEREDIRECT('admin');// refresh the page
							
					} 
						
						?>
					      
						  
						  <div class="sign-avatar">
                         <img src="CORDOVA/static/local.png" alt="">
                         </div>
					
                    <header class="sign-title">Examiner Check In</header>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="E-Mail or Phone"/>
                    </div>
					<?php }else{
				$valid = new Helen();
				$admin_id = $_SESSION['StaffID'];
				
			   //$staff_id = $valid->dbstr($col="staff",$table="web_users",$_sql="`web_users_id` = '$admin_id'");
			    $image_url = $valid->dbstr($col="staff_image",$table="staff",$_sql="`staff_id` = '$admin_id'");
			    $firstname = $valid->dbstr($col="staff_fname",$table="staff",$_sql="`staff_id` = '$admin_id'");

						?>
						<div class="sign-avatar">
                        <img src="<?php echo image_lead.$image_url;?>" alt="">
                    </div>
                    <header class="sign-title">Resume Session? <?php echo $firstname;?></header>
                    <div class="form-group">
                        <input type="hidden" name="username" value="<?php echo $_SESSION['UserName'];?>" />
                    </div>
					  
					
					<?php }?>
					
					
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>
                    
                    
					
						<?php if(!isset($_SESSION['SLEEP'])){ ?>
						
						<div class="form-group">
                        <div class="checkbox float-left">
                            <input type="checkbox" id="signed-in"/>
                            <label for="signed-in">Keep me signed in</label>
                        </div>
                        <div class="float-right reset">
                            <a href="#">Reset Password</a>
                        </div>
                    </div>
					<button type="submit" class="btn btn-rounded">Check in</button>
						<?php }else{?>
						<div class="form-group">
                        <div class="checkbox float-left">
                            <input type="checkbox" id="signed-in"/>
                            <label for="signed-in">Keep me awake</label>
                        </div>
                        <div class="float-right reset">
                            <a href="#">Lost Password</a>
                        </div>
                    </div>
			   <button type="submit" class="btn btn-rounded">Login Again</button>
			   
			   
                          <center>  <a href="logout.cbt">Sign in as a different User</a>  </center>
                       <br>
                                        <?php }?>
					
									     
					
					<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
					     <center><div class="loginMsgDiv"></div></center>

                </form>
				
				
				<form action="#" class="sign-box" id="adminLogin" method="post">
                        <input type="hidden" name="adminLogin" value="yes"/>
						<div id="AsminDIVs"></div>
						Powered by <a href="http://ugarsoft.com" target="new">UgarSoft</a> <span id="htn"><input title="UgarSoft Limited" width="20" height="20" type="image" src="CORDOVA/static/tn.png" class=""> </input></span>
						<span id="AsminDIV"></span>
											 

											 </form>
				
				
				
            </div>
        </div>
    </div><!--.page-center-->
 <script type="text/javascript">
    $('#loginForm').submit(function() {
	        // validate form if empty
	
		$(".loginMsgDiv").html('<img src="CORDOVA/img/c_loader_gr.gif" />');
		$.post("CONTROLLER/logon.php", $("#loginForm").serialize(), function(response) {
			$('.loginMsgDiv').html(response);
		}); 
      return false;
    });
	
	// activate admin login
	 $('#adminLogin').submit(function() {
	        // validate form if empty

	$.post("CONTROLLER/logon.php", $("#adminLogin").serialize(), function(response) {
			$('#AsminDIV').html(response);
		}); 
      return false;
    });
	
	
  </script>
</body>
</html>