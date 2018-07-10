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
                <th> ID</th>
                <th style="width:8%;">Priority</th>
                <th> Name</th>
                <th> Full Name</th>
                <th> Short Name</th>
                <th>Eductaion Stage Id</th>                      
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
               @foreach($college as $college)
            <tr>
                <td class="accordion-toggle item-id" data-toggle="collapse" 
                  data-target="" nowrap="">
                      <span></span>
                       &nbsp;<i class="fa fa-arrow-circle-o-down">
                </td>
                <td class="item-priority">
                  <input type="number" class="form-control" value="">
                </td>
                <td class="item-name">
                  <input type="text" class="form-control" value="">
                </td>
                <td class="item-fullname">
                  <input type="text" class="form-control" value="">
                </td>
                <td class="item-shortname">
                  <input type="text" class="form-control" value="">
                </td>
                <td class="item-education-stage">
                  <select class="form-control">
                     
                          <option Value=""></option> 
                         
                          <option selected Value=""></option>
                         
                                       
                  </select>
                </td>               
                <td class="item-status">
                  <select class="form-control">

                          <option Value=""></option> 
                       
                          <option Value="" selected></option>
  
                </select>
               </td>
              <td><button type="button" class="btn btn-success updatebutton">update</button></td>
            </tr>
            <tr class="noborder">
              <td colspan="9" style="padding:0 10px">
                <div  class="collapse">
                  <div class="row form-group">                                
                    <div class="col-md-4 form-inline">
                      <label>Created Date:-</label>
                      <span></span>
                     </div>
                    <div class="col-md-4 form-inline">
                     <label>Updated Date:-</label>
                     <span></span>
                    </div>                    
                  </div>
                  <div class="row form-group"> 
                    <div class="col-md-4 form-inline">
                       <label>Updated By:-</label>
                       <span> </span>
                    </div>
                    <div class="col-md-6 form-inline item-description">
                      <label>Description</label>
                      <textarea class="form-control"rows="2"cols="50"></textarea>
                    </div>
                  </div>
                </div>
              </td>
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
   $(document).ready(function(){ 
       $(".menu-item> h4 a").on("click",function(){
            $(this).parent().parent().find('ul').toggle(); 
       });
       
       $(".updatebutton").on("click",function(){
            //validation
            var parent_tr = $(this).parent().parent();
            var close_tr = $(parent_tr).next();
            var degree_info = {};
            
            
       })

       $(".accordion-toggle").on("click", function(){
          $(this).find('.fa').toggleClass('fa-arrow-circle-o-down');
          $(this).find('.fa').toggleClass('fa-arrow-circle-o-up');
       })


    

      

   });

   </script>
@endsection