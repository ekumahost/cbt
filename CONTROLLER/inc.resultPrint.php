<?php
$objPHPExcel = new PHPExcel();
// Set document properties
//echo date('H:i:s') , " Set document properties" , EOL;
$objPHPExcel->getProperties()->setCreator("Okokoh Benjamin Ekuma")
							 ->setLastModifiedBy("Okokoh Benjamin Ekuma")
							 ->setTitle("First Result")
							 ->setSubject("Exported Student Result for this subject")
							 ->setDescription("This is a result exported from our CBT Exam System")
							 ->setKeywords("cbt, Ben, Aronu, Abafor, Exam")
							 ->setCategory("CBT Result");

// Create a first sheet, representing sales data
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Results');
$objPHPExcel->getActiveSheet()->setCellValue('D1', PHPExcel_Shared_Date::PHPToExcel( gmmktime(0,0,0,date('m'),date('d'),date('Y')) ));
$objPHPExcel->getActiveSheet()->getStyle('D1')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
$objPHPExcel->getActiveSheet()->setCellValue('E1', '#12566');

$objPHPExcel->getActiveSheet()->setCellValue('A3', 'Reg No');
$objPHPExcel->getActiveSheet()->setCellValue('B3', 'Name');
$objPHPExcel->getActiveSheet()->setCellValue('C3', 'Score');
$objPHPExcel->getActiveSheet()->setCellValue('D3', 'Grade');
$objPHPExcel->getActiveSheet()->setCellValue('E3', 'Position');

// we start puttingnthe result in row 4
$row=4;
$firstrow = 4;


////------------
	$pushanswers = "SELECT * FROM `cbt_subscription` WHERE `exam` = '$Exam_id'";
						$ans = $pdo->prepare($pushanswers);
                        $ans->execute();
						 $total_result = 0;
						 $i=4;
						while($il = $ans->fetch(PDO::FETCH_ASSOC)){
							$total_result=$total_result+1;
						$listqia = $il['id'];
						$ansStudent = $il['student'];
                            $student =$tool->dbstr('studentbio_lname','studentbio',"studentbio_id = '$ansStudent'").' ';
                            $student .=$tool->dbstr('studentbio_fname','studentbio',"studentbio_id = '$ansStudent'") .'(';
                            $student .=$tool->dbstr('studentbio_internalid','studentbio',"studentbio_id = '$ansStudent'") . ') [';
                            $student .=$tool->dbstr('std_bio_mobile','studentbio',"studentbio_id = '$ansStudent'") . ']';



                            $studentReg =$tool->dbstr('studentbio_internalid','studentbio',"studentbio_id = '$ansStudent'");


//$CountAttempted= $tool->MyCount("SELECT COUNT(answer) AS num FROM `$answers_table` WHERE `student`='$ansStudent' AND `exam` = '$Exam_id'");
// update subscription with this
$CountCorrectAnswer= $tool->MyCount("SELECT COUNT(answer) AS num FROM `$answers_table` a JOIN `$question_table` b ON `a`.`answer`= `b`.`ar` WHERE `a`.`student` ='$ansStudent' AND `a`.`exam` = '$Exam_id' AND `a`.`question_id` =`b`.`id`");
///--------------->

$a = 'A'.$i;
$b = 'B'.$i;
$c = 'C'.$i;
$d = 'D'.$i;
$e = 'E'.$i;
$objPHPExcel->getActiveSheet()->setCellValue($a, $studentReg);
$objPHPExcel->getActiveSheet()->setCellValue($b, $student);
$objPHPExcel->getActiveSheet()->setCellValue($c, $CountCorrectAnswer);
$objPHPExcel->getActiveSheet()->setCellValue($d, $tool->SweetPercentage($CountCorrectAnswer, $coutQ));
$objPHPExcel->getActiveSheet()->setCellValue($e, $tool->ordinal($il['position']));
$i=$i+1;
$row = $row+1;
$lastrow = $row;

}
// we can start adding to row $ row but we need to jump 3 rows
$row = $row+3;

$trow= 'D'.$row;
$tarow= 'E'.$row;
$objPHPExcel->getActiveSheet()->setCellValue($trow, 'Total result:');
$objPHPExcel->getActiveSheet()->setCellValue($tarow, $total_result); // total result from db counted


$objPHPExcel->getActiveSheet()->getComment($tarow)->setAuthor('Okokoh');
$objCommentRichText = $objPHPExcel->getActiveSheet()->getComment($tarow)->getText()->createTextRun('director here');
$objCommentRichText->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getComment($tarow)->getText()->createTextRun("\r\n");
$objPHPExcel->getActiveSheet()->getComment($tarow)->getText()->createTextRun('total result downloaded');
$row = $row+3; // we set to the next row again

$appendsign = $row+2;


/*$objPHPExcel->getActiveSheet()->getComment('E13')->setWidth('100pt');
$objPHPExcel->getActiveSheet()->getComment('E13')->setHeight('100pt');
$objPHPExcel->getActiveSheet()->getComment('E13')->setMarginLeft('150pt');
$objPHPExcel->getActiveSheet()->getComment('E13')->getFillColor()->setRGB('EEEEEE');
*/

