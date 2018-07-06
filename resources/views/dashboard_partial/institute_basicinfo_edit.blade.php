<div id="ins-name" class="row form-group">
	<div class="col-xs-2 text-right">Display Name</div>
	<div class="col-xs-3">
		<input class="form-control" type="text" value="{{$institute->Name}}"/>
	</div>
	<span class="help-block"></span>
</div>
<div id="ins-short-name" class="row form-group">
	<div class="col-xs-2 text-right">Short Name</div>
	<div class="col-xs-3">
		<input class="form-control" type="text" value="{{$institute->ShortName}}"/>
	</div>
	<span class="help-block"></span>
</div>
<div id="ins-full-name" class="row form-group">
	<div class="col-xs-2 text-right">Full Name</div>
	<div class="col-xs-3">
		<input class="form-control" type="text" value="{{$institute->FullName}}"/>
	</div>
	<span class="help-block"></span>
</div>
<div id="ins-type" class="row form-group">
	<div class="col-xs-2 text-right">Institute Type</div>
	<div class="col-xs-3">
		<div class="div-dropdown">
			<input class="form-control name-field" type="text" value="{{$institute->InstituteType}}"/>
			<input class="id-field" type="text" value="{{$institute->InstituteTypeId}}" />
			<ul class="dropdown-menu" >
				@foreach ($institute_type as $type)
					<li class="ddl-item">
						<span data-value="{{$type->InstituteTypeId}}">
						 {{$type->InstituteTypeName}}
						</span>
					</li>
				@endforeach
			</ul>
		</div>			      				
	</div>
	<span class="help-block"></span>
</div>
<div class="row">
	<div class="col-xs-6 text-center">
		<button class="btn btn-sm btn-primary">Save Changes</button>
		<button class="btn btn-sm default btn-cancel">Cancel</button>
	</div>
</div>
<script type="text/javascript" src={{ asset("/js/common/validation.js")}}></script>
<script type="text/javascript">
   function updateInstituteBasicInfo(objSelector){
   	  var instituteInfo = {};
  	  instituteInfo.InstituteName = $(objSelector).find("#ins-name .form-control").val();
  	  instituteInfo.InstituteShortName = $(objSelector).find("#ins-short-name .form-control").val();
  	  instituteInfo.InstituteFullName = $(objSelector).find("#ins-full-name .form-control").val();
  	  instituteInfo.InstituteType = $(objSelector).find("#ins-type .form-control").val();
  	  instituteInfo.InstituteTypeId = $(objSelector).find("#ins-type .id-field").val();
	  	  //console.log(instituteInfo)
	//validate input 
	   var isValid = true;
	   if(instituteInfo.InstituteTypeId >= 0 && instituteInfo.InstituteType){
	   		$(objSelector).find("#ins-type .help-block").text("");
	   }else {
	   		$(objSelector).find("#ins-type .help-block").text("Please Select Institute Type");
	   		isValid = false;
	   }

	   if(validate.nameCommon(instituteInfo.InstituteName)){
	   		$(objSelector).find("#ins-name .help-block").text("");
	   }else{
	     	$(objSelector).find("#ins-name .help-block").text("Please Enter Valid Name");
	     	isValid = false;
	   }

	   
	   if(!isValid)
	   		return false;

 	$.ajax({
 			type : "PUT",
 			url : url_config.baseUrl + "/institute/basic-info/"+instituteDashbord.InstituteId,
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