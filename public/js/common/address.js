/// Namespace
var strLocation = strLocation || {};

var getLocation = {
	StoredValue : {
				City : [],
				State : [],
				CityArea : []
	   },
	CurrentPopUpForm : "",
	APICall : {
		GetState : function(){
			  $.ajax({
		            type :  "GET", 	
		            url :  url_config.baseUrl +'/api/state' ,
		            dataType:  "json" , 
		            success: function (responce) {
		            	getLocation.StoredValue.State = responce;
		            	bindLocation.State("");
		            },
		            error: function (responce) {	                    
		            }	
	            });
			  },
	     GetCity : function(stateId){
	     		$.ajax({
		            type :  "GET", 	
		            url :  url_config.baseUrl + '/api/city?StateId='+ stateId,
		            dataType:  "json" , 
		            success: function (responce) {
		            	getLocation.StoredValue.City = responce;
		            	bindLocation.City("");
		            },
		            error: function (responce) {	                    
		            }	
	            });
	       },
	     GetArea : function(cityId){
	     		$.ajax({
		            type :  "GET", 	
		            url :  url_config.baseUrl + '/api/area?CityId='+ cityId,
		            dataType:  "json" , 
		            success: function (responce) {
		            	getLocation.StoredValue.CityArea = responce;
		            	bindLocation.CityArea("");
		            },
		            error: function (responce) {	                    
		            }	
	            });
	       }
	     },	 
	 GetLocationPopUpPage : function(popForm) {
	 	  var needtoBringForm = true;
	 	  var popUpUrl = "";
	 	   if(!strLocation.IsNeededPopUpForm)
	 	   		needtoBringForm = false;

	 	   else if(popForm == "StateName"){
	 			    popUpUrl = '/html/add-state-form.html' ;
		 			if(getLocation.CurrentPopUpForm == "StateName")
			 			needtoBringForm = false;
			 	    else
			 		    getLocation.CurrentPopUpForm = "StateName" ;		 		    
	 			}
	 		else if(popForm == "CityName"){
	 			popUpUrl = '/html/add-city-form.html' ;
	 			if(getLocation.CurrentPopUpForm == "CityName")			
			 		needtoBringForm = false;
                else
	 			    getLocation.CurrentPopUpForm = "CityName" ;
	 		  }
			else if(popForm == "AreaName"){
				popUpUrl = '/html/add-area-form.html' ;
				if(getLocation.CurrentPopUpForm =="AreaName")
					needtoBringForm = false;
                 else
				    getLocation.CurrentPopUpForm = "AreaName" ;
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
	 	}
	}

 var bindLocation ={
		 Dropdown : function(filter, type){
		 	 if(type == 'State'){ 
		 	 	bindLocation.State(filter);
		 	 }else if(type == 'City'){   
		 	 	bindLocation.City(filter);
		 	 }else if(type == 'CityArea'){
		 	 	bindLocation.CityArea(filter);
		 	 }else{
		 	 	//console.log(type);
		 	 }
		   },
		 State : function(filter){		 
		 		var stateId = $(strLocation.stateDiv).find(".id-field").val();		
		 		var drpdwnObj = $(strLocation.stateDiv).find(".dropdown-menu").empty();
		        bindLocation.Data(filter,10,drpdwnObj,getLocation.StoredValue.State,"StateId","StateName");
		        
		        var isFound = dataFilter.getObject(getLocation.StoredValue.State,
		        			$(strLocation.stateDiv).find(".id-field").val(), filter,"StateId","StateName");
		        // reset city and area
		        $(strLocation.cityDiv).find(".form-control").val("");
		        $(strLocation.areaDiv).find(".form-control").val("");

		        if(isFound) {	
		        	$(strLocation.stateDiv).find(".id-field").val(isFound['StateId']);		        	
		        	$(strLocation.stateDiv).find(".form-control").val(isFound['StateName']);
		        	getLocation.APICall.GetCity(isFound['StateId']);
		          }
		         else{
		         	$(strLocation.stateDiv).find(".id-field").val(0); 
		         	$(strLocation.stateDiv).find(".form-control").val(filter);
		         }
		        
		    },
		 City : function(filter){
		 		var cityId = $(strLocation.cityDiv).find(".id-field").val();
		 		var drpdwnObj = $(strLocation.cityDiv).find(".dropdown-menu").empty();
		        bindLocation.Data(filter,10,drpdwnObj,getLocation.StoredValue.City,"CityId","CityName");
		       
		       var isFound = dataFilter.getObject(getLocation.StoredValue.City,
		        			$(strLocation.cityDiv).find(".id-field").val(),filter, "CityId","CityName");
		       // reset area
		        $(strLocation.areaDiv).find(".form-control").val("");

		        if(isFound) {
		        	$(strLocation.cityDiv).find(".id-field").val(isFound['CityId']);
		        	$(strLocation.cityDiv).find(".form-control").val(isFound['CityName']);                     
		        	getLocation.APICall.GetArea(isFound['CityId']);		        	       	
		          }
		         else{
		         	$(strLocation.cityDiv).find(".id-field").val(0);
		         	$(strLocation.cityDiv).find(".form-control").val(filter);
		         }
		         
		    },
		 CityArea : function(filter){
		 		var areaId = $(strLocation.areaDiv).find(".id-field").val();
		 		var drpdwnObj = $(strLocation.areaDiv).find(".dropdown-menu").empty();
		        bindLocation.Data(filter,10,drpdwnObj,getLocation.StoredValue.CityArea,"AreaId","AreaName");
		     	
		     	var isFound = dataFilter.getObject(getLocation.StoredValue.CityArea,
		        			$(strLocation.areaDiv).find(".id-field").val(),filter, "AreaId","AreaName");
		     	
		        if(isFound) {
		        	$(strLocation.areaDiv).find(".id-field").val(isFound['AreaId']);
		        	$(strLocation.areaDiv).find(".form-control").val(isFound['AreaName']);
		          }
		        else{
		        	$(strLocation.areaDiv).find(".id-field").val(0);
		        	$(strLocation.areaDiv).find(".form-control").val(filter);  
		        }
		        
		    },
		 Data : function(filter,count,obj,data,id,name){
		   	     var Datafilter = dataFilter.FilterSearchData(filter,count,data,id,name);
		   	     //console.log(Datafilter);
		   	     if(Datafilter && Datafilter.length > 0){
			   	  	 $.each(Datafilter, function (i,item) {
					       obj.append("<li class='ddl-item'><span data-value="+item[id]+">"+item[name]+
					       	"</span></li>");
					  });
				  }else{
				  	if(filter != ""){
				  		getLocation.GetLocationPopUpPage(name);
				  		
				  	   obj.append("<li><span>No Item Found Do you want to add " + 
				  	   	'<strong id="addRecord" class="btn btn-primary">' + filter + 
				  	   	'</strong></span></li>');
					}
					else{
						obj.append("<li><span>No Record Found </span></li>");
					}
		          }
   	 	    }, 
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
		            	    getLocation.StoredValue.State.push(responce[0]);
		            	    bindLocation.State(responce[0].StateName);
		            	  	$(strLocation.stateDiv).find(".id-field").val(responce[0].StateId);
       						$(strLocation.stateDiv).find(".form-control").val(responce[0].StateName);
       						getLocation.APICall.GetCity(responce[0].StateId);
		            	}
		            	$(strLocation.popUpForm).find(".close").trigger("click");
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
		            	    getLocation.StoredValue.City.push(responce[0]);
		            	    bindLocation.City(responce[0].CityName);
		            	  	$(strLocation.cityDiv).find(".id-field").val(responce[0].CityId);
       						$(strLocation.cityDiv).find(".form-control").val(responce[0].CityName);
       						getLocation.APICall.GetArea(responce[0].CityId);
		            	}
		            	$(strLocation.popUpForm).find(".close").trigger("click");
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
		            	    getLocation.StoredValue.CityArea.push(responce[0]);
		            	    bindLocation.CityArea(responce[0].AreaName);
		            	  	$(strLocation.areaDiv).find(".id-field").val(responce[0].AreaId);
       						$(strLocation.areaDiv).find(".form-control").val(responce[0].AreaName);
		            	}
		            	$(strLocation.popUpForm).find(".close").trigger("click");
		            },
		            error: function (responce) {	                    
		            }	
	            });
		     }
	   },
	 PrepareData : {
	 	State : function(){
            state = {};
            state.StateName = $(strLocation.popUpForm).find("#state-form-state").find(".form-control").val();
            state.StateType = $(strLocation.popUpForm).find("#state-form-state-type").find(".form-control").val();
            //console.log(state);
            return state;
	 	  },
	   City : function(){
	   		city = {};
            city.StateName =$(strLocation.popUpForm).find("#city-form-state").find(".form-control").val();
            city.StateId = $(strLocation.popUpForm).find("#city-form-state").find(".id-field").val();
            city.CityName =	$(strLocation.popUpForm).find("#city-form-city").find(".form-control").val(); 
            //console.log(city);
            return city;
	     },
	  CityArea : function(){
	  		area = {};
            area.CityName = $(strLocation.popUpForm).find("#area-form-city").find(".form-control").val();
            area.CityId = $(strLocation.popUpForm).find("#area-form-city").find(".id-field").val();
            area.AreaName =	$(strLocation.popUpForm).find("#area-form-area").find(".form-control").val();
            area.PinCode = $(strLocation.popUpForm).find("#area-form-pin-code").find(".form-control").val();
            //console.log(area);
            return area;
	    }
	 },
	Validate : {
		State : function(){
			var isValid = true;
			    var stateName = $(strLocation.popUpForm).find("#state-form-state").find(".form-control").val();
	            var stateType = $(strLocation.popUpForm).find("#state-form-state-type").find(".form-control").val();
	            if(!validate.nameCommon(stateName)){
	            	$(strLocation.popUpForm).find("#state-form-state").find('.help-block')
	            					.text("Please Enter Valid State");
	            	isValid = false;
	            }else{
	            	$(strLocation.popUpForm).find("#state-form-state").find('.help-block').text("")
	            }
	          if(stateType <= 0){
	            	$(strLocation.popUpForm).find("#state-form-state-type").find('.help-block')
	            						.text("Please select Valid State Type");
	            	isValid = false;
	            }else{
	            	$(strLocation.popUpForm).find("#state-form-state-type").find('.help-block').text("")
	            }
	         return isValid;
	       },
	    City : function(){
	    		var isValid = true;
				var stateId = $(strLocation.popUpForm).find("#city-form-state").find(".id-field").val();
	            var cityName = $(strLocation.popUpForm).find("#city-form-city").find(".form-control").val(); 
	          if(stateId <= 0){
	            	$(strLocation.popUpForm).find("#city-form-state").find('.help-block')
	            						.text("Please Enter Valid State");
	            	isValid = false;
	            }else{
	            	$(strLocation.popUpForm).find("#city-form-state").find('.help-block').text("")
	            }
	            if(!validate.nameCommon(cityName)){
	            	$(strLocation.popUpForm).find("#city-form-city").find('.help-block')
	            					.text("Please Enter Valid City");
	            	isValid = false;
	            }else{
	            	$(strLocation.popUpForm).find("#city-form-city").find('.help-block').text("")
	            }
	         return isValid;
	      },
	   Area : function(){
	   			var isValid = true;
	   			var cityId = $(strLocation.popUpForm).find("#area-form-city").find(".id-field").val();
	            var areaName = $(strLocation.popUpForm).find("#area-form-area").find(".form-control").val();
	            var pinCode = $(strLocation.popUpForm).find("#area-form-pin-code").find(".form-control").val();
	          if(cityId <= 0){
	            	$(strLocation.popUpForm).find("#area-form-city").find('.help-block')
	            				.text("Please Enter Valid City");
	            	isValid = false;
	            }else{
	            	$(strLocation.popUpForm).find("#area-form-city").find('.help-block').text("")
	            }
	            if(pinCode != '' && !validate.pinCode(pinCode)){
	            	 $(strLocation.popUpForm).find("#area-form-pin-code").find('.help-block')
	            	 				.text("Please Enter Valid Pin Code");
	            	isValid = false;
	            }else{
	            	 $(strLocation.popUpForm).find("#area-form-pin-code").find('.help-block').text("")
	            }

	            if(!validate.nameCommon(areaName)){
	            	 $(strLocation.popUpForm).find("#area-form-area").find('.help-block')
	            	 			.text("Please Enter Valid City Area");
	            	isValid = false;
	            }else{
                     $(strLocation.popUpForm).find("#area-form-area").find('.help-block').text("")
	            }
	         return isValid;
	     }
	}
}

var dataFilter = {
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
    getObject : function(data, data_item, filter,id,name){
    	   var retData = false;
    	   //console.log(filter)
    		$.each(data, function (i,item) {
    			//console.log(item)
		      if(!retData && (data_item ==item[id])){
		         	retData =  item; 		         	
		        }
		      });
		    return retData; 
      }
  }