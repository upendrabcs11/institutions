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
    /**
     *  validate the institute Registration form and if valid sav first user details and 
     *  then institute details
     *   login the current user and return institute dashbord
     */
    public function postRegistrationForm(Request $request) //function state(Request $request) 
    {
        $requestArray = $request->all();
         // validate institute form data if fails return validation error
        InstituteBL::registrationValidation($requestArray)->validate(); 

        $userData = UserBL::updateUserKeyMapping($requestArray) ; 
        $userData['Status'] = 1 ;
        $userData['UserType'] = UserBL::USER_TYPE['InstituteAdmin'] ;
        $user = $this->userModel->createUser($userData);
        if($user == null){
            return $user ; // notification log error
        }
        //return  $user;
        $instituteInfo = InstituteBL::updateInstituteKeyMapping($requestArray) ;
        $adminUser = $user[0]->UserId ;
        $instituteInfo['Status'] = 0;
        $instituteInfo['TypeId'] = 0;
        $institute = $this->instituteModel->createInstitute($instituteInfo , $adminUser) ;
        // return $institute ;
        //$loginRequest = UserBL::buildLoginRequest($request);
        //return  $loginRequest;
        $this->login($request);
        return redirect('dashboard');
    }
    /**
     *
     */
   public function getBasicInfoEditPage()
    {
        $userId = UserCommon::getLoogedInUserId();
        $instituteDetails = $this->instituteModel->getInstituteByUserId($userId);
        $institute_type = $this->common->getInstituteType();
        //echo $institute_type;
        return view('dashboard_partial.institute_basicinfo_edit')
               ->with(['institute'=> $instituteDetails[0],'institute_type'=>$institute_type]);

    }
    /**
     *
     */
   public function getAddressEditPage()
    {
        $userId = UserCommon::getLoogedInUserId();
        $instituteDetails = $this->instituteModel->getInstituteByUserId($userId);
        //echo $institute_type;
        return view('dashboard_partial.institute_address_edit')
               ->with(['institute'=> $instituteDetails[0]]);

    }

    public function updateBasicInfo(Request $request, $id)
    {
        //return $request->all();
        if(InstituteBL::hasPermissionToUpdate($id)){
            $validation = InstituteBL::basicInfoValidation($request->all());
            if($validation->fails()){
                $errors = $validation->errors();
                return $errors->toJson();
            }
          $instituteInfo = InstituteBL::updateInstituteKeyMapping($request->all());
          //return $instituteInfo;
          $institute = $this->instituteModel->updateInstituteBasicInfo($instituteInfo,$id);
          return $institute;          
       }
       return "Permission Dennied ";
    }

    public function updateAddress(Request $request, $id)
    {
        //return $request->all();
        if(InstituteBL::hasPermissionToUpdate($id)){
            $validation = InstituteBL::instituteAddress($request->all());
            if($validation->fails()){
                $errors = $validation->errors();
                return $errors->toJson();
            }
          $instituteInfo = InstituteBL::updateInstituteKeyMapping($request->all());
          //return $instituteInfo;
          $institute = $this->instituteModel->updateInstituteAddress($instituteInfo,$id);
          return $institute;          
       }
       return "Permission Dennied ";
    }

}
