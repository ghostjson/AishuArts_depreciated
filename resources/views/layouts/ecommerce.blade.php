<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />    
    <meta name="author" content="INSPIRO" />    
    <meta name="description" content="Themeforest Template Polo, html template">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{asset('images/favicon-new.jpg')}}">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>🎨aishuArts🖌</title>
    <!-- Stylesheets & Fonts -->
    <link href="{{asset('css/plugins.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery.js')}}"></script>
</head>

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Topbar -->
        @include('partials.topbar')
        <!-- end: Topbar -->
        <!-- Header -->
        @include('partials.header')
        <!-- end: Header -->

        {{-- PAGE CONTENTS START --}}
        @yield('contents')
        {{-- PAGE CONTENTS END --}}
        
        <!-- DELIVERY INFO -->
        @include('partials.deliveryinfo')
        <!-- end: DELIVERY INFO -->
        <!-- Footer -->
        @include('partials.footer')
        <!-- end: Footer -->
    </div> <!-- end: Body Inner -->
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--SCRIPTS START-->
    @include('partials.scripts')
</body>

</html>