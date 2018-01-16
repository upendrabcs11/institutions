<?php
namespace App\Http\Controllers\Institute;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Foundation\Auth\AuthenticatesUsers ;

use App\Http\Controllers\Controller ;
use App\Common\UserCommon ;
use App\Model\common\User ;
use App\BusinessLogic\user\UserBL ;
use App\Model\common\Institute ;
use App\BusinessLogic\institute\InstituteBL ;

class InstituteController extends Controller
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
        $this->instituteModel = new Institute();

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
    /**
     *  validate the institute Registration form and if valid sav first user details and then institute details
     *   login the current user and return institute dashbord
     */
    public function postRegistrationForm(Request $request) //function state(Request $request) 
    {
        $requestArray = $request->all();
        InstituteBL::instituteRegistration($requestArray)->validate();  // validate institute form data if fails return validation error
    	
        $userData = UserBL::userAssignDefaultValue($requestArray) ; 
        $user = $this->userModel->createUser($userData);
        if($user == null){
            return $user ; // notification log error
        }

        $instituteInfo = InstituteBL::instituteAssignDefaultValue($requestArray) ;
        $adminUser = $user[0]->id ;
        $institute = $this->instituteModel->createInstitute($instituteInfo , $adminUser) ;

        $this->login($request);
        return redirect('dashboard');
    }
}
