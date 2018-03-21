<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name', '') }}</title>
    <!-- Styles -->
    <link href={{ asset("/css/static/bootstrap.min.css")}} rel="stylesheet">
    <link href={{ asset("/css/static/font-awesome.min.css")}} rel="stylesheet">
    <link href={{ asset("css/common/style.css") }} rel="stylesheet">
    <style>
    </style>
    @yield('styles')
    <!-- Scripts -->
    <script type="text/javascript" src={{ asset("/js/common/plugin/jquery-3.2.1.min.js")}}></script>
    <script type="text/javascript" src={{ asset("/js/common/plugin/bootstrap.min.js")}}></script>    
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app-container">
       @include('layouts.headers.mainHeader')
      <section class="content-container">
         <div class="container-fluid">
             @yield('content')
         </div>
     </section>
  <button id="open-popup-form" class="hide" data-toggle="modal" data-target="#popup-form"></button>
  <div id="popup-form" class="modal fade" role="dialog">
    
  </div>

   <footer>
    
   </footer>
</div>
  <script type="text/javascript">
   var url_config = url_config || {} ;
       url_config.baseUrl = "{{ url('/') }}"
   //var HEADERS = { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  </script>
  @yield('scripts')
</body>
</html>
