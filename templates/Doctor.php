<!-- Modal -->
<div class="modal fade" id="form_doctor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="doctor_form" onsubmit="return false">
          <div class="form-group">
            <label>doctor Name</label>
            <input type="text" class="form-control" name="doctor_name" id="doctor_name" aria-describedby="emailHelp" placeholder="Enter name">
            <small id="cat_error" class="form-text text-muted"></small>
          </div><div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="doctor_add" id="doctor_add" aria-describedby="emailHelp" placeholder="Enter Address">
            <small id="cat1_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
          
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
