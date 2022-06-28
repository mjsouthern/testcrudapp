<?php require APPROOT . '/views/inc/header.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed">
<div class="wrapper">

<?php require APPROOT . '/views/inc/page-sidenavbar.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-8">
            <h1 class="m-0 text-dark">Overview - Evaluation Results (<?php echo $data; ?>)</h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo URLROOT ;?>/evaluationresults/students">Summary</a></li>
              <li class="breadcrumb-item"><a href="<?php echo URLROOT ;?>/evaluationresults/detailed/students">Detailed</a></li>
              <li class="breadcrumb-item"><a href="<?php echo URLROOT ;?>/evaluationresults/overall">Overall Result</a></li>
            </ol>
          </div>

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                 <h3 class="card-title">Summarized Evaluation Results</h3>
              </div>
              <div class="row">
                <div class="col-5">
                   <span class="right badge badge-success" id="loadstat"></span>
                </div>
                <div class="col-2"> 
                   <small>Department</small>
                    <select class="form-control" id="dept">
                      <option value="1">Elementary</option>
                      <option value="2">Highschool</option>
                      <option value="3">College</option>
                    </select>
                </div> 
                <div class="col-2"> 
                   <small>School Year</small>
                    <select class="form-control" id="sy">
                    </select>
                </div> 
                <div class="col-2"> 
                   <small>Semester</small>
                    <select class="form-control" id="sem">
                      <option value="1">1st Sem</option>
                      <option value="2">2nd Sem</option>
                    </select>
                </div> 
                <div class="col-1"> 
                   <small>Load Data</small>
                    <button type="button" class="btn btn-block btn-primary" id="loaddata"><i class="fas fa-spinner"></i></button>
                </div> 
              </div>
              <hr>
              <div class="row">
                  <span class="right badge badge-danger">Legend:</span>
              </div>
              <div class="row">
                <div class="col-4">
                  <small><strong>PAA</strong> - Professional Attitude and Appearance</small><br>
                  <small><strong>KSM</strong> - Knowledge of Subject Matter</small>
                </div>
                 <div class="col-4"> 
                  <small><strong>TS</strong> - Teaching Skills</small><br>
                  <small><strong>CM</strong> - Classroom Management</small>
                </div> 
                <div class="col-4"> 
                   <small><strong>GO</strong> - General Observation</small><br>
                   <small><strong>GEN AVG</strong> - General Average</small>
                </div>
              </div>

              <hr>
              <div class="row">
                  <span class="right badge badge-primary">Rating Equivalent:</span>
              </div>
              <div class="row">
                <div class="col-4">
                  <small><strong>5</strong> - Excellent</small><br>
                  <small><strong>4</strong> - Very Satisfactory</small>
                </div>
                 <div class="col-4"> 
                  <small><strong>3</strong> - Satisfactory</small><br>
                  <small><strong>2</strong> - Fair</small>
                </div> 
                <div class="col-4"> 
                   <small><strong>1</strong> - Poor</small>
                </div>
              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <table id="evaltbl" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Teacher's Name</th>
                  <th>PAA</th>
                  <th>KSM</th>
                  <th>TS</th>
                  <th>CM</th>
                  <th>GO</th>
                  <th>GEN AVG</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Teacher's Name</th>
                  <th>PAA</th>
                  <th>KSM</th>
                  <th>TS</th>
                  <th>CM</th>
                  <th>GO</th>
                  <th>GEN AVG</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modalLoading">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">PLEASE WAIT</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>fetching data from database&hellip;</p>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>

 <!-- Page Footer --> 
<?php require APPROOT . '/views/inc/page-footer.php'; ?>
</div>
</body>

 <!-- Required Script --> 
<?php require APPROOT . '/views/inc/footer.php'; ?>
<?php require APPROOT . '/views/inc/generic-script.php'; ?>

 <!-- Optional Script -->
<?php require APPROOT . '/views/inc/evalresult-script.php'; ?>


