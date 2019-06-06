<!-- Modal -->
<div class="modal fade" id="form_medicine" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new medicines</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="medicine_form" onsubmit="return false">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Expiry Date</label>
              <input type="text" class="form-control" name="added_date" id="added_date"  placeholder="Enter Expiry date" required/>
            </div>
            <div class="form-group col-md-6">
              <label>medicine Name</label>
              <input type="text" class="form-control" name="medicine_name" id="medicine_name" placeholder="Enter medicine Name" required>
            </div>
          </div>
          <div class="form-group">
            <!--<label>Category</label>
            <select class="form-control" id="select_cat" name="select_cat" required/>
              

              
            </select>
          </div>
          <div class="form-group">
            <label>Brand</label>
            <select class="form-control" id="select_brand" name="select_brand" required/>
              

              
            </select>
          </div>-->
          <div class="form-group">
            <label>medicine Price</label>
            <input type="text" class="form-control" id="medicine_price" name="medicine_price" placeholder="Enter Price of medicine" required/>
          </div>
          <div class="form-group">
            <label>Quantity</label>
            <input type="text" class="form-control" id="medicine_qty" name="medicine_qty" placeholder="Enter Quantity" required/>
          </div>
          <button type="submit" class="btn btn-success">Add medicine</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>