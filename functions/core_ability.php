<?php 

// THIS FILE IS now being used in adddepartment.php


function query($query){
	//mysql query have died
	//$que=mysql_query($query)or die(mysql_error());
	return $que;
}

class publicans {
	

	
// this function may not be used and will be debricated if not
	public function get_string($query=null,$x=0,$y=0)// collect a single string from the database
		{
		// Log how the function was called
			$this->func_call = "\$db->get_string(\"$query\",$x,$y)";
			// If there is a query then perform it if not then use cached results..
			if ( $query )
			{
				$this->query($query);
			}
			// Extract var out of cached results based x,y vals
			if ( $this->last_result[$y] )
			{
				$values = array_values(get_object_vars($this->last_result[$y]));
			}
			// If there is a value return it else return null
			return @$values[$x]?$values[$x]:null;
		}
	
	
	
	
public function ENCODER($value,$type)
{
  if(!strlen($value)){
  // function still under build
    return NULL;
  }else{
    // remove all nonsense that may allow injection
			$value = trim($value);
         $value = htmlentities(stripslashes($value));
		$value = mysql_real_escape_string($value);
		$value = htmlspecialchars_decode($value);
      return $value;
    }
}

public function LoopOptions($tablename,$rowid,$columname){					 
// call example: LoopOptions($tablename='school_year',$rowid='id',$columname='name');
			  global $pdo; 
			  $loopmyoptions = "SELECT * FROM $tablename ORDER BY $rowid";
			   	$stmt = $pdo->prepare($loopmyoptions);
                $stmt->execute();
                        while($optionlist = $stmt->fetch(PDO::FETCH_ASSOC)){
				print '<option value="'.$optionlist[$rowid].'">'.$optionlist[$columname].'</option>';
}
}// END LoopOptions


// Loop Options where form have selected value
public function LoopOptionsTag($tablename,$rowid,$columname,$local_id){	
  global $pdo; 
//$Set_title->LoopOptionsTag($tablename='static_bio_title',$rowid='id',$columname='name',$local_id=$profile_title);
		  $loopmyoptions = "SELECT * FROM `$tablename` ORDER BY $rowid";
	$stmt = $pdo->prepare($loopmyoptions);
                $stmt->execute();
                        while($optionlist = $stmt->fetch(PDO::FETCH_ASSOC)){
                 if($optionlist[$rowid]==$local_id){
				$tag='selected="selected"';
				}else{$tag=' ';}
			echo '<option value="'.$optionlist[$rowid].'" '.$tag.'>'.$optionlist[$columname].'</option>';
}								

}// END LoopOptionsTag



public function LoopTerminalTag($tablename,$state,$rowid,$columname,$local_id){	
  global $pdo; 
//$looper->LoopTerminalTag($tablename='book_terminals',$state,$rowid='id',$columname='name',$local_id=$tag);
		  $loopmyoptions = "SELECT * FROM `$tablename` WHERE `location`='$state' ORDER BY $rowid";
	$terminaltool = $pdo->prepare($loopmyoptions);
                $terminaltool->execute();
                        while($optionlist = $terminaltool->fetch(PDO::FETCH_ASSOC)){
                 if($optionlist[$rowid]==$local_id){
				$tag='selected="selected"';
				}else{$tag=' ';}
			echo '<option name="'.$optionlist[$rowid].'" id="'.$optionlist[$rowid].'" value="'.$optionlist[$rowid].'" '.$tag.'>'.$optionlist[$columname].'</option>';
}								

}// END LoopOptionsTag















public function PickDate($input,$mydate){
// we have html5 date format
// yyyy-mm-dd
if($mydate=='yyyy'){
return substr($input, 0, 4);// yyyy
}elseif($mydate=='mm'){
return substr($input, 5, 2);// mm
}elseif($mydate=='dd'){
return substr($input, -2);//dd
}else{
return false;
}
}

/*
public function CountList($table,$value,$colum){
// check if a system exist in the db
$counter = query("SELECT * FROM $table WHERE $value = $colum");
if(mysql_num_rows($counter)>0){
return true;
}else{
return false;
}


} */


}// End Publicans



