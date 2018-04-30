<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Foundation\Auth\AuthenticatesUsers ;
use App\Http\Controllers\Controller ;

use App\Model\User\EducationDegree ;
use App\Model\User\EducationStage ;
use App\Model\Common\Status ;


class EducationDegreeController extends Controller
{
    use AuthenticatesUsers;
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
    }
    /**
     * Show the institute Registration form.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index(Request $request)
    {
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

          if($request->isMethod('put')){



          }


    }
    

}
