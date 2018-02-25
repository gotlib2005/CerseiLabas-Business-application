<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse"
            data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">CerseiLabs</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto" style="
    float: right;
">
            <li class="nav-item">
            <a class="nav-link" href="../index.php"><i class="fa fa-files-o" aria-hidden="true"></i>Dumps</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../pages/all-servers.php"><i class="fa fa-server" aria-hidden="true"></i>Servers</a>
            </li>
            <li class="nav-item user">
                @if(Auth::check())
                    <a class="nav-link" href="{{URL::to('/logout')}}">
                        <i class="fa fa-user" aria-hidden="true"></i>Logout
                    </a>
                @endif
                <ul>
                    <li>
sadasdsad
                    </li>
                </ul>
            </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
            <input id="main-search" autocomplete="off" class="form-control mr-sm-2" type="search"
                   placeholder="Search clients, projects, servers...">
            <div style="display: none" id="searchresponse"></div>
        </form>
    </div>
</nav>