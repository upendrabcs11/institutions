<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request ;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller ;

use App\Common\UserCommon ;
use App\Model\User\EducationDegree ;
use App\Model\User\EducationStage ;
use App\Model\Common\Status ;
use App\BusinessLogic\User\EducationDegreeBL;


class EducationDegreeController extends Controller
{
    /**
     * Instantiate a new  instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->educationDegreeModel = new EducationDegree();
        $this->statusModel = new Status();
        $this->educationStageModel = new EducationStage();
        $this->userId = UserCommon::getLoggedInUserId();
    }
    /**
     * Show the institute Registration form.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index(Request $request, $id=null)
    {
    	//echo $id;
        if($request->isMethod('get')){
             $educationDegree = $this->educationDegreeModel->getEducationDegreeFullDetails() ;
             $status = $this->statusModel->getStatus();
             $educationStage = $this->educationStageModel->getEducationStage();
            return view('admin.teacher.education_degree')
            ->with(['degrees'=> $educationDegree,'status'=>$status,'stage'=>$educationStage]); 
        }
        // else{ // method == POST
        //     //return $this->postState($request);
        // }

         else if($request->isMethod('put')){
           
            return $this->update_education_degree($request,$id);
          }
          else if($request->isMethod('post')){
            return $this->create_education_degree($request);
            return $request->all();
          }
    }

    /**
     * 
     */
    public function create_education_degree(Request $request){
      $requestArray = $request->all();
       // validate institute form data if fails return validation error
       $validation = EducationDegreeBL::validate($request->all());
        if($validation->fails()){
            $errors = $validation->errors();
            return Response($errors->toJson(),400);
        }
        $education_degree = EducationDegreeBL::updateKeyMapping($requestArray) ;
        $resp = $this->educationDegreeModel->addEducationDegree($education_degree , $this->userId) ;
        return $resp;
    }
    /**
     * 
     */
    public function update_education_degree(Request $request, $id){
       $requestArray = $request->all();
       // validate institute form data if fails return validation error
       $validation = EducationDegreeBL::validate($request->all());
        if($validation->fails()){
            $errors = $validation->errors();
            return Response($errors->toJson(),400);
        }
        $education_degree = EducationDegreeBL::updateKeyMapping($requestArray) ;
        $resp = $this->educationDegreeModel->updateEducationDegree($education_degree , $this->userId, $id) ;
        return $resp;
    }
    

}
