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

/*input, select
{
    box-sizing: content-box;
    -moz-box-sizing: content-box;
    -webkit-box-sizing: content-box;
}*/
textarea{
    text-align:left;
}
textarea {
    white-space: normal;
    text-align: left;
}
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
                <th>Description</th>                      
                <th>Status</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th>Updated By</th>
                <th>Update</th>
              </tr>
            </thead>
            <tbody>
               @foreach($collegeType as $collegeType)
                <tr>
                    <td class="accordion-toggle item-id" data-toggle="collapse" 
                      data-target="" nowrap="">
                          <span>{{$collegeType->CollegeTypeId}}</span>
                           &nbsp;<i class="fa fa-arrow-circle-o-down">
                    </td>
                    <td class="item-priority">
                      <input type="number" class="form-control" value="{{$collegeType->Priority}}">
                    </td>
                    <td class="item-name">
                      <input type="text" class="form-control" value="{{$collegeType->CollegeTypeName}}">
                    </td>
                    <td class="item-description">
                      <textarea class="form-control">{{$collegeType->Description}}</textarea>
                    </td>
                     <td class="item-status">
                      <select class="form-control">
                           @foreach($status as $sts)
                               @if($sts->StatusId != $collegeType->StatusId)
                                <option Value="{{$sts->StatusId}}">{{$sts->Status}}</option> 
                               @else
                                <option Value="{{$sts->StatusId}}" selected>{{$sts->Status}}</option>
                            @endif
                           @endforeach    
                      </select>
                    </td>       
                    <td class="item-created-date">
                        <span>{{date('d F Y', strtotime($collegeType->created_date))}}</span>
                    </td>
                    <td class="item-updated-date">
                        <span>{{date('d F Y', strtotime($collegeType->last_updated_date))}}</span>
                    </td> 
                    <td class="item-updated-by">
                        <span>{{$collegeType->first_name}}</span>
                    </td>    
                  <td><button type="button" class="btn btn-success updatebutton">update</button></td>
                </tr>
             @endforeach 
           
            </tbody>
       </table>
       </div>
   </div>
</div>
</div>
@endsection
  
@section('scripts')
   <script type="text/javascript" src={{ asset("/js/common/validation.js")}}></script>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
 <script type="text/javascript" src={{ asset("/js/common/paging.js")}}></script>
   <script type="text/javascript">
   // $.ajaxSetup({
   //      headers: {
   //          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   //      }
   //  });
  var clg_status  = @json($status);
   $(document).ready(function(){ 


        $('.tabledata').paging({
        limit:5,
        rowDisplayStyle: 'block',
        activePage: 0,
        rows: []

      }); 
       $(".menu-item> h4 a").on("click",function(){
            $(this).parent().parent().find('ul').toggle(); 
       });
       $("tbody").on("click",".insertbutton",function(){
            var parent_tr = $(this).parent().parent();
            college_type = getCollegeTypeDetails(parent_tr,"insert");
            console.log(college_type,"insert");
            addUpdateAjax("POST",college_type);
       });
       $(".updatebutton").on("click",function(){
            var parent_tr = $(this).parent().parent();
            college_type = getCollegeTypeDetails(parent_tr);             
            console.log(college_type);
            addUpdateAjax("PUT",college_type);
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
  function getCollegeTypeDetails(obj,isinsert){
    var college_type = {};
          if(!isinsert){
            college_type.CollegeTypeId = $(obj).find(".item-id").find('span').text();
           }
          college_type.Name = $(obj).find(".item-name").find('input').val();  
          college_type.Priority = $(obj).find(".item-priority").find('input').val();
          college_type.Status = $(obj).find(".item-status").find('select option:selected').text();
          college_type.StatusId = $(obj).find(".item-status").find('select option:selected').val(); 
          college_type.Description = $(obj).find(".item-description").find('textarea').val();
          // college_type._token = '{{csrf_token()}}'
        return college_type ;
  }
  function addUpdateAjax(type,data){
    if(!isValid(data))
       return ;
   var pathurl = "/admin/teacher/college-type"+(type=="PUT"?"/"+college_type.CollegeTypeId:""); 
    $.ajax({
            type : type,
            url : url_config.baseUrl+pathurl,
            data : data,
            success : function(responce){
              console.log(responce);
              // need to show msg of successful submission
            },
            error : function(){
              alert('Error');
            }
       });
    if(type == "POST")
      console.log("reload the page");
  };
  function isValid(data){
    var isValid = true;
    var errorMsg = ""
     if(!validate.nameCommon(data.Name)){
        errorMsg += "Please enter name field</br>"
        isValid = false;
     }
     if(data.Priority < 0){
        errorMsg += "Priority Should not be < 0</br>"
        isValid = false;
     }
     if(data.Status >= 0){
        errorMsg += "Please enter valid status</br>"
        isValid = false;
     }
    if(!validate.optionalName(data.Description)){
        errorMsg += "Please enter Proper Description</br>"
        isValid = false;
     }
     if(!isValid){
      alert(errorMsg)
     }
     return isValid;
  };

  function create_new_tr_object(){
       var new_obj ='<tr>'
              + '<td class="accordion-toggle item-id" data-toggle="collapse" data-target="" nowrap="">'
                    +'<span>NA</span>&nbsp;<i class="fa fa-arrow-circle-o-down">'
              +'</td>'
              +'<td class="item-priority">'
               + '<input type="number" class="form-control" value="0">'
              +'</td>'
              +'<td class="item-name">'
               + '<input type="text" class="form-control" value="">'
              +'</td>'
              +'<td class="item-description">'
               + '<textarea class="form-control"></textarea>'
              +'</td>'
               +'<td class="item-status">'
                +'<select class="form-control">'
                +     add_status()
                +'</select>'
              +'</td>'       
              +'<td class="item-created-date"><span></span></td>'
              +'<td class="item-updated-date"><span></span></td>'
              +'<td class="item-updated-date"></td>'    
            +'<td><button type="button" class="btn btn-success insertbutton">Insert</button></td>'
          +'</tr>' ;
        return new_obj;
   };

   function add_status(){
      var obj_status="";
        for(i in clg_status){
          obj_status += '<option Value="'+clg_status[i].StatusId+'">'+clg_status[i].Status+'</option>' ;
         } 
         return obj_status;
     }
   </script>
@endsection