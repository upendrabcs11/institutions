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
            <table class="table table-bordered table-striped table-hover tabledata">
                  <thead>
                    <tr>
                      <th>column1</th>
                      <th>column2</th>
                      <th>column3</th>
                      <th>column4</th>
                      <th>column5</th>
                      <th>column6</th>
                      <th>update</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td> <input type="text" class="form-control" id="usr"></td>
                      <td> <input type="text" class="form-control" id="usr"></td>
                      <td> <input type="text" class="form-control" id="usr"></td>
                      <td> <input type="text" class="form-control" id="usr"></td>
                      <td> <input type="text" class="form-control" id="usr"></td>
                      <td> <input type="text" class="form-control" id="usr"></td>
                      <td><button type="button" class="btn btn-success">Update</button></td>
                    </tr>
                    
                  </tbody>
          </table>
       


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
       $(".addbutton").on("click",function(){

            alert("nbnb");

       })
      

   });

   </script>
@endsection