<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Foundation\Auth\AuthenticatesUsers ;

use App\Http\Controllers\Controller ;
use App\Common\UserCommon ;
use App\Model\common\User ;

use App\BusinessLogic\user\UserBL ;

class UserController extends Controller
{
    //use AuthenticatesUsers;
    /**
     * Instantiate a new  instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->userModel = new User();
    // }
    /**
     * Show the institute Registration form.
     *
     * @return \Illuminate\Http\Response
     */    
    public function register(Request $request)
    {
    	if($request->isMethod('get')){
            return view('user.register');
        }
        else{ // method == POST
            return "hi";
        }
    }
 }