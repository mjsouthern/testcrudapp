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
                  <h3 class="card-title">Detailed Evaluation Results</h3>
              </div>
              <div class="row">
                <div class="col-5">
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
            <div class="card-body hidden" id="resultcard">
                <div class="invoice p-3 mb-3">
                  <!-- title row -->
                  <div class="row">
                    <div class="col-3 text-right">
                        <img class="img-fluid mb-2" src="<?php echo URLROOT; ?>/dist/img/CATPER.png" alt="smcclogo">
                    </div>
                    <div class="col-6 text-center">
                        <h6><strong>SAINT MICHAEL COLLEGE OF CARAGA</strong></h6>
                        <h6>Atupan St. Nasipit Agusan del Norte</h6><br>
                        <h6><strong>OFFICE OF THE HUMAN RESOURCE AND DEVELOPMENT</strong></h6>
                        <h6>Teacher's Performance Evaluation Result</h6>
                        <h6>SY <u id="schoolyear"></u>&nbsp;<u id="semester"></u></h6> 
                      </h6>
                    </div>
                    <div class="col-3 text-left">
                        <img class="img-fluid mb-2" src="<?php echo URLROOT; ?>/dist/img/iso.png" alt="isologo">
                    </div>
                  </div>
                  <!-- info row -->
                  
                  <br><br>
                  <div class="row invoice-info">
                    <div class="col-sm-12 invoice-col">
                        <table>
                          <tr>
                            <td width="15%">Name of Teacher:</td>
                            <td width="60%"><strong><u id="tname"></u></strong></td>
                            <td width="25%">Number of Students Elevaluated:</td>
                            <td><strong><u id="countstudeval"></u></strong></td>
                          </tr>
                          <tr>
                            <td>Department:</td>
                            <td><strong><u id="departmentteacher"></u></strong></td>
                          </tr>
                        </table>
                    </div>
                  </div>

                  <br>

                  <div class="row">
                    <div class="col-sm-12">
                        <table>
                          <tr>
                            <td><strong>Rating Equivalent:</strong></td>
                          </tr>
                          <tr>
                            <td width="180px"><strong>5</strong> - Excellent</td>
                            <td width="180px"><strong>3</strong> - Satisfactory</td>
                            <td><strong>1</strong> - Poor</td>
                          </tr>
                          <tr>
                            <td><strong>4</strong> - Very Satisfactory</td>
                            <td><strong>2</strong> - Fair</td>
                          </tr>
                        </table>
                    </div>
                  </div>

                  <br>
                  <!-- Table row -->
                  <div class="row">
                    <div class="col-12 table-responsive">

                      <table class="table">
                        <thead>
                        <tr>
                          <th>PROFESSIONAL ATTITUDE AND APPEARANCE</th>
                          <th>Rating</th>
                          <th><button class="btn btn-primary" onclick="analyze_res('paa')"><i class="fas fa-chart-line"></i></button></th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1. Shows marked extraordinary enthuasiasm about his/her teaching</td>
                            <td id="A"></td>
                          </tr>
                          <tr>
                            <td>2. Punctual in the submission of required forms/plans</td>
                            <td id="B"></td>
                          </tr>
                          <tr>
                            <td>3. Endeavors to implement the school's objective</td>
                            <td id="C"></td>
                          </tr>
                          <tr>
                            <td>4. Intellectually humble and tolerant</td>
                            <td id="D"></td>
                          </tr>
                          <tr>
                            <td>5. Always clean and orderly in person, dress and habits</td>
                            <td id="E"></td>
                          </tr>
                          <tr>
                            <td>6. Well modulated voice</td>
                            <td id="F"></td>
                          </tr>
                          <tr>
                            <td>7. Capable of adjusting to changing conditions and situations</td>
                            <td id="G"></td>
                          </tr>
                          <tr>
                            <td>8. Consistently alert and emotionally mature</td>
                            <td id="H"></td>
                          </tr>
                          <tr>
                            <td>9. Punctual in class attendance/meetings and other school activities</td>
                            <td id="I"></td>
                          </tr>
                          <tr>
                            <td>10. Follows school rules and regulations</td>
                            <td id="J"></td>
                          </tr>
                          <tr>
                            <td>11. Performs other duties assigned outside of classroom work</td>
                            <td id="K"></td>
                          </tr>
                        </tbody>
                        <tfooter>
                            <tr>
                              <th>TOTAL</th>
                              <th id="PAATOTAL"></th>
                            </tr>
                        </tfooter>
                      </table>

                      <table class="table">
                        <thead>
                        <tr>
                          <th>KNOWLEDGE OF SUBJECT MATTER</th>
                          <th>Rating</th>
                          <th><button class="btn btn-primary" onclick="analyze_res('ksm')"><i class="fas fa-chart-line"></i></button></th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1. Prepares lesson well (lesson plans/devices/syllabi)</td>
                            <td id="L"></td>
                          </tr>
                          <tr>
                            <td>2. Has ample understanding/grasp of subject</td>
                            <td id="M"></td>
                          </tr>
                          <tr>
                            <td>3. Shows interest in subject matter</td>
                            <td id="N"></td>
                          </tr>
                          <tr>
                            <td>4. Welcomes questions/request/clarification</td>
                            <td id="O"></td>
                          </tr>
                          <tr>
                            <td>5. Organizes subject matter well</td>
                            <td id="P"></td>
                          </tr>
                          <tr>
                            <td>6. Select relevant material effectively</td>
                            <td id="Q"></td>
                          </tr>
                          <tr>
                            <td>7. Ability to relate subject matter to other fields</td>
                            <td id="R"></td>
                          </tr>
                        </tbody>
                        <tfooter>
                            <tr>
                              <th>TOTAL</th>
                              <th id="KSMTOTAL"></th>
                            </tr>
                        </tfooter>
                      </table>

                      <table class="table">
                        <thead>
                        <tr>
                          <th>TEACHING SKILLS</th>
                          <th>Rating</th>
                          <th><button class="btn btn-primary" onclick="analyze_res('ts')"><i class="fas fa-chart-line"></i></button></th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1. Speaks clearly and distincly</td>
                            <td id="S"></td>
                          </tr>
                          <tr>
                            <td>2. Speaks English-Flipino correctly</td>
                            <td id="T"></td>
                          </tr>
                          <tr>
                            <td>3. Makes lesson interesting</td>
                            <td id="U"></td>
                          </tr>
                          <tr>
                            <td>4. Explains subject matter clearly</td>
                            <td id="V"></td>
                          </tr>
                          <tr>
                            <td>5. Makes subject matter relevant to the course objectives</td>
                            <td id="W"></td>
                          </tr>
                          <tr>
                            <td>6. Makes subject matter relevant/practical to current needs</td>
                            <td id="X"></td>
                          </tr>
                          <tr>
                            <td>7. Uses techniques for student's participation</td>
                            <td id="Y"></td>
                          </tr>
                          <tr>
                            <td>8. Encourages critical thinking</td>
                            <td id="Z"></td>
                          </tr>
                          <tr>
                            <td>9. Provides appropriate drills/seatwork/assignments</td>
                            <td id="AA"></td>
                          </tr>
                        </tbody>
                        <tfooter>
                            <tr>
                              <th>TOTAL</th>
                              <th id="TSTOTAL"></th>
                            </tr>
                        </tfooter>
                      </table>


                      <table class="table">
                        <thead>
                        <tr>
                          <th>CLASSROOM MANAGEMENT</th>
                          <th>Rating</th>
                          <th><button class="btn btn-primary" onclick="analyze_res('cm')"><i class="fas fa-chart-line"></i></button></th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1. Commands student's respect</td>
                            <td id="BB"></td>
                          </tr>
                          <tr>
                            <td>2. Handles individual/group discipline tactfully</td>
                            <td id="CC"></td>
                          </tr>
                          <tr>
                            <td>3. Fair in dealing with students</td>
                            <td id="DD"></td>
                          </tr>
                          <tr>
                            <td>4. Gives attention to the physical arrangement and cleanliness of the classroom</td>
                            <td id="EE"></td>
                          </tr>
                          <tr>
                            <td>5. Adopts a system in routine work</td>
                            <td id="FF"></td>
                          </tr>
                        </tbody>
                        <tfooter>
                            <tr>
                              <th>TOTAL</th>
                              <th id="CMTOTAL"></th>
                            </tr>
                        </tfooter>
                      </table>

                      <table class="table">
                        <thead>
                        <tr>
                          <th>GENERAL OBSERVATION</th>
                          <th>Rating</th>
                          <th><button class="btn btn-primary" onclick="analyze_res('go')"><i class="fas fa-chart-line"></i></button></th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1. Rapport between teachers and students</td>
                            <td id="GG"></td>
                          </tr>
                          <tr>
                            <td>2. Class Participation</td>
                            <td id="HH"></td>
                          </tr>
                          <tr>
                            <td>3. Overall Teacher Impact</td>
                            <td id="II"></td>
                          </tr>
                          <tr>
                            <td>4. General Classroom Condition</td>
                            <td id="JJ"></td>
                          </tr>
                        </tbody>
                        <tfooter>
                            <tr>
                              <th>TOTAL</th>
                              <th id="GOTOTAL"></th>
                            </tr>
                        </tfooter>
                        <tfooter>
                            <tr>
                              <th>OVERALL AVERAGE</th>
                              <th><u id="overallavg"></u></th>
                            </tr>
                        </tfooter>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->


                  <!-- /.row -->

                  <!-- this row will not appear when printing -->
                  <div class="row no-print">
                    <div class="col-12">

                      <a href="<?php echo URLROOT ;?>/evaluationresults/detailedprint" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>


                      <a href="<?php echo URLROOT ;?>/evaluationresults/detailedpdf" target="_blank" class="btn btn-primary float-right hidden" style="margin-right: 5px;">
                        <i class="fas fa-download"></i> Generate PDF
                      </a>
                    </div>
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
<?php require APPROOT . '/views/inc/evalresult-script.php'; ?>
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


