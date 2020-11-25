<?php 
// javascript to update the title automatically 
if(defined('CTitler')){
// a context title is defined inside the page to use in title tag	
	?>
	<script>
   document.title = '<?php echo sitename;?> ::. <?php echo CTitler;?> » <?php echo PTitle;?> » <?php echo sitefullname;?>';
</script>
<?php }?>