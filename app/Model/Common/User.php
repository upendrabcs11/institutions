<?php

namespace App\Model\Common;
use DB;

class User 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  createUser($user)
    {
         $user_array =['first_name' => $user['FirstName'],'last_name'=>$user['LastName'],
            'email'=>$user['Email'],'mobile'=>$user['MobileNo'],'password'=>bcrypt($user['Password']),
            'status_id'=>$user['Status'],'user_type_id'=>$user['UserType']];

        $id = DB::table('users')->insertGetId($user_array);
        return $this->getUserById($id);
       
    }
    public function getUserById($id){
        $user = DB::table('users as usr')
                ->join('status as sts', 'sts.id', '=', 'usr.status_id')
                ->join('user_types as utyp', 'utyp.id', '=', 'usr.user_type_id')
                ->where('usr.id',$id)
                ->select('usr.id as UserId', 'usr.first_name as FirstName', 'usr.last_name AS LastName',
                    'usr.email AS Email', 'usr.mobile AS MobileNo', 'usr.status_id as StatusId',
                    'usr.user_type_id AS UserTypeId', 'utyp.name as UserType', 
                    'sts.name AS Status')->get();
        
        return $user;
    }
}
