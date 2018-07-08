@extends('layouts.mainLayout')

@section('styles')
 <link href={{ asset("css/common/style.css") }} rel="stylesheet">
@endsection
@section('content')
<div class="row">
  

</div>
@endsection
  
@section('scripts')
   <script type="text/javascript" src={{ asset("/js/common/validation.js")}}></script>
   <script type="text/javascript">
   $(document).ready(function(){ 
   });

   </script>
@endsection