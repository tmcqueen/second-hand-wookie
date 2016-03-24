
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
            <li><a href="/inventory">Inventory</a></li>
            <li><a href="#">Blah</a></li>
            <li><a href="#">Blah</a></li>
        </ul>
        <ul class="nav navbar-nav pull-right">
            <li id="login">{{link_to_route('me', 'My Profile')}}</li>
            <li class="login">{{link_to('/logout', 'Log Out')}}</li>
        </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
    </nav>
    <div class="buffer"></div>