// Add rich-text string
//echo date('H:i:s') , " Add rich-text string" , EOL;
$objRichText = new PHPExcel_RichText();
$objRichText->createText('This result is ');

$objPayable = $objRichText->createTextRun(' digitally signed and approved as standard supports');
$objPayable->getFont()->setBold(true);
$objPayable->getFont()->setItalic(true);
$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_DARKGREEN ) );

$objRichText->createText(', unless specified otherwise on the ressult.');

$signrow = 'A'.$row;
$signend = $row+4; // we end it at adding 4th row
$signended = 'E'.$signend;
$row=$signend+1; // we restow our row number again
$objPHPExcel->getActiveSheet()->getCell($signrow)->setValue($objRichText);
$signappend = $signrow.':'.$signended;
// Merge cells
$objPHPExcel->getActiveSheet()->mergeCells($signappend);


//$objPHPExcel->getActiveSheet()->mergeCells('A28:B28');		// Just to test...
//$objPHPExcel->getActiveSheet()->unmergeCells('A28:B28');	// Just to test...


// Set column widths
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);

// Set fonts
//echo date('H:i:s') , " Set fonts" , EOL;
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setName('Candara');
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setSize(20);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

$objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
$objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);


// Set alignments
//$objPHPExcel->getActiveSheet()->getStyle('D11')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

//$objPHPExcel->getActiveSheet()->getStyle('A18')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
//$objPHPExcel->getActiveSheet()->getStyle('A18')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);


//$objPHPExcel->getActiveSheet()->getStyle('B5')->getAlignment()->setShrinkToFit(true);

// Set thin black border outline around column
//echo date('H:i:s') , " Set thin black border outline around column" , EOL;
$styleThinBlackBorderOutline = array(
	'borders' => array(
		'outline' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('argb' => 'FF000000'),
		),
	),
);

$rowrectangle= 'A'.$firstrow.':E'.$lastrow;
$objPHPExcel->getActiveSheet()->getStyle($rowrectangle)->applyFromArray($styleThinBlackBorderOutline);// beginning to the end of result
include('inc.excel.header.php');
// Unprotect a cell
//echo date('H:i:s') , " Unprotect a cell" , EOL;
//$objPHPExcel->getActiveSheet()->getStyle('B1')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);

// Add a hyperlink to the sheet
//echo date('H:i:s') , " Add a hyperlink to an external website" , EOL;

$row = $row+3; // we push down a bit

$seturl = 'E'.$row;
$termrow = $row+1;
$setterms = 'E'.$termrow;

$objPHPExcel->getActiveSheet()->setCellValue($seturl, 'www.enugusme.xyz');
$objPHPExcel->getActiveSheet()->getCell($seturl)->getHyperlink()->setUrl('http://enugusme.xyz');
$objPHPExcel->getActiveSheet()->getCell($seturl)->getHyperlink()->setTooltip('Navigate to website');
$objPHPExcel->getActiveSheet()->getStyle($seturl)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

//echo date('H:i:s') , " Add a hyperlink to another cell on a different worksheet within the workbook" , EOL;
$objPHPExcel->getActiveSheet()->setCellValue($setterms, 'Terms and conditions');
$objPHPExcel->getActiveSheet()->getCell($setterms)->getHyperlink()->setUrl("sheet://'Terms and conditions'!A1");
$objPHPExcel->getActiveSheet()->getCell($setterms)->getHyperlink()->setTooltip('Review terms and conditions');
$objPHPExcel->getActiveSheet()->getStyle($setterms)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);



// Add a drawing to the worksheet
//echo date('H:i:s') , " Add a drawing to the worksheet" , EOL;
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Logo');
$objDrawing->setDescription('Logo');
$objDrawing->setPath('./images/officelogo.jpg');
$objDrawing->setHeight(36);
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

// Add a drawing to the worksheet
//echo date('H:i:s') , " Add a drawing to the worksheet" , EOL;
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Signed');
$objDrawing->setDescription('Signed');
$objDrawing->setPath('./images/paid.png');
$appendsign = 'B'.$appendsign;
$objDrawing->setCoordinates($appendsign);
$objDrawing->setOffsetX(110);
$objDrawing->setRotation(25);
$objDrawing->getShadow()->setVisible(true);
$objDrawing->getShadow()->setDirection(45);
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

// Add a drawing to the worksheet
//echo date('H:i:s') , " Add a drawing to the worksheet" , EOL;
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('School Logo');
$objDrawing->setDescription('School logo');
$objDrawing->setPath('./images/phpexcel_logo.gif');
$objDrawing->setHeight(36);
$logorow = $row+2;
$logocord = 'D'.$logorow;
$objDrawing->setCoordinates($logocord);
$objDrawing->setOffsetX(10);
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

// Set header and footer. When no different headers for odd/even are used, odd header is assumed.
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&BResult&RPrinted on &D');
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
// Set page orientation and size
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
// Rename first worksheet
//$objPHPExcel->getActiveSheet()->setTitle('Result');
//$objPHPExcel->setActiveSheetIndex(0);
