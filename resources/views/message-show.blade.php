@extends('master')

@section('content')

    <div class="row">
        @include('partials.sidenav')

        <div class="col-md-8">
            <h1>{!! $thread->subject !!}</h1>

            @foreach($thread->messages as $message)
                <div class="media">
                    <a class="pull-left" href="#">
                        @if($message->user->profile != null)
                            <img src="" alt="{!! $message->user->name !!}" class="img-circle">
                        @else
                            <img src="" alt="{!! $message->user->name !!}" class="img-circle">
                        @endif
                    </a>
                    <div class="media-body">
                        <h5 class="media-heading">{!! $message->user->name !!}</h5>
                        <p>{!! $message->body !!}</p>
                        <div class="text-muted"><small>Posted {!! $message->created_at->diffForHumans() !!}</small></div>
                    </div>
                </div>
            @endforeach

            <h2>Add a new message</h2>
            {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
                    <!-- Message Form Input -->
            <div class="form-group">
                {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop