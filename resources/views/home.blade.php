@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="well well-sm">
            <div class="status text-center">
                <div class="icon">
                    <img style="width:32px; height:32px;" src="{{URL::asset('img/pp.png')}} "/></a>
                </div>
                <div class="post-status text-center">
                    {{--method="POST" action="{{ action('StatusController@postStatus') }}"--}}
                    <form id="status-form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil-square-o fa-fw"></i></span>
                            <input class="form-control" onkeyup="setTimer()" id="text" type="text" name="status" placeholder="Post a status! ">
                        </div>
                        <br>
                        <p id="testing">This field is required</p>
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

<style>
    .button{
        background-color: #fbfbfb;
    }
    .icon{
        padding-bottom:15px;
    }
    .text{
        height: 100px;
    }
    .line{
        padding: 0;
        margin: 0;
    }
    .timeline-icon::after {
        /* this is the vertical line */
        content: '';
        position: absolute;
        top: -50px;
        left: 18px;
        height: 130px;
        z-index: -100;
        width: 4px;
        background: #000000;
    }
    #list{
        padding-top:35px;
        padding-bottom:35px;
    }
    .well{
        background: #fbfbfb;
        border: 1px solid #ddd;
        box-shadow: 0 1px 1px #ececec;
        -webkit-box-shadow: 0 1px 1px #ececec;
        -moz-box-shadow: 0 1px 1px #ececec;
        position: relative;
    }
    .timeline{
        position:relative;
    }
    .timeline-list{
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .timeline-icon{
        color: #fff;
        border-radius: 50%;
        position: absolute;
        width: 32px;
        height: 32px;
        line-height: 28px;
        font-size: 14px;
        text-align: center;
        left: 80px;
        margin-top:-5px;
        z-index: 100;
        padding: 2px;
    }
    .timeline-time{
        float: left;
        width: 60px;
        text-align: right;
        font-style: italic;
    }
    .timeline-content{
        margin-left: 130px;
    }
</style>