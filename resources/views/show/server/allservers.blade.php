@extends('layout')
@section('content')


    <div class="modal-body all-servers">
        <h1>Servers <span style="float: right"><a class="btn btn-success" href="{{URL::to('/add-server')}}"><i
                            style="font-size: 15px;margin-right: 5px" class="fa fa-plus" aria-hidden="true"></i> Add New Server</a></span>
        </h1>
        @if ($allservers->isEmpty())
            There is no server in database!
        @else
            <table class="single-server">
                <thead>
                <tr>
                    <th>R.N.</th>
                    <th>Name</th>
                    <th>Server Address</th>
                    <th>SSH username</th>
                    <th>SSH Password</th>
                    <th>SSH port</th>
                    <th>Parent Server</th>
                    <th>Server technology</th>
                    <th>Created</th>
                    <th style="text-align: center !important;">Actions</th>
                </tr>
                </thead>
                <tbody>
				<?php $i = 1; ?>
                @foreach($allservers as $server)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href="{{URL::to('servers/' . $server->id . '/edit')}}">{{$server->name}}</a></td>
                        <td>{{$server->server_ip}}</td>
                        <td>{{$server->ssh_user}}</td>
                        <td>{{$server->ssh_pass}}</td>
                        <td>{{$server->ssh_port}}</td>
                        <td>
                            @if(isset($server->parent))
                                <a class="server-parent"
                                   href="{{URL::to('servers/' . $server->parent->id . '/edit')}}">{{$server->parent->name}}</a>
                            @else No parent Server
                            @endif

                        </td>
                        <td>{{$server->server_technology}}</td>
                        <td>{{$server->created_at->toFormattedDateString()}}</td>
                        <td style="text-align: center !important;">
                            <a href="{{URL::to('servers/' . $server->id) . '/edit'}}"
                               class="btn edit-server btn-secondary"><i style="margin-right: 0" class="fa fa-pencil"
                                                                        aria-hidden="true"></i>
                            </a>
                            <a data-toggle="modal" data-url="{{URL::to('servers/' . $server->id) . '/delete'}}"
                               class="btn btn-secondary delete-server delete-item"
                               data-target="#myModal"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
					<?php $i ++;?>
                @endforeach
                @include('components.modals.server-delete-modal')

                </tbody>
            </table>
        @endif
    </div>
@endsection