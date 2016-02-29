@extends('master')

@section('content')

    <div class="row">
        @include('partials.sidenav')

        <div class="col-md-8">
            <div class="well text-center">
                <ul class="messages">
                @foreach($threads as $thread)
                    <li><a class="link" href="{{ action('MessageController@show', [$thread->id]) }}">{{$thread->subject}}</a></li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>

@stop

<style>
    .messages{
        list-style: none;
        font-size: 25px;
    }
</style>