class Admissions extends publicans{
final function sendEmail($sr_std,$subject,$message,$application_table){
// sent email to student telling him congratulation on admission// includo/admission/admit.php	
	// you have the student reg no, collect his email from the admission application table
	$publicans= new publicans();
	
$student_email = "ifihear@gmail.com"; //$publicans->get_string("SELECT `studentbio_email` FROM $application_table WHERE `studentbio_id`='$sr_std'");
		// WE CAN ADD THIS EMAIL DETAIL INTO TEMPORARY DATABASE AND USE CRONE JOB PROCESS IT. THIS WILL BE FASTER TO SEND THE MAIL TO THE SPECIFIC STUDENT
	@mail($student_email,$subject,$message);
}
final function AutomateMatric($asignreg,$sr_std){//$sr_std is the student id, but we need pass more features to complete this function
//assign reg no automatically: algorithm is needed from school
	// we might collect his department, faculty and other function and determine how to auto assign it here// includo/admission/admit.php
$MatricNo=$asignreg;
	
	return $MatricNo;
	}


}// admissions ends


class Profiles extends publicans{




}// admissions ends

/*
class CoreAdmin extends publicans{
function makeDir($path){ 
// create a folder if not existing
return is_dir($path) || mkdir($path);
}

}// coreadmin ends
*/

class DBCount extends Helen{
/// COUNT DATA IN TABLES

function CountApplicants($d_id,$my_batch_id,$faculty_table){ //CountApplicants($department,$batch,$table)
$countcandidates = query("SELECT * FROM $faculty_table WHERE department=$d_id AND batch=$my_batch_id");
echo mysql_num_rows($countcandidates);	
}
function CountALL($query){ // give him a query to return colum number
echo mysql_num_rows($query);
}

private function MYCounter($sql){
	//SELECT COUNT(username) AS num FROM admins 
		global $pdo; 
		 try {
    $CTool = $pdo->prepare($sql);	
    $CTool->execute();
    $row = $CTool->fetch(PDO::FETCH_ASSOC);
		 return $row['num'];}catch (Exception $e) {
  //die("SQL ERROR" . $e->getMessage());
    die(sqlEr);

  
}}

// count all the students in adepartment given department id
public function CountStudentsInDepartment($faculty,$dept,$currenty){
	global $pdo; 
	$facutybiotable = $this->dbstr('student_grade_yr_table','core_faculty',"`id`='$faculty'");
		// we are counting current student
		$sql= "SELECT COUNT(student) AS num FROM `$facutybiotable` WHERE `department`=$dept AND school_year = $currenty";

$answer= $this->MYCounter($sql);
	return $answer;
}

// count lecturers in department
public function CountStaff($dept,$type){
	global $pdo; 
			// we are counting active staff, 1 is lecturers 2 is non teaching staff

	if($dept==0){
		// we are counting all staff for lecturer or non teaching
		$sql= "SELECT COUNT(web_users_username) AS num FROM `web_staff` WHERE core_active = 1 AND static_staff_type=$type";
	}else{
$sql= "SELECT COUNT(web_users_username) AS num FROM `web_staff` WHERE `core_department`=$dept AND core_active = 1 AND static_staff_type=$type";
	
	}
		
		$answer= $this->MYCounter($sql);
	return $answer;
}

//  count all curreent students in school with a loop
function CountEntireStudents($sel){// used in logon.php

		global $pdo; 
	// know our current year
	$current_y = $this->dbstr('current_year','core_config',"id = '1'");
	$answer = 0;		
   	// slect all form faculty,


	try{
  $loopmyoptions = "SELECT * FROM core_faculty";
			   	$stmt = $pdo->prepare($loopmyoptions);
                $stmt->execute();
                        while($optionlist = $stmt->fetch(PDO::FETCH_ASSOC)){
	                       $optionlist=$optionlist['student_grade_yr_table']; // eg we have ten faculty
						   // looping through the faculties, count all students in current
						   
						   if($sel=='all'){// THESE QUERIES NEED VALIDATION FROM SCHOOL METHODOLOGY
                            $RegTool = $pdo->prepare("SELECT COUNT(student) AS num FROM $optionlist WHERE school_year=$current_y");	
                           }elseif($sel=='de'){
							   // direct entry students are those in second yr
							$RegTool = $pdo->prepare("SELECT COUNT(student) AS num FROM $optionlist WHERE school_year=$current_y AND year_of_study=2 and stage=1");
						   }else{
						$RegTool = $pdo->prepare("SELECT COUNT(student) AS num FROM $optionlist WHERE school_year=$current_y AND year_of_study=1");	
  
						   }

						   $RegTool->execute();
                              $row = $RegTool->fetch(PDO::FETCH_ASSOC);
                               $answer = $answer+$row['num'];
						}
	} catch (Exception $e) {
	 // design this well to make sense
  die(ServeError( sqlEr .
  // conmment out in launch
  $e->getMessage()
  
  
  ));
}
						
						return $answer;	
}










}// dbcount ends




?>