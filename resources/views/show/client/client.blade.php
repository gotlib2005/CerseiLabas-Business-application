@extends ('layout')
@section('content')
    <h1>Clients : {{$getclient->name}}</h1>
    <table class="single-server">
        <thead>
        <tr>
            <th>Name</th>
            <th>Server</th>
            <th>E-mail</th>
            <th>Projects</th>
            <th>Created</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$getclient->name}}</td>
            <td>@if (isset($server->name)) {{$server->name}} @endif</td>
            <td>{{$getclient->email}}</td>
            <td>
                <ul class="list-clients">
                    @if ($getclient->projects)
                        No projects!
                    @else
                        @foreach($getclient->projects as $item)
                            @if($loop->last)
                                {{$item->name}}
                                <li><a href="{{URL::to('/projects/' . $item->id .'/edit ')}}">{{$item->name}}</a></li>
                            @else
                                <li><a href="{{URL::to('/projects/' . $item->id .'/edit ')}}">{{$item->name}},</a></li>
                            @endif
                        @endforeach
                    @endif

                </ul>
            </td>
            <td>{{$getclient->created_at->toFormattedDateString()}}</td>
        </tr>
        </tbody>
    </table>
@endsection