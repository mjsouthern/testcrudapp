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
                <a href="<?php echo URLROOT ;?>/evaluationresults/students" class="nav-link" id="stud">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT ;?>/evaluationresults/faculty" class="nav-link" id="faculty">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Faculty</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT ;?>/evaluationresults/head" class="nav-link" id="head">
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
                <a href="<?php echo URLROOT ;?>/analysisresults/comparative/analysis1/students" class="nav-link" id="stud1">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT ;?>/analysisresults/comparative/analysis1/faculty" class="nav-link" id="faculty1">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Faculty</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URLROOT ;?>/analysisresults/comparative/analysis1/head" class="nav-link" id="head1">
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