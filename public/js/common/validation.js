var validate ={
		regex : {
			nameCommon : /^[a-zA-Z]+[a-zA-Z. ]{3,}$/,
			mobileNo : /^[6789]\d{9}$/,
			institute : /^[a-zA-Z]+[a-zA-Z1-9. +]{3,}$/,
			email : /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/ ,
			pinCode : /^[1-9][0-9]{5}$/ ,
			address : /^[a-zA-Z]+[a-zA-Z1-9. +]{3,}$/,
			optionalName : /^[a-zA-Z. ]*$/,
		},
	  nameCommon : function(name){
	  	     return validate.regex.nameCommon.test(name);
	      },
	  optionalName : function(name){
	  	     return validate.regex.optionalName.test(name);
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