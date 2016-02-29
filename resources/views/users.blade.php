@extends('master')

@section('content')

    <div class="row">
        @include('partials.sidenav')

        <div class="col-md-8 text-center">
            <div class="well">
                    <ul id="users">
                        @foreach($users as $u)
                            <li>
                                {{$u->name}}
                                @if(Auth::user()->hasFriend($u))
                                    <a class="link" href="{{ action('UserController@removeConnection', [$u->id]) }}">Remove Connection</a>
                                @else
                                    <a class="link" href="{{ action('UserController@addConnection', [$u->id]) }}">Add Connection</a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
            </div>
        </div>
    </div>
@stop

<style>
    #users{
        list-style: none;
    }
</style>