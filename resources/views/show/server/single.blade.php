@extends('layout')
@section('content')

    <h1>{{$server->name}}</h1>
    <table class="single-server">
        <thead>
        <tr>
            <th>Name</th>
            <th>IP address</th>
            <th>Username</th>
            <th>Password</th>
            <th>Parent Server</th>
            <th>Created</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$server->name}}</td>
            <td>{{$server->server_ip}}</td>
            <td>{{$server->username}}</td>
            <td>{{$server->password}}</td>
            <td>

                @if(isset($currentParentServer))
                    <a class="server-parent" href="{{URL::to('servers/' . $currentParentServer->id)}}">{{$currentParentServer->name}}</a>
                @else No parent Server
                @endif
            </td>

            <td>{{$server->created_at->toFormattedDateString()}}</td>

        </tr>
        </tbody>
    </table>
    <div class="action-button-group">
        <a href="{{URL::to('servers/' . $server->id) . '/edit'}}" id="edit-ser"
           class="btn edit-server btn-success float-left">Edit server
        </a>
        <a href="{{URL::to('servers/' . $server->id) . '/delete'}}" id="delete-server" style="margin-left: 10px"
           data-target=".bd-example-modal-sm"
           class="btn btn-danger float-left">Delete server
        </a>
    </div>

@endsection