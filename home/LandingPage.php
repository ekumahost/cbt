<!DOCTYPE html>
<html>
	<head>
<?php include('VIEWS/meta.php');?>
        <style>
            body{
                background-color: #eceff4;
            }

        </style>
	</head>
<!-- Add class "boxed" along with body for boxed layout. -->
	<!-- Add "pattern-x" (1 to 5) for background patterns. -->
	<!-- Add "img-x" (1 to 5) for background images. -->
	<body >

		<!-- Outer Starts -->
		<div class="outer">

			<!-- Top bar starts -->
			<div class="top-bar">
		<?php include('VIEWS/meta_cap.php');?>
</div><!-- Top bar ends -->
	<!-- Header two Starts -->
			<div class="header-2">
					<?php include('VIEWS/header.php');?>
</div>
<!-- Header two ends -->
<!-- Main content starts -->
<div class="main-block">

				<!-- Revolution slider full width starts -->
<!-- Revolution slider full width ends -->
<div class="container">


<div class="">

    <div class="col-md-3">
    </div>

						<div class="col-md-5">
							<!-- Login starts -->
							<div class="well login-reg-form ">
								<!-- Heading -->
								<h4 class="text-center"><?php echo sitename;?></h4>
								<hr />
								<!-- Form -->
								<form id="logonForm" action="#" method="post" class="form-horizontal" role="form">
									<!-- Form Group -->
									<div class="form-group">
										<!-- Label -->
										<label for="user" class="col-sm-3 control-label">Email</label>
										<div class="col-sm-9">
											<!-- Input -->
										  <input type="text" name="username" class="form-control" id="user" placeholder="Enter your email">
										</div>
									</div>
									<div class="form-group">
										<label for="password" name="password" class="col-sm-3 control-label">Password</label>
										<div class="col-sm-9">
										  <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-9">
											<!--<div class="checkbox">
												<label>
													<input type="checkbox"> Remember Me
												</label>
											</div> -->
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-9">
											<!-- Button -->
											<button type="submit" class="btn btn-red">Login</button>&nbsp;
<!--											<button type="reset" class="btn btn-white">Reset</button>-->
                                            <a href="register.cbt"> <button type="button" class="btn btn-white">Register</button></a>

                                        </div>
									</div>
									<div class="col-sm-offset-3 col-sm-9"><!--
										<a href="#" title="You are not allowed to forget password, sorry" class="black">Forgot Password ?</a> --><span class="result"> </span>
									</div>
								</form>
								<br />
								<hr />
								<!-- Social Media Login -->
								<div class="s-media text-center">
								<?php
								$tool=new Helen();
								$sess = $tool->dbstr($col="current_year",$table="tbl_config",$_sql="`id` = '1'");
								$sess = $tool->dbstr($col="school_years_desc",$table="school_years",$_sql="`school_years_id` = '$sess'");

								?>
							<!--	 <span class=" btn-blue">Session: <?php /*echo $sess;*/?> </span>
							     <span class=" btn-blue">Semester: <?php /*echo $tool->dbstr($col="grade_terms_id",$table="grade_terms",$_sql="`current` = '1'");*/?> </span>
-->


									<!-- Button
									<a href="#" class="btn btn-red"><i class="fa fa-google-plus"></i> &nbsp; Login with Google</a>
									<a href="#" class="btn btn-blue"><i class="fa fa-facebook"></i> &nbsp; Login with Facebook</a>
								-->

								</div>
							</div>
							<!-- Login ends -->
						</div>


    <div class="col-md-3">
    </div>
					</div>
<script type="text/javascript">
    $('#logonForm').submit(function() {
	        // validate form if empty

		$(".result").html('<img src="CORDOVA/img/c_loader_gr.gif" />');
		$.post("CONTROLLER/student_login.php", $("#logonForm").serialize(), function(response) {
			$('.result').html(response);
		});
      return false;
    });


  </script>
</div>
<div class="container">
<div class="block-heading-two text-center">
						<h3><span> </span></h3>
					</div>
					<!-- Client One Starts -->
					<br />
<?php //include('VIEWS/stats.php');?>
<br /></div>
</div>
<?php include('VIEWS/footer_leg.php');?>
</div>
<span class="totop"><a href="#"><i class="fa fa-angle-up bg-color"></i></a></span>
<?php include('VIEWS/footer_meta.php');?>
<?php include('VIEWS/footer_js.php');?>
        <!--Start of Tawk.to Script-->
       <!-- <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/5912b7f54ac4446b24a6e32b/default';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        </script>-->
        <!--End of Tawk.to Script-->
</body>
</html>
