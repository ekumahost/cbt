<header class="site-header">
	    <div class="container-fluid">
	        <a href="?Tera=Home" class="site-logo">
	            <img class="hidden-md-down" src="../CORDOVA/static/local.png" alt="">
	            <img class="hidden-lg-up" src="../CORDOVA/static/local.png" alt="">
	        </a>
			<span class="hidden-lg-up " style="float:right; color:white">&nbsp;&nbsp;&nbsp;<?php echo sitename;?> [CBT] </span>
			
			
	        <button class="hamburger hamburger--htla">
	            <span>menu</span>
	        </button>
	        <div class="site-header-content">
	            <div class="site-header-content-in">
	                <div class="site-header-shown">
	                
					 <?php include('header/language.php');?>
                     <?php include('header/user.php');?>

					 
	                </div><!--.site-header-shown-->
	
	                <div class="mobile-menu-right-overlay"></div>
	                <div class="site-header-collapsed">
	                    <div class="site-header-collapsed-in">
	                      <?php //include_once('header/menu_a.php');?>
<font color="white"><?php echo $CurrentYearName;?> || <?php echo $CurrentTerm;?></font>
	                      <?php //include_once('header/menu_c.php');?>
	                      <?php //include_once('header/menu_d.php');?>
	                      <?php //include_once('header/menu_e.php');?>
	                      <?php //include_once('header/menu_f.php');?>
	                      <?php include_once('header/search_form.php');?>
                         
						 </div><!--.site-header-collapsed-in-->
	                </div><!--.site-header-collapsed-->
	            </div><!--site-header-content-in-->
	        </div><!--.site-header-content-->
	    </div><!--.container-fluid-->
	</header><!--.site-header-->
