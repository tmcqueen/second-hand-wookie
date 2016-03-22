

    <nav id="second-nav" class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li id="home" class="{{Request::is('/') ? 'active' : '' }}">{{link_to_route('home', 'Home')}}</li>
            <li id="about" class="{{Request::is('about') ? 'active' : '' }}">{{link_to_route('about', 'About')}}</li>
            <li id="contact" class="{{Request::is('contact') ? 'active' : '' }}">{{link_to_route('contact', 'Contact')}}</li>
            <li id="events" class="{{Request::is('events') ? 'active' : '' }}">{{link_to_route('events.index', 'Events')}}</li>
            <li id="donate" class="{{Request::is('donate') ? 'active' : '' }}">{{link_to_route('donate.index', 'Donate')}}</li>
            <li id="inventory" class="{{Request::is('inventory') ? 'active' : '' }}">{{link_to_route('inventory.index', 'Inventory')}}</li>
        </ul>
        <ul class="nav navbar-nav pull-right">
            @if (Auth::check())
            <li id="login">{{link_to_route('me.settings.index', 'My Profile')}}</li>
            <li class="login">{{link_to('/logout', 'Log Out')}}</li>
            @else
            <li id="login">{{link_to('/login', 'Log in')}}</li>
            @endif
        </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
    </nav>