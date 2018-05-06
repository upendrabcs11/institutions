<?php

namespace App\Model\User;
use DB;

class UserEducation 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getUserEducation($userId)
    {
        $userEducation = DB::table('user_educations')
                ->select('id AS UserEducationId', 'user_id as UserId', 'college_id as CollegeId',
                    'college_name as CollegeName', 'department_id as DepartmentId',
                    'department_name as DepartmentName','grade as Grade', 'activities as Activities',
                    'start_date as StartDate','end_date as EndDate','status_id as StatusId')
                ->where('user_id','=',$userId)->get();
        return $userEducation;
    }
    /**
     * 
     */
    public function  addUserEducation($userEducation, $userId)
    {
        $userEducation_array =['user_id' => $userId, 'college_id'=>$userEducation['CollegeId'],
            'college_name' => $userEducation['CollegeName'], 
            'department_id'=>$userEducation['DepartmentId'],
            'department_name' => $userEducation['DepartmentName'],'grade'=>$userEducation['Grade'],
            'education_stage_id' => $userEducation['EducationStageId'],
            'activities'=>$userEducation['Activities'],
            'start_date' => $userEducation['StartDate'],'end_date'=>$userEducation['EndDate'],
            'status_id'=>$userEducation['StatusId'], 'updated_by'=>$userId ];

        $id = DB::table('user_educations')->insertGetId($userEducation_array);
        return $this->getUserEducation($userId);
    }
    /**
     * 
     */
    public function updateUserEducation($userEducation,$userEducationId)
    {
      $userEducation_array = [];
      if($userEducation['CollegeId'] != null)
        $userEducation_array['college_id'] = $userEducation['CollegeId'] ;
      if($userEducation['CollegeName'] != null)
        $userEducation_array['college_name'] = $userEducation['CollegeName'] ;

      if($userEducation['DepartmentId'] != null)
        $userEducation_array['department_id'] = $userEducation['DepartmentId'] ;
      if($userEducation['DepartmentName'] != null)
        $userEducation_array['department_name'] = $userEducation['DepartmentName'] ;

      if($userEducation['Grade'] != null)
        $userEducation_array['grade'] = $userEducation['Grade'] ;

      if($userEducation['EducationStageId'] != null)
        $userEducation_array['education_stage_id'] = $userEducation['EducationStageId'] ;

      if($userEducation['Activities'] != null)
        $userEducation_array['activities'] = $userEducation['Activities'] ;

      if($userEducation['StartDate'] != null)
        $userEducation_array['start_date'] = $userEducation['StartDate'] ;
      if($userEducation['EndDate'] != null)
        $userEducation_array['end_date'] = $userEducation['EndDate'] ;

      if($userEducation['StatusId'] != null)
        $userEducation_array['status_id'] = $userEducation['StatusId'] ;

      $userEducation_array['updated_by'] = $userEducation['UpdatedBy'] ;

      DB::table('user_educations')
            ->where('id', $userEducationId)
            ->update($userEducation_array);

      return $this->getUserEducation($userEducationId);
    }    
}
