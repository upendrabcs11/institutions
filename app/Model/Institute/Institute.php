<?php

namespace App\Model\Institute;
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
        $ins_array =['name' => $insInfo['Name'],'state_id'=>$insInfo['StateId'],
            'city_id'=>$insInfo['CityId'],'area_id'=>$insInfo['AreaId'],
            'main_address'=>$insInfo['Address'], 'status_id'=>$insInfo['Status'],
            'institute_type_id'=>$insInfo['TypeId'],'admin_id'=>$adminUser];

        $id = DB::table('institutes')->insertGetId($ins_array);
        return $this->getInstituteByInstituteId($id);
    }
    
    /**
     * get institute details
     */
    public function getInstituteByUserId($userId)
    {
        $institute = DB::table('institutes as ins')
            ->join('states as st', 'st.id', '=', 'ins.state_id')
            ->join('cities as ct', 'ct.id', '=', 'ins.city_id')
            ->join('city_areas as ar', 'ar.id', '=', 'ins.area_id')
            ->join('status as sts', 'sts.id', '=', 'ins.status_id')
            ->join('institute_types as instyp', 'instyp.id', '=', 'ins.institute_type_id')
            ->where('ins.admin_id',$userId)
            ->select('ins.id as InstituteId', 'ins.name as Name', 'ins.sort_name AS ShortName',
              'ins.full_name AS FullName', 'ins.parent_institute_id AS ParentId',
              'ins.admin_id AS AdminUserId', 'ins.institute_type_id as InstituteTypeId',
              'ins.status_id AS StatusId',  'ins.state_id AS StateId', 'ins.city_id AS CityId',
              'ins.area_id AS AreaId', 'ins.main_address AS Address', 'ins.created_date AS CreatedDate',
              'ins.last_updated_date AS UpdatedDate', 'ins.updated_by AS UpdatedBy',
              'ins.running_since AS RunningSince', 'ins.about_institute AS AboutInstitute',
              'st.name as StateName', 'ct.name as CityName', 'ar.name AS AreaName','ar.pin_code as PinCode' ,
              'sts.name as Status', 'instyp.name as InstituteType')->get();
        
        return $institute;
    }
    /**
     * get adminUserId details
     */
    public function getInstituteByInstituteId($instituteId)
    {
        $institute = DB::table('institutes as ins')
            ->join('states as st', 'st.id', '=', 'ins.state_id')
            ->join('cities as ct', 'ct.id', '=', 'ins.city_id')
            ->join('city_areas as ar', 'ar.id', '=', 'ins.area_id')
            ->join('status as sts', 'sts.id', '=', 'ins.status_id')
            ->join('institute_types as instyp', 'instyp.id', '=', 'ins.institute_type_id')
            ->where('ins.id',$instituteId)
            ->select('ins.id as InstituteId', 'ins.name as Name', 'ins.sort_name AS ShortName',
              'ins.full_name AS FullName', 'ins.parent_institute_id AS ParentId',
              'ins.admin_id AS AdminUserId', 'ins.institute_type_id as InstituteTypeId',
              'ins.status_id AS StatusId',  'ins.state_id AS StateId', 'ins.city_id AS CityId',
              'ins.area_id AS AreaId', 'ins.main_address AS Address', 'ins.created_date AS CreatedDate',
              'ins.last_updated_date AS UpdatedDate', 'ins.updated_by AS UpdatedBy',
              'ins.running_since AS RunningSince', 'ins.about_institute AS AboutInstitute',
              'st.name as StateName', 'ct.name as CityName', 'ar.name AS AreaName','ar.pin_code as PinCode',
              'sts.name as Status', 'instyp.name as InstituteType')->get();
        
        return $institute;
        
    }
    /**
     * update institute type by user / super admin
     */
    public function updateInstituteBasicInfo($insInfo,$instituteId)
    {
      $ins_array = [];
      if($insInfo['Name'] != null)
        $ins_array['name'] = $insInfo['Name'] ;

      if($insInfo['ShortName'] != null)
        $ins_array['sort_name'] = $insInfo['ShortName'] ;

      if($insInfo['FullName'] != null)
        $ins_array['full_name'] = $insInfo['FullName'] ;

      if($insInfo['ParentId'] != null)
        $ins_array['parent_institute_id'] = $insInfo['ParentId'] ;

      // if($insInfo['Name'] != null)
      //   $ins_array['admin_id'] = $insInfo['Name'] ;

      if($insInfo['TypeId'] != null)
        $ins_array['institute_type_id'] = $insInfo['TypeId'] ;

      if($insInfo['Status'] != null)
        $ins_array['status_id'] = $insInfo['Status'] ;

      if($insInfo['RunningSince'] != null)
        $ins_array['running_since'] = $insInfo['RunningSince'] ;

      if($insInfo['Summary'] != null)
        $ins_array['about_institute'] = $insInfo['Summary'] ;

      $ins_array['updated_by'] = $insInfo['UserId'];

      DB::table('institutes')
            ->where('id', $instituteId)
            ->update($ins_array);

      return $this->getInstituteByInstituteId($instituteId);
    }
    /**
     * update institute type by user / super admin
     */
    public function updateInstituteAddress($insInfo,$instituteId)
    {
        $ins_array = [];
      if($insInfo['StateId'] != null)
        $ins_array['state_id'] = $insInfo['StateId'] ;

      if($insInfo['CityId'] != null)
        $ins_array['city_id'] = $insInfo['CityId'] ;

      if($insInfo['AreaId'] != null)
        $ins_array['area_id'] = $insInfo['AreaId'] ;

      if($insInfo['Address'] != null)
        $ins_array['main_address'] = $insInfo['Address'] ;

      $ins_array['updated_by'] = $insInfo['UserId'];

      DB::table('institutes')
            ->where('id', $instituteId)
            ->update($ins_array);

      return $this->getInstituteByInstituteId($instituteId);
    }
    /**
     * get institute details
     */
    public function getInstitutesBySearchName($searchedName)
    {
       $nameLike = "%{$searchedName}%" ;
        $institutes = DB::table('institutes as ins')
            ->join('cities as ct', 'ct.id', '=', 'ins.city_id')
            ->where('ins.name','like',$nameLike)
            ->orwhere('ins.full_name','like',$nameLike)
            ->select('ins.id as InstituteId', 'ins.name as InstituteName', 
              'ct.name as CityName')
            ->get();
        
        return $institutes;
    }
}