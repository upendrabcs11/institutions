<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use App\Common\UserCommon ;
use App\Model\Institute\Institute ;
use App\BusinessLogic\User\UserBL ;


class UserDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $instituteModel ;
    protected $routePath = ['0' => 'dashboard.institute','1' => 'institute_dashboard'];
    public function __construct()
    {
        $this->instituteModel = new Institute();
        $this->middleware('auth');
        $this->dashBoardType = UserCommon::getLoggedInUserType();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = 0)
    {
        return $this->getInstituteDashboard();
    }
    protected function getInstituteDashboard(){
        $userType = UserCommon::getLoggedInUserType();
        if($userType == UserBL::USER_TYPE['InstituteAdmin']){
            $userId = UserCommon::getLoggedInUserId();
            $instituteDetails = $this->instituteModel->getInstituteByUserId($userId);
            return view('dashboard.institute')->with(['institute'=> $instituteDetails[0]]);
        }
        else if($userType == UserBL::USER_TYPE['Teacher']){
            return view('dashboard.user_details');
        }
        else if($userType == UserBL::USER_TYPE['Normal']){
            return "Normal";
        }
        else 
            return "none";
        
    }
   

}
