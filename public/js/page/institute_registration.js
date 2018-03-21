
var	insValidate = {
		InstituteField : function(){
			  	isValid = true;
			    var instituteName = $(insReg.instituteNameDiv).find(".form-control").val();
	            var stateId = $(insReg.stateDiv).find(".id-field").val();
	            var cityId = $(insReg.cityDiv).find(".id-field").val();
	            var areaId = $(insReg.areaDiv).find(".id-field").val();
	            var address = $(insReg.addressDiv).find(".form-control").val();

	            if(!validate.instituteName(instituteName)){
	            	$(insReg.instituteNameDiv).addClass("has-error").find('.help-block')
	            				.text("Please Enter Valid Institute Name");
	            	isValid = false;
	            }else{
	            	$(insReg.instituteNameDiv).removeClass("has-error").find('.help-block').text("")
	            }
	          if(stateId <= 0){
	            	$(insReg.stateDiv).addClass("has-error").find('.help-block')
	            					.text("Please select Valid State");
	            	isValid = false;
	            }else{
	            	$(insReg.stateDiv).removeClass("has-error").find('.help-block').text("")
	               }
	          if(cityId <= 0){
	            	$(insReg.cityDiv).addClass("has-error").find('.help-block')
	            					.text("Please select Valid City");
	            	isValid = false;
	            }else{
	            	$(insReg.cityDiv).removeClass("has-error").find('.help-block').text("")
	            }
	          if(cityId <= 0){
	            	$(insReg.cityDiv).addClass("has-error").find('.help-block')
	            						.text("Please select Valid City");
	            	isValid = false;
	            }else{
	            	$(insReg.cityDiv).removeClass("has-error").find('.help-block').text("")
	            }
	          if(areaId <= 0){
	            	$(insReg.areaDiv).addClass("has-error").find('.help-block')
	            					.text("Please select Valid Area");
	            	isValid = false;
	            }else{
	            	$(insReg.areaDiv).removeClass("has-error").find('.help-block').text("")
	            }
	         return isValid;
			},
			
	    OwnerField : function(){
	    	 var isValid = true ;
	    	  var firstName = $(insReg.firstNameDiv).find(".form-control").val();
	    	  var lastName = $(insReg.lastNameDiv).find(".form-control").val();
	    	  var email = $(insReg.emailDiv).find(".form-control").val();
	    	  var mobile = $(insReg.mobileDiv).find(".form-control").val();
	    	  var password = $(insReg.passwordDiv).find(".form-control").val();
	    	  var cnfPassword = $(insReg.cnfPasswordDiv).find(".form-control").val(); 
	    	  if(!validate.nameCommon(firstName)){
	            	$(insReg.firstNameDiv).addClass("has-error").find('.help-block')
	            					.text("Please Enter Valid First Name");
	            	isValid = false;
	            }else{
	            	$(insReg.firstNameDiv).removeClass("has-error").find('.help-block').text("")
	          }
	         if(!validate.nameCommon(lastName)){
	            	$(insReg.lastNameDiv).addClass("has-error").find('.help-block')
	            						.text("Please Enter Valid Last Name");
	            	isValid = false;
	            }else{
	            	$(insReg.lastNameDiv).removeClass("has-error").find('.help-block').text("")
	         }
	         if(!validate.email(email)){
	            	$(insReg.emailDiv).addClass("has-error").find('.help-block')
	            					.text("Please Enter Valid Email");
	            	isValid = false;
	            }else{
	            	$(insReg.emailDiv).removeClass("has-error").find('.help-block').text("")
	         }
	        if(!validate.mobile(mobile)){
	            	$(insReg.mobileDiv).addClass("has-error").find('.help-block')
	            					.text("Please Enter Valid Mobile No");
	            	isValid = false;
	            }else{
	            	$(insReg.mobileDiv).removeClass("has-error").find('.help-block').text("")
	         }
	        if(password.length < 6){
	            	$(insReg.passwordDiv).addClass("has-error").find('.help-block')
	            					.text("Please Enter Mimimum six char password");
	            	isValid = false;
	            }else{
	            	$(insReg.passwordDiv).removeClass("has-error").find('.help-block').text("")
	         }
	        if(password != cnfPassword){
	            	$(insReg.cnfPasswordDiv).addClass("has-error").find('.help-block')
	            						.text("Confirm Password Not matched");
	            	isValid = false;
	            }else{
	            	$(insReg.cnfPasswordDiv).removeClass("has-error").find('.help-block').text("")
	         }
	      return isValid;
	    }		
	 }

