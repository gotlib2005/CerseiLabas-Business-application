<div class="col-sm-3 col-md-2 hidden-xs-down">
    <nav class=" bg-faded sidebar">
        <ul class="nav nav-pills flex-column">

            <li class="nav-item">
                <a class="nav-link {{setActive('allservers') }}"
                   href="{{URL::to('/allservers')}}"><span
                            class="sr-only">(current)</span>Servers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{setActive('clients') }}"
                   href="{{URL::to('/clients')}}"><span
                            class="sr-only">(current)</span>Clients</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{setActive('projects') }}"
                   href="{{URL::to('/projects')}}"><span
                            class="sr-only">(current)</span>Projects</a>
            </li>
        </ul>
        {{--<button data-toggle="modal"--}}
        {{--data-target="#new-server" class="btn btn-success">ADD NEW SERVER--}}
        {{--</button>--}}
    </nav>
</div>