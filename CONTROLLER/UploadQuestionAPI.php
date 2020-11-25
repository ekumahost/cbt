<?php 
include_once('../config/SESSION_MANAGER.php');
//error_reporting(0);

// we have these for xlsx file procession
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
date_default_timezone_set('Europe/London');


// this page is accessed via http request, so use linking directly
include_once('ENCODER.php');
	$valid = new Helen();
	$allcount = new DBCount();
	// brut force checker
	$valid->brutecheck();

 if(isset($_POST['UploadQuestions'])){
	 extract($_POST);
// validate csv file
// count the rows: is it equall to tatal question


if(empty($_FILES['ResultFile']['type'])){
	echo "playing...";
	exit;
}


$extensions = array("xlsx");// the only file extenstion that we can acept
$file_ext=explode('.',$_FILES['ResultFile']['name']);
$file_ext=end($file_ext);  
$file_ext=strtolower($file_ext);          
if(in_array($file_ext,$extensions ) === false){
$tool->Error("Only excel 2007 is allowed, read the tutorial bellow");
exit;	
}   

// upload the excel file to a folder
$temp_folder = 'uploads/'; // where we are going to store the file
$now = time();// 
$file_tmp = $_FILES['ResultFile']['tmp_name'];
$file_name = $_FILES['ResultFile']['name'];
$target = $temp_folder.$now."_result_".$file_name;

if(!move_uploaded_file($file_tmp, $target)){
// uploading the file failed
	echo "we have problem collecting the file";
//$valid->Error("Wait: you have not set any quetion");
exit;	
}
if (!file_exists($target)) {
	exit("Thin forest, we collected the file, but its looking like some zombies ate it up" );
}

// we can try from here
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objReader->setReadDataOnly(true);
$objPHPExcel = $objReader->load($target);
$objWorksheet = $objPHPExcel->getActiveSheet();
$highestRow = $objWorksheet->getHighestRow(); 
$highestColumn = $objWorksheet->getHighestColumn(); 
$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); 
$rows = array();
$AllreadyAdded = $valid->MyCount("SELECT COUNT(question) AS num FROM `$QuestionTable` WHERE `cbt_exam`='$Exam_id'");
$Expected = $TotalQ-$AllreadyAdded;
if($highestRow!=$Expected){
	//echo $TotalQ.'-'.$AllreadyAdded;
	// the number of row in the excel file is not same as the total question needed
	echo "Invalid number of question, we require $Expected but your excel file have $highestRow questions";
	exit;
}



for ($row = 1; $row <= $highestRow; ++$row) {
  for ($col = 0; $col <= $highestColumnIndex; ++$col) {
    $rows[$col] = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
  }

  //echo $rows[0].' '.$rows[1].' '.$rows[2].' '.$rows[3].'<br>';
// $rows[0] == option A
//$rows[1] B
//$rows[2] C
//$rows[3] D
//$rows[4] E
// $rows[5] ar
// $rows[6] // question
$RowJump = 0;

$a = $valid->secureStr($rows[0]);
$b = $valid->secureStr($rows[1]);
$c = $valid->secureStr($rows[2]);
$d = $valid->secureStr($rows[3]);
$e = $valid->secureStr($rows[4]);
$ar = $valid->secureStr(strtolower($rows[5]));
$QuestionDesc = $valid->secureStr($rows[6]);

 //--------------/////////////--> row loop starts
	 // we can loop from here
$exist = $valid->MyCount("SELECT COUNT(question) AS num FROM `$QuestionTable` WHERE `cbt_exam`='$Exam_id' AND `question`='$QuestionDesc' AND `a`='$a' AND `b`='$b' AND `c`='$c' AND `d`='$d' AND `e`='$e'");
$CountAddedQue = $valid->MyCount("SELECT COUNT(question) AS num FROM `$QuestionTable` WHERE `cbt_exam`='$Exam_id'");
if(empty($QuestionDesc)){
	// we do not have a question in this row, so we omit it
	$RowJump = $RowJump+1;
	
}elseif(empty($ar)){
// answer was not defined, so we jump
	$RowJump = $RowJump+1;
	
}elseif(empty($a) || empty($b)){
// he did not include $a and $ b so we jump again
	$RowJump = $RowJump+1;

}elseif($exist>0){
// this question already exist in the db we jump it again
$RowJump = $RowJump+1;
}elseif($TotalQ==$CountAddedQue){// bring this to front
// total question neede is added so we do not dd more again
$RowJump = $RowJump+1;
}else{
//  we are ready to add the qustion now, lect get the last serial number	
if($CountAddedQue<1){
// no question has been added so our first sn = 1
$sn = 1;		
}else{
// get the maximum serial number and add 1 to is
$MaxSN = $valid->GetMax("SELECT MAX(sn) AS num FROM `$QuestionTable` WHERE `cbt_exam`='$Exam_id'");
$sn = $MaxSN+1;	
}
// we now our $sn to be used as question serial number
$Tooler = $pdo->prepare("INSERT INTO `$QuestionTable` (sn,cbt_exam,question,ar,a,b,c,d,e) VALUES(:sn, :cbt_exam, :question, :ar, :a, :b, :c, :d, :e)");
 // bind value
  $Tooler->bindValue(':sn', $sn, PDO::PARAM_INT);
  $Tooler->bindValue(':cbt_exam', $Exam_id, PDO::PARAM_INT);
  $Tooler->bindValue(':question', $QuestionDesc, PDO::PARAM_STR);
  $Tooler->bindValue(':ar', $ar, PDO::PARAM_STR);
  $Tooler->bindValue(':a', $a, PDO::PARAM_STR);
  $Tooler->bindValue(':b', $b, PDO::PARAM_STR);
  $Tooler->bindValue(':c', $c, PDO::PARAM_STR);
  $Tooler->bindValue(':d', $d, PDO::PARAM_STR);
  $Tooler->bindValue(':e', $e, PDO::PARAM_STR);
  $Tooler->execute();
 if($Tooler->rowCount()>0){// counting the affected rows
//$valid->Success("Question Added Succesfully");	

}else{
// the query failed for this row
$RowJump = $RowJump+1; // we had a jump

}

}
//////////////////------>End row loop
 //mysql_query("INSERT INTO your_table (col1,col2) VALUES ($rows[1],$rows[2])");
}// END LOOPING FOR DATA FROM EXCEL FILE
// WE ARE DONE ADDING ALL
if($RowJump>0){
// some rows were rejected
echo 'some questions where rejected becuase they are invaled';	
}
// delete the excel file we added 
unset($target);
echo "Question import completed please verify";
echo '<br><a href="">verify Now</a>';


}