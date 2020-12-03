<?php if(!defined('JSKing')){require_once('404.html');}else{require_once('config/catch.php');} ?>

<?php
$current_page_uri = $_SERVER['REQUEST_URI'];
 $part_url  = parse_url($current_page_uri);
$page_name = $part_url["path"];
$part_url = explode("/", $page_name);
//$page_name=$part_url[1]; // online
//$page_name=$part_url[1];// this is asumed index.php or the string after first / local host
$page_name=$part_url[2];// this is asumed index.php or the string after first / local host
$page_namer = end($part_url); // this is amazing// the string after last /
//echo 'pg'.$page_name; exit;
