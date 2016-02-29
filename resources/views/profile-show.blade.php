@extends('master')

@section('content')
    <div class="row">
        @include('partials.sidenav')

        <div class="col-md-10">
            <div class="well well-light well-sm no-margin no-padding">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3 profile-pic">
                                <img style="width:auto;height:250px;"src="{{$user->avatar}}">
                                <div class="padding-10">
                                    <h4 class="font-md"><strong>{{$user->friends()->count()}}</strong>
                                        <br>
                                        <small>Connections</small></h4>
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h1><span class="semi-bold">{{$user->name}}</span>
                                    <br>
                                    <small>Admin</small></h1>

                                <ul class="list-unstyled">
                                    <li>
                                        <p class="text-muted">
                                            <i class="fa fa-gamepad"></i>&nbsp;&nbsp;(<span class="txt-color-darken">Minecraft</span>) <span class="txt-color-darken">eMaaaZe10</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="text-muted">
                                            <i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:mattjames_95@outlook.com">mattjames_95@outlook.com</a>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="text-muted">
                                            <i class="fa fa-skype"></i>&nbsp;&nbsp;<span class="txt-color-darken">emaaazehd</span>
                                        </p>
                                    </li>
                                </ul>
                                <br>
                                <p class="font-md">
                                    <i>A little about me...</i>
                                </p>
                                <p>
                                    This is some random text about me
                                </p>
                                <br>
                                <a href="{{ route('message-user', [$user->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-envelope-o"></i> Send Message</a>
                                <br>
                                <br>

                            </div>
                            <div class="col-sm-3">
                                <h1><small>Connections</small></h1>
                                <ul class="list-inline friends-list">
                                    @foreach($friends as $f)
                                    <li><img style="width:auto;height:75px;" src="{{$f->avatar}}" alt="friend-1">
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

<style>
    #hr {
        width: 100%;
        margin-top: 5px;
        margin-bottom: 5px;
    }
    #side-nav a:hover{
        text-decoration:none;
        color: limegreen;
    }
    #side-nav a{
        color:black;
    }
    #side-nav{
        padding-left: 10px;
    }
    #side-nav li{
        color:black;
        font-size: 20px;
        padding-left: 10px;
        padding-top: 5px;
        padding: 0;
        margin: 0;
        line-height: 2.5em;
        list-style: none;
        position: relative;
        width:100%;
    }
    #name{
        text-transform: capitalize;
        font-size: 25px;
        display: inline-block;
        text-decoration: none;
        max-width: 150px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        vertical-align: middle;
    }
    .online{
        width: 50px;
        height: auto;
        display: inline-block;
        vertical-align: middle;
        margin-top: 1px;
        margin-right: 5px;
        margin-left: 0;
        border-left: 3px solid #fff;
    }
    #shortcut{
        padding-left: 15px;
        text-decoration: none!important;
        color: #a8a8a8;
        display: inline-block;
        margin-top: 6px;
    }
    .login-info{
        display: block;
        font-size: 12px;
        height: 62px;
        color: #fff;
        border: solid transparent;
        border-width: 1px 0;
        box-shadow: inset 1px 1px 0 rgba(0,0,0,.1),inset 0 -1px 0 rgba(0,0,0,.07);
        width: 100%;
        margin: 0!important;
        border-bottom: 1px solid #525151;
    }
    .dropdown{
        background-color: black;
        display: block;
        padding-top: 15px;
        padding-left: 15px;
        top: -25px;
        height: 180px;
        margin-bottom: -15px;
        width: 100%;
        border: 1px solid black;
        opacity: 0.6;
    }
    .dropdown-icons {
        height: 150px;
        width: auto;
        margin-right: 25px;
        opacity: 10;
    }
    .active{
        border: 1px solid blue;
    }
    .icon-row li{
        display: inline;
    }
</style>