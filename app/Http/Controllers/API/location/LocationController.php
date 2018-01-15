<?php

namespace App\Http\Controllers\API\location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Common\UserCommon ;

use  App\BusinessLogic\LocationBL;
use App\Model\location\Location ;
class LocationController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
   
    /**  API : Get the details of city based on StateID 
    *           if stateId is 0 then return all citys
    */
    public function getCity($stateId = 0)
    {
    	$areaModel = new Location();
        return $areaModel->getCity($stateId);
    }
    /** API : Get the details of state if stateId is 0 then return details of all state 
     *         else return single id state information 
     */
    public function getState($stateId = 0) //function state(Request $request) 
    {
    	$areaModel = new Location();
        return $areaModel->getState($stateId);
    }
    /** API : Get the Details  of Area based on cityId 
     *         if cityId is 0 or some other value for which area is not available then 405 content not found is return 
     */
    public function getArea($cityId = 0)
    {
    	$areaModel = new Location();
        return $areaModel->getArea($cityId);
    }
    /**  API : create new city  
     * 
     */
    public function postCity(Request $request)
    {
        $cityDetail = LocationBL::CityAssignDefaultValue($request->all());   // passed parameter
        $cityDetail['cityId'] = 0;  // make it 0 so it can be insert into db
        $cityDetail['status'] = 1;
        $areaModel = new Location();
        return $areaModel->postCity($cityDetail);
    }
    /** API : create New State
     * 
     */
    public function postState(Request $request) //function state(Request $request) 
    {
        $stateDetail = LocationBL::StateAssignDefaultValue($request->all());   // passed parameter
        $stateDetail['stateId'] = 0;  // make it 0 so it can be insert into db
        $stateDetail['status'] = 1;
        $areaModel = new Location();
        return $areaModel->postState($stateDetail);
    }
    /**  API : Create new AreaCode in city 
     * 
     */
    public function postArea(Request $request)
    {
        $areaDetail = LocationBL::AreaAssignDefaultValue($request->all());  // passed parameter
        $areaDetail['areaId'] = 0;  // make it 0 so it can be insert into db
        $areaDetail['status'] = 1;
        $areaModel = new Location();
        return $areaModel->postArea($areaDetail);
    }
}
