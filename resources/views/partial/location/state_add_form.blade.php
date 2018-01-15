<!-- State Modal -->
  <div id="state-form" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">State</h4>
      </div>
      <div class="modal-body">
      <div id="add-state-name" class="form-group has-error">
        <label>State Name</label>
        <input class="form-control" placeholder="Enter State Name" name="stateName" value="" type="text">
        <span class="help-block"></span>
      </div>
      <div id="add-state-type" class="form-group has-error">
        <label>State Type</label>
          <select class="form-control" name="stateType">
            <option value="0" selected>--Select State type--</option>
            <option value="1">Normal</option>
            <option value="2">centeral teritory</option>
          </select>
        <span class="help-block">Error msg</span>
      </div>
      <div class="text-right">
           <button id="add-state-submit-button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
    </div>
  </div>
