@extends('master')
<link rel="stylesheet" type="text/css" href="/css/calendar.css">
@section('content')
    <div class="dropdown" style="display:none;">
        <div class="col-md-12">
            <div class="row icon-row">
                <li><a href="/"><img class="dropdown-icons"src="{{URL::asset('img/bg.png')}}"></a></li>
                <li><a href="/calendar"><img class="dropdown-icons active"src="{{URL::asset('img/bg.png')}}"></a></li>
                <li><a href="/profile"><img class="dropdown-icons"src="{{URL::asset('img/bg.png')}}"></a></li>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="login-info">
                <a href="#" id="shortcut">
                    <span><img class="online" style="border-left-color: #40ac2b!important;" src="{{URL::asset('img/pp.png')}} "/></span>
                    <span id="name">{{Auth::user()->name}}</span>
                    <i class="fa fa-lg fa-angle-down"></i>
                </a>
            </div>
            <nav>
                <ul id="side-nav">
                    <li><a href="/"><i class="fa fa-home"></i>Home</a></li><hr id="hr">
                    <li><a href="/calendar"><i class="fa fa-home"></i>Calendar</a><i class="fa fa-check"></i></li><hr id="hr">
                    <li><a href="/profile"><i class="fa fa-home"></i>Profile</a></li><hr id="hr">
                    <li><a href="#"><i class="fa fa-home"></i>Testing</a></li><hr id="hr">
                </ul>
            </nav>
        </div>

        <div class="col-md-10">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-md-12 col-lg-3 col-sm-12">
                        <header><h2>Add Event</h2></header>
                        <div>
                            <div class="add-event-body">
                                @include('partials.add-event')
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-9">
                        <header>
                            <h2><i class="fa fa-calendar"></i> My Events</h2>
                        </header>
                        @if($events->count() > 0)
                            <ul class="event-list">
                                @foreach($events as $event)
                                    <li><i class="fa {{$event->event_icon}}"></i> => {{$event->event_title}} => {{$event->event_description}} => {{$event->event_date}} => <label class="btn bg-color-{{$event->event_color}}">{{$event->event_color}}</label></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
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
        $(document).ready(function(){
            $('#add-event-form').submit(function(event){
                event.preventDefault();

                var icon = $('.iconselect:checked').val();
                console.log(icon);
                var title = $('#title').val();
                var description = $('#description').val();
                var date = $('#date').val();
                var color = $('.color:checked').val();

                $.post('/calendar', {icon:icon, title:title, description:description, date:date, color:color}, function(data){
                    console.log(data);

                    var li = $('<li></li>');
                    var iEl = $('<i></i>').addClass('fa').addClass(data.icon);
                    var labelEl = $('<label></label>').addClass('btn').addClass('bg-color-' + data.color).html(data.color);
                    var spanEl = $('<span></span>').html(' => ' + data.title + ' => ' + data.desc + ' => ' + data.date + ' => ');

                    spanEl.append(labelEl);
                    li.append(iEl).append(spanEl);

                    $('.event-list').prepend(
                            li
                    );
                    $("body").overHang({
                        activity : "notification",
                        message : "Event Created Successfully!",
                        duration: 5,
                        col: "emerald"
                    });
                });
            });
        });
    </script>
@stop