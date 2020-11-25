<?php
$check = new Helen();
$single = new Helen();
// check if session is set
$tool= new Helen();
$check->LogonCheck();

$user_ip = '127.0.0.1';
define('StudentID',@$_SESSION['StudentID']); 
define('StudentUserName',@$_SESSION['StudentUserName']);

define('CurrentYear',@$_SESSION['CurrentYear']);
define('CurrentTerm',@$_SESSION['CurrentTerm']); 
$CurrentYear = CurrentYear;
$CurrentTerm = CurrentTerm;
$StudentID = StudentID;
$CurrentYearName=$tool->dbstr($col="school_years_desc",$table="school_years",$_sql="`school_years_id` = '$CurrentYear'");

$student_grade_year_grade = $tool->dbstr($col="student_grade_year_grade",$table="student_grade_year",$_sql="`student_grade_year_year` = '$CurrentYear' AND `student_grade_year_student`='$StudentID'");

$StudentClass=$tool->dbstr($col="grades_desc",$table="grades",$_sql="`grades_id` = '$student_grade_year_grade'");


$StudentBioID = $tool->dbstr($col="stdbio_id",$table="web_students",$_sql="`id` = '$StudentID'").' ';

$Student = $tool->dbstr($col="studentbio_lname",$table="studentbio",$_sql="`studentbio_id` = '$StudentBioID'").' ';
$Student .= $tool->dbstr($col="studentbio_fname",$table="studentbio",$_sql="`studentbio_id` = '$StudentBioID'");

// public use
$OngoingExam = $tool->MyCount("SELECT COUNT(id) AS num FROM `cbt_exams` WHERE `status`='1'");
$UpComingExam = $tool->MyCount("SELECT COUNT(id) AS num FROM `cbt_exams` WHERE `status`='0'");
$CompletedExam = $tool->MyCount("SELECT COUNT(id) AS num FROM `cbt_exams` WHERE `status`='2'");
$SuspendedExam = $tool->MyCount("SELECT COUNT(id) AS num FROM `cbt_exams` WHERE `status`>'2'");
$TotalStudents = $tool->MyCount("SELECT COUNT(id) AS num FROM `cbt_exams` WHERE `status`>'2'");

// 
$Cyear = $tool->dbstr($col="current_year",$table="tbl_config",$_sql="`id` = '1'");
$Cterm = $tool->dbstr($col="grade_terms_id",$table="grade_terms",$_sql="`current` = '1'");
$totalStudents = $tool->MyCount("SELECT COUNT(student_grade_year_student) AS num FROM `student_grade_year` WHERE `student_grade_year_year`='$Cyear'");
$totalStaff = $tool->MyCount("SELECT COUNT(staff_id) AS num FROM `staff` WHERE `staff_status`='1'");

// staff 
define('UserName',@$_SESSION['UserName']);

$StaffID = @$_SESSION['StaffID'];
$Staff_name = $tool->dbstr($col="staff_lname",$table="staff",$_sql="`staff_id` = '$StaffID'").' ';
$Staff_name .= $tool->dbstr($col="staff_fname",$table="staff",$_sql="`staff_id` = '$StaffID'");
$Staff_email = $tool->dbstr($col="staff_email",$table="staff",$_sql="`staff_id` = '$StaffID'").' ';

