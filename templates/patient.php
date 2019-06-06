<!-- Modal -->
<div class="modal fade" id="form_patient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="patient_form" onsubmit="return false">
          <div class="form-group">
            <label>patient Name</label>
            <input type="text" class="form-control" name="patient_name" id="patient_name" placeholder="Enter patient Name">
            <small id="patient_error" class="form-text text-muted"></small>
          </div><div class="form-group">
            <label>sex</label>
            <input type="text" class="form-control" name="sex" id="sex" placeholder="Enter sex">
          </div>
            <div class="form-group">
            <label>problem</label>
            <input type="text" class="form-control" name="patient_add" id="patient_add" placeholder="Enter problem">
          </div>
            <div class="form-group">
            <label>Contact no</label>
            <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter contact no.">
          </div>
             <div class="form-group">
            <label for="exampleInputPassword1">reffered by</label>
            <select class="form-control" id="parent_cat" name="parent_cat">
              

              
            </select>
                 <br>
            </div>
          <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>