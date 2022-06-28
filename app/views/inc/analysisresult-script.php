<script src="<?php echo URLROOT; ?>/dist/js/analysisresult/comparative.js"></script>

<script type="text/javascript">
$(function() {

    $("#resultanalysis-opt").addClass("menu-open");

    switch('<?php echo $data; ?>') {
	  case 'Students':
	   $("#stud1").addClass("active");
	   break;
	  case 'Faculty':
	   $("#faculty1").addClass("active");
	   break;
	  case 'Immediate Head':
	   $("#head1").addClass("active");
	   break;
	}
});
</script>
