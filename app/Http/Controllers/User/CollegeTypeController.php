<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request ;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller ;

use App\Common\UserCommon ;

use App\Model\Common\Status ;

use App\Model\College\CollegeType;
use App\BusinessLogic\User\CollegeTypeBL;


class CollegeTypeController extends Controller
{
    /**
     * Instantiate a new  instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->statusModel = new Status();
        $this->collegetypeModel = new CollegeType();
    }
    /**
     * Show the institute Registration form.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index(Request $request,$id=null)
    {
    	//echo $id;
        if($request->isMethod('get')){
            $collegeType= $this->collegetypeModel->getCollegeTypeFullDetails();
            $status = $this->statusModel->getStatus(); 
            return view('admin.teacher.college_type')->with(['collegeType'=> $collegeType,'status'=>$status]);
        }
        else if($request->isMethod('put')){                
            $this->update_college_Type($request,$id);
        }
        else if($request->isMethod('post')){                
            $this->add_college_Type($request);
        }          
    }

    public function update_college_Type(Request $request,$id){
        $requestArray = $request->all();
       // validate institute form data if fails return validation error
       $validation = CollegeTypeBL::validate($request->all());
        if($validation->fails()){
            $errors = $validation->errors();
            return Response($errors->toJson(),400);
        }
        $college_type = CollegeTypeBL::updateKeyMapping($requestArray) ;
        $userId = UserCommon::getLoggedInUserId();
        $resp = $this->collegetypeModel->updateCollegeType($college_type , $userId, $id) ;
        return $resp;
    }
    public function add_college_Type(Request $request){
        $requestArray = $request->all();
       // validate institute form data if fails return validation error
       $validation = CollegeTypeBL::validate($request->all());
        if($validation->fails()){
            $errors = $validation->errors();
            return Response($errors->toJson(),400);
        }
        $college_type = CollegeTypeBL::updateKeyMapping($requestArray) ;
        $userId = UserCommon::getLoggedInUserId();
        $resp = $this->collegetypeModel->addCollegeType($college_type , $userId) ;
        return $resp;
    }
   

}
