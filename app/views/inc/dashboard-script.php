<script src="<?php echo URLROOT; ?>/dist/js/pages/dashboard-js.js"></script>
<script type="text/javascript">
$(function() {
  	var uname, uid, p;

  	uname = '<?php echo $_SESSION['name']; ?>';
  	uid = '<?php echo $_SESSION['user_id']; ?>';
    p = '<?php echo $_SESSION['p']; ?>';
  	flog = <?php echo $_SESSION['flog']; ?>;

    localStorage.setItem("uname", uname);
    localStorage.setItem("user_id", uid);
    localStorage.setItem("p", p);

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    if (flog==1) {
	      Toast.fire({
	        type: 'success',
	        title: 'Successfully logged-in as: ' + uname 
	      })
	    <?php $_SESSION['flog'] = 0; ?>

      localStorage.setItem("urlroot","<?php echo URLROOT;?>");
    }

    $("#dashboard-nav").addClass("active");

});
</script>


