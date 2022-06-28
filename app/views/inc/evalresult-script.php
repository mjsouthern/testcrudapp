<script src="<?php echo URLROOT; ?>/dist/js/jspdf.js"></script>
<script src="<?php echo URLROOT; ?>/dist/js/pdfFromHTML.js"></script>
<script src="<?php echo URLROOT; ?>/dist/js/evaluation_result/evaluation-results.js"></script>

<script type="text/javascript">
$(function() {	
    
    $("#result-opt").addClass("menu-open");

    switch('<?php echo $data; ?>') {
	  case 'Students':
	   $("#stud").addClass("active");
	   break;
	  case 'Faculty':
	   $("#faculty").addClass("active");
	   break;
	  case 'Immediate Head':
	   $("#head").addClass("active");
	   break;
	}
});
</script>
