<?php

namespace App\Http\Controllers\API\Institute;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Common\UserCommon ;

use  App\BusinessLogic\Institute\instituteBL;
use App\Model\Institute\institute ;

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
    public function updateInstituteStatus(Request $request, $id)
    {
      return null;
        //return $request->user();
        if(InstituteBL::hasPermissionToUpdate($id)){
          $instituteInfo = InstituteBL::instituteAssignDefaultValue($request->all());
        //$instituteModel = new Institute(UserCommon::getLoogedInUserId());

          return $this->instituteModel->updateInstituteStatus($instituteInfo,$id);
       }
       return "Permission Dennied ";
    }
    
    /**  API : Get the details of city based on StateID 
    *           if stateId is 0 then return all citys
    */
    public function updateInstituteBasicInfo(Request $request, $id) // id is instituteId
    {
      echo Auth::user()->id;
        if(InstituteBL::hasPermissionToUpdate($id)){
          $instituteInfo = InstituteBL::instituteAssignDefaultValue($request->all());
          //$instituteModel = new Institute(UserCommon::getLoogedInUserId());
          return $this->instituteModel->updateInstituteBasicInfo($instituteInfo,$id);
       }
       return "Permission Dennied ";
    }
    /**  API : Get the details of city based on StateID 
    *           if stateId is 0 then return all citys
    */
    public function updateInstituteAddress(Request $request, $id) // id is instituteId
    {
       if(InstituteBL::hasPermissionToUpdate($id)){
          $instituteInfo = InstituteBL::instituteAssignDefaultValue($request->all());
          //$instituteModel = new Institute(UserCommon::getLoogedInUserId());
          return $this->instituteModel->updateInstituteAddress($instituteInfo,$id);
       }
       return "Permission Dennied ";
    }
}
