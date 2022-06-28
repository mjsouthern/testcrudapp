<?php require APPROOT . '/views/inc/header.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed" onload="HTMLtoPDF()">





    <div id="resultcard">
        <div class="text-center">
            <h6><strong>SAINT MICHAEL COLLEGE OF CARAGA</strong></h6>
            <h6>Atupan St. Nasipit Agusan del Norte</h6><br>
            <h6><strong>OFFICE OF THE HUMAN RESOURCE AND DEVELOPMENT</strong></h6>
            <h6>Teacher's Performance Evaluation Result</h6>
            <h6>SY <h6 id="schoolyear"></h6>&nbsp;<h6 id="semester"></h6></h6> 

        </div>
    </div>

</body>

 <!-- Required Script --> 
<?php require APPROOT . '/views/inc/footer.php'; ?>
<?php require APPROOT . '/views/inc/generic-script.php'; ?>

 <!-- Optional Script -->
<script src="<?php echo URLROOT; ?>/dist/js/evaluation_result/evaluation-detailed-print.js"></script>
<script src="<?php echo URLROOT; ?>/dist/js/jspdf.js"></script>
<script src="<?php echo URLROOT; ?>/dist/js/pdfFromHTML.js"></script>


