@extends('master')
<link rel="stylesheet" type="text/css" href="/css/home.css">
<script src="/js/home.js"type="text/javascript"></script>
@section('content')
<div class="dropdown" style="display:none;">
    <div class="col-md-12">
        <div class="row icon-row">
            <li><a href="/"><img class="dropdown-icons active" src="{{URL::asset('img/bg.png')}}"></a></li>
            <li><a href="/calendar"><img class="dropdown-icons"src="{{URL::asset('img/bg.png')}}"></a></li>
            <li><a href="/profile"><img class="dropdown-icons"src="{{URL::asset('img/bg.png')}}"></a></li>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="login-info">
            <a href="#" id="shortcut">
                <span><img class="online" style="border-left-color: #40ac2b!important;" src="{{Auth::user()->avatar}} "/></span>
                <span id="name">{{Auth::user()->name}}</span>
                <i class="fa fa-lg fa-angle-down"></i>
            </a>
        </div>
        <nav>
            <ul id="side-nav">
                <li><a href="#"><i class="fa fa-home"></i>Home</a><i class="fa fa-check"></i></li><hr id="hr">
                <li><a href="/calendar"><i class="fa fa-home"></i>Calendar</a></li><hr id="hr">
                <li><a href="/profile"><i class="fa fa-home"></i>Profile</a></li><hr id="hr">
                <li><a href="#"><i class="fa fa-home"></i>Testing</a></li><hr id="hr">
            </ul>
        </nav>
    </div>
    <div class="col-md-10">
        <div class="well well-sm">
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
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#shortcut').click(function(){
            $('.dropdown').toggle('slow');
        });
    });
</script>
<script>
    var timerHandle = false; // global!
    function setTimer() {
        console.log("Captured keys");
        if (timerHandle) clearTimeout(timerHandle);
        timerHandle = setTimeout(sendItOff,1000); // delay is in milliseconds
    }
    function sendItOff() {
        var text = $("#text").val();
        console.log("Sending " + text);
        if($('#text').val().length > 0){
            $('#text').css('background-color', '#7DC27D');
            $('#testing').text("Validation passed!").append('<i class="fa fa-check"></i>');
        }
        else
        {
            $('#text').css('background-color', '#fff0f0');
            $('#testing').text('This field is required');
        }
    }
    $(document).ready(function(){
        $('#text').focus(function(){
            $('#submit').show('fast');
            $('#testing').show('fast');
            console.log($('#text').val().length);
            if($('#text').val().length >= 1){
                $('#text').css('background-color', '#7DC27D');
            }
            else
            {
                $('#text').css('background-color', '#fff0f0');
            }
        });
        $('#text').focusout(function(){
            $('#submit').hide('slow');
            $('#testing').hide('slow');
        });
        $('#submit').mouseenter(function(){
            $(this).addClass('btn-success');
        });
        $('#submit').mouseleave(function(){
            $(this).removeClass('btn-success');
        });

        $('#status-form').submit(function(event){
           event.preventDefault();

            var status = $('#text').val();

            $.post('/', {status:status}, function(status){
                console.log(status);

                $('.timeline-list').prepend(
                        "<li id='list'>" +
                                "<div class='timeline-icon'>" +
                                "<img style='width:32px; height:32px;' src='{{URL::asset('img/pp.png')}} '/>" +
                                "</div>" +
                                "<div class='timeline-time'>" +
                                "<small>just now</small>" +
                                "</div>" +
                                "<div class='timeline-content'>" +
                                "<p>"+status+"</p>" +
                                "</div>" +
                                "</li>" +
                                "<hr class='line'>"
                );

                $("body").overHang({
                    activity : "notification",
                    message : "Status Posted Successfully!",
                    duration: 5,
                    col: "emerald"
                });
            });
        });
    });
</script>
@stop
