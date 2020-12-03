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
                        <h4 class="text-center"><?php echo sitename;?> <br> REGISTRATION </h4>
                        <hr />
                        <!-- Form -->
                        <form id="logonForm" action="#" method="post" class="form-horizontal" role="form">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="user" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" required name="email" class="form-control" id="user" placeholder="Enter your email">
                                </div>
                            </div>



                            <div class="form-group">
                                <label  class="col-sm-3 control-label">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" required name="first_name" class="form-control"  placeholder="Enter your first name">
                                </div>
                            </div>



                            <div class="form-group">
                                <label  class="col-sm-3 control-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" required name="last_name" class="form-control"  placeholder="Enter your last name">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="phone" class="col-sm-3 control-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="number" required name="phone" class="form-control" id="phone" placeholder="Enter your phone number">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="password" name="password" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" required class="form-control" name="password" id="password" placeholder="Enter Password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password2" name="password2" class="col-sm-3 control-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" required class="form-control" name="password2" id="password" placeholder="Enter Password">
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
                                    <button type="submit" class="btn btn-red">Register</button>&nbsp;
                                   <a href="home.cbt"> <button type="button" class="btn btn-white">login</button></a>
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


                            ?>

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
                    $.post("CONTROLLER/student_register.php", $("#logonForm").serialize(), function(response) {
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

</body>
</html>
