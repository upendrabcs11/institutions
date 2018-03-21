<div class="row form-group">
	<div class="col-xs-2 text-right">Display Name</div>
	<div class="col-xs-3">
		<input id="instituteDisplayName" class="form-control" type="text" value="{{$institute->Name}}"/>
	</div>
</div>
<div class="row form-group">
	<div class="col-xs-2 text-right">Short Name</div>
	<div class="col-xs-3">
		<input id="instituteShortName" class="form-control" type="text" value="{{$institute->ShortName}}"/>
	</div>
</div>
<div class="row form-group">
	<div class="col-xs-2 text-right">Full Name</div>
	<div class="col-xs-3">
		<input id="instituteFullName" class="form-control" type="text" value="{{$institute->FullName}}"/>
	</div>
</div>
<div class="row form-group">
	<div class="col-xs-2 text-right">Institute Type</div>
	<div class="col-xs-3">
		<div class="div-dropdown">
			<input id="instituteType" class="form-control name-field" type="text" value="{{$institute->InstituteType}}"/>
			<input id="instituteTypeId" class="form-control id-field hide" type="text" value="{{$institute->InstituteTypeId}}" />
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
</div>
<div class="row">
	<div class="col-xs-6 text-center">
		<button class="btn btn-sm btn-primary">Save Changes</button>
		<button class="btn btn-sm default btn-cancel">Cancel</button>
	</div>
</div>

<script type="text/javascript">
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