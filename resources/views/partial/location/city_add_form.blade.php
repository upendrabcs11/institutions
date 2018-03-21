
                
    <!-- City Modal -->
  <div id="city-form" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">City</h4>
      </div>
      <div class="modal-body">
        <div id="city-state" class="form-group">
          <label>State</label>
              <div class="state-dropdown">
                <input id="city-state-dropdown" class="form-control" placeholder="Enter State Name" name="state" value="" type="text">
                <input id="city-state-id" class="id-field" name="stateId" value="0" type="text" />
                <ul id="reg-state-dropdown-list">
                  <li><span data-value="1">Bihar</span></li>
                  <li><span data-value="2">Utar pradesh</span></li>
                  <li><span data-value="3">jharkhandiya</span></li>
                  <li><span data-value="4">himalya man</span></li>
                  <li><span data-value="5">motki man</span></li>
                </ul>
              </div>
          <span class="help-block"></span>
        </div>
        <div id="city-name" class="form-group">
          <label>City Name</label>
          <input class="form-control" placeholder="Enter City Name" name="cityName" value="" type="text">
          <span class="help-block"></span>
        </div>
        <!-- <div id="FirstName" class="form-group has-error">
          <label>First Name</label>
          <input class="form-control" placeholder="Enter First Name" name="firstName" value="" type="text">
          <span class="help-block">Error msg</span>
        </div> -->
        <div class="text-right">
             <button class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
    </div>
  </div>
