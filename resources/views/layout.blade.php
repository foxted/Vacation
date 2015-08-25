<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vacation request</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Vacation App</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li @if(Request::is('/')) class="active" @endif>
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i>&nbsp;Home</a>
                </li>
                <li>
                    <a href="{{ route('requests.create') }}"><i class="fa fa-plane"></i>&nbsp;Request vacation time</a>
                </li>
                @if(Auth::user()->is('admin') || Auth::user()->is('manager'))
                <li>
                    <a href="{{ route('requests.index') }}"><i class="fa fa-users"></i>&nbsp;Employee requests</a>
                </li>
                @endif
            </ul>
            @if(Auth::check())
            <ul class="nav navbar-nav navbar-right">
                <li><span class="badge" data-unread="0">0</span></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
            @endif
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
    @yield('body')

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    @if(Auth::check())
        <script src="http://js.pusher.com/2.2/pusher.min.js"></script>
        <script>
            this.pusher = new Pusher('74b486fd22d27023d275');

            this.pusherChannel = this.pusher.subscribe('user.' + '{{ Auth::id() }}');

            this.pusherChannel.bind('WiderFunnel\\Events\\RequestStatusChanged', function(message) {
                var badge = $('.notifications').find('span.badge');
                var notificationNumber = parseInt(badge.data('unread'));
                badge.data('unread', notificationNumber++);
                badge.text(notificationNumber++);
            });
        </script>
    @endif
    @yield('scripts')
</body>
</html>