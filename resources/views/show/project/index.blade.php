@extends('layout')
@section('content')
    <div class="modal-body all-servers">
        <h1>Projects <span style="float: right"><a class="btn btn-success" href="{{URL::to('/projects/create')}}"><i
                            style="font-size: 15px;margin-right: 5px" class="fa fa-plus" aria-hidden="true"></i> Add New Project</a></span>
        </h1>
        @if ($projects->isEmpty())
            There are no projects!
        @else
            <table class="single-server">
                <thead>
                <tr>
                    <th>R.N.</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Price</th>
                    <th style="text-align: center !important;">Actions</th>
                </tr>
                </thead>
                <tbody>
				<?php $i = 1; ?>
                @foreach($projects as $project)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href="{{URL::to('projects/' . $project->id . '/edit')}}">{{$project->name}}</a></td>
                        <td>{{$project->type}}</td>
                        <td class="@if ($project->status == 'active') active @endif">{{$project->status}}</td>
                        <td>{{$project->start_date}}</td>
                        <td>{{$project->end_date}}</td>
                        <td>{{$project->price}}</td>

                        <td style="text-align: center !important;">
                            <a href="{{URL::to('projects/' . $project->id) . '/edit'}}"
                               class="btn edit-server btn-secondary"><i style="margin-right: 0" class="fa fa-pencil"
                                                                        aria-hidden="true"></i>
                            </a>
                            <a data-toggle="modal" class="btn btn-secondary delete-server"
                               data-target="#myModal"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @include('components.modals.project-delete-modal')
					<?php $i ++;?>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection