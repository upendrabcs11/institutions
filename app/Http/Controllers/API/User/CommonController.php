<?php
namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Common\UserCommon ;
use App\BusinessLogic\User\UserBL ;

use App\Model\User\UserType;
use App\Model\College\College;
use App\Model\User\EducationDegree;


class CommonController extends Controller
{
    /**
     * Instantiate a new  instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->userTypeModel = new UserType();
    }
    /**  API : Update status of institute  
    */
    public function getUserType(Request $request)
    {  
       $userTypeModel = new UserType();
       return $userTypeModel->getUserType();
    }
    /**
     * 
     */
    public function getCollegeType(Request $request)
    {  
       $collegeModel = new College();
       return $collegeModel->getCollegeType();
    }
    /**
     * 
     */
    public function getEducationDegree(Request $request)
    {  
       $educationDegreeModel = new EducationDegree();
       return $educationDegreeModel->getEducationDegree();
    }
    /**
     * 
     */
    public function getEducationDepartment(Request $request)
    {  
       $educationDepartmentModel = new EducationDegree();
       return $educationDepartmentModel->getEducationDepartment();
    }
    
    /**  API : Get the details of city based on StateID 
    *           if stateId is 0 then return all citys
    */
    // public function postUserType(Request $request) // id is instituteId
    // {
    //   if($this->userType == UserBL::USER_TYPE['SuperAdmin']){
          
    //    }
    //    return "Permission Dennied ";
    // }
    // college
    // college_Type
    // education_degree
    // education_department
    // education_level
    // teacher_title
}
