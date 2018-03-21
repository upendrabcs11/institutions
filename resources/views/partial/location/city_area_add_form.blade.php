
                
    <!-- City Modal -->
<div id="city-area-form" class="modal fade" role="dialog">
  <div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">City Area</h4>
    </div>
    <div class="modal-body">
      <div id="area-CityName" class="form-group has-error">
        <label>City Name</label>
        <div class="city-dropdown">
            <input id="area-city-dropdown" class="form-control" placeholder="Enter city Name" name="city" value="" type="text" />
            <input id="area-city-id" class="id-field" name="cityId" value="0" type="text" />
            <ul id="area-city-dropdown-list">
              <li><span data-value="1">city-1</span></li>
              <li><span data-value="2">city-2</span></li>
              <li><span data-value="3">city-3</span></li>
              <li><span data-value="4">city-4</span></li>
              <li><span data-value="5">city-5</span></li>
            </ul>
        </div>
        <span class="help-block"></span>
      </div>
      <div id="area-AreaName" class="form-group has-error">
        <label>Your City Area</label>
        <input class="form-control" placeholder="Enter Area Name" name="areaName" value="" type="text">
        <span class="help-block"></span>
      </div>      
      <div class="text-right">
           <button class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
  </div>
</div>

