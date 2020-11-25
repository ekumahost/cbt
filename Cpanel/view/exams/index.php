
<header class="section-header">
				<div class="tbl">
					<h3><?php //echo CTitler;?></h3>
					<ol class="breadcrumb breadcrumb-simple">
						<li><a href="#">Home</a></li>
						<li>
						
<?php if(isset($_GET['Model'])){
	
	echo '<a href="?Tera=Exams&Model='.$_GET['Model'].'">'.$_GET['Model'].'</a>';

}?>						
						</li>
					</ol>
				</div>
			</header>
  
	
		<a id="BASE"></a>
<h3>Exams &raquo;<?php if(isset($_GET['Model'])){ echo $_GET['Model'];
	
}?></h3>
			<?php 
			
			if(isset($_GET['Model'])){
			
			switch($_GET['Model']){
				
				case 'Manage':
			include('ManageExams.php');
			break;
			
			case 'ControlExam':
			include('ControlExam.php');
			break;
			
			
					case 'AddExams':
			include('AddExams.php');
			break;
				
						case 'AddCBT':
			include('AddCBT.php');
			break;
				
				default:
	          REDIRECT('?404');

			
			}//switch
			
			
			}else{
			include_once('home.php');
			}

			?>

	
