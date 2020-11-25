<?php 
include_once('../config/SESSION_MANAGER.php');
//error_reporting(0);
// this page is accessed via http request, so use linking directly
include_once('ENCODER.php');
	$valid = new Helen();
	$allcount = new DBCount();
	// brut force checker
	$valid->brutecheck();

 if(isset($_POST['SynchroniseResult'])){
	 extract($_POST);

$examstatus=$tool->dbstr('status','cbt_exams',"id = '$Exam_id'");
$examsgraded=$tool->dbstr('graded','cbt_exams',"id = '$Exam_id'");

if($examstatus<2){
	$valid->Error('This exam is not completed yet');
	exit;
}elseif($examstatus==2){
// exam is completed so we keep silent
}else{
$valid->Error('Only Completed exam can be synchronised');
	exit;	
}

if($examsgraded<1){
	$valid->Error('This exam is not graded yet');
	exit;
}else{}
// prepare to synchroinse the result the result here and provide link for download

// ping internet
// ping Aronu end
// initialize curl engine
// pull result
// validate 
// json stringify
// curl post
// get result
// report and update synchronise in table

$tool->Error(" Access to student portal not granted yet!");












 }