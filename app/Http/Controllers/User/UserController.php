<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Foundation\Auth\AuthenticatesUsers ;

use App\Http\Controllers\Controller ;
use App\Common\UserCommon ;
use App\Model\Common\User ;

use App\BusinessLogic\User\UserBL ;

class UserController extends Controller
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
    }
    /**
     * Show the user Registration form.
     *
     * @return \Illuminate\Http\Response
     */    
    public function register(Request $request)
    {
    	if($request->isMethod('get')){
            return view('user.register');
        }
        else{ // method == POST
            return $this->postUserRegister($request);
        }
    }
   /**
     * save User registration form data if data is validated 
     */ 
   public function postUserRegister(Request $request){
        $requestArray = $request->all();
        UserBL::userValidation($requestArray)->validate();
        $userData = UserBL::updateUserKeyMapping($requestArray) ; 
        $userData['Status'] = 1 ;
        $user = $this->userModel->createUser($userData);
        if($user == null){
            return $user ; // notification log error
        }
        $this->login($request);
        return redirect('dashboard');
   }
 }