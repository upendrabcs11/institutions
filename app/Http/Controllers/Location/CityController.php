<?php
namespace App\Http\Controllers\Location;

use Illuminate\Http\Request ;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller ;
use App\Common\UserCommon ;
use App\Model\Location\City ;
use App\Model\Location\State ;

use App\Model\Common\Status ;
use App\Model\Location\Location ;



class CityController extends Controller
{
    /**
     * Instantiate a new  instance.
     *
     * @return void
     */
    public function __construct()
    {
       
        $this->statusModel = new Status();
        $this->stateModel = new State();
        $this->cityModel = new City();
        $this->locationModel = new Location();
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
             $cityDetail =  $this->cityModel->getCity() ;
             $status = $this->statusModel->getStatus();
             $state=$this->locationModel->getState(["status"=>1]);
            return view('admin.location.city')
            ->with(['city'=>$cityDetail,'status'=>$status]); 
        }
//        if($request->isMethod('put')){
//           
//            return $this->update_state($request,$id);
//          }
//          if($request->isMethod('post')){
//              
//              return $this->insert_state($request);
//              
//          }
        
    }
    
    /**
     * 
     * @param Request $request
     * @param type $id
     * @return type
     */
     public function update_state(Request $request, $id){
       $requestArray = $request->all();
       // validate institute form data if fails return validation error
//       $validation = StateBL::validate($request->all());
//        if($validation->fails()){
//            $errors = $validation->errors();
//            return Response($errors->toJson(),400);
//        }
//        $state_info = StateBL::updateKeyMapping($requestArray) ;
        $resp = $this->stateModel->updateState($requestArray , $this->userId, $id) ;
        return $resp;
    }
     public function insert_state(Request $request){
       $requestArray = $request->all();
       // validate institute form data if fails return validation error
//       $validation = StateBL::validate($request->all());
//        if($validation->fails()){
//            $errors = $validation->errors();
//            return Response($errors->toJson(),400);
//        }
//        $state_info = StateBL::updateKeyMapping($requestArray);
        $resp = $this->stateModel->insertState($requestArray);
        return $resp;
    }
   

}
