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
		      	{{ $institute->Name."(".$institute->FullName.")" }}
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
		      	<li>
		      		
		      		<div class="ins-det-item">
			      		<div class="row">
			      			<div class="col-xs-2"><label>Display Name</label></div>
			      			<div class="col-xs-10">{{$institute->Name}}</div>
			      		</div>
			      		<div class="row">
			      			<div class="col-xs-2"><label>Short Name</label></div>
			      			<div class="col-xs-10">{{$institute->ShortName}}</div>
			      		</div>
			      		<div class="row">
			      			<div class="col-xs-2"><label>Full Name</label></div>
			      			<div class="col-xs-10">{{$institute->FullName}}</div>
			      		</div>
			      		<div class="row">
			      			<div class="col-xs-2"><label>Institute Type</label></div>
			      			<div class="col-xs-10">{{$institute->InstituteType}}</div>
			      		</div>
			      		<div class="row">
			      			<div class="col-xs-2"><label>Institute Status</label></div>
			      			<div class="col-xs-10">{{$institute->Status}}</div>
			      		</div>
			      		<span class="edit-icon"><i class="fa fa-pencil"></i> Edit</span>
		      		</div>

		      		<div class="ins-det-form" style="display:none">
			      		<div class="row form-group">
			      			<div class="col-xs-2 text-right">Mobile</div>
			      			<div class="col-xs-3"><input class="form-control" type="text" value="8285180912" /></div>
			      		</div>
		      			<div class="row">
		      				<div class="col-xs-6 text-center">
		      					<button class="btn btn-sm btn-primary">Save Changes</button>
		      					<button class="btn btn-sm default btn-cancel">Cancel</button>
		      				</div>
		      			</div>
		      		</div>

		      	</li>
		      	<li>

		      		<div class="ins-det-item">
			      		<div class="row">
			      			<div class="col-xs-2"><label>Address</label></div>
			      			<div class="col-xs-10">Aurangabad <br> Bihar, India 201301</div>
			      		</div>
			      		<span class="edit-icon"><i class="fa fa-pencil"></i> Edit</span>
		      		</div>

		      		<div class="ins-det-form" style="display:none">
			      		<div class="row form-group">
			      			<div class="col-xs-2 text-right">Address</div>
			      			<div class="col-xs-3"><input class="form-control" type="text" value="Aurangabad" /></div>
			      		</div>
			      		<div class="row form-group">
			      			<div class="col-xs-2 text-right">City</div>
			      			<div class="col-xs-3"><input class="form-control" type="text" value="Aurangabad" /></div>
			      		</div>
			      		<div class="row form-group">
			      			<div class="col-xs-2 text-right">Zip</div>
			      			<div class="col-xs-3"><input class="form-control" type="text" value="Aurangabad" /></div>
			      		</div>
		      			<div class="row">
		      				<div class="col-xs-6 text-center">
		      					<button class="btn btn-sm btn-primary">Save Changes</button>
		      					<button class="btn btn-sm default btn-cancel">Cancel</button>
		      				</div>
		      			</div>
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

 $(document).ready(function(){ 
   $('.edit-icon').on('click', function(){
   	 $(this).parent('.ins-det-item').hide();
   	 $(this).parent().parent().find('.ins-det-form').show();
   })
   $('.btn-cancel').on('click', function(){
   	 $('.ins-det-item').show();
   	 $('.ins-det-form').hide();
   })
 });

</script>
@endsection