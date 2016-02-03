<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="http://sezgi/img/favicon.ico">
    <meta charset="utf-8">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="/js/overHang.js"type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.1/locale/en-gb.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>
</head>

<div class="body">

<header>
    @include('partials.navbar')
</header>

    <div class="container">
        @yield('content')
    </div>

</div>

<script>
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
</script>

</html>

<style>
    .logo {
        color: #f4511e;
        font-size: 200px;
    }
    .container{
        padding-top: 100px;
        padding-bottom: 70px;
        width:100%;
    }
    .navbar{
        font-family: Montserrat, sans-serif;
        margin-bottom: 0;
        background: #E6DADA; /* fallback for old browsers */
        background: -webkit-linear-gradient(to left, #E6DADA , #274046); /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to left, #E6DADA , #274046); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        border: 0;
        font-size: 11px !important;
        letter-spacing: 4px;
        opacity: 0.9;
        z-index: 1000;
        padding-top: 40px;
        height: 75px;
    }
    .navbar li a, .navbar .navbar-brand {
        color: black !important;
    }
    .navbar-nav li a:hover {
        color: #fff !important;
    }
    .navbar-nav li.active a {
        color: #fff !important;
        background-color: #29292c !important;
    }
    .navbar-default .navbar-toggle {
        border-color: transparent;
    }
    .open .dropdown-toggle {
        color: #fff;
        background-color: #555 !important;
    }
    .dropdown-menu li a {
        color: #000 !important;
    }
    .dropdown-menu li a:hover {
        background-color: greenyellow !important;
    }
    .img-responsive{
        margin-right: auto;
        margin-left: auto;
        height:300px;
        width: 600px;
        max-width: 80%;
    }
    .logo{
        margin-top: -39px;
        height: 100px;
        padding-right: 15px;
        margin-left: 100px;
    }
</style>
