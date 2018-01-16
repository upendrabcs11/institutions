
/// Namespace

var registerInstituteJs = {
	StoredValue : {
				city : [],
				state : [],
				cityArea : []
	   },
	currentPopUpForm : "",
	// API CALL JS 
	APICall : {
	    call : function(url,methodType,parameter,contentType,dataType){
    		$.ajax({
	                type : methodType ? methodType : "GET", 		//default GET
	                url :  url ,	
	                data : parameter, 		//Data sent to server
	                contentType: contentType ? contentType : "",		// content type sent to server
	                dataType: dataType ? dataType : "json" , 	//Expected data format from server
	                //processdata: true, 	//True or False
	                success: function (responce) {//On Successful service call
	                },
	                error: function (responce) {
	                    return "Error" ;
	                }	
	            });
	        },
		getState : function(){
			  $.ajax({
		            type :  "GET", 	
		            url :  url_config.baseUrl +'/api/state' ,
		            dataType:  "json" , 
		            success: function (responce) {
		            	registerInstituteJs.StoredValue.state = responce;
		            	registerInstituteJs.Bind.state("");
		            },
		            error: function (responce) {	                    
		            }	
	            });
			  },
	     getCity : function(stateId){
	     		$.ajax({
		            type :  "GET", 	
		            url :  url_config.baseUrl + '/api/city/'+ stateId,
		            dataType:  "json" , 
		            success: function (responce) {
		            	registerInstituteJs.StoredValue.city = responce;
		            	registerInstituteJs.Bind.city("");
		            },
		            error: function (responce) {	                    
		            }	
	            });
	       },
	     getArea : function(cityId){
	     		$.ajax({
		            type :  "GET", 	
		            url :  url_config.baseUrl + '/api/area/'+ cityId,
		            dataType:  "json" , 
		            success: function (responce) {
		            	registerInstituteJs.StoredValue.cityArea = responce;
		            	registerInstituteJs.Bind.area("");
		            },
		            error: function (responce) {	                    
		            }	
	            });
	       }
	     },	 
	 GetPopUpPage : function(popForm) {
	 	  var needtoBringForm = true;
	 	  var popUpUrl = "";
	 		if(popForm == "StateName"){
	 			    popUpUrl = '/html/add-state-form.html' ;
		 			if(registerInstituteJs.currentPopUpForm == "StateName")
			 			needtoBringForm = false;
			 	    else
			 		    registerInstituteJs.currentPopUpForm = "StateName" ;		 		    
	 			}
	 		else if(popForm == "CityName"){
	 			popUpUrl = '/html/add-city-form.html' ;
	 			if(registerInstituteJs.currentPopUpForm == "CityName")			
			 		needtoBringForm = false;
                else
	 			    registerInstituteJs.currentPopUpForm = "CityName" ;
	 		  }
			else if(popForm == "AreaName"){
				popUpUrl = '/html/add-area-form.html' ;
				if(registerInstituteJs.currentPopUpForm =="AreaName")
					needtoBringForm = false;
                 else
				    registerInstituteJs.currentPopUpForm = "AreaName" ;
			  }
			  if(needtoBringForm && popUpUrl != ""){
               $.ajax({
		            type :  "GET", 	
		            url :  url_config.baseUrl + popUpUrl,
		            success: function (responce) {
		            	$("#popup-form").empty().append(responce);
		            },
		            error: function (responce) {	                    
		            }	
	            });
		}

	 	}, 
	 FilterSearchData : function(filter,total,data,id,name){
			var count = 0;
			var result = [];
			$.each(data, function (i,item) {
		         if(filter == "" || item[name].toLowerCase().indexOf(filter.toLowerCase()) == 0){
		         	result[count] = item;
		         	count = count + 1;
		         }
		         if(count >= total) 
		         	return result ;
		      }); 
		    return result;
		  },
    getObjectWithId : function(data, data_item, id){
    	   var ret_data = false;
    		$.each(data, function (i,item) {
		         if(parseInt(data_item) == parseInt(item[id])) {
		         	ret_data =  data[i];		         	
		         }
		      });
		    return ret_data; 
      },
	Bind : {
		 state : function(filter){		 
		 		var stateId = $(ins_reg.regstate_Id).val();		
		 		var stateDropDownObj = $(ins_reg.regstate_ddl).empty();
		        registerInstituteJs.Bind.Data(filter,10,stateDropDownObj,registerInstituteJs.StoredValue.state,"StateId","StateName");
		        
		        var isFound = registerInstituteJs.getObjectWithId(registerInstituteJs.StoredValue.state , stateId, "StateId")
		        // console.log(isFound)
		        if(isFound){
		        	$(ins_reg.regstate_Id).val(isFound['StateId']);
                    $(ins_reg.regstate_dd).val(isFound['StateName']);
		        	registerInstituteJs.APICall.getCity(isFound['StateId']);		        	
		          }

		    },
		 city : function(filter){
		 		var cityId = $(ins_reg.regcity_Id).val();
		 		var cityDropDownObj = $(ins_reg.regcity_ddl).empty();
		        registerInstituteJs.Bind.Data(filter,10,cityDropDownObj,registerInstituteJs.StoredValue.city,"CityId","CityName");
		        $(ins_reg.regcity_dd).prop("disabled",false);

		        var isFound = registerInstituteJs.getObjectWithId(registerInstituteJs.StoredValue.city , cityId, "CityId");
		        if(isFound){
		        	$(ins_reg.regcity_Id).val(isFound['CityId']);
                    $(ins_reg.regcity_dd).val(isFound['CityName']);
		        	registerInstituteJs.APICall.getArea(isFound['CityId']);	
		          }
		    },
		 area : function(filter){
		 		var areaId = $(ins_reg.regarea_Id).val();
		 		var areaDropDownObj = $(ins_reg.regarea_ddl).empty();
		        registerInstituteJs.Bind.Data(filter,10,areaDropDownObj,registerInstituteJs.StoredValue.cityArea,"AreaId","AreaName");
		        $(ins_reg.regarea_dd).prop("disabled",false);

		        var isFound = registerInstituteJs.getObjectWithId(registerInstituteJs.StoredValue.cityArea , areaId, "AreaId")
		        if(isFound){
		        	$(ins_reg.regarea_Id).val(isFound['AreaId']);
                    $(ins_reg.regarea_dd).val(isFound['AreaName']);
		          }
		    },
		 Data : function(filter,count,obj,data,id,name){
		   	     var Datafilter = registerInstituteJs.FilterSearchData(filter,count,data,id,name);
		   	     //console.log(Datafilter);
		   	     if(Datafilter && Datafilter.length > 0){
			   	  	 $.each(Datafilter, function (i,item) {
					       obj.append("<li class='ddl-item'><span data-value="+item[id]+">"+item[name]+"</span></li>");
					  });
				  }else{
				  	if(filter != ""){
				  		registerInstituteJs.GetPopUpPage(name);
				  		
				  	   obj.append("<li><span>No Item Found Do you want to add " + 
				  	   	'<strong id="addRecord" class="btn btn-primary">' + filter + '</strong></span></li>');
					}
					else{
						obj.append("<li><span>No Record Found </span></li>");
					}
		          }
   	 	    }, 
	  },
	Validate : {
		InstituteField : function(){
			  	isValid = true;
			    var instituteName = $(ins_reg.instituteName).val();
	            var stateId = $(ins_reg.regstate_Id).val();
	            var cityId = $(ins_reg.regcity_Id).val();
	            var areaId = $(ins_reg.regarea_Id).val();
	            var address = $(ins_reg.address_div).find(".form-control").val();

	            if(!validate.instituteName(instituteName)){
	            	$(ins_reg.instituteName_div).addClass("has-error").find('.help-block').text("Please Enter Valid Institute Name");
	            	isValid = false;
	            }else{
	            	$(ins_reg.instituteName_div).removeClass("has-error").find('.help-block').text("")
	            }
	          if(stateId <= 0){
	            	$(ins_reg.state_div).addClass("has-error").find('.help-block').text("Please select Valid State");
	            	isValid = false;
	            }else{
	            	$(ins_reg.state_div).removeClass("has-error").find('.help-block').text("")
	               }
	          if(cityId <= 0){
	            	$(ins_reg.city_div).addClass("has-error").find('.help-block').text("Please select Valid City");
	            	isValid = false;
	            }else{
	            	$(ins_reg.city_div).removeClass("has-error").find('.help-block').text("")
	            }
	          if(cityId <= 0){
	            	$(ins_reg.city_div).addClass("has-error").find('.help-block').text("Please select Valid City");
	            	isValid = false;
	            }else{
	            	$(ins_reg.city_div).removeClass("has-error").find('.help-block').text("")
	            }
	          if(areaId <= 0){
	            	$(ins_reg.area_div).addClass("has-error").find('.help-block').text("Please select Valid Area");
	            	isValid = false;
	            }else{
	            	$(ins_reg.area_div).removeClass("has-error").find('.help-block').text("")
	            }
	         return isValid;
			},
	    OwnerField : function(){
	    	 var isValid = true ;
	    	  var firstName = $(ins_reg.first_name_div).find(".form-control").val();
	    	  var lastName = $(ins_reg.last_name_div).find(".form-control").val();
	    	  var email = $(ins_reg.email_div).find(".form-control").val();
	    	  var mobile = $(ins_reg.mobile_div).find(".form-control").val();
	    	  var password = $(ins_reg.password_div).find(".form-control").val();
	    	  var cnfPassword = $(ins_reg.cnf_password_div).find(".form-control").val(); 
	    	  if(!validate.nameCommon(firstName)){
	            	$(ins_reg.first_name_div).addClass("has-error").find('.help-block').text("Please Enter Valid First Name");
	            	isValid = false;
	            }else{
	            	$(ins_reg.first_name_div).removeClass("has-error").find('.help-block').text("")
	          }
	         if(!validate.nameCommon(lastName)){
	            	$(ins_reg.last_name_div).addClass("has-error").find('.help-block').text("Please Enter Valid Last Name");
	            	isValid = false;
	            }else{
	            	$(ins_reg.last_name_div).removeClass("has-error").find('.help-block').text("")
	         }
	         if(!validate.email(email)){
	            	$(ins_reg.email_div).addClass("has-error").find('.help-block').text("Please Enter Valid Email");
	            	isValid = false;
	            }else{
	            	$(ins_reg.email_div).removeClass("has-error").find('.help-block').text("")
	         }
	        if(!validate.mobile(mobile)){
	            	$(ins_reg.mobile_div).addClass("has-error").find('.help-block').text("Please Enter Valid Mobile No");
	            	isValid = false;
	            }else{
	            	$(ins_reg.mobile_div).removeClass("has-error").find('.help-block').text("")
	         }
	        if(password.length < 6){
	            	$(ins_reg.password_div).addClass("has-error").find('.help-block').text("Please Enter Mimimum six char password");
	            	isValid = false;
	            }else{
	            	$(ins_reg.password_div).removeClass("has-error").find('.help-block').text("")
	         }
	        if(password != cnfPassword){
	            	$(ins_reg.cnf_password_div).addClass("has-error").find('.help-block').text("Confirm Password Not matched");
	            	isValid = false;
	            }else{
	            	$(ins_reg.cnf_password_div).removeClass("has-error").find('.help-block').text("")
	         }
	      return isValid;
	    }		
	 }
} 

