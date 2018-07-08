<?php

namespace App\Common;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;

use App\Common\UserCommon ;

class Enum 
{
    const UserType = [
         'Normal'=> 0,
         'Teacher'=>1,
         'InstituteAdmin' => 10,
         'SuperAdmin'=>11];

    const Status = [
         'Inactive'=> 0,
         'Active'=>1,
         'New' => 10,
         'Pending'=>11,
         'Verified' => 12];
}