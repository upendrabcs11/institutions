@extends('layouts.mainLayout')

@section('styles')
 <link href={{ asset("css/common/style.css") }} rel="stylesheet">
@endsection
@section('content')

<div class="row dashboard">
	
	<div class="col-xs-2 left">
		<div class="left-nav">
		<ul>
			<li><a href="#"><i class="fa fa-user"></i> Home</a></li>
			<li><a href="#"><i class="fa fa-user"></i> Discover</a></li>
			<li><a href="#"><i class="fa fa-user"></i> Communities</a></li>
			<li><a href="#"><i class="fa fa-user"></i> Home</a></li>
		</ul>
		</div>
	</div>

	<div class="col-xs-10 right">

		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      <li data-target="#myCarousel" data-slide-to="1"></li>
		      <li data-target="#myCarousel" data-slide-to="2"></li>
		    </ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner">
		      <div class="item active">
		        <img src="{{ url('/image/common/la.jpg') }}" style="width:100%;">
		      </div>

		      <div class="item">
		        <img src="{{ url('/image/common/chicago.jpg') }}" style="width:100%;">
		      </div>
		    
		      <div class="item">
		        <img src="{{ url('/image/common/ny.jpg') }}" style="width:100%;">
		      </div>

		      <button class="add-img-buttom"><i class="fa fa-camera" aria-hidden="true"></i> Add Image</button>

		      <div class="carousel-title">
		      	{{ $institute->Name }}
		      </div>

		    </div>

		</div>

		<div class="dashboard-content">

		<!-- Tab Pannel -->
		<ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#institute">About Institute</a></li>
		    <li><a data-toggle="tab" href="#branches">Branches</a></li>
		  </ul>

		  <div class="tab-content">
		    <div id="institute" class="tab-pane fade in active">
		      <h3>Institute basic info </h3>
		      <ul class="institute-details">
		      	<li id="institute-basic-info">		      		
		      		<div class="ins-det-item">
		      			@if($institute->Name)
				      		<div class="row">
				      			<div class="col-xs-2"><label>Display Name</label></div>
				      			<div class="col-xs-10">{{$institute->Name}}</div>
				      		</div>
			      		@endif
			      		@if($institute->ShortName)
				      		<div class="row">
				      			<div class="col-xs-2"><label>Short Name</label></div>
				      			<div class="col-xs-10">{{$institute->ShortName}}</div>
				      		</div>
			      		@endif
			      		@if($institute->FullName)
				      		<div class="row">
				      			<div class="col-xs-2"><label>Full Name</label></div>
				      			<div class="col-xs-10">{{$institute->FullName}}</div>
				      		</div>
			      		@endif
			      		@if($institute->InstituteType)
				      		<div class="row">
				      			<div class="col-xs-2"><label>Institute Type</label></div>
				      			<div class="col-xs-10">{{$institute->InstituteType}}</div>
				      		</div>
			      		@endif
			      		@if($institute->Status)
				      		<div class="row">
				      			<div class="col-xs-2"><label>Institute Status</label></div>
				      			<div class="col-xs-10">{{$institute->Status}}</div>
				      		</div>
			      		@endif
			      		<span class="edit-icon" data-value="instituteBasicInfo">
			      			<i class="fa fa-pencil"></i> Edit
			      		</span>
		      		</div>

		      		<div class="ins-det-form" style="display:none">		      			
			      		
		      		</div>

		      	</li>
		      	<li id="institute-address">
		      		<div class="ins-det-item">
			      		<div class="row">
			      			<div class="col-xs-2"><label>Address</label></div>
			      			<div class="col-xs-10">{{$institute->CityName}} , {{$institute->StateName}} 
			      				<br> 
			      				{{$institute->AreaName}}, {{$institute->Address}} 
			      				{{$institute->PinCode}}
			      			</div>
			      		</div>
			      		<span class="edit-icon" data-value="instituteAddress">
			      			<i class="fa fa-pencil"></i> Edit
			      		</span>
		      		</div>

		      		<div class="ins-det-form" style="display:none">
			      	
		      		</div>

		      	</li>
		      </ul>
		    </div>
		    <div id="branches" class="tab-pane fade">
		      <h3>Branches</h3>
		      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		    </div>
		  </div>

		<span> {{$institute->Name}} </span>
		</div>

	</div>

