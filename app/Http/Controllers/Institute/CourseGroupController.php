<?php
namespace App\Http\Controllers\Institute;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Foundation\Auth\AuthenticatesUsers ;
use App\Http\Controllers\Controller ;

use App\Common\UserCommon ;
use App\Model\Common\User ;
use App\Model\Common\InstituteCommonType;

use App\BusinessLogic\User\UserBL ;
use App\Model\Institute\Institute ;
use App\BusinessLogic\Institute\InstituteBL ;

class CourseGroupController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Instantiate a new  instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->userModel = new User();
        $this->instituteModel = new Institute(UserCommon::getLoogedInUserId());
        $this->common = new InstituteCommonType();
    }
    /**
     * Show the institute Registration form.
     *
     * @return \Illuminate\Http\Response
     */    
    public function getRegistrationForm()
    {
    	return  view('auth.institute_register'); 
    }
    

}
