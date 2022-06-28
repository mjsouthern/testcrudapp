<div class="modal fade" id="setsydate">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Set School Year Dates</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-3">
            <label>School Year</label>&nbsp;<a href="#" id="addsydesclink">+</a>
            
            <select class="form-control" id="syopt">
            </select>
            
            <input type="text" class="form-control hidden" id="descrSY" placeholder="YYYY-YYYY">
            <button type="button" class="btn btn-primary hidden" id="addsybtn">ADD</button>
            &nbsp;<a href="#" class="hidden" id="hidesydesclink">-</a>
          </div>
          <div class="col-3">
              <label>Semester</label>
              <select class="form-control" id="semopt">
                <option value="1">1st Sem</option>
                <option value="2">2nd Sem</option>
              </select>
          </div>
          <div class="col-6">
              <label>Select Dates</label>
              <input type="text" class="form-control" id="sydatespicker">
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="setsydateBTN">Set</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="detailed_result_analysis">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="area_header">Detailed Result Analysis</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
           <table class="table">
                  <thead>
                    <tr>
                      <th>Excellent</th>
                    </tr>
                  </thead>
                  <tbody id="excellent_datatbl">
                  </tbody>
            </table>
            <table class="table">
                  <thead>
                    <tr>
                      <th>Very Satifactory</th>
                    </tr>
                  </thead>
                  <tbody id="vs_datatbl">
                  </tbody>
            </table>
            <table class="table">
                  <thead>
                    <tr>
                      <th>Satisfactory</th>
                    </tr>
                  </thead>
                  <tbody id="s_datatbl">
                  </tbody>
            </table>
            <table class="table">
                  <thead>
                    <tr>
                      <th>Fair</th>
                    </tr>
                  </thead>
                  <tbody id="f_datatbl">
                  </tbody>
            </table>
            <table class="table">
                  <thead>
                    <tr>
                      <th>Poor</th>
                    </tr>
                  </thead>
                  <tbody id="p_datatbl">
                  </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="account_seting_mdl">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="area_header">Account Setting</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <form role="form" id="acc_setting">
                <div class="card-body">
                  <div class="form-group"><label>Username *</label>
                    <input type="text" class="form-control" id="username" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Current Password *</label>
                    <input type="password" class="form-control" id="current_pass" required>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password *</label>
                    <input type="password" class="form-control" id="new_pass" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Verify New Password *</label>
                    <input type="password" class="form-control" id="verify_pass" required>
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-danger">Cancel</button>
                </div>

              </form>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>