<?php
// deny access if the asshole types page as .php

	if (substr($_SERVER['REQUEST_URI'], -4) == '.php' or stripos($_SERVER['REQUEST_URI'], '.php') == true) {
		include_once('404.php'); exit;
echo 'you are in pgp';		}
		
		?>