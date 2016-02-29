@extends('master')

@section('content')
<div class="row">
    @include('partials.sidenav')

    <div class="col-md-8">
        <div class="well">
            <div class="status text-center">
                <div class="icon">
                    <img style="width:32px; height:32px;" src="{{Auth::user()->avatar}} "/>
                </div>
                <div class="post-status text-center">
                    <form id="status-form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil-square-o fa-fw"></i></span>
                            <input class="form-control" onkeyup="setTimer()" id="text" type="text" name="status" placeholder="Post a status! ">
                        </div>
                        <br>
                        <p id="testing" style="display: none;">This field is required</p>
                        <div class="form-footer">
                            <button class="btn button" id="submit" style="display:none" type="submit"><i class="fa fa-pencil-square-o fa-fw"></i>Post Status</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="timeline">
                @if(Auth::user()->statuses()->count() >= 1)
                <ul class="timeline-list">
                    @foreach($statuses as $status)
                        <li id="list">
                            <div class="timeline-icon">
                                <img style="width:32px; height:32px;" src="{{URL::asset('img/pp.png')}} "/>
                            </div>
                            <div class="timeline-time">
                                <small>{{$status->created_at->diffForHumans()}}</small>
                            </div>
                            <div class="timeline-content">
                                <p>{{$status->body}}</p>
                            </div>
                        </li>
                        <hr class="line">
                    @endforeach
                </ul>
                @else
                <p class="posted">You have not posted anything yet</p>
                @endif
                    <ul class="timeline-list">

                    </ul>
            </div>
        </div>
    </div>

    <div class="col-md-2 text-center">
        <div class="login-info">
            <a href="#" id="chat">
                <span id="name">Chat Status</span>
                <br>
                @if(Auth::user()->chat_status == 1)
                    <span><a href="#" class="toggler">&nbsp;</a></span>
                @else
                    <span><a href="#" class="toggler off">&nbsp;</a></span>
                @endif
            </a>
        </div>
        <nav>
            @if(Auth::user()->friends->count() >= 1)
            <ul>
                @foreach($friends as $friend)
                    <li>
                        @if($friend->chat_status == 1)
                            <a class="link" href="{{ action('MessageController@sendMessage', [$friend->id]) }}">{{$friend->name}}, Available To Chat</a>
                        @else
                            {{$friend->name}}, Not Available To Chat
                        @endif
                    </li>
                @endforeach
            </ul>
            @else
                <p>You currently have no connections.</p>
            @endif
        </nav>
    </div>
</div>
<script src="/js/home.js"type="text/javascript"></script>
<script>

</script>

@stop
