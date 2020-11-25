<script>
//  <!-- http://tutorialzine.com/2011/12/countdown-jquery/ -->	
	$(function(){
	var timers = $('#BenExamTime'),
		ts = new Date(2015, 0, 1),
		newYear = true;
	if((new Date()) > ts){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		//ts = (new Date()).getTime() + 10*24*60*60*1000;
		ts = (new Date()).getTime() + <?php echo $time_left;?>*1000;

		newYear = false;
	}
		
	$('#countdown').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			//message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += ( days==0 ? '':days ) + " ";
			message += ( hours==0 ? '':hours + ( hours==1 ? 'hr, ':'hrs, ' ));// + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " min" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " sec" + ( seconds==1 ? '':'s' ) + " <br />";
			
			
			if((days==0) && (hours ==0) &&(minutes==25) && seconds==0){
				alert('25 mins to go, hurry up brother');
			}
			
			
			if((days==0) && (hours ==0) &&(minutes==10) && seconds==0){
				alert('10 mins to go, hurry up brother');
				// we can set his time color to red
				
				
			}
			
			if((days==0) && (hours ==0) &&(minutes==0) && seconds==0){
				//alert('Time Up, there is nothing you can do');
				// we can redirect him, or make a get request here
				
				 $.get("../CONTROLLER/SubmitAnswerPaper.php?SubmitFinalPaper=true", function(data, status){
        //alert("Data: " + data + "\nStatus: " + status);
    });
	
	<?php 
	echo 'window.location = "'.$url.'"';?>
			}
			
			//message += "left to submit paper!";
		
			
			timers.html(message);
		}
	});
	
});
</script>