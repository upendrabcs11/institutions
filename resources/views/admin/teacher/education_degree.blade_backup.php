@extends('layouts.mainLayout')

@section('styles')
 <link href={{ asset("css/common/style.css") }} rel="stylesheet">

<style type="text/css">

*{
  margin: 0px;
  padding: 0px;
}

 .sidebar{
  background-color: orange;
  height:100vh;
 }
 .sidebar li{

  list-style-type: none;
 }
  .menu-item ul a{
    font-size: 15px;


  }
.menu-item a{
 text-decoration:none;
}
.maintable{
  margin-top:15px;
}
/**/
.addbutton{
  margin-top: -8px;
}

/*.menu-item li:hover {
  background: #eee;
}*/

table {
width: 95vw;
max-width: 95vw;
}

.table tr td .collapse{padding:10px 0}
.table-striped > tbody > tr:nth-of-type(2n+2){background:#f1f1f1}

.table-striped > tbody > tr.noborder td{border-top:none;}


</style>


@endsection
@section('content')
 <div class="row">
@include('admin.nav.common_nav')
<div class="col-md-10 maintable">
   <div class="panel panel-default">
       <div class="panel-heading" style="">
        <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>List</span>
        </strong>

        <div class="btn-group pull-right">
          <button type="button" class="btn btn-primary addbutton">Add</button>
        </div>
       </div>
       <div class="panel-body">
            <table class="table table-striped table-hover tabledata">
                  <thead>
                    <tr>
                      <th> ID</th>
                      <th>Priority</th>
                      <th> Name</th>
                      <th> Full Name</th>
                      <th> Short Name</th>
                      <th>Eductaion Stage Id</th>
                      
                      <th>Status</th>
                      <!-- <th>Show More</th> -->

                     <!--  <th>Description</th>
                      <th>Created Date</th>  
                      <th>Updated Date</th>
                      <th>Updated By</th> -->
                      <th>Update</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($degrees as $degree)
                      <tr>
                          <td class="accordion-toggle" data-toggle="collapse" data-target="#collapse{{$degree->EducationDegreeId}}" nowrap="">{{$degree->EducationDegreeId}} &nbsp;<i class="fa fa-arrow-circle-o-down"></td>
                          <td><input type="number" class="form-control" value="{{$degree->Priority}}"></td>
                          <td><input type="text" class="form-control" value="{{$degree->EducationDegreeName}}"></td>
                          <td><input type="text" class="form-control" value="{{$degree->FullName}}"></td>
                          <td><input type="text" class="form-control" value="{{$degree->ShortName}}"></td>
                          <td>
                            <select class="form-control">
                                @foreach($stage as $stg)
                                   @if($stg->EducationStageId != $degree->EducationStageId)
                                    <option Value="{{$stg->EducationStageId}}">{{$stg->EducationStageName}}</option> 
                                   @else
                                    <option selected Value="{{$stg->EducationStageId}}">{{$stg->EducationStageName}}</option>
                                   @endif
                                @endforeach                       
                            </select>
                          </td>
                         
                          <td>
                            <select class="form-control">
                               @foreach($status as $sts)
                                   @if($sts->StatusId != $degree->StatusId)
                                    <option Value="{{$sts->StatusId}}">{{$sts->Status}}</option> 
                                   @else
                                    <option Value="{{$sts->StatusId}}" selected>{{$sts->Status}}</option>
                                   @endif
                                @endforeach  
                          </select>
                         </td>
                          <!-- <td>
                            <textarea class="form-control">
                                    {{$degree->Description}}
                            </textarea>
                          </td>
                          <td>{{$degree->CreatedDate}}</td>
                          <td>{{$degree->UpdatedDate}}</td>
                          <td>{{$degree->UpdatedBy}}</td> -->
                          <!-- <td><button class="btn btn-default">More</button></td> -->
                          <td><button type="button" class="btn btn-success updatebutton">Update</button></td>
                      </tr>
                      <tr class="noborder">
                        <td colspan="9" style="padding:0 10px">
                          <div id="collapse{{$degree->EducationDegreeId}}" class="collapse">
                            <div class="row form-group">
                                <div class="col-md-4 form-inline">
                                  <label>Name</label>
                                  <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4 form-inline">
                                  <label>Name</label>
                                  <select class="form-control">
                                    <option>Select</option>
                                  </select>
                                </div>
                                <div class="col-md-4 form-inline">
                                  <label>Name</label>
                                  <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                  <input type="checkbox" name=""> Check 1
                                  <input type="checkbox" name=""> Check 2
                                  <input type="checkbox" name=""> Check 3
                                </div>
                                <div class="col-md-4">
                                  <input type="radio" name=""> Male
                                  <input type="radio" name=""> Female
                                </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                     @endforeach
                    <!-- <tr>
                      <td> <input type="text" class="form-control" id="usr"></td>
                      <td> <input type="text" class="form-control" id="usr"></td>
                      <td> <input type="text" class="form-control" id="usr"></td>
                      <td> <input type="text" class="form-control" id="usr"></td>
                      <td> <input type="text" class="form-control" id="usr"></td>
                      <td> <input type="text" class="form-control" id="usr"></td>
                      <td><button type="button" class="btn btn-success">Update</button></td>
                    </tr>
                     -->
                    <!--  id as EducationDegreeId','name as EducationDegreeName',
                    'full_name as FullName', 'short_name as ShortName', 'education_stage_id as EducationStageId', 
                    'priority as Priority', 'status_id as StatusId', 'description as Description', 
                     'created_date as CreatedDate', 'last_updated_date as UpdatedDate', 
                     'updated_by as UpdatedBy -->
                  </tbody>
          </table>


     <!-- <table class="table table-bordered table-striped table-hover tabledata">
      <thead>
        <tr>
          <th>Id</th>
          <th>Priority</th>
          <th>Name</th>
          <th>Full Name</th>
          <th>Short Name</th>
          <th>Eductaion Stage Id</th>
          <th>Status</th>
          <th>Update</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="accordion-toggle" data-toggle="collapse" data-target="#collapseOne">1 <i class="fa fa-angle-down"></td>
          <td><input type="text" name="" class="form-control"></td>
          <td><input type="text" name="" class="form-control"></td>
          <td><input type="text" name="" class="form-control"></td>
          <td><input type="text" name="" class="form-control"></td>
          <td><input type="text" name="" class="form-control"></td>
          <td><input type="text" name="" class="form-control"></td>
          <td><button type="button" class="btn btn-success updatebutton">Update</button></td>
        </tr>
        <tr>
          <td colspan="8" style="padding: 0">
            <div id="collapseOne" class="collapse in">
              <div class="row">
                  <div class="col-md-6 form-inline">
                    <label>Name</label>
                    <input type="text" class="form-control">
                  </div>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
      </tbody>
    </table> -->
       


       </div>

   </div>

</div>







</div>
@endsection
  
@section('scripts')
   <script type="text/javascript" src={{ asset("/js/common/validation.js")}}></script>
   <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

   <script type="text/javascript">
   

   $(document).ready(function(){ 
       $(".menu-item> h4 a").on("click",function(){
                  $(this).parent().parent().find('ul').toggle();
                 

       });
       $(".updatebutton").on("click",function(){

            alert("nbnb");

       })

       $(".accordion-toggle").on("click", function(){
          $(this).find('.fa').toggleClass('fa-arrow-circle-o-down');
          $(this).find('.fa').toggleClass('fa-arrow-circle-o-up');
       })
      

   });

   </script>
@endsection