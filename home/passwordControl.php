<?php 
require_once('CONTROLLER/publicencoder.php');
// TO LOGIN AS ADMIN CLICK ON EKUMA SEVEN TIMES 
// A SESSION WILL BE SET FOR ADMIN TO LOGIN AS ADMIN
// LOL BAD CODER
define('PTitle', 'Auctioner Login'); // page title
define('CTitle','Admin');// Context title
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
<form action="#" class="sign-box" id="passwordForm" method="post">

A password was sent to you, now activate it asap
<?php if(isset($_GET['PassWord'])){
	echo $_GET['token'];
	
}?>


						  <div class="sign-avatar">
                         <img src="CORDOVA/img/avatar-sign.png" alt="">
                         </div>
					
                    <header class="sign-title">Sign In</header>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="E-Mail or Phone"/>
                    </div>
					
					
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>
                    
                    
					
						
						<div class="form-group">
                        <div class="checkbox float-left">
                            <input type="checkbox" id="signed-in"/>
                            <label for="signed-in">Keep me signed in</label>
                        </div>
                        <div class="float-right reset">
                            <a href="#">Reset Password</a>
                        </div>
                    </div>
					<button type="submit" class="btn btn-rounded">Sign in</button>
						
					
									     
					
					<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
					     <center><div class="loginMsgDiv"></div></center>

                </form>
				
				
				<form action="#" class="sign-box" id="adminLogin" method="post">
                        <input type="hidden" name="adminLogin" value="yes"/>
						<div id="AsminDIVs"></div>
						Powered by <a href="http://hypertera.ng" target="new">HyperTera</a> <span id="htn"><input title="HyperTera Systems Limited(hypertera.ng)" width="20" height="20" type="image" src="CORDOVA/static/tn.png" class=""> </input></span>
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
	
	
  </script>
</body>
</html>