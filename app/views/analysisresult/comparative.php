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
            <h1 class="m-0 text-dark">Comparative - Results Analysis (<?php echo $data; ?>)</h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo URLROOT ;?>/analysisresults/comparative/analysis1/students">Analysis 1</a></li>
              <li class="breadcrumb-item"><a href="<?php echo URLROOT ;?>/analysisresults/comparative/analysis2/students">Analysis 2</a></li>
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
                 <h3 class="card-title"><strong>Analysis 1</strong> - By Performance Evaluation Areas</h3>
              </div>
              <div class="row">
                <div class="col-4"> 
                   <small>Search Teacher</small>
                   <input type="text" class="form-control" id="teachername" placeholder="Enter Lastname">
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
                <div class="col-5">
                    <small>Areas</small>
                    <select class="form-control" id="areas">
                      <option value="PAA">Professional Attitude and Appearance</option>
                      <option value="KSM">Knowledge of Subject Matter</option>
                      <option value="TS">Teaching Skills</option>
                      <option value="CM">Classroom Management</option>
                      <option value="GO">General Observation</option>
                    </select>
                </div>
                
                <div class="col-1"> 
                   <small>Load Data</small>
                    <button type="button" class="btn btn-block btn-primary" id="loaddata"><i class="fas fa-spinner"></i></button>
                </div> 
              </div>

              <hr>

              <table id="searchtbl" class="table table-bordered table-hover hidden">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Teacher's Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="datanameteacher">
                </tbody>

              </table>

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
              <hr>
              <div class="row">
                  <span class="right badge badge-danger">Legend:</span>
              </div>
              <div class="row">
                <div class="col-3">
                  <small><strong>2016-2017 S1</strong> - SY 2016-2017 1st sem</small><br>
                  <small><strong>2016-2017 S2</strong> - SY 2016-2017 2nd sem</small>
                </div>
                 <div class="col-3"> 
                  <small><strong>2017-2018 S1</strong> - SY 2017-2018 1st sem</small><br>
                  <small><strong>2017-2018 S2</strong> - SY 2017-2018 2nd sem</small>
                </div> 
                <div class="col-3"> 
                   <small><strong>2018-2019 S1</strong> - SY 2018-2019 1st sem</small><br>
                   <small><strong>2018-2019 S2</strong> - SY 2018-2019 2nd sem</small>
                </div>
                <div class="col-3"> 
                   <small><strong>2019-2020 S1</strong> - SY 2019-2020 1st sem</small><br>
                   <small><strong>2019-2020 S2</strong> - SY 2019-2020 2nd sem</small>
                </div>
              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                  <canvas id="comparativeanalysis" style="height: 350px;"></canvas>
                </div>
              </div>
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
  
 <!-- Page Footer --> 
<?php require APPROOT . '/views/inc/page-footer.php'; ?>
</div>
</body>

 <!-- Required Script --> 
<?php require APPROOT . '/views/inc/footer.php'; ?>
<?php require APPROOT . '/views/inc/generic-script.php'; ?>

 <!-- Optional Script -->
<?php require APPROOT . '/views/inc/analysisresult-script.php'; ?>


