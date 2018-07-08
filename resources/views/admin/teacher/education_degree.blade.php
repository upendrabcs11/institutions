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



.paging-nav {
  text-align: right;
padding-top: 2px;
}

.paging-nav a {
  margin: auto 1px;
  text-decoration: none;
  display: inline-block;
  padding: 1px 7px;
  background: #91b9e6;
  color: white;
  border-radius: 3px;
}

.paging-nav .selected-page {
  background: #187ed5;
  font-weight: bold;

}


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
                <th style="width:8%;">Priority</th>
                <th> Name</th>
                <th> Full Name</th>
                <th> Short Name</th>
                <th>Eductaion Stage Id</th>                      
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($degrees as $degree)
            <tr>
                <td class="accordion-toggle item-id" data-toggle="collapse" 
                  data-target="#collapse{{$degree->EducationDegreeId}}" nowrap="">
                      <span>{{$degree->EducationDegreeId}}</span>
                       &nbsp;<i class="fa fa-arrow-circle-o-down">
                </td>
                <td class="item-priority">
                  <input type="number" class="form-control" value="{{$degree->Priority}}">
                </td>
                <td class="item-name">
                  <input type="text" class="form-control" value="{{$degree->EducationDegreeName}}">
                </td>
                <td class="item-fullname">
                  <input type="text" class="form-control" value="{{$degree->FullName}}">
                </td>
                <td class="item-shortname">
                  <input type="text" class="form-control" value="{{$degree->ShortName}}">
                </td>
                <td class="item-education-stage">
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
                <td class="item-status">
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
              <td><button type="button" class="btn btn-success updatebutton">Update</button></td>
            </tr>
            <tr class="noborder">
              <td colspan="9" style="padding:0 10px">
                <div id="collapse{{$degree->EducationDegreeId}}" class="collapse">
                  <div class="row form-group">                                
                    <div class="col-md-4 form-inline">
                      <label>Created Date:-</label>
                      <span>{{date('d F Y', strtotime($degree->CreatedDate))}} </span>
                     </div>
                    <div class="col-md-4 form-inline">
                     <label>Updated Date:-</label>
                     <span>{{date('d F Y', strtotime($degree->UpdatedDate))}}</span>
                    </div>                    
                  </div>
                  <div class="row form-group"> 
                    <div class="col-md-4 form-inline">
                       <label>Updated By:-</label>
                       <span>{{is_null($degree->UpdatedBy)? "NA":$degree->UpdatedBy}} </span>
                    </div>
                    <div class="col-md-6 form-inline item-description">
                      <label>Description</label>
                      <textarea class="form-control"rows="2"cols="50">{{$degree->Description}}</textarea>
                    </div>
                  </div>
<<<<<<< HEAD
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







=======
                </div>
              </td>
            </tr>
               @endforeach             
            </tbody>
       </table>
       </div>
   </div>
</div>
>>>>>>> 5deff24da39054656726d8701d0f75873355b432
</div>
@endsection
  