</div>

@endsection

@section('scripts')
<script type="text/javascript" src={{ asset("/js/page/institute_registration.js")}}></script>
<script type="text/javascript">
 var instituteDashbord = {};
  instituteDashbord.InstituteId = {{$institute->InstituteId}}
 $(document).ready(function(){ 
   $('.edit-icon').on('click', function(){
   	//get edit page 
   	 getDashboardEditPage($(this).attr('data-value'),$(this).parent().parent().find('.ins-det-form'))
   	 $(this).parent('.ins-det-item').hide();
   	 $(this).parent().parent().find('.ins-det-form').show();
   })

   $(".tab-content").on("click",'.btn-cancel', function(){
   	   $('.ins-det-form').hide();
   	   $('.ins-det-item').show();   	   
   })
   $("#institute-basic-info").on("click",'.btn-primary', function(){
   	   if(updateInstituteBasicInfo($("#institute-basic-info"))){
	   	   $("#institute-basic-info").find('.ins-det-item').show();
	   	   $("#institute-basic-info").find('.ins-det-form').hide();
	   	}
   })
   $("#institute-address").on("click",'.btn-primary', function(){
   	   if(updateInstituteAddress($("#institute-address"))){
	   	   $("#institute-address").find('.ins-det-item').show();
	   	   $("#institute-address").find('.ins-det-form').hide();
	   	}
   })

   
   $(".tab-content").on("click",".div-dropdown .form-control" , function(event){
   	   event.stopPropagation();
   	  	$(".tab-content").find('.dropdown-menu').hide();
   	  	$(this).parent().find('.dropdown-menu').show();
   });
   
   $(".tab-content").on("click",".dropdown-menu li" , function(event){
   	   event.stopPropagation();
   	   var drpdivObj = $(this).parent().parent();
   	   //console.log($(this).find('span').text().trim())
   	   //console.log($(this).find('span').attr('data-value'))
   	   $(drpdivObj).find('.name-field').val($(this).find('span').text().trim())
   	   $(drpdivObj).find('.id-field').val($(this).find('span').attr('data-value'))

   	  	$(".tab-content").find('.dropdown-menu').hide();
   	  	// $(this).parent().find('.dropdown-menu').show();
   });

   $(document).click( function(){
        $('.dropdown-menu').hide();
    });   
 });



 function getDashboardEditPage(pageitem, objBind){
 	var needToFetch = true;
 	var url = "";
 	if(pageitem == "instituteBasicInfo" && !(objBind.children().length > 0) ){
 		url = '/dashboard/institute-basic-info/edit-page';
 	}else if(pageitem == "instituteAddress" && !(objBind.children().length > 0) ){
 		url = '/dashboard/institute-address/edit-page';
 	 }

 	if(url != ""){
	 	$.ajax({
	 			type : "GET",
	 			url : url_config.baseUrl + url,
	 			success : function(responce){
	 			  $(objBind).append(responce);
	 			},
	 			error : function(){
	 				alert('Error');
	 			}
	 	});
	 }
  }
  function bindUpdatedDataToinstituteInformation(resp){
  		resp = resp[0];
  		$("#institute-basic-info .ins-det-item").children('.row').each(function (i) {
           //console.log($(this).find('.col-xs-10').text(),i,ins_info[i],resp[ins_info[i]]);
           $(this).find('.col-xs-10').text(resp[ins_info[i]])
		});
		var address = resp['CityName']+', '+ resp['StateName']+'</br>'+
					resp['AreaName']+', '+ resp['Address']+'('+resp['PinCode']+')';
		
		$("#institute-address .ins-det-item").find('.col-xs-10').html(address);
		$(".carousel-title").text(resp['Name'])
   }
   // array to bind institute info
   var ins_info = ["Name","ShortName","FullName","InstituteType","Status"];
</script>
@endsection