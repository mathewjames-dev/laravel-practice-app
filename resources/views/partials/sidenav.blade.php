<div class="col-md-2 text-center">
    <div class="login-info">
        <a href="#" id="shortcut">
            <span><img class="online" style="border-left-color: #40ac2b!important;" src="{{Auth::user()->avatar}} "/></span>
            <span id="name">{{Auth::user()->name}}</span>
            <i class="fa fa-lg fa-angle-down"></i>
        </a>
    </div>
    <nav>
        <ul id="side-nav">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li><hr id="hr">
            <li><a href="/profile"><i class="fa fa-user"></i> Profile</a></li><hr id="hr">
            <li><a href="/users"><i class="fa fa-users"></i> Users</a></li><hr id="hr">
            <li><a href="/notifications"><i class="fa fa-exclamation"></i> Notifications
                    @if(Auth::user()->notifications()->whereRead(0)->count() >= 1)
                        <span class="badge">{{ Auth::user()->notifications()->whereRead(0)->count() }}</span></a></li><hr id="hr">
            @endif
            <li><a href="/messages"><i class="fa fa-inbox"></i> Inbox</a></li><hr id="hr">
        </ul>
    </nav>
</div>