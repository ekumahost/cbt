<?php
define('common', true); // lets know if included in wrong houses sha
include_once "configurato.php";


//-------------------------------
// Obtain specific URL Parameter from URL string
//-------------------------------
function get_param($param_name)
{
  global $_POST;
  global $_GET;

  $param_value = "";
  if(isset($_POST[$param_name])) {
    $param_value = $_POST[$param_name];
  } else if(isset($_GET[$param_name])) {
    $param_value = $_GET[$param_name];
  }
  return $param_value;
}
// Convert value for use with SQL statament 
//-------------------------------
function tosql($value, $type)
{
  if(!strlen($value))
    return NULL;
  else
    if($type == "Number")
      return str_replace (",", ".", doubleval($value));
    else
    {
      if(get_magic_quotes_gpc() == 0)
      {
        $value = str_replace("'","''",$value);
        $value = str_replace("\\","\\\\",$value);
      }
      else
      {
        $value = str_replace("\\'","''",$value);
        $value = str_replace("\\\"","\"",$value);
      }
	  // play some other nonsense that may kind of stop injection
 		$value = htmlentities(stripslashes($value));
		$value = mysql_real_escape_string($value);
      return "'" . $value . "'";
    }
}

function strip($value)
{
  if(get_magic_quotes_gpc() == 0)
    return $value;
  else
    return stripslashes($value);
}


function set_session($param_name, $param_value)
{

   $_SESSION[$param_name] = $param_value;
}

//for fixing the dates that the datepicker generates to something the db likes
// not used for university portal yet
function fix_date($date) {
	$tc = 0;
	$tok = strtok($date, "/");
	while ($tok) {
		$td[$tc] = $tok;
		$tc++;   			
  	$tok = strtok("/");
  }
  return ($td[2]."-".$td[0]."-".$td[1]);
}

function break_date($date) {
	$tc = 0;
	$tok = strtok($date, "-");
	while ($tok) {
		$td[$tc] = $tok;
		$tc++;   			
  	$tok = strtok("-");
  }
  return ($td[1]."/".$td[2]."/".$td[0]);
}

?>
