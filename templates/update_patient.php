<!-- Modal -->
<div class="modal fade" id="form_patient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New patient Entry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="update_patient_form" onsubmit="return false">
          <div class="form-group">
            <label>patient Name</label>
            <input type="hidden" name="did" id="did" value=""/>
            <input type="text" class="form-control" name="update_patient" id="update_patient" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="patient_error" class="form-text text-muted"></small>
          </div>
          <button type="submit" class="btn btn-primary">Update patient</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>