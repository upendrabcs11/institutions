<?php
namespace App\Http\Controllers\API\Institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Institute\InstituteType;
use App\Model\Institute\Institute;
use App\Model\Institute\Subject;
use App\Model\Institute\Course;
use App\Model\Institute\CourseType;
use App\Model\Institute\CourseLevel;
use App\Model\Institute\CourseGroup;
use App\Model\Institute\ExaminationType;
use App\Model\Institute\ClassBatchType;
use App\Model\Institute\ClassScheduleDay;

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
    /**  API : Update status of institute  
    */
    public function getInstituteType(Request $request)
    {  
       $instituteTypeModel = new InstituteType();
       return $instituteTypeModel->getInstituteType();
    }
    /**
     * 
     */
    public function getInstitutes(Request $request)
    {  
       $searchStr = $request->SearchUsing;
       $instituteModel = new Institute();
       return $instituteModel->getInstitutesBySearchName($searchStr);
    }
    /**
     * 
     */
    public function getSubjects(Request $request)
    {  
       $courseLevelId = $request->CourseLevelId;
       $subjectModel = new Subject();
       return $subjectModel->getSubjects($courseLevelId);
    }
    /**
     * 
     */
    public function getCourses(Request $request)
    {  
       $courseModel = new Course();
       return $courseModel->getCourses();
    }
    /**
     * 
     */
    public function getCourseType(Request $request)
    {  
       $courseTypeModel = new CourseType();
       return $courseTypeModel->getCourseType();
    }   
     /**
     * 
     */
    public function getCourseLevel(Request $request)
    {  
       $courseLevelModel = new CourseLevel();
       return $courseLevelModel->getCourseLevel();
    }
    /**
     * 
     */
    public function getCourseGroup(Request $request)
    {  
       $courseGroupModel = new CourseGroup();
       return $courseGroupModel->getCourseGroup();
    }
     /**
     * 
     */
    public function getExaminationType(Request $request)
    {  
       $examinationTypeModel = new ExaminationType();
       return $examinationTypeModel->getExaminationType();
    }   
     /**
     * 
     */
    public function getClassBatchType(Request $request)
    {  
       $classBatchTypeModel = new ClassBatchType();
       return $classBatchTypeModel->getClassBatchType();
    }
    /**
     * 
     */
    public function getClassScheduleDays(Request $request)
    {  
       $classScheduleDayModel = new ClassScheduleDay();
       return $classScheduleDayModel->getClassScheduleDays();
    }
    // subjects
    // institute_types
    // institutes

    // courses
    // course_types
    //course_levels
    //course_groups

    // examination_types
    //classes_batch_type
    //classes_schedule_day
}
