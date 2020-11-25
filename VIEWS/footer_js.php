	
		<script type="text/javascript">
			<!-- Counting code -->
			$(document).ready(function(){
				// Way Points With Count To()
				$('.number-count').waypoint(function(down){
					if(!$(this).hasClass('stop-counter'))
					{
						$(this).countTo();
						$(this).addClass('stop-counter');
					}
				}, { 
					offset: '90%' 
				});
			});		
		</script>
		
		<script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('.r-slider .banner').revolution({
					delay:7000,
					startheight:400,
					startwidth:1000,
					startWithSlide:0,
		 
					fullScreenAlignForce:"off",
					autoHeight:"off",
		 
					shuffle:"off",
		 
					onHoverStop:"on",
		 
					thumbWidth:100,
					thumbHeight:50,
					thumbAmount:3,
		 
					hideThumbsOnMobile:"on",
					hideNavDelayOnMobile:1500,
					hideBulletsOnMobile:"off",
					hideArrowsOnMobile:"off",
					hideThumbsUnderResoluition:0,
		 
					hideThumbs:10,
					hideTimerBar:"on",
		 
					keyboardNavigation:"on",
		 
					navigationType:"bullet",
					navigationArrows:"solo",
					navigationStyle:"round",
		 
					navigationHAlign:"center",
					navigationVAlign:"bottom",
		 
					soloArrowLeftHalign:"left",
					soloArrowLeftValign:"center",
					soloArrowLeftHOffset:20,
					soloArrowLeftVOffset:0,
		 
					soloArrowRightHalign:"right",
					soloArrowRightValign:"center",
					soloArrowRightHOffset:20,
					soloArrowRightVOffset:0,
		 
		 
					touchenabled:"on",
					swipe_velocity:"0.7",
					swipe_max_touches:"1",
					swipe_min_touches:"1",
					drag_block_vertical:"false",
		 
					stopAtSlide:-1,
					stopAfterLoops:-1,
					hideCaptionAtLimit:0,
					hideAllCaptionAtLilmit:0,
					hideSliderAtLimit:0,
		 
					dottedOverlay:"none",
		 
					spinned:"spinner4",
		 
					fullWidth:"off",
					forceFullWidth:"off",
					fullScreen:"off",
					fullScreenOffsetContainer:"#topheader-to-offset",
		 
				});
			});
		</script>
		
		<!-- Custom JS. Type your JS code in custom.js file -->
		<script src="MYCORDOVA/js/custom.js"></script>
		
		<!-- 
		Style switcher. This is just for demo purpose only. 
		If you don't want remove the below line.
		Some of the features of style switcher won't work on offline. THey only work when you upload it to server 
		-->
		<!-- <script src="style-switcher/style-switcher.js"></script> -->