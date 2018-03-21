<?php

namespace App\BusinessLogic;
use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Support\Facades\Auth ;
use App\Common\UserCommon ;
use App\Model\location\Location ;

class LocationBL 
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->locationModel = new Location();
     
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateStateKeyMapping($state)
    { 
        $stateDetail['StateName'] = $state['StateName'];
        $stateDetail['StateType'] = $state['StateType'];
        $stateDetail['UserId'] = UserCommon::getLoogedInUserId();
        return $stateDetail;
    }
    /** purpose : get states details
     * 
     */
    public function updateCityKeyMapping($city)
    {
    	$cityDetail['CityName'] = $city['CityName'];
        $cityDetail['StateId'] = $city['StateId'];
        $cityDetail['BaseUrl'] = isset($city['BaseUrl']) ? $city['BaseUrl'] : "";
        $cityDetail['ImgUrl'] =  isset($city['ImgUrl']) ? $city['ImgUrl'] : "";
        $cityDetail['UserId'] = UserCommon::getLoogedInUserId();
        return $cityDetail;
    }
    /** purpose : get citys details
     * 
     */
    public function updateAreaKeyMapping($area)
    {
        $areaDetail['AreaName'] =  $area['AreaName'];
        $areaDetail['CityId'] = $area['CityId'];
        $areaDetail['PinCode'] = isset($area['PinCode']) ? $area['PinCode'] : null;
        $areaDetail['UserId'] = UserCommon::getLoogedInUserId();
        return $areaDetail;
    }
    
    /** purpose : add / update cityArea details
     * 
     */
    public function addStateValidate($state)
    {
        return Validator::make($state, [
            //'StateName' =>  array('required|exists:state_types,id','regex:/^([a-zA-Z]+){3,}$/u' ),
            'StateName' =>  'required|string|unique:states,name',
            'StateType' => 'required|exists:state_types,id',
        ]);       
        // array(
        //     'required',
        //     'regex:/(^([a-zA-Z]+)(\d+)?$)/u'
        // )
       // 'mission_id' => 'required|exists:missions,id',
    }
    /** purpose : add / update cityArea details
     * 
     */
    public function addCityValidate($city)
    {
        return Validator::make($city, [
            'CityName' =>  'required|string||min:3|max:60',
            'StateId' => 'required|exists:states,id',
            'BaseUrl' => 'sometimes|required|max:100',
            'ImgUrl' => 'sometimes|required|max:100',
        ]);       
    }

   public function addAreaValidate($area)
    {
        return Validator::make($area, [
            'AreaName' =>  'required|string||min:3|max:60',
            'CityId' => 'required|exists:cities,id',
            'PinCode' => 'nullable|numeric|min:100000|max:999999',
        ]);       
    }
}
