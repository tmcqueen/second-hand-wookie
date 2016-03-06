
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
            <li id="home" class="{{$uri == '/' ? 'active' : '' }}">{{link_to_route('home', 'Home')}}</li>
            <li id="about" class="{{$uri == 'about' ? 'active' : '' }}">{{link_to_route('about', 'About')}}</li>
            <li id="contact" class="{{$uri == 'contact' ? 'active' : '' }}">{{link_to_route('contact', 'Contact')}}</li>
            <li id="events" class="{{$uri == 'events' ? 'active' : '' }}">{{link_to_route('events', 'Events')}}</li>
            <li id="donate" class="{{$uri == 'donate' ? 'active' : '' }}">{{link_to_route('donate.index', 'Donate')}}</li>
            <li id="inventory" class="{{$uri == 'inventory' ? 'active' : '' }}">{{link_to_route('inventory.index', 'Inventory')}}</li>
        </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
    </nav>