var validate ={
		regex : {
			nameCommon : /^[a-zA-Z]+[a-zA-Z. ]{3,}$/,
			mobileNo : /^[6789]\d{9}$/,
			institute : /^[a-zA-Z]+[a-zA-Z1-9. +]{3,}$/,
			email : /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/ ,
			pinCode : /^[1-9][0-9]{5}$/ ,
			address : /^[a-zA-Z]+[a-zA-Z1-9. +]{3,}$/,
		},
	  nameCommon : function(name){
	  	     return validate.regex.nameCommon.test(name);
	      },
	  mobile : function(mobile){
	  			return validate.regex.mobileNo.test(mobile);
	     },
	 email : function(email){
 				return validate.regex.email.test(email);
	   },
	 pinCode : function(pinCode){
	 	return validate.regex.pinCode.test(pinCode);
	   },
	instituteName : function(institute){
			 return validate.regex.institute.test(institute);
		} ,
	address : function(address){
		return validate.regex.address.test(address);
	}
}

var addLocation = {
	APICall : {
		  postState : function(){
		  		$.ajax({
		            type :  "POST", 	
		            url :  url_config.baseUrl + '/api/state',
		            data : addLocation.PrepareData.State(),
		            dataType:  "json" ,
		            success: function (responce) {
		            	if(responce[0]){
		            	    registerInstituteJs.StoredValue.state.push(responce[0]);
		            	  	$(ins_reg.regstate_Id).val(responce[0].StateId);
       						$(ins_reg.regstate_dd).val(responce[0].StateName);
       						registerInstituteJs.APICall.getCity(responce[0].StateId);
		            	}
		            	$(ins_reg.popup_form).find(".close").trigger("click");
		            },
		            error: function (responce) {	                    
		            }	
	            });
		     },
		  postCity : function(){
		  		$.ajax({
		            type :  "POST", 	
		            url :  url_config.baseUrl + '/api/city',
		            data : addLocation.PrepareData.City(),
		            dataType:  "json" ,
		            success: function (responce) {
		            	if(responce[0]){
		            	    registerInstituteJs.StoredValue.city.push(responce[0]);
		            	  	$(ins_reg.regcity_Id).val(responce[0].CityId);
       						$(ins_reg.regcity_dd).val(responce[0].CityName);
       						registerInstituteJs.APICall.getArea(responce[0].CityId);
		            	}
		            	$(ins_reg.popup_form).find(".close").trigger("click");
		            },
		            error: function (responce) {	                    
		            }	
	            });
		     },
		 postCityArea : function(){
		  		$.ajax({
		            type :  "POST", 	
		            url :  url_config.baseUrl + '/api/area',
		            data : addLocation.PrepareData.CityArea(),
		            dataType:  "json" ,
		            success: function (responce) {
		            	if(responce[0]){
		            	    registerInstituteJs.StoredValue.cityArea.push(responce[0]);
		            	  	$(ins_reg.regarea_Id).val(responce[0].AreaId);
       						$(ins_reg.regarea_dd).val(responce[0].AreaName);
       						//registerInstituteJs.APICall.getCity(responce[0].StateId);
		            	}
		            	$(ins_reg.popup_form).find(".close").trigger("click");
		            },
		            error: function (responce) {	                    
		            }	
	            });
		     }
	   },
	 PrepareData : {
	 	State : function(){
            state = {};
            state.stateName = $(ins_reg.popup_form).find("#state-form-state").find(".form-control").val();
            state.stateType = $(ins_reg.popup_form).find("#state-form-state-type").find(".form-control").val();
            console.log(state);
            return state;
	 	  },
	   City : function(){
	   		city = {};
            city.stateName =$(ins_reg.popup_form).find("#city-form-state").find(".form-control").val();
            city.stateId = $(ins_reg.popup_form).find("#city-form-state").find(".hide").val();
            city.cityName =	$(ins_reg.popup_form).find("#city-form-city").find(".form-control").val(); 
            console.log(city);
            return city;
	     },
	  CityArea : function(){
	  		area = {};
            area.cityName = $(ins_reg.popup_form).find("#city-form-city").find(".form-control").val();
            area.cityId = $(ins_reg.popup_form).find("#area-form-area").find(".hide").val();
            area.areaName =	$(ins_reg.popup_form).find("#area-form-area").find(".form-control").val();
            area.pinCode = $(ins_reg.popup_form).find("#area-form-pin-code").find(".form-control").val();
            console.log(area);
            return area;
	    }
	 },
	Validate : {
		State : function(){
			var isValid = true;
			    var stateName = $(ins_reg.popup_form).find("#state-form-state").find(".form-control").val();
	            var stateType = $(ins_reg.popup_form).find("#state-form-state-type").find(".form-control").val();
	            if(!validate.nameCommon(stateName)){
	            	$(ins_reg.popup_form).find("#state-form-state").find('.help-block').text("Please Enter Valid State");
	            	isValid = false;
	            }else{
	            	$(ins_reg.popup_form).find("#state-form-state").find('.help-block').text("")
	            }
	          if(stateType <= 0){
	            	$(ins_reg.popup_form).find("#state-form-state-type").find('.help-block').text("Please select Valid State Type");
	            	isValid = false;
	            }else{
	            	$(ins_reg.popup_form).find("#state-form-state-type").find('.help-block').text("")
	            }
	         return isValid;
	       },
	    City : function(){
	    		var isValid = true;
				var stateId = $(ins_reg.popup_form).find("#city-form-state").find(".hide").val();
	            var cityName = $(ins_reg.popup_form).find("#city-form-city").find(".form-control").val(); 
	          if(stateId <= 0){
	            	$(ins_reg.popup_form).find("#city-form-state").find('.help-block').text("Please Enter Valid State");
	            	isValid = false;
	            }else{
	            	$(ins_reg.popup_form).find("#city-form-state").find('.help-block').text("")
	            }
	            if(!validate.nameCommon(cityName)){
	            	$(ins_reg.popup_form).find("#city-form-city").find('.help-block').text("Please Enter Valid City");
	            	isValid = false;
	            }else{
	            	$(ins_reg.popup_form).find("#city-form-city").find('.help-block').text("")
	            }
	         return isValid;
	      },
	   Area : function(){
	   			var isValid = true;
	   			var cityId = $(ins_reg.popup_form).find("#area-form-city").find(".hide").val();
	            var areaName = $(ins_reg.popup_form).find("#area-form-area").find(".form-control").val();
	            var pinCode = $(ins_reg.popup_form).find("#area-form-pin-code").find(".form-control").val();
	          if(cityId <= 0){
	            	$(ins_reg.popup_form).find("#area-form-city").find('.help-block').text("Please Enter Valid City");
	            	isValid = false;
	            }else{
	            	$(ins_reg.popup_form).find("#area-form-city").find('.help-block').text("")
	            }
	            if(pinCode != '' && !validate.pinCode(pinCode)){
	            	 $(ins_reg.popup_form).find("#area-form-pin-code").find('.help-block').text("Please Enter Valid Pin Code");
	            	isValid = false;
	            }else{
	            	 $(ins_reg.popup_form).find("#area-form-pin-code").find('.help-block').text("")
	            }

	            if(!validate.nameCommon(areaName)){
	            	 $(ins_reg.popup_form).find("#area-form-area").find('.help-block').text("Please Enter Valid City Area");
	            	isValid = false;
	            }else{
                     $(ins_reg.popup_form).find("#area-form-area").find('.help-block').text("")
	            }
	         return isValid;
	     }
	}
};
