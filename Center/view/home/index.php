<?php 

if(isset($_GET['type'])){
	
	switch($_GET['type']){
		case 'upcoming': 
$examstatus = '0';
break;
		
		case 'past': 
$examstatus = '2';
break;

	case 'suspended': 
$examstatus = '3';
break;
	
	default:
	$examstatus = '1';

		
	}
	
}else{

$examstatus = '1';
}

include('live.php');	

