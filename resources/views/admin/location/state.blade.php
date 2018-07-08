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
                <th>ID</th>      
                <th>Name</th>
                <th>Status</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th>Updated By</th>
                <th>Update</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach($states as $states)
            <tr>
                <td class="accordion-toggle item-id" data-toggle="collapse" 
                  data-target="" nowrap="">
                      <span>{{$states->StateId }}</span>
                       &nbsp;<i class="fa fa-arrow-circle-o-down">
                </td>
                
                <td class="item-name">
                  <input type="text" class="form-control" value="{{ $states->StateName }}">
                </td>
                             
                <td class="item-status">
                  <select class="form-control">

                           @foreach($status as $sts)
                         @if($sts->StatusId != $states->StatusId)
                          <option Value="{{$sts->StatusId}}">{{$sts->Status}}</option> 
                         @else
                          <option Value="{{$sts->StatusId}}" selected>{{$sts->Status}}</option>
                         @endif
                      @endforeach 
  
                </select>
               </td>
                <td>
                  <span>{{date('d F Y', strtotime($states->CreatedDate))}} </span>
                </td>
                <td>
                    <span>{{date('d F Y', strtotime($states->UpdatedDate))}} </span>
                 </td>
                <td>
                     <span>{{is_null($states->UpdatedBy)? "NA":$states->UpdatedBy}} </span>
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
   <script type="text/javascript">
       
       var state_status= @json($status);
   $(document).ready(function(){ 
       $(".menu-item> h4 a").on("click",function(){
            $(this).parent().parent().find('ul').toggle(); 
       });
       
       $(".updatebutton").on("click",function(){
            //validation
            
            
            
            add_update_state($(this),"PUT");
            
            
       });
        $(".addbutton").click(function(){
         //   alert("jvjbn");      
          var add_obj = create_new_tr_object();
           $('tbody').prepend(add_obj);
       });
         $(document).on("click",".insertbutton",function(){
         add_update_state($(this),"POST");

         // alert("mdnmbnmb");
      });

       $(".accordion-toggle").on("click", function(){
          $(this).find('.fa').toggleClass('fa-arrow-circle-o-down');
          $(this).find('.fa').toggleClass('fa-arrow-circle-o-up');
       })

      
    

      

   });
   
   function create_new_tr_object(){
       var new_obj = '<tr>'
                +'<td class="accordion-toggle item-id" data-toggle="collapse" data-target="#collapse" nowrap="">'
                      +'<span>NA</span> &nbsp;<i class="fa fa-arrow-circle-o-down">'
                +'</td>'
                +'<td class="item-name">'
                + '<input type="text" class="form-control" value="">'
                +'</td>'             
                +'<td class="item-status">'
                 + '<select class="form-control">'
                      +  add_status()
                  + '</select>'
               +'</td>'
                +'<td>'
                  +'<span> </span>'
                +'</td>'
                +'<td>'
                    +'<span> </span>'
                 +'</td>'
                +'<td>'
                    +'<span> </span>'
                +'</td>'
               
               +'<td><button type="button" class="btn btn-success insertbutton">Insert</button></td>'
              +'</tr>'
       return new_obj;
       
       };
        function add_status(){
         var obj_status="";
        for(i in state_status){
          obj_status += '<option Value="'+state_status[i].StatusId+'">'+
           state_status[i].Status+'</option>' ;
         } 
         return obj_status;
     }
   function add_update_state(obj,request_type){
       
         var parent_tr = $(obj).parent().parent();
            var close_tr = $(parent_tr).next();
            var state_info = {};
            state_info.StateId = $(parent_tr).find(".item-id").find('span').text();
            state_info.Name = $(parent_tr).find(".item-name").find('input').val();
            state_info.Status = $(parent_tr).find(".item-status").find('select option:selected').text();
            state_info.StatusId = $(parent_tr).find(".item-status").find('select option:selected').val();  
            
            // console.log(parent_tr,close_tr)
            if(request_type == "PUT")
                last_url = "/"+state_info.StateId ;
            else if(request_type == "POST")
              last_url = "";

            $.ajax({
                type : request_type,
                url : url_config.baseUrl + "/admin/location/state"+last_url,
                data : state_info ,
                success : function(responce){
       
       
          if(request_type == "POST")
                       location.reload();
                },
                error : function(responce){
                  alert(responce);
                }
          });
            console.log(state_info);
    }

    
  
   
   </script>
@endsection