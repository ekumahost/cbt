<section class="card" id="QuetionForm" style="">
            <header class="card-header">
Upload Question from Excel 2007 (xlsx) 

</header>
<div class="col-md-6">
<br>
<form action="#" method="post" id="UploadQuestions">
<input type="file" name="ResultFile" class=""> </input> <button type="submit" class="btn btn-success" value="">upload </button>
<input type="hidden" name ="UploadQuestions" value="1"/>
<input type="hidden" name="QuestionTable" value="<?php echo $question_table;?>"/>
<input type="hidden" name="Exam_id" value="<?php echo $id ;?>"/>
<input type="hidden" name="TotalQ" value="<?php echo $list['total_question'];?>"/>

</form>
</div>         
<hr>
	<div class="card-block">
<span class="result"> </span>		
</div>
		<br><br>
			<div class="card-block">
			<h3>Tutorial</h3>
			Follow our format, <a href="#">tutorial</a>
			A-E is options F is correct answer, G is your question. please make sure the questions are complete before upload please download sample xlsx excel file
			<br>
			<h5>Conditions </h5>
<p>Options A and B must be set </p>			
<p>Question must be set </p>			
<p>QAnswer must be set </p>
if any of the conditions above is not met, the question will be ignored			
<br>
		<br>
<h4>Sample XLSX Question file <a href="sampleQuestionExcelSS2English.xlsx" target="new">Download!</a> </h4>
		<article class="post-announce">

			<div class="post-announce-pic">

			<img src="sample.PNG" /> </div></article>
            </div><br><br><br>
        </section>
		
		
		<script type="text/javascript">
$(document).ready(function (e){

// HANDLE FORM WITH IMAGES UPLOAD
 function getDoc(frame) {
     var doc = null;
     
     // IE8 cascading access check
     try {
         if (frame.contentWindow) {
             doc = frame.contentWindow.document;
         }
     } catch(err) {
     }

     if (doc) { // successful getting content
         return doc;
     }

     try { // simply checking may throw in ie8 under ssl or mismatched protocol
         doc = frame.contentDocument ? frame.contentDocument : frame.document;
     } catch(err) {
         // last attempt
         doc = frame.document;
     }
     return doc;
 }



$("#UploadQuestions").submit(function(e)
{
  $(".result").html("just chill, lets do our work...<img src='../CORDOVA/img/c_loader_gr.gif'/>");
    var formObj = $(this);
	var formURL = formObj.attr("action");// FORM ACTION

if(window.FormData !== undefined)  // for HTML5 browsers
//	if(false)
	{
	
		var formData = new FormData(this);
		$.ajax({
        	url: '../CONTROLLER/UploadQuestionAPI.php?RunUploads=',
	        type: 'POST',
			data:  formData,
			mimeType:"multipart/form-data",
			contentType: false,
    	    cache: false,
        	processData:false,
			success: function(data, textStatus, jqXHR)
		    {
					$(".result").html(data);
		    },
		  	error: function(jqXHR, textStatus, errorThrown) 
	    	{
				$(".result").html('<pre><code class="prettyprint">Server submiting failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
	    	} 	        
	   });
        e.preventDefault();
        e.unbind();
   }
   else  //for olden browsers
	{
		//generate a random id
		var  iframeId = 'unique' + (new Date().getTime());

		//create an empty iframe
		var iframe = $('<iframe src="javascript:false;" name="'+iframeId+'" />');

		//hide it
		iframe.hide();

		//set form target to iframe
		formObj.attr('target',iframeId);

		//Add iframe to body
		iframe.appendTo('body');
		iframe.load(function(e)
		{
			var doc = getDoc(iframe[0]);
			var docRoot = doc.body ? doc.body : doc.documentElement;
			var data = docRoot.innerHTML;
			$(".result").html(data);
		});
	
	}

});


});
	  </script>	
										