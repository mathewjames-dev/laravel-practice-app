@extends('master')

@section('content')

    <div class="row">
        @include('partials.sidenav')

        <div class="col-md-8 text-center">
            <ul class="notif-list">
                @foreach($notifications as $n)
                    <li>
                        <a href="#" data-id="{{$n->id}}" class="notifications">
                            <span>
                                @if($n->read == 1)
                                {{$n->title}} <i class="fa fa-check"></i>
                                @else
                                {{$n->title}}
                                @endif
                            </span>
                        </a>

                        <br>

                        <span class="notification-text">{{$n->body}}</span>
                    </li>
                @endforeach
            </ul>
            @if($notifications->count() <= 0)
                <p>You currently have 0 notifications.</p>
            @endif
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.notifications').click(function(){
                var $link = $(this);
                $(this).nextAll('.notification-text').toggle('fast');
                var id = $link.data('id');
                $.post('/notifications', {id:id}, function(r){
                    console.log(r);
                });
            })
        })
    </script>
@stop

<style>
    .notif-list{
        list-style:none;
    }
    .notification-text{
        display:none;
    }
</style>