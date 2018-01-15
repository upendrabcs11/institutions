<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use App\Common\UserCommon ;
use App\Model\common\Institute ;

class DashboardController extends Controller
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
        $this->dashBoardType = UserCommon::getLoogedInUserType();
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
        $userId = UserCommon::getLoogedInUserId();
        $instituteDetails = $this->instituteModel->getInstituteByUserId($userId);
        return view('dashboard.institute')->with(['institute'=> $instituteDetails[0]]);
    }
   

}
