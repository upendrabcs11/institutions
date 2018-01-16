@extends('layouts.mainLayout')

@section('styles')
 <link href={{ asset("css/common/style.css") }} rel="stylesheet">
@endsection
@section('content')
<div class="row signUp">
  <div class="col-md-8">   
    <h2>Hello</h2>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
      standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
      a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, 
      remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing 
      Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions 
      of Lorem Ipsum.
    </p>

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

          <div id="reg-institute-name" class="form-group {{ $errors->has('instituteName') ? ' has-error' : '' }}">
            <label>Institute Name</label>
            <input class="form-control" placeholder="Institute/Tution Name" name="instituteName" value="{{ old('instituteName') }}"  type="text" />
            <span class="help-block">
              @if ($errors->has('instituteName')) {{ $errors->first('instituteName') }}  @endif
            </span>
          </div> 

          <div id="reg-state" class="form-group  {{ $errors->has('state') ? ' has-error' : '' }}">
            <label>State</label>
            <div class="reg-div-dropdown">
              <input class="form-control" placeholder="Enter State Name" autocomplete="off" name="state" value="{{ old('state') }}" type="text" />
              <input class="hide" name="stateId" value="{{ old('stateId') }}" type="text" />
              <ul class="dropdown-menu">
                <!-- <li class="ddl-item"><span >Bihar</span></li> -->
              </ul>
            </div>
            <span class="help-block">
              @if ($errors->has('state')) {{ $errors->first('state') }}  @endif
            </span> 
          </div> 

          <div id="reg-city" class="form-group  {{ $errors->has('city') ? ' has-error' : '' }}">
            <label>City</label>
            <div class="reg-div-dropdown">
              <input disabled="" class="form-control" placeholder="Enter city Name" name="city" autocomplete="off" value="{{ old('city') }}" type="text" >
              <input class="hide" name="cityId" value="{{ old('cityId') }}" type="text" />
              <ul class="dropdown-menu">
                <!-- <li><span data-value="5">city-5</span></li> -->
              </ul>
            </div>
            <span class="help-block">@if($errors->has('city')){{ $errors->first('city') }} @endif
            </span>
          </div>

         <div id="reg-city-area" class="form-group {{ $errors->has('cityArea') ? ' has-error' : '' }}">
            <label>Area Or pincode</label>   
            <div class="reg-div-dropdown">
              <input disabled="" class="form-control" placeholder="Enter Area Name"  autocomplete="off" name="cityArea" value="{{ old('cityArea') }}"  type="text">
              <input class="hide" name="areaId" value="{{ old('areaId') }}" type="text" />
              <ul class="dropdown-menu">
                <!-- <li><span data-value="5">city-area-5</span></li> -->
              </ul>
            </div> 
            <span class="help-block">
                @if($errors->has('cityArea')) {{ $errors->first('cityArea') }}  @endif
            </span>
         </div>  

          <div id="reg-address" class="form-group  {{ $errors->has('address') ? ' has-error' : '' }}">
            <label>Address</label>
            <textarea class="form-control" placeholder="Enter Address" name="address" value="{{ old('address')}}"></textarea>
            <span class="help-block">
                @if($errors->has('address')) {{ $errors->first('address') }}  @endif
            </span>
          </div>
					<!-- <p>If you have read and agree to the Terms and Conditions, please continue</p> -->						
        <div id="reg-continue-btn" class="btn btn-success">Continue</div>
      </div>
        
			<div id="institute-owner" class="hide">
					<p>&nbsp;</p>			
					<h3>Ownner Information</h3>

         <div id="reg-first-name" class="form-group {{ $errors->has('firstName') ? ' has-error' : '' }}">
            <label>First Name</label>
            <input class="form-control" placeholder="Enter First Name" name="firstName" value="{{ old('firstName') }}" type="text">
            <span class="help-block">
              @if($errors->has('firstName')) {{ $errors->first('firstName') }}  @endif
            </span>
          </div>

          <div id="reg-last-name" class="form-group {{ $errors->has('lastName') ? ' has-error' : '' }}">
            <label>Last Name</label>
            <input class="form-control" placeholder="Enter Last Name" name="lastName" value="{{ old('lastName') }}" type="text">
            <span class="help-block">
              @if($errors->has('lastName')) {{ $errors->first('lastName') }}  @endif
            </span>
          </div>

          <div id="reg-email" class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <label>Email ID</label>
            <input class="form-control" placeholder="Enter Email ID" name="email" value="{{ old('email') }}" type="text">
            <span class="help-block">
              @if($errors->has('email')) {{ $errors->first('email') }}  @endif
            </span>
          </div>

          <div id="reg-mobile" class="form-group {{ $errors->has('mobileNo') ? ' has-error' : '' }}">
            <label>Phone No</label>
            <input class="form-control" placeholder="Enter Phone No" name="mobileNo" value="{{ old('mobileNo') }}" type="text">
             <span class="help-block">
              @if($errors->has('mobileNo')) {{ $errors->first('mobileNo') }}  @endif
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
              @if($errors->has('cnfPassword')) {{ $errors->first('cnfPassword') }}  @endif
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
  <script type="text/javascript" src={{ asset("/js/page/institute_registration.js")}}></script>
   <script type="text/javascript">
   var ins_reg = ins_reg || {} ;

   $(document).ready(function(){ 
      ins_reg.instituteName_div = $("#reg-institute-name"); 
      ins_reg.instituteName = $(ins_reg.instituteName_div).find(".form-control");

      ins_reg.state_div = $("#reg-state");
      ins_reg.regstate_Id = $(ins_reg.state_div).find(".hide");
      ins_reg.regstate_dd = $(ins_reg.state_div).find(".form-control");
      ins_reg.regstate_ddl = $(ins_reg.state_div).find(".dropdown-menu");

      ins_reg.city_div = $("#reg-city");
      ins_reg.regcity_Id = $(ins_reg.city_div).find(".hide");
      ins_reg.regcity_dd = $(ins_reg.city_div).find(".form-control");
      ins_reg.regcity_ddl = $(ins_reg.city_div).find(".dropdown-menu");

      ins_reg.area_div = $("#reg-city-area");
      ins_reg.regarea_Id = $(ins_reg.area_div).find(".hide");
      ins_reg.regarea_dd = $(ins_reg.area_div).find(".form-control");
      ins_reg.regarea_ddl = $(ins_reg.area_div).find(".dropdown-menu"); 

      ins_reg.address_div = $("#reg-address"); 
      ins_reg.first_name_div = $("#reg-first-name"); 
      ins_reg.last_name_div = $("#reg-last-name"); 
      ins_reg.email_div = $("#reg-email"); 
      ins_reg.mobile_div = $("#reg-mobile"); 
      ins_reg.password_div = $("#reg-password"); 
      ins_reg.cnf_password_div = $("#reg-cnf-password"); 

      ins_reg.popup_form = $("#popup-form");
      
     // state 
     $(ins_reg.regstate_dd).on('focus', function() {
         $(ins_reg.regstate_ddl).show();
     });
     $(ins_reg.regstate_dd).on('change paste keyup', function() {
         registerInstituteJs.Bind.state($(this).val());
         $(ins_reg.regstate_ddl).show();
     });     
     //city
     $(ins_reg.regcity_dd).on('focus', function() {
         $(ins_reg.regcity_ddl).show();
     });
     $(ins_reg.regcity_dd).on('change paste keyup', function() {
         $(ins_reg.regcity_ddl).show();
         registerInstituteJs.Bind.city($(this).val());         
     });     
    //city area
     $(ins_reg.regarea_dd).on('focus', function() {
         $(ins_reg.regarea_ddl).show();
     });
     $(ins_reg.regarea_dd).on('change paste keyup', function() {
         registerInstituteJs.Bind.area($(this).val());
         $(ins_reg.regarea_ddl).show();
     });


     registerInstituteJs.APICall.getState(); // Bind state when page loded

     $(document).click(function(e) { 
        var targetParent = event.target.parentElement;
        if (!$(targetParent).hasClass('reg-div-dropdown')) {
            $(".dropdown-menu").hide();
          }
     });
     
     $(document).on("click","#addRecord",function(){
          $("#open-popup-form").trigger("click");
          var popupform = $("#popup-form");
          $(popupform).find(".nameField").val($(this).text());

          if(registerInstituteJs.currentPopUpForm == "CityName"){
            
            $(popupform).find("#city-form-state").find(".form-control").val($(ins_reg.regstate_dd).val());
            $(popupform).find("#city-form-state").find(".hide").val($(ins_reg.regstate_Id).val());
          }
          else if(registerInstituteJs.currentPopUpForm =="AreaName"){ // bind city input
            $(popupform).find("#area-form-city").find(".form-control").val($(ins_reg.regcity_dd).val());
            $(popupform).find("#area-form-city").find(".hide").val($(ins_reg.regcity_Id).val());
          }
     });
   
    $(ins_reg.regstate_ddl).on("click",".ddl-item",function(){
       var stateId = $(this).find('span').attr("data-value") ;
       var stateName = $(this).text();  
       $(ins_reg.regstate_ddl).hide(); 
       if(stateId != $(ins_reg.regstate_Id).val())  {  
                $(ins_reg.regstate_Id).val(stateId);
                $(ins_reg.regstate_dd).val(stateName);       
               
                $(ins_reg.regcity_Id).val(0);
                $(ins_reg.regcity_dd).val("");
                $(ins_reg.regarea_Id).val(0);
                $(ins_reg.regarea_dd).val("");
                $(ins_reg.regcity_dd).prop("disabled",true);// make disable city
                $(ins_reg.regarea_dd).prop("disabled",true); // make disable area
                if(parseInt(stateId) != NaN)
                    registerInstituteJs.APICall.getCity(stateId);
              }
    });
    $(ins_reg.regcity_ddl).on("click",".ddl-item",function(){
       var cityId = $(this).find('span').attr("data-value") ;
       var cityName = $(this).text();
       if(cityId != $(ins_reg.regcity_Id).val())  {
              $(ins_reg.regcity_Id).val(cityId);
              $(ins_reg.regcity_dd).val(cityName);
              $(ins_reg.regcity_ddl).hide();
       
              $(ins_reg.regarea_Id).val(0);
              $(ins_reg.regarea_dd).val("");
              $(ins_reg.regarea_dd).prop("disabled",true); // make disable area
              if(parseInt(cityId) != NaN)
                registerInstituteJs.APICall.getArea(cityId);
          }
    });
    $(ins_reg.regarea_ddl).on("click",".ddl-item",function(){
       var areaId = $(this).find('span').attr("data-value") ;
       var areaName = $(this).text();
       $(ins_reg.regarea_Id).val(areaId);
       $(ins_reg.regarea_dd).val(areaName);
       $(ins_reg.regarea_ddl).hide();
    });

    $('#reg-continue-btn').on('click',function(){
       if(registerInstituteJs.Validate.InstituteField()){
         $('#institute-owner').toggleClass('hide');
         $('#institute-registration').toggleClass('hide');
       }
       return false;
    });
    $('#submit-form').on('click',function(){
       if(!registerInstituteJs.Validate.OwnerField()){
       return false;
       }       
    });

    // add state script
        $(ins_reg.popup_form).on("click","#state-form-submit-button",function(){
           if(addLocation.Validate.State())
               addLocation.APICall.postState();
           else
              return false;
       });
    // add city script
        $(ins_reg.popup_form).on("click","#city-form-submit-button",function(){
           if(addLocation.Validate.City())
               addLocation.APICall.postCity();
           else
              return false;
       });
     // add area script
        $(ins_reg.popup_form).on("click","#area-form-submit-button",function(){
           if(addLocation.Validate.Area())
               addLocation.APICall.postCityArea();
           else
              return false;
       });
   });

   </script>
  @endsection