@section('scripts')
   <script type="text/javascript" src={{ asset("/js/common/validation.js")}}></script>
  
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
 <script type="text/javascript" src={{ asset("/js/common/paging.js")}}></script>

   <script type="text/javascript">
      var edu_status= @json($status);
      var edu_stage= @json($stage);
      console.log(edu_stage);
      
      console.log(edu_status);
   $(document).ready(function(){
      $('.tabledata').paging({
        limit:8,
        rowDisplayStyle: 'block',
        activePage: 0,
        rows: []

      }); 
       $(".menu-item> h4 a").on("click",function(){
       });
       
       $(".updatebutton").on("click",function(){
            add_update_education_degree($(this),"PUT");
       });

      $(document).on("click",".insertbutton",function(){
         add_update_education_degree($(this),"POST");
      });

       $(".accordion-toggle").on("click", function(){
          $(this).find('.fa').toggleClass('fa-arrow-circle-o-down');
          $(this).find('.fa').toggleClass('fa-arrow-circle-o-up');
       })

      $(".addbutton").click(function(){
                  
          var add_obj = create_new_tr_object();
           $('tbody').prepend(add_obj);
       });

   });
 function add_update_education_degree(obj,request_type){
           var parent_tr = $(obj).parent().parent();
            var close_tr = $(parent_tr).next();
            var degree_info = {};
            degree_info.DegreeId = $(parent_tr).find(".item-id").find('span').text();
            degree_info.Name = $(parent_tr).find(".item-name").find('input').val();
            degree_info.FullName = $(parent_tr).find(".item-fullname").find('input').val();
            degree_info.ShortName = $(parent_tr).find(".item-shortname").find('input').val();
            degree_info.Priority = $(parent_tr).find(".item-priority").find('input').val();
            degree_info.Status = $(parent_tr).find(".item-status").find('select option:selected').text();
            degree_info.StatusId = $(parent_tr).find(".item-status").find('select option:selected').val();  
            degree_info.EducationStageId= $(parent_tr).find(".item-education-stage").
                                              find('select option:selected').val();
              degree_info.EducationStage = $(parent_tr).find(".item-education-stage").
                                              find('select option:selected').text();                                
            degree_info.Description = $(close_tr).find(".item-description").find('textarea').val();
            // console.log(parent_tr,close_tr)
            if(request_type == "PUT")
                last_url = "/"+degree_info.DegreeId ;
            else if(request_type == "POST")
              last_url = "";

            $.ajax({
                type : request_type,
                url : url_config.baseUrl + "/admin/teacher/education-degree"+last_url,
                data : degree_info ,
                success : function(responce){
                  //console.log(responce);
                  // need to show msg of successful submission
                  if(request_type == "POST")
                       location.reload();
                },
                error : function(){
                  alert('Error');
                }
          });
            console.log(degree_info);
    }

 function create_new_tr_object(){
       var new_obj = '<tr>'
                +'<td class="accordion-toggle item-id" data-toggle="collapse" data-target="#collapse" nowrap="">'
                      +'<span>NA</span> &nbsp;<i class="fa fa-arrow-circle-o-down">'
                +'</td>'
                +'<td class="item-priority">'
                  +'<input type="number" class="form-control" value="">'
                +'</td>'
                +'<td class="item-name">'
                + '<input type="text" class="form-control" value="">'
                +'</td>'
                +'<td class="item-fullname">'
                +'<input type="text" class="form-control" value="">'
                +'</td>'
                +'<td class="item-shortname">'
                + '<input type="text" class="form-control" value="">'
                +'</td>'
                +'<td class="item-education-stage">'
                  +'<select class="form-control">'
                        + add_stage()     
                  +'</select>'
                +'</td>'               
                +'<td class="item-status">'
                 + '<select class="form-control">'
                      +  add_status()
                + '</select>'
               +'</td>'
               +'<td><button type="button" class="btn btn-success insertbutton">Insert</button></td>'
              +'</tr>'
              +'<tr class="noborder">'
              +'<td colspan="9" style="padding:0 10px">'
               +'<div id="collapse" class="collapse">'
                  +'<div class="row form-group">'                                
                    +'<div class="col-md-4 form-inline">'
                      +'<label>Created Date:-</label>'
                      +'<span> </span>'
                     +'</div>'
                    +'<div class="col-md-4 form-inline">'
                     +'<label>Updated Date:-</label>'
                     +'<span></span>'
                    +'</div>'                   
                  +'</div>'
                  +'<div class="row form-group">' 
                    +'<div class="col-md-4 form-inline">'
                       +'<label>Updated By:-</label>'
                       +'<span></span>'
                    +'</div>'
                    +'<div class="col-md-6 form-inline item-description">'
                      +'<label>Description</label>'
                      +'<textarea class="form-control"rows="2"cols="50"></textarea>'
                    +'</div>'
                  +'</div>'
                +'</div>'
              +'</td>'
            +'</tr>'
        return new_obj;
    };
     function add_status(){
      var obj_status="";
        for(i in edu_status){
          obj_status += '<option Value="'+edu_status[i].StatusId+'">'+
           edu_status[i].Status+'</option>' ;
         } 
         return obj_status;
     }
   function add_stage(){
      var obj_stage="";
        for(i in edu_stage){
          obj_stage += '<option Value="'+edu_stage[i].EducationStageId+'">'+
            edu_stage[i].EducationStageName+'</option>' ;
         } 
         return obj_stage;
     }
</script>
<<<<<<< HEAD
                  $(this).parent().parent().find('ul').toggle();
                 

=======
            $(this).parent().parent().find('ul').toggle(); 
>>>>>>> 5deff24da39054656726d8701d0f75873355b432
