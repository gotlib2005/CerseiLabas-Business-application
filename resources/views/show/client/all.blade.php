@extends ('layout')
@section('content')
    <div class="modal-body">
        <h1>Clients <span style="float: right"><a class="btn btn-success" href="{{URL::to('/add-client')}}"><i
                            style="font-size: 15px;margin-right: 5px" class="fa fa-plus" aria-hidden="true"></i> Add New Clients</a></span>
        </h1>
        @if ($allClients->isEmpty())
            There are no clients!
            <div>
            	<span style=""><a class="btn btn-success" href="{{URL::to('/add-client')}}"><i
                            style="font-size: 15px;margin-right: 5px" class="fa fa-plus" aria-hidden="true"></i> Add New Clients</a></span>
            </div>
        @else
            <table class="single-server">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Projects</th>
                    <th>E-mail</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allClients as $client)
                    <tr>
                        <td><a class="clients" href="#">{{$client->name}}</a></td>
                        <td>
                            <ul class="list-clients">
                                @if (!count($client->projects) > 0)
                                    <p class="no-projects">No projects!</p>
                                @else
                                    @foreach($client->projects as $project)
                                        @if($loop->last)
                                            <li><a class="clients"
                                                   href="{{URL::to('/projects/' . $project->id . '/edit')}}">{{ $project->name}} </a>
                                            </li>
                                        @else
                                            <li><a class="clients"
                                                   href="{{URL::to('/projects/' . $project->id . '/edit')}}">{{ $project->name}} </a>,
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->created_at->toFormattedDateString()}}</td>
                        <td style="text-align: center !important;">
                            <a href="{{URL::to('clients/' . $client->id) . '/edit'}}"
                               class="btn edit-server btn-secondary"><i style="margin-right: 0" class="fa fa-pencil"
                                                                        aria-hidden="true"></i>
                            </a>
                            <a data-toggle="modal" class="btn btn-secondary delete-server delete-item"
                               data-target="#myModal" data-url="{{URL::to('clients/' . $client->id) . '/delete'}}"><i
                                        class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @include ('components.modals.client-delete-modal')
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection