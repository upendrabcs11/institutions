<?php

namespace App\BusinessLogic;
use App\Common\UserCommon ;

class LocationBL 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public static function StateAssignDefaultValue($stateDetail)
    {
        $stateDetail['stateName'] = isset($stateDetail['stateName']) ? $stateDetail['stateName'] : "";
        $stateDetail['stateType'] = isset($stateDetail['stateType']) ? $stateDetail['stateType'] : '0';
        $stateDetail['userId'] = UserCommon::getLoogedInUserId();
        return $stateDetail;
    }
    /** purpose : get states details
     * 
     */
    public static function CityAssignDefaultValue($cityDetail)
    {
    	$cityDetail['cityName'] = isset($cityDetail['cityName']) ? $cityDetail['cityName'] : "";
        $cityDetail['stateId'] = isset($cityDetail['stateId']) ? $cityDetail['stateId'] : '0';
        $cityDetail['baseUrl'] = isset($cityDetail['baseUrl']) ? $cityDetail['baseUrl'] : "";
        $cityDetail['imgUrl'] = isset($cityDetail['imgUrl']) ? $cityDetail['imgUrl'] : "";
        $cityDetail['userId'] = UserCommon::getLoogedInUserId();
        return $cityDetail;
    }
    /** purpose : get citys details
     * 
     */
    public static function AreaAssignDefaultValue($areaDetail)
    {
        $areaDetail['areaName'] = isset($areaDetail['areaName']) ? $areaDetail['areaName'] : "";
        $areaDetail['cityId'] = isset($areaDetail['cityId']) ? $areaDetail['cityId'] : '0';
        $areaDetail['pinCode'] = isset($areaDetail['pinCode']) ? $areaDetail['pinCode'] : "";
        $areaDetail['userId'] = UserCommon::getLoogedInUserId();
        return $areaDetail;
    }
    /** purpose : add / update cityArea details
     * 
     */
    public function postArea($areaDetail)
    {
       
    }
    /**  purpose : add / update state details
     * 
     */
    public function postState($stateDetail)
    {
       
    }
    /** purpose : add / update city details
     * 
     */
    public function postCity($cityDetail)
    {
        
    }
}
