<?php
include_once('connect.php');
class Helen{
public function PAGEREDIRECT($url){
// use js to redirect pages, dont run into php header set issue
echo '<script type="text/javascript">
<!--
window.location = "'.$url.'"
//-->
</script>';
}


public function JSGet($url){
// use js to redirect pages, dont run into php header set issue
echo '<script type="text/javascript">
<!--
	 $.get("'.$url.'", function(data, status){
    });
//-->
</script>';
}


public function MYCount($sql){
	//SELECT COUNT(username) AS num FROM admins
		global $pdo;
		// please catch exception and return null, or 0

    $RegTool = $pdo->prepare($sql);
    $RegTool->execute();
    $row = $RegTool->fetch(PDO::FETCH_ASSOC);
   return $row['num'];
}


public function GetScoreColor($grade, $total){
	// given grade as score, and total
	// from percentage get color
	  $a = $this->SweetPercentage($grade,$total);
	  if($a<=39){
		// that is F with bigh red
		return '<font color="red"> ('.floor($a).'%) [ F ]</font>';
	  }elseif($a>=40 && $a<=49){
		// that is F with bigh red
		return '<font color="black"> ('.floor($a).'%) [ E ]</font>';
	  }elseif($a>=50 && $a<=59){
		// that is F with bigh red
		return '<font color="yellow"> ('.floor($a).'%) [ C ]</font>';
	  }elseif($a>=60 && $a<=69){
		// that is F with bigh red
		return '<font color="blue"> ('.floor($a).'%) [ B ]</font>';
	  }elseif($a>=70 && $a<=100){
		// that is F with bigh red
		return '<font color="green"> ('.floor($a).'%) [ A ]</font>';
	  } else{
		  		return '<font color="red">invalid</font>';
 }



}




public function ordinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
}


public function GetMax($sql){
	//SELECT MAX(username) AS num FROM admins
		global $pdo;
    $RegTool = $pdo->prepare($sql);
    $RegTool->execute();
    $row = $RegTool->fetch(PDO::FETCH_ASSOC);
   return $row['num'];
}





public function SweetPercentage($a,$b){
	// return zero if we get a division by zero when computing percentage
  //try{
if($b==0){
	return 0;
}else{
  return $answer = ($a/$b)*100;
}

}



public function getSex($sex){
	if($sex=='m'){
		return 'Male';
	}elseif($sex=='f'){return 'Female';}else{return 'None';}
}

public function getAge($age){
	// return age from given date from db
	return floor((time() - strtotime($age)) / 31556926);// 31556926 secods = 1yr
}

public function getPeriod($date,$current){

$diff = abs(strtotime($date) - strtotime($current));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

if($years==0){
printf("%d months, %d days ago\n", $months, $days);
}else{
printf("%d years, %d months, %d days ago\n", $years, $months, $days);

}
}




public function strIsEmpty($str){
		return strlen(trim($str))==0? true: false;
	}

public function setTrial(){
	if(!isset($_SESSION['TRIAL'])){
$_SESSION['TRIAL'] = 1;
}else{
$_SESSION['TRIAL'] = $_SESSION['TRIAL']+1;
 echo $_SESSION['TRIAL'] .' times!';
}
}

public function unsetTrial(){
unset($_SESSION['TRIAL']);
 unset($_SESSION['SLEEP']);

}




public function brutecheck(){
	if(isset($_SESSION['TRIAL'])){

	if($_SESSION['TRIAL']>5){
		echo '<font color="red">Out of Idea, you have entered several bad password and is now locked out </font>';
		exit;
	}}}


	public function AlertFormError($str){
	 echo '<div class="alert alert-danger alert-icon alert-close alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"> × </span>
							</button>
							<i class="font-icon font-icon-warning"></i>'.$str.'</div>';

	}

	public function ButtonShow($buttonid){
		echo "<script>  $('#".$buttonid."').show(); </script>";

		}

		public function ResetForm($formid){
		echo "<script>  $('#".$formid."')[0].reset(); </script>";

		}

	public function AlertFormSuccess($str){

		echo '<div class="alert alert-success alert-no-border alert-close alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>'.$str.'</div>';
               self::ResetForm('logonForm');


	}





	public function RenderHelp($u,$title,$str){
		//$tool->RenderHelp(ur,HelpTitle,CreatingFaculty);

		//$title,$str
		/// alert help by choki
		// put image
	print '<img align="right" title="Need Help? Click me!" class="'.$u.'" width="30" height="30" src="../CORDOVA/img/smile.png" />		
	    <script>$(".'.$u.'").click(function(e){
		e.preventDefault();
		swal({
			title: "'.$title.'",
			text: "'.strip_tags($str).'",
			confirmButtonClass: "btn-success",
			imageUrl: "../CORDOVA/img/smile.png"
		});
	});</script>';
	}


