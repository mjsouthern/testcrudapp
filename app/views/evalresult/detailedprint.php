<?php require APPROOT . '/views/inc/header.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed">



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">

            <div class="card-body" id="resultcard">
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
                    <!-- /.col -->
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

                      <br>
                      <table>
                        <tbody>
                          <tr>
                            <td width="50%">Prepared by:<br><strong><u>MARLON JUHN M. TIMOGAN, MIT</u></strong><br>Personnel
                            </td>

                            <td>Certified by:<br><strong><u>IAN S. TAMPAN, DM-HRM</u></strong><br>Head of the Human Resource Development Office</td>
                          </tr>
                        </tbody>
                      </table>

                    </div>
                    <!-- /.col -->
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

</body>

 <!-- Required Script --> 
<?php require APPROOT . '/views/inc/footer.php'; ?>
<?php require APPROOT . '/views/inc/generic-script.php'; ?>

 <!-- Optional Script -->
<script src="<?php echo URLROOT; ?>/dist/js/evaluation_result/evaluation-detailed-print.js"></script>


