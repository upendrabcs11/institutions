@extends('layouts.mainLayout')

@section('styles')
 <link href={{ asset("css/common/style.css") }} rel="stylesheet">
@endsection
@section('content')
<div class="row signUp">
  <div class="col-md-8">   
    <h2>Hello</h2>
    <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
      standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
      a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, 
      remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing 
      Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions 
      of Lorem Ipsum.
    </p>
 -->
    <!-- <button id="open-state-form" class="btn btn-primary" data-toggle="modal" data-target="#state-form"></button>
    <button id="open-city-form" class="btn btn-primary" data-toggle="modal" data-target="#city-form"></button> 
    <button id="open-area-form" class="btn btn-primary" data-toggle="modal" data-target="#area-form"></button>  -->  
    
  </div>
	<div class="col-md-4">
		<div class="signup-form">
			<form  role="form" method="POST" action="{{ url('/institute-register') }}">
                        {{ csrf_field() }}
        <div id="institute-registration">
					<h3>Create your Institute Account</h3>
					<p>All details are mandatory</p>
          <p> 

          </p>
          <div id="reg-institute-name" class="form-group {{ $errors->has('InstituteName') ? ' has-error' : '' }}">
            <label>Institute Name</label>
            <input class="form-control" placeholder="Institute/Tution Name" name="InstituteName" value="{{ old('InstituteName') }}"  type="text" />
            <span class="help-block">
              @if ($errors->has('InstituteName')) {{ $errors->first('InstituteName') }}  @endif
            </span>
          </div> 

          <div id="reg-state" class="form-group  {{ $errors->has('State') ? ' has-error' : '' }}">
            <label>State</label>
            <div class="div-dropdown">
              <input class="form-control" placeholder="Enter State Name" autocomplete="off" name="State" value="{{ old('State') }}" type="text" />
              <input class="id-field" name="StateId" value="{{ old('StateId') }}" type="text" />
              <ul class="dropdown-menu" data-value="State">
                <!-- <li class="ddl-item"><span >Bihar</span></li> -->
              </ul>
            </div>
            <span class="help-block">
              @if ($errors->has('State')) {{ $errors->first('State') }}  @endif
            </span> 
          </div> 

          <div id="reg-city" class="form-group  {{ $errors->has('City') ? ' has-error' : '' }}">
            <label>City</label>
            <div class="div-dropdown">
              <input class="form-control" placeholder="Enter city Name" name="City" autocomplete="off" value="{{ old('City') }}" type="text" >
              <input class="id-field" name="CityId" value="{{ old('CityId') }}" type="text" />
              <ul class="dropdown-menu" data-value="City">
                <!-- <li><span data-value="5">city-5</span></li> -->
              </ul>
            </div>
            <span class="help-block">@if($errors->has('City')){{ $errors->first('City') }} @endif
            </span>
          </div>

         <div id="reg-city-area" class="form-group {{ $errors->has('CityArea') ? ' has-error' : '' }}">
            <label>Area Or pincode</label>   
            <div class="div-dropdown">
              <input class="form-control" placeholder="Enter Area Name"  autocomplete="off" name="CityArea" value="{{ old('CityArea') }}"  type="text">
              <input class="id-field" name="CityAreaId" value="{{ old('CityAreaId') }}" type="text" />
              <ul class="dropdown-menu"  data-value="CityArea">
                <!-- <li><span data-value="5">city-area-5</span></li> -->
              </ul>
            </div> 
            <span class="help-block">
                @if($errors->has('CityArea')) {{ $errors->first('CityArea') }}  @endif
            </span>
         </div>  

          <div id="reg-address" class="form-group  {{ $errors->has('Address') ? ' has-error' : '' }}">
            <label>Address</label>
            <textarea class="form-control" placeholder="Enter Address" name="Address" value="{{ old('Address')}}"></textarea>
            <span class="help-block">
                @if($errors->has('Address')) {{ $errors->first('Address') }}  @endif
            </span>
          </div>
					<!-- <p>If you have read and agree to the Terms and Conditions, please continue</p> -->						
        <div id="reg-continue-btn" class="btn btn-success">Continue</div>
      </div>
        
			<div id="institute-owner" class="hide">
					<p>&nbsp;</p>			
					<h3>Ownner Information</h3>

         <div id="reg-first-name" class="form-group {{ $errors->has('FirstName') ? ' has-error' : '' }}">
            <label>First Name</label>
            <input class="form-control" placeholder="Enter First Name" name="FirstName" value="{{ old('FirstName') }}" type="text">
            <span class="help-block">
              @if($errors->has('FirstName')) {{ $errors->first('FirstName') }}  @endif
            </span>
          </div>

          <div id="reg-last-name" class="form-group {{ $errors->has('LastName') ? ' has-error' : '' }}">
            <label>Last Name</label>
            <input class="form-control" placeholder="Enter Last Name" name="LastName" value="{{ old('LastName') }}" type="text">
            <span class="help-block">
              @if($errors->has('LastName')) {{ $errors->first('LastName') }}  @endif
            </span>
          </div>

          <div id="reg-email" class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <label>Email ID</label>
            <input class="form-control" placeholder="Enter Email ID" name="email" value="{{ old('email') }}" type="text">
            <span class="help-block">
              @if($errors->has('email')) {{ $errors->first('email') }}  @endif
            </span>
          </div>

          <div id="reg-mobile" class="form-group {{ $errors->has('MobileNo') ? ' has-error' : '' }}">
            <label>Phone No</label>
            <input class="form-control" placeholder="Enter Phone No" name="MobileNo" value="{{ old('MobileNo') }}" type="text">
             <span class="help-block">
              @if($errors->has('MobileNo')) {{ $errors->first('MobileNo') }}  @endif
            </span>
          </div>
           
         <div id="reg-password" class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <label>Password</label>
            <input class="form-control" placeholder="Enter Password" name="password" value="" type="password">
            <span class="help-block">
              @if($errors->has('password')) {{ $errors->first('password') }}  @endif
            </span>
        </div>

				<div id="reg-cnf-password" class="form-group">
					<label>Confirm Password</label>
					<input class="form-control" placeholder="Enter Confirm Password" name="password_confirmation" type="password">
          <span class="help-block">
              @if($errors->has('password_confirmation')) {{ $errors->first('password_confirmation') }}  @endif
          </span>
				</div>

				<input id="submit-form" class="btn btn-success" type="submit" value="Submit">

			</div>
			</form>
		</div>
	</div>
  </div>
  
  @endsection
  
  @section('scripts')
   <script type="text/javascript" src={{ asset("/js/common/address.js")}}></script>
   <script type="text/javascript" src={{ asset("/js/common/validation.js")}}></script>
   <script type="text/javascript" src={{ asset("/js/page/institute_registration.js")}}></script>
   <script type="text/javascript">
   var insReg = insReg || {} ;
   var strLocation = strLocation || {};

   $(document).ready(function(){ 
      insReg.instituteNameDiv = $("#reg-institute-name"); 
      strLocation.stateDiv = insReg.stateDiv = $("#reg-state");
      strLocation.cityDiv = insReg.cityDiv = $("#reg-city");
      strLocation.areaDiv = insReg.areaDiv = $("#reg-city-area");
      strLocation.addressDiv = insReg.addressDiv = $("#reg-address"); 
      strLocation.popUpForm = insReg.popup_form = $("#popup-form");

      insReg.firstNameDiv = $("#reg-first-name"); 
      insReg.lastNameDiv = $("#reg-last-name"); 
      insReg.emailDiv = $("#reg-email"); 
      insReg.mobileDiv = $("#reg-mobile"); 
      insReg.passwordDiv = $("#reg-password"); 
      insReg.cnfPasswordDiv = $("#reg-cnf-password"); 
  
      
      getLocation.APICall.GetState(); // Bind state when page loded

     $(".signUp").on("focus ",".div-dropdown .form-control" , function(event){
          event.stopPropagation();
          $(".signUp").find('.dropdown-menu').hide();
          $(this).parent().find('.dropdown-menu').show();
      });

     $(".signUp").on("change paste keyup",".div-dropdown .form-control" , function(event){
        event.stopPropagation();
        $(".signUp").find('.dropdown-menu').hide();
        //console.log($(this).val())
        bindLocation.Dropdown($(this).val(),$(this).attr("name"));
        $(this).parent().find('.dropdown-menu').show();
      });

     $(document).click(function(e) { 
        var targetParent = event.target.parentElement;
        if (!$(targetParent).hasClass('div-dropdown')) {
            $(".dropdown-menu").hide();
          }
     });
     
     $(document).on("click","#addRecord",function(){
          $("#open-popup-form").trigger("click");
          var popupform = $("#popup-form");
          $(popupform).find(".nameField").val($(this).text());

          if(getLocation.CurrentPopUpForm == "CityName"){
            
            $(popupform).find("#city-form-state").find(".form-control")
                .val($(insReg.stateDiv).find(".form-control").val());
                console.log($(insReg.stateDiv).find(".form-control").val())
            $(popupform).find("#city-form-state").find(".id-field")
                .val($(insReg.stateDiv).find(".id-field").val());
                console.log($(insReg.stateDiv).find(".id-field").val())
          }
          else if(getLocation.CurrentPopUpForm =="AreaName"){ // bind city input
            $(popupform).find("#area-form-city").find(".form-control")
                .val($(insReg.cityDiv).find(".form-control").val());
            $(popupform).find("#area-form-city").find(".id-field")
                .val($(insReg.cityDiv).find(".id-field").val());
          }
     });
   
    $(".dropdown-menu").on("click",".ddl-item",function(){
       var id = $(this).find('span').attr("data-value") ;
       var name = $(this).text(); 
       //console.log(id+name);
       var droDivObj = $(this).parent().parent();
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
   
    $('#reg-continue-btn').on('click',function(){
       if(insValidate.InstituteField()){
         $('#institute-owner').toggleClass('hide');
         $('#institute-registration').toggleClass('hide');
       }
       return false;
    });
    $('#submit-form').on('click',function(){
       if(!insValidate.OwnerField()){
       return false;
       }       
    });

    // add state script
        $(insReg.popup_form).on("click","#state-form-submit-button",function(){
           if(addLocation.Validate.State())
               addLocation.APICall.postState();
           else
              return false;
       });
    // add city script
        $(insReg.popup_form).on("click","#city-form-submit-button",function(){
           if(addLocation.Validate.City())
               addLocation.APICall.postCity();
           else
              return false;
       });
     // add area script
        $(insReg.popup_form).on("click","#area-form-submit-button",function(){
           if(addLocation.Validate.Area())
               addLocation.APICall.postCityArea();
           else
              return false;
       });
   });

   </script>
  @endsection