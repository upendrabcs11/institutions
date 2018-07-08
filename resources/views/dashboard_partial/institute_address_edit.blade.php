<div id="ins-state" class="row form-group">
	<div class="col-xs-2 text-right">State</div>
	<div class="col-xs-3">
		<div class="div-dropdown">
			<input class="form-control" name="State" type="text" placeholder="Enter State Name"
			value="{{$institute->StateName}}" />
			<input class="id-field" value="{{$institute->StateId}}" type="text" />
			<ul class="dropdown-menu"  data-value="State">
				<li class="ddl-item"><span data-value="1">Bihar</span></li>
				<li class="ddl-item"><span data-value="2">Jharkhand</span></li>
			</ul>
		</div>
	</div>
	<span class="help-block"></span>
</div>
<div id="ins-city" class="row form-group">
	<div class="col-xs-2 text-right">City</div>
	<div class="col-xs-3">
		<div class="div-dropdown">
			<input class="form-control" type="text" placeholder="Enter city Name" name="City" 
			value="{{$institute->CityName}}" />
			<input class="id-field" value="{{$institute->CityId}}" type="text" />
			<ul class="dropdown-menu"  data-value="City">
				<li class="ddl-item"><span data-value="1">Aurangabad</span></li>
				<li class="ddl-item"><span data-value="2">Gaya</span></li>
			</ul>
		</div>	
	</div>
	<span class="help-block"></span>
</div>
<div id="ins-city-area" class="row form-group">
	<div class="col-xs-2 text-right">City Area</div>
	<div class="col-xs-3">
		<div class="div-dropdown">
			<input class="form-control" type="text" name="CityArea" placeholder="Enter Area Name"
				value="{{$institute->AreaName}}" />
			<input class="id-field" value="{{$institute->AreaId}}" type="text" />
			<ul class="dropdown-menu"  data-value="CityArea">
				<li class="ddl-item"><span data-value="1">Aurangabad</span></li>
				<li class="ddl-item"><span data-value="2">Gaya</span></li>
			</ul>
		</div>
	</div>
	<span class="help-block"></span>
</div>
<div id="ins-address" class="row form-group">
    <div class="col-xs-2 text-right">Addreaa</div>
    <div class="col-xs-3">
   	  <textarea class="form-control" value="{{$institute->Address}}"></textarea>
	</div>
    <span class="help-block"></span>
</div>
<div class="row">
	<div class="col-xs-6 text-center">
		<button class="btn btn-sm btn-primary">Save Changes</button>
		<button class="btn btn-sm default btn-cancel">Cancel</button>
	</div>
</div>

<script type="text/javascript" src={{ asset("/js/common/address.js")}}></script>
<script type="text/javascript" src={{ asset("/js/common/validation.js")}}></script>
<script type="text/javascript">
	var strLocation = strLocation || {};
 	$(document).ready(function(){
 	  strLocation.IsNeededPopUpForm = false; 
 	  strLocation.stateDiv =  $("#ins-state");
      strLocation.cityDiv =  $("#ins-city");
      strLocation.areaDiv =  $("#ins-city-area");
      strLocation.addressDiv =  $("#ins-address"); 
      //strLocation.popUpForm =  $("#popup-form");
      getLocation.APICall.GetState();

      $(".ins-det-form").on("focus ",".div-dropdown .form-control" , function(event){
          event.stopPropagation();
          $(".ins-det-form").find('.dropdown-menu').hide();
          $(this).parent().find('.dropdown-menu').show();
      });

     $(".ins-det-form").on("change paste keyup",".div-dropdown .form-control" , function(event){
        event.stopPropagation();
        $(".ins-det-form").find('.dropdown-menu').hide();
        //console.log($(this).val())
        $(this).parent().find('.id-field').val(0);
        bindLocation.Dropdown($(this).val(),$(this).attr("name"));
        $(this).parent().find('.dropdown-menu').show();
      });

      $(".dropdown-menu").on("click",".ddl-item",function(){
       var id = $(this).find('span').attr("data-value") ;
       var name = $(this).text(); 
       //console.log(id+name);
       var droDivObj = $(this).parent().parent().parent();
       $(droDivObj).find(".dropdown-menu").hide(); 
       if(id != $(droDivObj).find(".id-field").val())  {                    
            if($(droDivObj).find(".dropdown-menu").attr("data-value") == 'State'){ 
            	$(strLocation.cityDiv).find(".id-field").val(0);
                getLocation.APICall.GetCity(id);

            } else if($(droDivObj).find(".dropdown-menu").attr("data-value") == 'City'){
            	$(strLocation.areaDiv).find(".id-field").val(0);  
                getLocation.APICall.GetArea(id);
           }
       }
       $(droDivObj).find(".id-field").val(id);
       $(droDivObj).find(".form-control").val(name);    
    });
   


 	});
   function updateInstituteAddress(objSelector){
   	  var instituteInfo = {};
	  	  instituteInfo.State = $(objSelector).find("#ins-state").find('.form-control').val();
	  	  instituteInfo.StateId = $(objSelector).find("#ins-state").find('.id-field').val();
	  	  instituteInfo.City = $(objSelector).find("#ins-city").find('.form-control').val();
	  	  instituteInfo.CityId = $(objSelector).find("#ins-city").find('.id-field').val();
	  	  instituteInfo.CityArea = $(objSelector).find("#ins-city-area").find('.form-control').val();
	  	  instituteInfo.CityAreaId = $(objSelector).find("#ins-city-area").find('.id-field').val();
	  	  instituteInfo.Address = $(objSelector).find("#ins-address").find('.form-control').val();
	  	 // console.log(instituteInfo)
	   //validate input 
	   var isValid = true;
	   if(instituteInfo.StateId > 0 && instituteInfo.State){
	   		$(objSelector).find("#ins-state .help-block").text("");
	   }else {
	   		$(objSelector).find("#ins-state .help-block").text("Please Select State");
	   		isValid = false;
	   }

	   if(instituteInfo.CityId > 0 && instituteInfo.City){
	   		$(objSelector).find("#ins-city .help-block").text("");
	   }else{
	     	$(objSelector).find("#ins-city .help-block").text("Please Select State");
	     	isValid = false;
	   }

	   if(instituteInfo.CityAreaId > 0 && instituteInfo.CityArea){
	   		$(objSelector).find("#ins-city-area .help-block").text("");
	   }else{
	   		$(objSelector).find("#ins-city-area .help-block").text("Please Select Area");
	   		isValid = false;
	   }

	   if(!isValid)
	   		return false;

 	$.ajax({
 			type : "PUT",
 			url : url_config.baseUrl + "/institute/address/"+instituteDashbord.InstituteId,
 			data : instituteInfo ,
 			success : function(responce){
 			  //console.log(responce);
 			  // need to show msg of successful submission
 			  bindUpdatedDataToinstituteInformation(responce);
 			},
 			error : function(){
 				alert('Error');
 			}
 	});
 	return true;
  }

</script>