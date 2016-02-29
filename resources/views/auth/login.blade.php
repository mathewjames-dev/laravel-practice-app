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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.1/locale/en-gb.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>
</head>

<div class="body">

    <header id="header">
        <div id="logo-group">
            <span id="logo"> <a href="/"><img class="logo" src="{{URL::asset('img/bg.png')}} "/></a> </span>
        </div>

        <span id="login-header-space"> <span class="hidden-mobile">Not Registered?</span> <a href="/auth/register" class="btn btn-danger">Register</a> </span>

    </header>

    <div class="container">

        <div class="row">
            <div class="col-md-7">
                <h1>A Practice Site!</h1>
                <div class="left">
                    <div class="pull-left register-desc">
                        <h4 class="para">Here is just a simple practice site that I have done and am improving</h4>
                        <div class="icons">
                            <a href="/auth/login" class="btn btn-danger desc">TEST</a>
                            <a href="/auth/login" class="btn btn-danger">TEST</a>
                        </div>
                    </div>
                    <img class="pull-right display-image" style="width:300px;" src="{{URL::asset('img/pp.png')}} "/></a>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="heading">Testing</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a
                            type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="heading">Testing</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a
                            type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="well no-padding">
                    <form method="POST" action="{{ action('Auth\AuthController@postLogin') }}" id="login-form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input class="form-control" type="text" name="name" placeholder="Username">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                            <input class="form-control" type="password" name="password" placeholder="Password">
                        </div>
                        <br>
                        <div class="form-footer">
                            <button class="btn" type="submit">Login</button>
                        </div>
                    </form>
                    <br>
                    @include('errors.list')
                    <br>
                    <h5 class="text-center">- Sign In Using Social Media -</h5>
                    <div class="social">
                        <ul class="list-inline text-center">
                            <li><a href="/auth/facebook" role="button" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="/auth/twitter" class="btn btn-primary disabled btn-circle"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="/auth/github" class="btn btn-primary btn-circle"><i class="fa fa-github-alt"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

<script>
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
</script>

</html>

<style>
    .form-footer{
        height: 31px;
        font: 300 15px/29px 'Open Sans',Helvetica,Arial,sans-serif;
        cursor: pointer;
    }
    .heading{
        color: #565656;
        font-size: 15px;
        font-weight: 700;
        line-height: 24px;
        margin: 0 0 5px;
    }
    .left{
        background-image: url(http://distribution2.info/img/gradient/login.png);
        background-repeat: no-repeat;
        background-position: 0 137px;
        height: 275px;
        width: 100%;
        float: left;
    }
    .icons{
        vertical-align: top;
        margin-top: 90px;
        width: 300px;
    }
    .para{
        color: #565656;
        font-size: 15px;
        font-weight: 400;
        line-height: 22px;
        margin-top: 15px;
        width: 270px;
    }
    .display-image{
        margin-top: -60px;
        margin-right: 20px;
    }
    #logo{
             float:left;
         }
    #login-header-space{
        float:right;
        text-align: right;
        display: block;
        vertical-align: middle;
        line-height: 71px;
    }
    #header{
        margin: 0;
        height: 71px;
        border-bottom: 1px solid #eee!important;
        overflow: hidden;
        padding: 0 30px;
        background-clip: padding-box;
        border-width: 0;
        min-height: 28px;
        background: #f4f4f4!important;
        margin-bottom: 20px;
    }
    .container{
        padding-top: 30px;
        padding-bottom: 70px;
    }
    .img-responsive{
        margin-right: auto;
        margin-left: auto;
        height:300px;
        width: 600px;
        max-width: 80%;
    }
    .logo{
        margin-top: 10px;
        height: 50px;
        padding-right: 15px;
    }
</style>
