
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', '希朗科技') }}</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{csrf_token()}}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" id="app">
    
    <!-- Main Header -->
    @include('partials.header')
    
    <!-- Left side column. contains the logo and sidebar -->
    @include('partials.sidebar')
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
    	@yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    <!-- Main Footer -->
    @include('partials.footer')

</div>
<script src="{{asset('js/app.js')}}"></script>
@yield('script')
</body>
</html>
