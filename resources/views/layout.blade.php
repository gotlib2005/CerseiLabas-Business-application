<!DOCTYPE html>
<html lang="en">
<head>
    {{--<meta name="_token" content="{{ csrf_token() }}">--}}
    @include('components.headsection')
</head>
<body>
@include('components.header')
<div class="container-fluid">
    <div class="row">
        @include('components.sidebar')
        <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <div>
                @if (Session::has('new_client'))
                    {{Session::get( 'new_client')}}
                @endif
                @if (Session::has('new_project'))
                    {{Session::get( 'new_project')}}
                @endif
                @if (Session::has('new_server'))
                    {{Session::get( 'new_server')}}
                @endif
            </div>
            @yield('content')
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<script src="{{URL::asset('js/custom.js')}}"></script>
<script type="text/javascript">
    jQuery.ajaxSetup({headers: {'csrftoken': '{{ csrf_token() }}'}});
</script>
</body>
</html>