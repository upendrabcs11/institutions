<?php

namespace App\Http\Controllers\API\Location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Common\UserCommon ;

use  App\BusinessLogic\LocationBL;
use App\Model\Location\Location ;
class LocationController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->locationModel = new Location();
        $this->locationBL = new LocationBL();     
    }
   
    /**  API : Get the details of city based on StateID 
    *           if stateId is 0 then return all citys
    */
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

    /**  API : Get the details of city based on StateID 
    *           if stateId is 0 then return all citys
    */
    public function getStateById(Request $request,$id = 0)
    {
        return $this->locationModel->getStateById($id);
    }

    /** API : Get the details of state if stateId is 0 then return details of all state 
     *         else return single id state information 
     */
    public function getCityById(Request $request,$id = 0) //function state(Request $request) 
    {
        return $this->locationModel->getCityById($id);
    }

    /** API : Get the Details  of Area based on cityId 
     *         if cityId is 0 or some other value for which area is not available then 405 content not found is return 
     */

    public function getAreaById(Request $request,$id = 0)
    {
        return $this->locationModel->getAreaById($id);
    }
    /** API : create New State
     * 
     */
    public function postState(Request $request) //function state(Request $request) 
    {
        $validation = $this->locationBL->addStateValidate($request->all());  // validate institute form data if fails return validation error
        if($validation->fails()){
            $errors = $validation->errors();
            return $errors->toJson();
        }
        $stateDetail = $this->locationBL->updateStateKeyMapping($request->all());   // passed parameter
        $stateDetail['Status'] = 1;
        return $this->locationModel->addState($stateDetail);
    }
    /**  API : create new city  
     * 
     */
    public function postCity(Request $request)
    {
        // validate institute form data if fails return validation error
        $validation = $this->locationBL->addCityValidate($request->all());  
        if($validation->fails()){
            $errors = $validation->errors();
            return $errors->toJson();
        }
        // check if this city exist 
        $city = $this->locationModel->getCityByName($request->StateId, $request->CityName); 
        if(!$city->isEmpty())
            return $city;

        $cityDetail = $this->locationBL->updateCityKeyMapping($request->all());   // passed parameter
        $cityDetail['Status'] = 1;
        return $this->locationModel->addCity($cityDetail);
    }
    
    /**  API : Create new AreaCode in city 
     * 
     */
    public function postArea(Request $request)
    {
        // validate institute form data if fails return validation error
        $validation = $this->locationBL->addAreaValidate($request->all()); 
        if($validation->fails()){
            $errors = $validation->errors();
            return $errors->toJson();
        }
        $area = $this->locationModel->getAreaByName($request->CityId, $request->AreaName); 
        if(!$area->isEmpty())
            return $area;

        $areaDetail = $this->locationBL->updateAreaKeyMapping($request->all());  // passed parameter
        $areaDetail['Status'] = 1;
        return $this->locationModel->addArea($areaDetail);
    }
}
