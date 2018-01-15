<?php

namespace App\Model\location;
use DB;

class Location 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getArea($cityId = null)
    {
        $areas = DB::select('call  city_area_by_city_id_get(?)', array($cityId));
        return $areas;
    }
    /** purpose : get states details
     * 
     */
    public function getState($stateId=null)
    {
    	$states = DB::select('call  states_get(?)', array($stateId));
        return $states;
    }
    /** purpose : get citys details
     * 
     */
    public function getCity($stateId = 0)
    {
        $city = DB::select('call  city_by_state_id_get(?)', array($stateId));
        return $city;
    }
    /** purpose : add / update cityArea details
     * 
     */
    public function postArea($areaDetail)
    {
        $areaParam = array($areaDetail['areaId'],$areaDetail['areaName'],
                 $areaDetail['cityId'],$areaDetail['pinCode'],$areaDetail['status'],$areaDetail['userId']);
        $areas = DB::select('call  city_area_create(?,?,?,?,?,?)', $areaParam);
        return $areas;
    }
    /**  purpose : add / update state details
     * 
     */
    public function postState($stateDetail)
    {
        $stateParam = array($stateDetail['stateId'],$stateDetail['stateName'],
                 $stateDetail['stateType'],$stateDetail['status'],$stateDetail['userId']);
        $state = DB::select('call  state_create(?,?,?,?,?)', $stateParam);
        return $state;
    }
    /** purpose : add / update city details
     * 
     */
    public function postCity($cityDetail)
    {
        $cityParam = array($cityDetail['cityId'],$cityDetail['cityName'],
                 $cityDetail['stateId'],$cityDetail['status'],$cityDetail['baseUrl'],$cityDetail['imgUrl'],$cityDetail['userId']);
        $city = DB::select('call  city_create(?,?,?,?,?,?,?)', $cityParam);
        return $city;
    }
}
