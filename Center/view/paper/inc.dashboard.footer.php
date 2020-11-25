<script type="text/javascript">
// on click, submit the answer via post, load new question
$('#SubmitAnswer').submit(function() {
	        // validate form if empty
			        $("#questions").slideUp(500);
		$(".result").html('');
		$.post("../CONTROLLER/SubmitAnswerAPI.php", $("#SubmitAnswer").serialize(), function(response) {
			//$('.result').html(response);
						$('#LoadQ').html(response);
						$('#questions').slideDown(500);
}); 
      return false;
    });
  </script>

 <center> <div id="LoadSubmitForm"></div>
<span class="submiter"> </span>
<form id="SubmitPaper" method="post" class="form-horizontal" role="form">
<input type="hidden" name="LoadSubmitForm"> </input><br>
<button type="submit" href="#" class="btn btn-green">Submit my paper</button>
<a href="<?php echo siteurl;?>Center/?Tera=ExamDASHBOARD&question=<?php echo $_GET['question'];?>#Dentals" target="_blank" title="Click here if something is going wrong" class="btn btn-white">Refresh [fix]</a>

</form>
</center>
<script type="text/javascript">
$('#SubmitPaper').submit(function() {
	$(".submiter").show();
		$(".submiter").html('..chill <img src="../CORDOVA/img/c_loader_gr.gif" />');
		$.post("../CONTROLLER/SubmitAnswerPaper.php", $("#SubmitPaper").serialize(), function(response) {
						$('#LoadSubmitForm').html(response);
						$('#LoadSubmitFormPOST').slideDown(500);
						$(".submiter").hide();
});                   
      return false;
    });
  </script>
