@extends('master')

@section('content')
    <div class="row">
        @include('partials.sidenav')

        <div class="col-md-8">
            <div id="message" class="text-center">
                <h1 style="text-align: center">Send a Message to {{$user->name}}</h1>
                {!! Form::open(array('route' => array('messages.store', $user->id))) !!}
                    <div class="form-group">
                        {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
                        {!! Form::text('subject', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
                        {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop