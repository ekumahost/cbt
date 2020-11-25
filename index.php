<?php 
namespace Ekuma;
use Exception;
include_once('config/SESSION_MANAGER.php');


// this is INDEX or HOME.php
define('JSKing', "Okokoh");  // if you tamper with this, your page will refresh forever because of config
//// Start url Encoder:      [for encoder to work, RewriteRule . index.php [L] --> must be set in .htacees file]
require_once('config/ENCODER.php');
require_once('config/SETTINGS.php');


//-----------FOR THE LANDING PAGE THINGS
require_once('CONTROLLER/landingencoder.php');

require_once('config/DATA.php');// new

// start URL ROUTER
require_once('config/URLROUTER.php');


?>
