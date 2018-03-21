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
    public function getAreaByCityId($cityId = null)
    {
        $areas = DB::table('city_areas')->where('city_id',$cityId)
                    ->select('id as AreaId','name as AreaName','pin_code as PinCode')->get();
        return $areas;
    }
    /** purpose : get states details
     * 
     */
    public function getState($stateId = null)
    {
        if($stateId == null){
    	   $states = DB::table('states')->where('id','>','0')
               ->select('id as StateId','name as StateName')->get();
        }
        else{
            $states = DB::table('states')->where('id',$stateId)
                            ->select('id as StateId','name as StateName')->get();
        }

        return $states;
    }
    /** purpose : get citys details
     * 
     */
    public function getCityByStateId($stateId = 0)
    {
         $city = DB::table('cities')->where('state_id',$stateId)
                        ->select('id as CityId','name as CityName')->get();
        return $city;
    }
    /** purpose : get states details
     * 
     */
    public function getStateById($stateId = null)
    {
        $state = DB::table('states')->where('id',$stateId)
                 ->select('id as StateId','name as StateName')->get();
        
        return $state;
    }
    /** purpose : get states details
     * 
     */
    public function getCityById($cityId=null)
    {
         $city = DB::table('cities')->where('id',$cityId)
                    ->select('id as CityId','name as CityName')->get();
        
        return $city;
    }
    /** purpose : get states details
     * 
     */
    public function getAreaById($areaid = null)
    {
        $area = DB::table('city_areas')->where('id',$areaid)
                ->select('id as AreaId','name as AreaName','pin_code as PinCode')->get();
        
        return $area;
    }
    /** purpose : get states details
     * 
     */
    public function getStateByName($stateName)
    {
        $state = DB::table('states')
                ->where('name',$stateName)
                ->select('id as StateId','name as StateName')->get();
        
        return $state;
    }
    /** purpose : get city details
     * 
     */
    public function getCityByName($stateId, $cityName)
    {   
         $city = DB::table('cities')
                ->where('state_id',$stateId)
                ->where('name',$cityName)
                ->select('id as CityId','name as CityName')->get();
        
        return $city;
    }
    
    /** purpose : get area details
     * 
     */
    public function getAreaByName($cityId,$areaName)
    {
        $city = DB::table('city_areas')
                ->where('city_id',$cityId)
                ->where('name',$areaName)
                ->select('id as AreaId','name as AreaName','pin_code as PinCode')->get();
        
        return $city;
    }
    
    /** purpose : add / update cityArea details
     * 
     */
    public function addArea($area)
    {
        $area_array =['name' => $area['AreaName'],'city_id'=>$area['CityId'],'status_id'=>$area['Status']
            ,'pin_code'=>$area['PinCode'],'updated_by'=>$area['UserId']];

        $id = DB::table('city_areas')->insertGetId($area_array);
        return $this->getAreaById($id);
    }
    /**  purpose : add / update state details
     * 
     */
    public function addState($state)
    {
        $st_array = ['name' => $state['StateName'],'state_type_id' => $state['StateType'], 
                    'status_id'=> $state['Status'],'updated_by'=>$state['UserId']];

        $id = DB::table('states')->insertGetId($st_array);
        return $this->getStateById($id);
    }
    /** purpose : add / update city details
     * 
     */
    public function addCity($city)
    {
        $city_array =['name' => $city['CityName'],'state_id'=>$city['StateId'],
            'status_id'=>$city['Status'], 'base_url'=>$city['BaseUrl'], 
            'image_url'=>$city['ImgUrl'],'updated_by'=>$city['UserId']];
        
        $id = DB::table('cities')->insertGetId($city_array);
        return $this->getCityById($id);
    }
}
