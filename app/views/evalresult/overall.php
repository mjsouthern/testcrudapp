<?php require APPROOT . '/views/inc/header.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo URLROOT; ?>/" class="brand-link">
      <img src="<?php echo URLROOT; ?>/dist/img/CATPER.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">CA-TPER</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo URLROOT; ?>/dist/img/user2-160x160.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo  $_SESSION['name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                My Account
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link" id="account_setting">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT ;?>/users/logout" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Log out</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo URLROOT ;?>/dashboards" class="nav-link" id="dashboard-nav">
                <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-header">TEACHER'S EVALUATION MODULE</li>

          <li class="nav-item has-treeview" id="result-opt">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-poll"></i>
              <p>
                Evaluation Results
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo URLROOT ;?>/evaluationresults/detailed/students" class="nav-link" id="stud">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT ;?>/evaluationresults/detailed/faculty" class="nav-link" id="faculty">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Faculty</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT ;?>/evaluationresults/detailed/head" class="nav-link" id="head">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Immediate Head</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview" id="resultanalysis-opt">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-poll"></i>
              <p>
                Comparative Analysis
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo URLROOT ;?>/analysisresults/comparative/analysis1/students" class="nav-link" id="stud">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT ;?>/analysisresults/comparative/analysis1/students" class="nav-link" id="faculty">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Faculty</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT ;?>/analysisresults/comparative/analysis1/students" class="nav-link" id="head">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Immediate Head</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-header">ADMIN ACCESS TOOLS</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Control Panel
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="modal" data-target="#setsydate">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Set School Year Dates</p>
                </a>
              </li>

            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-8">
            <h1 class="m-0 text-dark">Overall - Evaluation Results</h1>
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
                  <h3 class="card-title">Detailed Evaluation Results</h3>
              </div>
              <div class="row">
                <div class="col-3">
                    <small>Search Teacher</small>
                    <input type="text" class="form-control" id="teachername" placeholder="Enter Lastname">
                    <span class="right badge badge-success" id="loadstat"></span>
                </div>
                <div class="col-3">
                    <small>Areas</small>
                    <select class="form-control" id="areas">
                      <option value="PAA">Professional Attitude and Appearance</option>
                      <option value="KSM">Knowledge of Subject Matter</option>
                      <option value="TS">Teaching Skills</option>
                      <option value="CM">Classroom Management</option>
                      <option value="GO">General Observation</option>
                    </select>
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
                <div class="col-1"> 
                   <small>Semester</small>
                    <select class="form-control" id="sem">
                      <option value="1">1st</option>
                      <option value="2">2nd</option>
                    </select>
                </div> 
                <div class="col-1"> 
                   <small>Load Data</small>
                    <button type="button" class="btn btn-block btn-primary" id="loaddatadetailed"><i class="fas fa-spinner"></i></button>
                    
                </div> 
              </div>

              <hr>

              <table id="searchtbl" class="table table-bordered table-hover">
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

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                  <canvas id="overallresults" style="height: 350px;"></canvas>
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
<?php require APPROOT . '/views/inc/overallresult-script.php'; ?>


