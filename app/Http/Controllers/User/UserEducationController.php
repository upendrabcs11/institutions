<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Foundation\Auth\AuthenticatesUsers ;

use App\Http\Controllers\Controller ;

use App\Common\UserCommon ;

use App\Model\User\UserEducation ;

use App\BusinessLogic\User\UserEducationBL ;

class UserEducationController extends Controller
{
    //use AuthenticatesUsers;
    /**
     * Instantiate a new  instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->userEducationModel = new UserEducation();
    }
    /**
     * Show the user Registration form.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index(Request $request)
    {
    	if($request->isMethod('get')){
            return "view('user.register')";
        }
        else{ // method == POST
            return $this->postUserEducation($request);
        }
    }
   /**
     * save User registration form data if data is validated 
     */ 
   public function postUserEducation(Request $request){
        $requestArray = $request->all();
        $validation = UserEducationBL::userEducationValidation($requestArray);
        if($validation->fails()){
            $errors = $validation->errors();
            return $errors->toJson();
          }
        $userEducation = UserEducationBL::updateUserEducationKeyMapping($requestArray) ; 
        $userEducation['StatusId'] = 1 ;
        $userEducationResp = $this->userEducationModel
                    ->addUserEducation($userEducation, UserCommon::getLoggedInUserId());
        
        return $userEducationResp;
   }
 }