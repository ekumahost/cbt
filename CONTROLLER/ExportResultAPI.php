<?php 
include_once('../config/SESSION_MANAGER.php');
//error_reporting(0);
// this page is accessed via http request, so use linking directly
include_once('ENCODER.php');
	$valid = new Helen();
	$allcount = new DBCount();
	// brut force checker
	$valid->brutecheck();

 if(isset($_POST['ExportResult'])){
	 extract($_POST);

$examstatus=$tool->dbstr('status','cbt_exams',"id = '$Exam_id'");
$examsgraded=$tool->dbstr('graded','cbt_exams',"id = '$Exam_id'");

if($examstatus<2){
	$valid->Error('This exam is not completed yet');
	exit;
}elseif($examstatus==2){
// exam is completed so we keep silent
}else{
$valid->Error('Only Completed exam can be graded');
	exit;	
}

if($examsgraded<1){
	$valid->Error('This exam is not graded yet');
	exit;
}else{}
//

// prepare to export the result here and provide link for download
     // check the extention is on this server
     if (!extension_loaded('zip')) {

         $valid->Error(" Zip extension not installed to enable exporting to excel pdf and JPEG!");

         exit;
}

     
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');
require_once('Classes/PHPExcel.php');
include "inc.resultPrint.php";
/** Include PHPExcel_IOFactory */
require_once('Classes/PHPExcel/IOFactory.php');
$now = time();
try{
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$linka = '../CONTROLLER/export/result'.$now.'export.xlsx';

$objWriter->save(str_replace('.php', '.xlsx', $linka));// we dont need to replace string
  $valid->Success("Result Exporting Successful, please download");
   echo '<a href="'.$linka.'" target="new">Download in Excel 2007 </a><br><br>';
   echo '<a href="'.$linka.'" target="new">Download in PDF </a>';

} catch (Exception $e) {
  $valid->Error("we cannot export it now");
  echo "Failed: " . $e->getMessage();
}


 }