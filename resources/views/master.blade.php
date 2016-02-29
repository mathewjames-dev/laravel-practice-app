<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="http://sezgi/img/favicon.ico">
    <meta charset="utf-8">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta id="pusher_key" content="{{ env('PUSHER_KEY') }}">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/css/home.css">
    <link rel="stylesheet" type="text/css" href="/css/master.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="/js/overHang.js"type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js"></script>
    <script src="https://js.pusher.com/3.0/pusher.min.js"></script>
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
    body{
        background: #ECE9E6; /* fallback for old browsers */
        background: -webkit-linear-gradient(to left, #ECE9E6 , #FFFFFF); /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to left, #ECE9E6 , #FFFFFF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
</style>