<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
</head>
<body>
    @include('includes.header') 
    <div class="container"> 
        @yield('content') 
    </div> 
    <!-- These scripts are here for testing purposes and later should be inside the resources folder and minified --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script> 
    <!-- <script src="/js/custom.js"></script> 
    <script src="public/js/custom.js"></script> 
    <script src="/public/js/custom.js"></script> --> 
</body>
</html>