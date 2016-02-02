<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/"><img class="logo" src="{{URL::asset('img/bg.png')}} "/></a>
        </div>
        @if(Auth::check())
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" id="test">LOGOUT</a></li>
                </ul>
            </div>
        @else
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/auth/login">LOGIN</a></li>
                    <li><a href="/auth/register">REGISTER</a></li>
                </ul>
            </div>
        @endif
    </div>
</nav>
<script>
    $(document).ready(function() {
        if($("body").data("overHangConfirm")){
            window.location.replace = "auth/logout";
        }

        $('#test').click(function(e) {
            $("body").overHang({
                activity : "confirmation",
                message : "Are you sure?",
                col: "concrete"
            })
        });
    });
</script>