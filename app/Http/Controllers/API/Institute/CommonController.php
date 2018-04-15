<?php
namespace App\Http\Controllers\API\Institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    /**
     * Instantiate a new  instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->instituteModel = new Institute(UserCommon::getLoogedInUserId());
    }
     public function state(Request $request)
    {
        if($request->isMethod('get')){
            $stateId = $request->StateId ;
            return $this->locationModel->getState($stateId);
        }
        else{ // method == POST
            return $this->postState($request);
        }
    }
    /** API : Get the details of state if stateId is 0 then return details of all state 
     *         else return single id state information 
     */

    public function city(Request $request) //function state(Request $request) 
    {
        if($request->isMethod('get')){
            $stateId = $request->StateId ; 
            //echo $stateId;           
            return $this->locationModel->getCityByStateId($stateId);
        }
        else{ // method == POST
            return $this->postCity($request);
        }
    }
    /** API : Get the Details  of Area based on cityId 
     *         if cityId is 0 or some other value for which area is not available then 405 content not found is return 
     */

    public function area(Request $request)
    {
        if($request->isMethod('get')){
            $cityId = $request->CityId ;
            return $this->locationModel->getAreaByCityId($cityId);
        }
        else{ // method == POST
            return $this->postArea($request);
        }
    }

}
