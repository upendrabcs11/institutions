<?php
namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\User\UserType;
use App\Model\College\College;
use App\Model\College\CollegeType;
use App\Model\User\EducationDegree;
use App\Model\User\EducationDepartment;
use App\Model\User\EducationStage;
use App\Model\User\TeacherTitle;

class CommonController extends Controller
{
    /**
     * Instantiate a new  instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    /**  API : Get User Type  
    */
    public function getUserType(Request $request)
    {
       $req = $request->all();
       $userTypeModel = new UserType();
       return $userTypeModel->getUserType($req);
    }
    
    /**
     * 
     */
    public function getCollege(Request $request)
    {  
       $req = $request->all();
       $collegeModel = new College();
       return $collegeModel->getCollege($req);
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
       $educationDepartmentModel = new EducationDepartment();
       return $educationDepartmentModel->getEducationDepartment();
    }    
     /**
     * 
     */
    public function getEducationStage(Request $request)
    {  
       $educationStageModel = new EducationStage();
       return $educationStageModel->getEducationStage();
    }
    /**
     * 
     */
    public function getTeacherTitle(Request $request)
    {  
       $teacherTitleModel = new TeacherTitle();
       return $teacherTitleModel->getTeacherTitle();
    }
    // college
    // college_Type
    // education_degree
    // education_department
    // education_level
    // teacher_title
}