// ENCODE THE URL: for connecting specific id from mail inbox id
public function EncodeToken($id){
$letters = 'AaBbCc67b8eFl90DdENfG67Mm89gHIV8h90qR12yZ34vYx';// 46 strings
$numbers = '01g23g45isTtUu0j13JjKkLnOoPpQrS45v12i34f56WwXx78h9'; // 50 strings
@$a = str_shuffle(substr($numbers, mt_rand(0, (strlen($numbers) - 14)), 4));
@$b = str_shuffle(substr($letters, mt_rand(0, (strlen($letters) - 14)), 4));
@$c = str_shuffle(substr($letters, mt_rand(0, (strlen($letters) - 14)), 4));
@$d = str_shuffle(substr($numbers, mt_rand(0, (strlen($numbers) - 14)), 4));
@$e = str_shuffle(substr($numbers, mt_rand(0, (strlen($numbers) - 14)), 4));
@$f = str_shuffle(substr($letters, mt_rand(0, (strlen($letters) - 14)), 4));
 echo $a.$b.$c.$d.$id.$e.$f.$a.$b;
}
public function EncoderToken($id){
$letters = 'AaBbCc67b8eFl90DdENfG67Mm89gHIV8h90qR12yZ34vYx';// 46 strings
$numbers = '01g23g45isTtUu0j13JjKkLnOoPpQrS45v12i34f56WwXx78h9'; // 50 strings
@$a = str_shuffle(substr($numbers, mt_rand(0, (strlen($numbers) - 14)), 4));
@$b = str_shuffle(substr($letters, mt_rand(0, (strlen($letters) - 14)), 4));
@$c = str_shuffle(substr($letters, mt_rand(0, (strlen($letters) - 14)), 4));
@$d = str_shuffle(substr($numbers, mt_rand(0, (strlen($numbers) - 14)), 4));
@$e = str_shuffle(substr($numbers, mt_rand(0, (strlen($numbers) - 14)), 4));
@$f = str_shuffle(substr($letters, mt_rand(0, (strlen($letters) - 14)), 4));
 return $a.$b.$c.$d.$id.$e.$f.$a.$b;
}



public function DecodeToken($idurl){
$collect = substr($idurl, 16, strlen($idurl)-32);
//$collect = substr($idurl,16,-16);


if(!is_numeric($collect)){
	$this->PAGEREDIRECT('??offence=Removed String From URL');
//$this->PAGEREDIRECT(dashboard.'?offence=Deleted String From URL');
}elseif(strlen($idurl)<33){
$this->PAGEREDIRECT('??offence=Removed String From URL');
}elseif(empty($collect)){
	$this->PAGEREDIRECT('??offence=Removed String From URL');
}else{
return $collect;
}
}

// we do not trust if these form alerts where used anywhere
public function Error($str){
echo '<div class="alert alert-danger alert-icon alert-close alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<i class="font-icon font-icon-warning"></i>
							Error: '.$str.'</div>';
}

		public function SimpleError($str){
	 echo '<div class="alert alert-danger alert-border-left alert-close alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							</button>
							<strong>Heads Up! </strong>'.$str.'</div>';

	}

	public function Success($str){
echo '<div class="alert alert-success alert-icon alert-close alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<i class="font-icon font-icon-warning"></i>
							Success! '.$str.' </div>';
}


	public function Warn($str){
echo '<div class="alert alert-warning alert-icon alert-close alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							</button>
							<i class="font-icon font-icon-warning"></i>
							'.$str.'</div>';
}

