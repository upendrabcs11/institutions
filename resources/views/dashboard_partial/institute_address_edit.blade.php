<div id="ins-state" class="row form-group">
	<div class="col-xs-2 text-right">State</div>
	<div class="col-xs-3">
		<div class="div-dropdown">
			<input class="form-control" type="text" value="{{$institute->StateName}}" />
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
			<input class="form-control" type="text" value="{{$institute->CityName}}" />
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
			<input class="form-control" type="text" value="{{$institute->AreaName}}" />
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
 	  strLocation.stateDiv =  $("#ins-state");
      strLocation.cityDiv =  $("#ins-city");
      strLocation.areaDiv =  $("#ins-city-area");
      strLocation.addressDiv =  $("#ins-address"); 
      //strLocation.popUpForm =  $("#popup-form");
      getLocation.APICall.GetState();


      $(".dropdown-menu").on("click",".ddl-item",function(){
       var id = $(this).find('span').attr("data-value") ;
       var name = $(this).text(); 
       //console.log(id+name);
       var droDivObj = $(this).parent().parent().parent();
       $(droDivObj).find(".dropdown-menu").hide(); 
       if(id != $(droDivObj).find(".id-field").val())  {                    
            if($(droDivObj).find(".dropdown-menu").attr("data-value") == 'State'){ 
                getLocation.APICall.GetCity(id);

            } else if($(droDivObj).find(".dropdown-menu").attr("data-value") == 'City'){  
                getLocation.APICall.GetArea(id);
           }
       }
       $(droDivObj).find(".id-field").val(id);
       $(droDivObj).find(".form-control").val(name);    
    });
   


 	});
   function saveInstituteBasicInfo(objSelector){
   	  var instituteInfo = {};
	  	  instituteInfo.InstituteName = $(objSelector).find("#instituteDisplayName").val();
	  	  instituteInfo.InstituteShortName = $(objSelector).find("#instituteShortName").val();
	  	  instituteInfo.InstituteFullName = $(objSelector).find("#instituteFullName").val();
	  	  instituteInfo.InstituteType = $(objSelector).find("#instituteTypeId").val();
	  	  instituteInfo.InstituteTypeId = $(objSelector).find("#instituteTypeId").val();
	  	  //console.log(instituteInfo)
	
 	$.ajax({
 			type : "POST",
 			url : url_config.baseUrl + "/institute/basic-info/"+instituteDashbord.InstituteId,
 			data : instituteInfo ,
 			success : function(responce){
 			  console.log(responce);
 			  // need to show msg of successful submission
 			},
 			error : function(){
 				alert('Error');
 			}
 	});
  }
</script>