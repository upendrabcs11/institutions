<?php

namespace App\Model\User;
use DB;

class UserExperience
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getUserExperience($userId)
    {
        $userExperience = DB::table('teaching_experiences')
                ->select('id AS userExperienceId', 'user_id as UserId', 'user_role_id as TeacherRoleId',
                    'user_role_name as TeacherRoleName', 'institute_id as InstituteId',
                    'institute_name as InstituteName','grade as Grade', 'activities as Activities',
                    'start_date as StartDate','end_date as EndDate','status_id as StatusId')
                ->where('user_id','=',$userId)->get();
        return $userExperience;
    }
    /**
     * 
     */
    public function  addUserExperience($userExperience, $userId)
    {
        $userExperience_array =['user_id' => $userExperience['UserId'], 
            'user_role_id'=>$userExperience['TeacherRoleId'],
            'user_role_name' => $userExperience['TeacherRoleName'], 
            'institute_id'=>$userExperience['InstituteId'],
            'institute_name' => $userExperience['InstituteName'],
            'about_experience'=>$userExperience['AboutExperience'],
            'start_date' => $userExperience['StartDate'],'end_date'=>$userExperience['EndDate'],
            'status_id'=>$userExperience['StatusId'], 'updated_by'=>$userId ];

        $id = DB::table('teaching_experiences')->insertGetId($userExperience_array);
        return $this->getUserExperience($userId);
    }
    /**
     * 
     */
    public function updateUserExperience($userExperience,$userExperienceId)
    {
      $userExperience_array = [];
      if($userExperience['TeacherRoleId'] != null)
        $userExperience_array['user_role_id'] = $userExperience['TeacherRoleId'] ;
      if($userExperience['TeacherRoleName'] != null)
        $userExperience_array['user_role_name'] = $userExperience['TeacherRoleName'] ;

      if($userExperience['InstituteId'] != null)
        $userExperience_array['institute_id'] = $userExperience['InstituteId'] ;
      if($userExperience['InstituteName'] != null)
        $userExperience_array['institute_name'] = $userExperience['InstituteName'] ;

      if($userExperience['AboutExperience'] != null)
        $userExperience_array['about_experience'] = $userExperience['AboutExperience'] ;

      if($userExperience['StartDate'] != null)
        $userExperience_array['start_date'] = $userExperience['StartDate'] ;
      if($userExperience['EndDate'] != null)
        $userExperience_array['end_date'] = $userExperience['EndDate'] ;

      if($userExperience['StatusId'] != null)
        $userExperience_array['status_id'] = $userExperience['StatusId'] ;

      $userExperience_array['updated_by'] = $userExperience['UpdatedBy'] ;

      DB::table('teaching_experiences')
            ->where('id', $userExperienceId)
            ->update($userExperience_array);

      return $this->getUserExperience($userExperienceId);
    }    
}
