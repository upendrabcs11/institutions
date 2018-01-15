<?php

namespace App\Http\Controllers\API\Institute;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Common\UserCommon ;

use  App\BusinessLogic\Institute\InstituteBL;
use App\Model\Institute\Institute ;
class InstituteController extends Controller
{
    /**
     * Instantiate a new  instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->instituteModel = new Institute(UserCommon::getLoogedInUserId());
    }
    /**  API : Update status of institute  
    */
    public function updateInstituteStatus(Request $request, $institute_id)
    {
        if(InstituteBL::hasPermissionToUpdate($institute_id)){
          $instituteInfo = InstituteBL::instituteAssignDefaultValue($request->all());
    	  //$instituteModel = new Institute(UserCommon::getLoogedInUserId());

          return $this->instituteModel->updateInstituteStatus($instituteInfo,$institute_id);
       }
       return "Permission Dennied ";
    }
    
    /**  API : Get the details of city based on StateID 
    *           if stateId is 0 then return all citys
    */
    public function updateInstituteBasicInfo(Request $request, $institute_id)
    {
        if(InstituteBL::hasPermissionToUpdate($institute_id)){
          $instituteInfo = InstituteBL::instituteAssignDefaultValue($request->all());
          //$instituteModel = new Institute(UserCommon::getLoogedInUserId());
          return $this->instituteModel->updateInstituteBasicInfo($instituteInfo,$institute_id);
       }
       return "Permission Dennied ";
    }
    /**  API : Get the details of city based on StateID 
    *           if stateId is 0 then return all citys
    */
    public function updateInstituteAddress(Request $request, $institute_id)
    {
       if(InstituteBL::hasPermissionToUpdate($institute_id)){
          $instituteInfo = InstituteBL::instituteAssignDefaultValue($request->all());
          //$instituteModel = new Institute(UserCommon::getLoogedInUserId());
          return $this->instituteModel->updateInstituteAddress($instituteInfo,$institute_id);
       }
       return "Permission Dennied ";
    }
}
