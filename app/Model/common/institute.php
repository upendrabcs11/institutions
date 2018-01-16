<?php

namespace App\Model\common;
use DB;

class Institute 
{
    /**
     * Instantiate a new  instance.
     *
     * @return void
     */
    public function __construct($userid = 0)
    {
        $this->curUserId = $userid;
    }
    /**
     * Show the register institute
     */
    public function createInstitute($insInfo,$adminUser)
    {
        $InsPram = array($insInfo['Name'],$insInfo['StateId'],$insInfo['CityId'],$insInfo['AreaId'],
            $insInfo['Address'],$insInfo['Status'],$insInfo['TypeId'],$adminUser);

        $institute = DB::select('call  institute_create(?,?,?,?,?,?,?,?)', $InsPram);
        return $institute ;
    }
    
    /**
     * get institute details
     */
    public function getInstituteByUserId($userId)
    {
        $institute = DB::select('call  institute_by_user_id_get(?)', array($userId));
        return $institute ;
    }
    /**
     * get adminUserId details
     */
    public function getInstituteByInstituteId($instituteId)
    {
        $institute = DB::select('call  institute_by_id_get(?)', array($instituteId));
        return $institute ;
    }
    /**
     * update institute type by user / super admin
     */
    public function updateInstituteStatus($insInfo,$instituteId)
    {
        $institute = DB::select('call  institute_type_update(?,?,?,?)', 
                      array($instituteId, $insInfo['Status'], $insInfo['TypeId'], $this->curUserId));
        return $institute ;
    }
    /**
     * update institute type by user / super admin
     */
    public function updateInstituteBasicInfo($insInfo,$instituteId)
    {
        $updateParam = array($instituteId, $insInfo['Name'],$insInfo['ShortName'],
             $insInfo['FullName'],$insInfo['ParentId'],$insInfo['TypeId'],
             $insInfo['RunningSince'],$insInfo['Summary'],$this->curUserId);

        $institute = DB::select('call  institute_basic_info_update(?,?,?,?,?,?,?,?,?)', $updateParam);
        return $institute ;
    }
    /**
     * update institute type by user / super admin
     */
    public function updateInstituteAddress($insInfo,$instituteId)
    {
        $updateParam = array($instituteId, $insInfo['StateId'],$insInfo['CityId'],
             $insInfo['AreaId'],$insInfo['Address'],$this->curUserId);

        $institute = DB::select('call  institute_address_update(?,?,?,?,?,?)', $updateParam);
        return $institute ;
    }
}