<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Foundation\Auth\AuthenticatesUsers ;

use App\Http\Controllers\Controller ;
use App\Common\UserCommon ;

use App\Model\User\UserExperience ;

use App\BusinessLogic\User\UserExperienceBL ;

class UserExperienceController extends Controller
{
     //use AuthenticatesUsers;
    /**
     * Instantiate a new  instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->userExperienceModel = new UserExperience();
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
            return $this->postUserExperience($request);
        }
    }
   /**
     * save User registration form data if data is validated 
     */ 
   public function postUserExperience(Request $request){
        $requestArray = $request->all();
        $validation = UserExperienceBL::userExperienceValidation($requestArray);
        if($validation->fails()){
            $errors = $validation->errors();
            return $errors->toJson();
          }
        $userExperience = UserExperienceBL::updateUserExperienceKeyMapping($requestArray) ; 
        $userExperience['StatusId'] = 1 ;
        $userExperienceResp = $this->userExperienceModel->addUserExperience($userExperience,
                                 UserCommon::getLoogedInUserId());
   }
 }