public function PasswordEncrypt($password){
	global $Okokoh;
	return md5($password.'-'.$Okokoh);
}

public function SoftPasswordEncrypt($password){
	//global $Okokoh;
	return md5($password);
}



// decrypt the pasword during login
 public function PasswordDecrypt($password, $hash) {
global $Okokoh;
  $mypasshash= $this->PasswordEncrypt($password);
 		  if($mypasshash==$hash){
		return true;}else{return false;}

		}


		// for cbt student login
		 public function SoftPasswordDecrypt($password, $hash) {
//global $Obiasogu;
  $mypasshash= $this->SoftPasswordEncrypt($password);
 		  if($mypasshash==$hash){
		return true;}else{return false;}

		}





public function secureStr($string) {
		//global $pdo;
		$string = htmlentities(stripslashes(trim($string)));
		//$string = $pdo->quote($string);
		return $string;
	}

public function dbClean($string) {
		//global $pdo;
		$string = htmlentities(stripslashes($string));
		//$string = $pdo->quote($string);
		return $string;
	}


	public function HTMLEncoder($string) {// summernote control
		//$string = htmlentities(htmlspecialchars($string));
				$string = htmlentities($string);

		return $string;
	}
	public function HTMLDencoder($string) {// summernote control
		$string = html_entity_decode(htmlspecialchars_decode($string));
		return $string;
	}


protected function cleanStr($string) {
		//global $pdo;
		$string = htmlentities(stripslashes($string));
		//$string = $pdo->quote($string);
		return $string;
	}

public function LogonCheck(){
	// check if user is logged on

	//if(!isset($_SESSION['UserPresh']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
   // $this->PAGEREDIRECT('login');

   // exit;
//}
}

public function GetValue($value,$table,$id,$index){
	global $pdo;
// return a sinlge value from table colum
$query = "SELECT `$value` FROM `$table` WHERE `$id`= :index";
$stmt = $pdo->prepare($query);
//Bind value.
$stmt->bindValue(':index', $index);
 //Execute.
$stmt->execute();
    //Fetch row.
 $user = $stmt->fetch(PDO::FETCH_ASSOC);
 // return single value
 return $user[$value];


}

public function GetData($value,$table){
// collect specific data from a particular table with website detail
$id ='id';
$ind = '1';
echo $this->GetValue($value,$table,$id='id',$index=$ind);
}


public function dbstr($col,$table,$_sql){
// collect one data from table specified
// sample:  $faculyname=$tool->dbstr('name','core_faculty',"id = '$faculty'");

global $pdo;

try{
$query = "SELECT `$col` FROM `$table` WHERE $_sql";
$stmt = $pdo->prepare($query);
$stmt->execute();
 $user = $stmt->fetch(PDO::FETCH_ASSOC);
 return $user[$col];
}catch (Exception $e) {
	 // design this well to make sense
  die(ServeError( TableError .
  // conmment out in launch
  $e->getMessage()
  ));
}}




public function ColumSumWhere($col,$table,$_sql){
// colect the sum of a colum
// sample:  $faculyname=$tool->ColumSum('name','core_faculty',"id = '$faculty'");
global $pdo;

try{
$query = "SELECT SUM(`$col`) as colsum FROM `$table` WHERE $_sql";
$stmt = $pdo->prepare($query);
$stmt->execute();
 $user = $stmt->fetch(PDO::FETCH_ASSOC);
 return $user['colsum'];
}catch (Exception $e) {
	 // design this well to make sense
  die(ServeError( TableError .
  // conmment out in launch
  $e->getMessage()
  ));
}}

}











class CoreAdmin extends Helen{
	function makeDir($path){
// create a folder if not existing
return is_dir($path) || mkdir($path);
}
}

// a function to decode MIME message header extensions and get the text from inbox
function decode_imap_text($str){
    $result = '';
    $decode_header = imap_mime_header_decode($str);
    foreach ($decode_header AS $obj) {
        $result .= htmlspecialchars(rtrim($obj->text, "\t"));
	}
    return $result;
}




?>
